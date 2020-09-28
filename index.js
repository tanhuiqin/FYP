import Chart from 'chart.js';
import { HTML5_FMT } from 'moment';
import { COLORS } from '../../constants/colors';

export default (function () {

  const reading1 = document.getElementById('reading1');

  const datetime_now = Math.round(Date.now()/1000);
  
  const datetime_1h = datetime_now - 60*60;

  const datetime_1d = datetime_now - 60*60*24;

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


  // ------------------------------------------------------
  // @Line Charts
  // ------------------------------------------------------

  const lineChartBox = document.getElementById('line-chart');

  if (lineChartBox) {
    const lineCtx = lineChartBox.getContext('2d');
    lineChartBox.height = 40;

    new Chart(lineCtx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label                : 'Series A',
          backgroundColor      : 'rgba(237, 231, 246, 0.5)',
          borderColor          : COLORS['deep-purple-500'],
          pointBackgroundColor : COLORS['deep-purple-700'],
          borderWidth          : 2,
          data                 : [60, 50, 70, 60, 50, 70, 60],
        }, {
          label                : 'Series B',
          backgroundColor      : 'rgba(232, 245, 233, 0.5)',
          borderColor          : COLORS['blue-500'],
          pointBackgroundColor : COLORS['blue-700'],
          borderWidth          : 2,
          data                 : [70, 75, 85, 70, 75, 85, 70],
        }],
      },

      options: {
        legend: {
          display: false,
        },
      },

    });
  }

  const lineChartBox2 = document.getElementById('linechart');

  if (lineChartBox2) {
    const lineCtx = lineChartBox2.getContext('2d');
    lineChartBox2.height = 40;

    new Chart(lineCtx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label                : 'Series A',
          backgroundColor      : 'rgba(237, 231, 246, 0.5)',
          borderColor          : COLORS['deep-purple-500'],
          pointBackgroundColor : COLORS['deep-purple-700'],
          borderWidth          : 2,
          data                 : [60, 50, 70, 60, 50, 70, 60],
        }, {
          label                : 'Series B',
          backgroundColor      : 'rgba(232, 245, 233, 0.5)',
          borderColor          : COLORS['blue-500'],
          pointBackgroundColor : COLORS['blue-700'],
          borderWidth          : 2,
          data                 : [70, 75, 85, 70, 75, 85, 70],
        }],
      },

      options: {
        legend: {
          display: false,
        },
      },

    });
  }

  // ------------------------------------------------------
  // @Bar Charts
  // ------------------------------------------------------

  const barChartBox = document.getElementById('bar-chart');

  if (barChartBox) {
    const barCtx = barChartBox.getContext('2d');

    new Chart(barCtx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label           : 'Dataset 1',
          backgroundColor : COLORS['deep-purple-500'],
          borderColor     : COLORS['deep-purple-800'],
          borderWidth     : 1,
          data            : [10, 50, 20, 40, 60, 30, 70],
        }, {
          label           : 'Dataset 2',
          backgroundColor : COLORS['light-blue-500'],
          borderColor     : COLORS['light-blue-800'],
          borderWidth     : 1,
          data            : [10, 50, 20, 40, 60, 30, 70],
        }],
      },

      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
      },
    });
  }

  // ------------------------------------------------------
  // @Area Charts
  // ------------------------------------------------------

  const areaChartBox = document.getElementById('area-chart');

  if (areaChartBox) {
    const areaCtx = areaChartBox.getContext('2d');

    new Chart(areaCtx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          backgroundColor : 'rgba(3, 169, 244, 0.5)',
          borderColor     : COLORS['light-blue-800'],
          data            : [10, 50, 20, 40, 60, 30, 70],
          label           : 'Dataset',
          fill            : 'start',
        }],
      },
    });
  }

  // ------------------------------------------------------
  // @Scatter Charts
  // ------------------------------------------------------

  const scatterChartBox = document.getElementById('scatter-chart');

  if (scatterChartBox) {
    const scatterCtx = scatterChartBox.getContext('2d');

    Chart.Scatter(scatterCtx, {
      data: {
        datasets: [{
          label           : 'My First dataset',
          borderColor     : COLORS['red-500'],
          backgroundColor : COLORS['red-500'],
          data: [
            { x: 10, y: 20 },
            { x: 30, y: 40 },
            { x: 50, y: 60 },
            { x: 70, y: 80 },
            { x: 90, y: 100 },
            { x: 110, y: 120 },
            { x: 130, y: 140 },
          ],
        }, {
          label           : 'My Second dataset',
          borderColor     : COLORS['green-500'],
          backgroundColor : COLORS['green-500'],
          data: [
            { x: 150, y: 160 },
            { x: 170, y: 180 },
            { x: 190, y: 200 },
            { x: 210, y: 220 },
            { x: 230, y: 240 },
            { x: 250, y: 260 },
            { x: 270, y: 280 },
          ],
        }],
      },
    });
  }
}())
