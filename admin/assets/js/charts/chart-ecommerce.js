"use strict";

!function (NioApp, $) {
  "use strict";

  var totalSales = {
    labels: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan", "17 Jan", "18 Jan", "19 Jan", "20 Jan", "21 Jan", "22 Jan", "23 Jan", "24 Jan", "25 Jan", "26 Jan", "27 Jan", "28 Jan", "29 Jan", "30 Jan"],
    dataUnit: 'Sales',
    lineTension: .3,
    datasets: [{
      label: "Sales",
      color: "#0fac81",
      background: NioApp.hexRGB('#0fac81', .25),
      data: [130, 105, 125, 115, 110, 95, 131, 110, 115, 120, 111, 97, 113, 107, 122, 100, 85, 110, 130, 107, 90, 105, 123, 115, 100, 117, 125, 95, 137, 101]
    }]
  };
  var totalOrders = {
    labels: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan", "17 Jan", "18 Jan", "19 Jan", "20 Jan", "21 Jan", "22 Jan", "23 Jan", "24 Jan", "25 Jan", "26 Jan", "27 Jan", "28 Jan", "29 Jan", "30 Jan"],
    dataUnit: 'Orders',
    lineTension: .3,
    datasets: [{
      label: "Orders",
      color: "#3fbd9a",
      background: NioApp.hexRGB('#3fbd9a', .25),
      data: [85, 125, 105, 115, 130, 106, 141, 110, 95, 120, 111, 105, 113, 107, 122, 100, 95, 110, 120, 107, 100, 105, 123, 115, 110, 117, 125, 75, 95, 101]
    }]
  };
  var totalCustomers = {
    labels: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan", "17 Jan", "18 Jan", "19 Jan", "20 Jan", "21 Jan", "22 Jan", "23 Jan", "24 Jan", "25 Jan", "26 Jan", "27 Jan", "28 Jan", "29 Jan", "30 Jan"],
    dataUnit: 'Customers',
    lineTension: .3,
    datasets: [{
      label: "Customers",
      color: "#008080",
      background: NioApp.hexRGB('#008080', .25),
      data: [92, 105, 125, 85, 110, 106, 131, 105, 110, 115, 135, 105, 120, 85, 122, 100, 125, 110, 120, 125, 85, 105, 123, 115, 90, 117, 125, 100, 95, 65]
    }]
  };
  function ecommerceLineS1(selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-line-chart-s1');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 12,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return data['labels'][tooltipItem[0]['index']];
              },
              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 10,
            titleFontColor: '#fff',
            titleMarginBottom: 4,
            bodyFontColor: '#fff',
            bodyFontSize: 10,
            bodySpacing: 4,
            yPadding: 6,
            xPadding: 6,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: false,
              ticks: {
                beginAtZero: true,
                fontSize: 12,
                fontColor: '#9eaecf',
                padding: 0
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: false,
              ticks: {
                fontSize: 12,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2),
                offsetGridLines: true
              }
            }]
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    ecommerceLineS1();
  });
  var storeVisitors = {
    labels: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan", "17 Jan", "18 Jan", "19 Jan", "20 Jan", "21 Jan", "22 Jan", "23 Jan", "24 Jan", "25 Jan", "26 Jan", "27 Jan", "28 Jan", "29 Jan", "30 Jan"],
    dataUnit: 'Customer',
    lineTension: .1,
    datasets: [{
      label: "Current Month",
      color: "#0fac81",
      dash: 0,
      background: "transparent",
      data: [4110, 4220, 4810, 5480, 4600, 5670, 6660, 4830, 5590, 5730, 4790, 4950, 5100, 5800, 5950, 5850, 5950, 4450, 4900, 8000, 7200, 7250, 7900, 8950, 6300, 7200, 7250, 7650, 6950, 4750]
    }]
  };
  function ecommerceLineS2(selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-line-chart-s2');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderDash: _get_data.datasets[i].dash,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 12,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return data['labels'][tooltipItem[0]['index']];
              },
              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 13,
            titleFontColor: '#fff',
            titleMarginBottom: 6,
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            bodySpacing: 4,
            yPadding: 10,
            xPadding: 10,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: true,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                fontSize: 12,
                fontColor: '#9eaecf',
                padding: 8,
                stepSize: 2400,
                display: false
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: false,
              ticks: {
                fontSize: 12,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 0,
                zeroLineColor: 'transparent',
                offsetGridLines: true
              }
            }]
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    ecommerceLineS2();
  });
  var todayOrders = {
    labels: ["12AM - 02AM", "02AM - 04AM", "04AM - 06AM", "06AM - 08AM", "08AM - 10AM", "10AM - 12PM", "12PM - 02PM", "02PM - 04PM", "04PM - 06PM", "06PM - 08PM", "08PM - 10PM", "10PM - 12PM"],
    dataUnit: 'Orders',
    lineTension: .3,
    datasets: [{
      label: "Orders",
      color: "#0fac81",
      background: "transparent",
      data: [92, 105, 125, 85, 110, 106, 131, 105, 110, 131, 105, 110]
    }]
  };
  var todayRevenue = {
    labels: ["12AM - 02AM", "02AM - 04AM", "04AM - 06AM", "06AM - 08AM", "08AM - 10AM", "10AM - 12PM", "12PM - 02PM", "02PM - 04PM", "04PM - 06PM", "06PM - 08PM", "08PM - 10PM", "10PM - 12PM"],
    dataUnit: 'Orders',
    lineTension: .3,
    datasets: [{
      label: "Revenue",
      color: "#816bff",
      background: "transparent",
      data: [92, 105, 125, 85, 110, 106, 131, 105, 110, 131, 105, 110]
    }]
  };
  var todayCustomers = {
    labels: ["12AM - 02AM", "02AM - 04AM", "04AM - 06AM", "06AM - 08AM", "08AM - 10AM", "10AM - 12PM", "12PM - 02PM", "02PM - 04PM", "04PM - 06PM", "06PM - 08PM", "08PM - 10PM", "10PM - 12PM"],
    dataUnit: 'Customers',
    lineTension: .3,
    datasets: [{
      label: "Customers",
      color: "#ffa353",
      background: "transparent",
      data: [92, 105, 125, 85, 110, 106, 131, 105, 110, 131, 105, 110]
    }]
  };
  var todayVisitors = {
    labels: ["12AM - 02AM", "02AM - 04AM", "04AM - 06AM", "06AM - 08AM", "08AM - 10AM", "10AM - 12PM", "12PM - 02PM", "02PM - 04PM", "04PM - 06PM", "06PM - 08PM", "08PM - 10PM", "10PM - 12PM"],
    dataUnit: 'Users',
    lineTension: .3,
    datasets: [{
      label: "Visitors",
      color: "#ff63a5",
      background: "transparent",
      data: [92, 105, 125, 85, 110, 106, 131, 105, 110, 131, 105, 110]
    }]
  };
  function ecommerceLineS3(selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-line-chart-s3');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 12,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return false;
              },
              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 8,
            titleFontColor: '#fff',
            titleMarginBottom: 4,
            bodyFontColor: '#fff',
            bodyFontSize: 8,
            bodySpacing: 4,
            yPadding: 6,
            xPadding: 6,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: false,
              ticks: {
                beginAtZero: false,
                fontSize: 12,
                fontColor: '#9eaecf',
                padding: 0
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: false,
              ticks: {
                fontSize: 12,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2),
                offsetGridLines: true
              }
            }]
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    ecommerceLineS3();
  });

