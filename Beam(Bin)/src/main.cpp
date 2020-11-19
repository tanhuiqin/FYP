#include "mgos.h"
#include "rom/rtc.h"
#include "driver/rtc_io.h"
#include "esp_sleep.h"

#include <stdio.h>
#include "mgos_app.h"
#include "mgos_gpio.h"
#include "mgos_timers.h"
#include "mgos_mqtt.h"
#include "mgos_config.h"
#include "mgos_dash.h"

#include <time.h>


#define GPIO_PIN GPIO_NUM_35

//  DEEP SLEEP HELPER FUNCTION: 
//  
static void gotosleep(gpio_num_t pin){
  esp_sleep_enable_ext0_wakeup(pin, 1);		// 1== HIGH (Sensor Open)

  printf("The bin is empty!\n");

  esp_deep_sleep_start();
}



int main(void) {
    
    time_t now = time(NULL);
    
    if (now == -1) {
        puts("The time() function failed");
    }

    return now;
}


static void timer_cb(void *arg)
{
    if(mgos_gpio_read(GPIO_PIN)){
    int status = mgos_gpio_read(GPIO_PIN);
    int now = main();

    char strBuffer[64];
    snprintf(strBuffer, sizeof(strBuffer), "{\"sensorID\":14, \"time2\":%d, \"status2\":%d}\n", now, status);
    printf(strBuffer);

    mgos_mqtt_pub(mgos_sys_config_get_app_mqtt_tank_level_topic(), strBuffer, strlen(strBuffer), 1, 0);
    printf("Bin is full!\n");
    
    
  } else {
    int status = mgos_gpio_read(GPIO_PIN);
    int now = main();

    char strBuffer[64];
    snprintf(strBuffer, sizeof(strBuffer), "{\"sensorID\":14, \"time2\":%d, \"status2\":%d}\n", now, status);

    printf(strBuffer);
    mgos_mqtt_pub(mgos_sys_config_get_app_mqtt_tank_level_topic(), strBuffer, strlen(strBuffer), 1, 0);
    printf("Bin is empty, going to sleep.\n");
    gotosleep(GPIO_PIN);
  }
    
      
}


enum mgos_app_init_result mgos_app_init(void)
{
    printf("-------------- STARTING APPLICATION -------------\n");

    rtc_gpio_deinit(GPIO_PIN);
    mgos_gpio_set_mode(35, MGOS_GPIO_MODE_INPUT);
    mgos_gpio_set_pull(35, MGOS_GPIO_PULL_DOWN);
    printf("MGOS GPIO35 read: %d\n", mgos_gpio_read(GPIO_PIN));
    printf("RTC GPIO35 read: %d\n", rtc_gpio_get_level(GPIO_PIN));

    // Every x second, invoke timer_cb. 2nd arg means repeat continuously
    timer_cb(NULL);
    mgos_set_timer(mgos_sys_config_get_app_sensor_read_interval_ms(), true, timer_cb, NULL);

    return MGOS_APP_INIT_SUCCESS;
}
