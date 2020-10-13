#include <stdio.h>
#include "mgos.h"
#include "mgos_app.h"
#include "mgos_gpio.h"
#include "mgos_timers.h"
#include "mgos_mqtt.h"
#include "mgos_config.h"
#include "mgos_dash.h"


#include <time.h>

#include <ctime>
#include <iostream>
#include <chrono>

#include <string.h>
#include <stdlib.h>
#include <sys/time.h>
#include "freertos/FreeRTOS.h"
#include "freertos/task.h"
#include "esp_sleep.h"
#include "esp_log.h"
#include "driver/uart.h"
#include "driver/gpio.h"

#include "rom/rtc.h"
#include "driver/rtc_io.h"


#define mgos_sys_config_get_app_gpio_trigger_pin() GPIO_NUM_26
#define mgos_sys_config_get_app_gpio_echo_pin() GPIO_NUM_27

// as pulseIn isn't supported in Mongoose Arduino compatability library yet, here's a local
// implementation of that. Full credit to "nliviu" on Mongoose OS forums for that
// https://forum.mongoose-os.com/discussion/1928/arduino-compat-lib-implicit-declaration-of-function-pulsein#latest



static inline uint64_t uptime()
{
    return (uint64_t)(1000000 * mgos_uptime());
}

uint32_t pulseInLongLocal(uint8_t pin, uint8_t state, uint32_t timeout)
{
    uint64_t startMicros = uptime();

    // wait for any previous pulse to end
    while (state == mgos_gpio_read(pin))
    {
        if ((uptime() - startMicros) > timeout)
        {
            return 0;
        }
    }

    // wait for the pulse to start
    while (state != mgos_gpio_read(pin))
    {
        if ((uptime() - startMicros) > timeout)
        {
            return 0;
        }
    }

    uint64_t start = uptime();

    // wait for the pulse to stop
    while (state == mgos_gpio_read(pin))
    {
        if ((uptime() - startMicros) > timeout)
        {
            return 0;
        }
    }
    return (uint32_t)(uptime() - start);
}

int main(void) {
    
    time_t now = time(NULL);
    
    if (now == -1) {
        puts("The time() function failed");
    }

    printf("%ld\n", now);

    return now;
}

static void timer_cb3(void *arg){
    static int i=0;
    if(i<1){
        printf("This is 2nd delay.\n");
        i++;
    } else {
        i=0;
        //mgos_clear_timer(mgos_set_timer(2000, true, timer_cb2, NULL));
        esp_sleep_enable_timer_wakeup(900000000);
        printf("Entering deep sleep\n");
    
        esp_deep_sleep_start();
    }
}

static void timer_cb(void *arg)
{
    //send trigger
    mgos_gpio_write(mgos_sys_config_get_app_gpio_trigger_pin(), 1);
    // wait 10 microseconds
    mgos_usleep(10);
    // stop the trigger
    mgos_gpio_write(mgos_sys_config_get_app_gpio_trigger_pin(), 0);

    // wait for response and calculate distance
    unsigned long duration = pulseInLongLocal(mgos_sys_config_get_app_gpio_echo_pin(), 1, mgos_sys_config_get_app_pulse_in_timeout_usecs());
    double distance = duration * 0.034 / 2;

    int now = main();
    
    char strBuffer[88];
    snprintf(strBuffer, sizeof(strBuffer), "{\"status2\":{\"distance\":%.2f}, \"sensorID\":6, \"time2\":%d}\n", distance, now);

    printf(strBuffer);
    mgos_mqtt_pub(mgos_sys_config_get_app_mqtt_tank_level_topic(), strBuffer, strlen(strBuffer), 1, 0);  

    mgos_set_timer(mgos_sys_config_get_app_sensor_read_interval_ms(), true, timer_cb3, NULL);
}

static void timer_cb2(void *arg){
    static int i=0;
    if(i<5){
        printf("This is a delay.\n");
        i++;
    } else {
        printf("The error.\n");
        i=0;
        //mgos_clear_timer(mgos_set_timer(2000, true, timer_cb2, NULL));
        timer_cb(NULL);
    }
}

enum mgos_app_init_result mgos_app_init(void)
{
    printf("-------------- STARTING APPLICATION -------------\n");
    
    
    // set the modes for the pins
    rtc_gpio_deinit(mgos_sys_config_get_app_gpio_trigger_pin());
    rtc_gpio_deinit(mgos_sys_config_get_app_gpio_echo_pin());
    //mgos_usleep(2000000);
    //mgos_uart_set_rx_enabled(0, true);
    //mgos_set_timer(2000, true, timer_cb2, NULL);

    mgos_gpio_set_mode(mgos_sys_config_get_app_gpio_trigger_pin(), MGOS_GPIO_MODE_OUTPUT);
    mgos_gpio_set_mode(mgos_sys_config_get_app_gpio_echo_pin(), MGOS_GPIO_MODE_INPUT);
    mgos_gpio_set_pull(mgos_sys_config_get_app_gpio_echo_pin(), MGOS_GPIO_PULL_UP);

    //mgos_set_timer(5000, true, timer_cb2, NULL);
    // Every x second, invoke timer_cb. 2nd arg means repeat continuously    
    mgos_set_timer(mgos_sys_config_get_app_sensor_read_interval_ms(), true, timer_cb2, NULL);
    //timer_cb(NULL);

    return MGOS_APP_INIT_SUCCESS;
}