// FETCH DATA FROM DATABASE

// fetch("http://localhost:8001/admin/read.php").then((response) => {
//         return response.json();
//     }).then((data) => {
//         totalValue(data);
//         result = Object.entries(data.data);
        
        
//     }).catch((err) => {
//         console.warn("Something went wrong." , err);
//     });

// async function getActivity() {
//   await fetch("http://localhost:8001/admin/read.php")
//   .then((response) => {
//     return response.json();
//   }) .then((data) => {
//     totalValue(data);
//     // console.log(data.data[0].date);
//   })
// }

// getActivity();

var dateArray = [], totalArray = [], salesStatistics, chart;
function updateVar() {
async function getActivity() {
  const uri = "http://localhost:8001/admin/read.php"
  const response = await fetch(uri)
  const data = await response.json()
    return data;
//   const date = data.data.map((e) => e.date);
//   const total = data.data.map((e) => e.total);
//   console.log(date + " " + total);
  // dateArray = date;
  // totalArray = total;
  
//   date.forEach(dateElement => {
//     salesStatistics.labels.unshift(dateElement);
//   });

//   total.forEach(totalElement => {
//     salesStatistics.datasets[0].data.push(Number(totalElement));
//   });
  
//   console.log(salesStatistics);
}

getActivity().then(data => {
    const date = data.data.map((e) => e.date);
    const total = data.data.map((e) => e.total);
    const status = data.data.map((e) => e.status);

      

  date.forEach(dateElement => {
    var dates = new Date(dateElement), 
      month = dates.getMonth(),
      dates = dates.getDate();

      let monthName = new Date(dates).toLocaleString('default', {month : 'short'});
    salesStatistics.labels.push(dates + " " + monthName);
  });

  total.forEach(totalElement => {
    salesStatistics.datasets[0].data.push(Number(totalElement));
  });

  // status.forEach(statusElement => {
  //   // salesStatistics.datasests[1].data.push(statusElement);
  //   if(statusElement == 0) {
  //     total.forEach(totalElement => {
  //       salesStatistics.datasests[1].data.push(Number(totalElement));
  //     });
  //   }
  // });
    console.log(status)
    chart.update();
});
}

