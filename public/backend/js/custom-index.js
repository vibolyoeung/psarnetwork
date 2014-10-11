var $border_color = "#efefef";
var $grid_color = "#ddd";
var $default_black = "#666";
var $primary = "#575348";
var $secondary = "#A4DB79";
var $orange = "#F38733";

// SparkLine Bar
$(function () {
  
  $('#sales').sparkline([3,6,7,1,4,6,3,2,9,4,5,1], {
      type: 'line',
      lineWidth: 1,
      fillColor: '#edf5fa',
      lineColor: '#3784b1',
      height: 18,
      width: 90,
    });
    $('#products').sparkline([4,8,2,7,5,1,2,7,3,6,3,8,2], {
      type: 'line',
      lineWidth: 1,
      fillColor: '#edf5fa',
      lineColor: '#3784b1',
      height: 18,
      width: 90,
    });
    $('#conversion-rate').sparkline([1,4,9,2,4,2,3,8,5,2,3,8], {
      type: 'line',
      lineWidth: 1,
      fillColor: '#edf5fa',
      lineColor: '#3784b1',
      height: 18,
      width: 90,
    });
    $('#new-users').sparkline([3,1,5,9,3,5,1,5,7,2,6,3,1], {
      type: 'line',
      lineWidth: 1,
      fillColor: '#edf5fa',
      lineColor: '#3784b1',
      height: 18,
      width: 90,
    });

    $('#conversion-graph').sparkline([3,1,5,9,3,5,3,7,2,4,1,6,5,9,4,5,1,3,7,2,4,1,6,3,7,4,2,5,7,2,6,3,1,6,5,7,2,6,3,1], {
      type: 'bar',
      lineWidth: 1,
      barColor: [$secondary, $primary],
      barWidth: 8,
      height: 32,
    });
  
});

//Date Range Picker
$(document).ready(function() {
  $('#reportrange').daterangepicker({
    startDate: moment().subtract('days', 29),
    endDate: moment(),
    minDate: '01/01/2012',
    maxDate: '12/31/2014',
    dateLimit: { days: 60 },
    showDropdowns: true,
    showWeekNumbers: true,
    timePicker: false,
    timePickerIncrement: 1,
    timePicker12Hour: true,
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
      'Last 7 Days': [moment().subtract('days', 6), moment()],
      'Last 30 Days': [moment().subtract('days', 29), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
    },
    opens: 'left',
    buttonClasses: ['btn btn-default'],
    applyClass: 'btn-small btn-primary',
    cancelClass: 'btn-small',
    format: 'MM/DD/YYYY',
    separator: ' to ',
    locale: {
      applyLabel: 'Submit',
      fromLabel: 'From',
      toLabel: 'To',
      customRangeLabel: 'Custom Range',
      daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
      monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      firstDay: 1
    }
  },
  function(start, end) {
    console.log("Callback has been called!");
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });
  //Set the initial state of the picker label
  $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
});


// Tiny Scrollbar
$('#scrollbar').tinyscrollbar();
