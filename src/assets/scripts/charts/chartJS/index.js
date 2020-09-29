export default (function () {

  const urlParams = new URLSearchParams(window.location.search);
  const customdt = urlParams.get('customdt');

  console.log(customdt);
  var test = new Date(customdt);
  console.log(test);  
  var test2 = Math.round(test.getTime()/1000);
  console.log(test2);


  const reading1 = document.getElementById('reading1');


  if(customdt){
    var dt = new Date(customdt);
    var datetime_now = Math.round(dt.getTime()/1000);
  } else{
    var datetime_now = Math.round(Date.now()/1000);
  }

  
  
  var datetime_1h = datetime_now - 60*60;

  var datetime_1d = datetime_now - 60*60*24;

  var query1 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table16';

  var finalquery1 = query1 + '&min=' + datetime_1h + '&max=' + datetime_now;

  if(reading1) {
    fetch(finalquery1)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          reading1.textContent = data.Count;
      })
  }

  const reading2 = document.getElementById('reading2');
  

  var query2 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table16';

  var finalquery2 = query2 + '&min=' + datetime_1d + '&max=' + datetime_now;

  if(reading2) {
    fetch(finalquery2)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          reading2.textContent = data.Count;
      })
  }

  const reading3 = document.getElementById('reading3');

  var query3 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table16';

  var finalquery3 = query3 + '&min=' + datetime_1h + '&max=' + datetime_now;

  if(reading3) {
    fetch(finalquery3)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
        var sum = 0;
        var items = data.Items;
        items.forEach(element => {
          sum += parseInt(element.payload.M.duration2.N);
        });
        reading3.textContent = Math.round(sum/60);
      })
  }

  const reading4 = document.getElementById('reading4');

  var query4 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table16';

  var finalquery4 = query4 + '&min=' + datetime_1d + '&max=' + datetime_now;

  if(reading4) {
    fetch(finalquery4)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          var sum = 0;
          var items = data.Items;
          items.forEach(element => {
            sum += parseInt(element.payload.M.duration2.N);
          });
          reading4.textContent = Math.round(sum/60);
      })
  }

  const reading5 = document.getElementById('reading5');
  const reading6 = document.getElementById('reading6');

  var query5 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table1';

  var finalquery5 = query5 + '&min=' + datetime_1d + '&max=' + datetime_now;

  if(reading5) {
    fetch(finalquery5)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          var sum = 0;
          var max = 0;
          var min = 9999999999;
          var items = data.Items;
          items.forEach(element => {
            if(element.payload.M.status2.N == 0){
              sum += 1;
              if(element.payload.M.date.N > max){
                max = element.payload.M.date.N;
              }
              if(element.payload.M.date.N < min){
                min = element.payload.M.date.N;
              }
            }
          });
          reading5.textContent = sum;
          reading6.textContent = Math.round((max-min)/sum/60) + " Min " + Math.round((max-min)/sum%60) + " Sec ";
      })
  }

  const reading7 = document.getElementById('reading7');
  const reading8 = document.getElementById('reading8');

  var query7 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table2';

  var finalquery7 = query7 + '&min=' + datetime_1d + '&max=' + datetime_now;

  if(reading7) {
    fetch(finalquery7)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          var sum = 0;
          var max = 0;
          var min = 9999999999;
          var items = data.Items;
          items.forEach(element => {
            if(element.payload.M.status2.N == 0){
              sum += 1;
              if(element.payload.M.date.N > max){
                max = element.payload.M.date.N;
              }
              if(element.payload.M.date.N < min){
                min = element.payload.M.date.N;
              }
            }
          });
          reading7.textContent = sum;
          reading8.textContent = Math.round((max-min)/sum/60) + " Min " + Math.round((max-min)/sum%60) + " Sec ";
      })
  }

  const reading9 = document.getElementById('reading9');
  const reading10 = document.getElementById('reading10');


  var query9 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table3';

  var finalquery9 = query9 + '&min=' + datetime_1d + '&max=' + datetime_now;

  if(reading9) {
    fetch(finalquery9)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          var sum = 0;
          var max = 0;
          var min = 9999999999;
          var items = data.Items;
          items.forEach(element => {
            if(element.payload.M.status2.N == 0){
              sum += 1;
              if(element.payload.M.date.N > max){
                max = element.payload.M.date.N;
              }
              if(element.payload.M.date.N < min){
                min = element.payload.M.date.N;
              }
            }
          });
          reading9.textContent = sum;
          reading10.textContent = Math.round((max-min)/sum/60) + " Min " + Math.round((max-min)/sum%60) + " Sec ";
      })
  }

  const reading11 = document.getElementById('reading11');
  const reading12 = document.getElementById('reading12');


  var query11 = 'https://z7uwx179ah.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=Table4';

  var finalquery11 = query11 + '&min=' + datetime_1d + '&max=' + datetime_now;

  if(reading11) {
    fetch(finalquery11)
      .then((response) => {
        response.set
        return response.json();
      })
      .then((data) => {
          var sum = 0;
          var max = 0;
          var min = 9999999999;
          var items = data.Items;
          items.forEach(element => {
            if(element.payload.M.status2.N == 0){
              sum += 1;
              if(element.payload.M.date.N > max){
                max = element.payload.M.date.N;
              }
              if(element.payload.M.date.N < min){
                min = element.payload.M.date.N;
              }
            }
          });
          reading11.textContent = sum;
          reading12.textContent = Math.round((max-min)/sum/60) + " Min " + Math.round((max-min)/sum%60) + " Sec ";
      })
  }
}())