updateVar()


  
   salesStatistics = {
    labels: [],
    dataUnit: 'Customer',
    lineTension: .4,
    datasets: [{
      label: "Total orders",
      color: "#0fac81",
      dash: 0,
      background: NioApp.hexRGB('#0fac81', .15),
      data: []
    }, {
      label: "Canceled orders",
      color: "#eb6459",
      dash: [5],
      background: "transparent",
      data: []
    }]
  };

  

  

  function ecommerceLineS4(selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-line-chart-s4');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderDash: _get_data.datasets[i].dash,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 12,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return data['labels'][tooltipItem[0]['index']];
              },
              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 13,
            titleFontColor: '#fff',
            titleMarginBottom: 6,
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            bodySpacing: 4,
            yPadding: 10,
            xPadding: 10,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: true,
              stacked: _get_data.stacked ? _get_data.stacked : false,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                beginAtZero: true,
                fontSize: 11,
                fontColor: '#9eaecf',
                padding: 10,
                callback: function callback(value, index, values) {
                  return '₱ ' + value;
                },
                min: 0,
                stepSize: 3000
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: false,
              stacked: _get_data.stacked ? _get_data.stacked : false,
              ticks: {
                fontSize: 9,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 10,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 0,
                zeroLineColor: 'transparent'
              }
            }]
          }
        }
      });
    });
  }
  
  NioApp.coms.docReady.push(function () {
    ecommerceLineS4();
  });

//   function totalValue(totalValues) {
//     let dataTotal = 0;
//     let dataLabel;

//     let result = Object.entries(totalValues.data);
    
    

//     for (let i = 0; i < result.length; i++) {
//       // console.log(result[i][1].date);
//       // console.log(result[i][1].total);

//       // let resultMove = salesStatistics.labels.map((element) => {
//       //   element = "hello";
//       //   return element;
//       // });

//       // console.log(resultMove);
//       // console.log(salesStatistics.labels);

//       let dateSoft = [];

//       var date = new Date(result[i][1].date), 
//       month = date.getMonth(),
//       date = date.getDate();

//       dateSoft.push(date);

//       let monthName = new Date(date).toLocaleString('default', {month : 'short'});

//       let datas = [];
//       salesStatistics.datasets[0].data.push(parseFloat(result[i][1].total));
//       salesStatistics.labels.push(monthName + " " + date);

//       salesStatistics.datasets[0].data.push(parseFloat(result[i][1].total));
//       // salesStatistics.labels.push(datas);
//       // console.log(salesStatistics.labels);

