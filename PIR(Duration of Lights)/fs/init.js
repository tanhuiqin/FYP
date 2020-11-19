load('api_config.js');
load('api_gpio.js');
load('api_mqtt.js');
load('api_timer.js');
load('api_sys.js');

// /devices/esp32_C8CD90/events   <- this with me (topic)
// /devices/esp32_FF130C/events   <- put in toilet one (topic)

// set pin for pir and relay/led
let pirSensor = 32;   // 21
// let pin = 33;  // 22
let topic = '/devices/' + Cfg.get('device.id') + '/events';

// set pir as input
GPIO.set_mode(pirSensor, GPIO.MODE_INPUT);

//set relay/led as output
// GPIO.set_mode(pin, GPIO.MODE_OUTPUT);
// GPIO.write(pin,0); // for led is 0 for relay is 1

// status for light
let lightstatus = 0;
// duration of light on to off
let timeduration = 0;

//got continue light or not
let continuel = 0;
let continuee = 0;
let noton = 0;

// look for motion every 1 seconds.
Timer.set(1000 /* 1 sec */ , Timer.REPEAT /* true repeat */ , function () {
  let value = GPIO.read(pirSensor);
  
  if (value !== 0){
    if (lightstatus !== 1){
      if (continuel !== 1){
        lightstatus = 1;
        // GPIO.write(pin,1); // for led is 1 for relay is 0
        // let msg = JSON.stringify({ status2: 'on', duration2: timeduration, date2:Timer.now(), SensorID:9 });
        //let ok = MQTT.pub(topic, msg, 1);
        let msg = 'on';
        timeduration = timeduration + 1;
        print(msg);
      } else {

        if (noton !== 1) {
          let msg = 'continue haha';
          timeduration = timeduration + 1;
          continuee = 1;
          print(msg, timeduration);
        } else {
          let msg = 'continue wawa';
          timeduration = timeduration + 1;
          continuee = 1;
          noton = 0;
          print(msg, timeduration);

        }
      }
    } else {
      let msg = 'continue hehe'+ ' ' + Cfg.get('device.id');
      timeduration = timeduration + 1;
      print(msg, timeduration);
    }
  } else {
    if (lightstatus !== 0){
      lightstatus = 0;
      continuel = 1;

      Timer.set(600000, 0, function() {
        let value = GPIO.read(pirSensor);
        
        if (value !== 0){
          lightstatus = 1;
          let msg = 'continue';

          if (continuee !== 1){
            timeduration = timeduration + 600;
          } else {
            timeduration = timeduration + 1;
            continuee = 0;
          }
          print(msg, timeduration);
        } else {
          // GPIO.write(pin,0); // for led is 0 for relay is 1
          timeduration = timeduration + 600;
          let msg = JSON.stringify({ sensorID:9, time2:Timer.now(), duration2:timeduration });
          let ok = MQTT.pub(topic, msg, 1);
          let msg2 = 'off';
          timeduration = 0;
          continuel = 0;
          print(msg2, ok, msg);
        };

      }, null);

    } else {
      let msg = 'nothing';
      noton = 1;
      print(msg)
    }
  }

}, null);