//       // console.log(result[i][1].date);
//       // let resultMove = salesStatistics.labels.map((element) => {
//       //   element = salesStatistics.labels.push(result[i][1].date);
//       //   return element;
//       // });
//       // console.log(result[i][1].date.split(', '));
//       console.log(salesStatistics.labels)
  
//     }

//     totalValues.data.forEach(totalValueElement => {
//       var date = new Date(totalValueElement.data), 
//       month = date.getMonth(),
//       date = date.getDate();

      

//       let monthName = new Date(date).toLocaleString('default', {month : 'short'});

//       // var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
//         // console.log(monthName + " " + date);
      
//         // dataLabel = date + " " + monthName;
//         // dataLabels.push(dataLabel);
//         // total.push(totalValueElement.total);
        

//         // let objectKey = Object.keys(totalValueElement).map(key => {
//         //   return [key, totalValueElement[key]];
//         // })
//         // dataLabels.push(totalValueElement);


//         // console.log(objectKey);
//         // console.log(totalValueElement.total)
//         // const temp = new Set(dates);
//         // const final = [...temp];
//         // console.log(final);
        
//     });

// }


  // init chart

  var averargeOrder = {
    labels: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan", "17 Jan", "18 Jan", "19 Jan", "20 Jan", "21 Jan", "22 Jan", "23 Jan", "24 Jan", "25 Jan", "26 Jan", "27 Jan", "28 Jan", "29 Jan", "30 Jan"],
    dataUnit: 'Customer',
    lineTension: .1,
    datasets: [{
      label: "Active Users",
      color: "#0fac81",
      background: "#0fac81",
      data: [1110, 1220, 1310, 980, 900, 770, 1060, 830, 690, 730, 790, 950, 1100, 800, 1250, 850, 950, 450, 900, 1000, 1200, 1250, 900, 950, 1300, 1200, 1250, 650, 950, 750]
    }]
  };
  function ecommerceBarS1(selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-bar-chart-s1');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderColor: _get_data.datasets[i].color,
          data: _get_data.datasets[i].data,
          barPercentage: .7,
          categoryPercentage: .7
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'bar',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 12,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return false; //data['labels'][tooltipItem[0]['index']];
              },

              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 9,
            titleFontColor: '#fff',
            titleMarginBottom: 6,
            bodyFontColor: '#fff',
            bodyFontSize: 9,
            bodySpacing: 4,
            yPadding: 6,
            xPadding: 6,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: true,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                beginAtZero: false,
                fontSize: 12,
                fontColor: '#9eaecf',
                padding: 0,
                display: false,
                stepSize: 100
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: false,
              ticks: {
                fontSize: 12,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 0,
                zeroLineColor: 'transparent',
                offsetGridLines: true
              }
            }]
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    ecommerceBarS1();
  });
  var trafficSources = {
    labels: ["Organic Search", "Social Media", "Referrals", "Others"],
    dataUnit: 'Customer',
    legend: false,
    datasets: [{
      borderColor: "#fff",
      background: ["#0fac81", "#e85347", "#ffa9ce", "#f9db7b"],
      data: [4305, 859, 482, 138]
    }]
  };
  var orderStatistics = {
    labels: ["Completed", "Canclled", "Processing"],
    dataUnit: 'Customer',
    legend: false,
    datasets: [{
      borderColor: "#fff",
      background: ["#0fac81", "#e85347", "#816bff"],
      data: [4305, 259, 682]
    }]
  };
  function ecommerceDoughnutS1(selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-doughnut-s1');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderColor: _get_data.datasets[i].borderColor,
          hoverBorderColor: _get_data.datasets[i].borderColor,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'doughnut',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 12,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          rotation: -1.5,
          cutoutPercentage: 70,
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return data['labels'][tooltipItem[0]['index']];
              },
              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 13,
            titleFontColor: '#fff',
            titleMarginBottom: 6,
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            bodySpacing: 4,
            yPadding: 10,
            xPadding: 10,
            footerMarginTop: 0,
            displayColors: false
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    ecommerceDoughnutS1();
  });
}(NioApp, jQuery);