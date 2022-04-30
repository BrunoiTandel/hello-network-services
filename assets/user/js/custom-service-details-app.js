service_details_progress_bar();
function service_details_progress_bar() {
  //we can set animation delay as following in ms (default 1000)
  ProgressBar.singleStepAnimation = 2500;
  ProgressBar.init(
    [ '1. Select Check',
      '2. Make Payment',
      '3. Initiate Verification'
    ],
    '3. Initiate Verification',
    'progress-bar-wrapper' // created this optional parameter for container name (otherwise default container created)
  );

  ProgressBar2.singleStepAnimation = 2500;
  ProgressBar2.init(
    [ '1. Fill Form',
      '2. Customize',
      '3. Download Report'
    ],
    '3. Download Report',
    'progress-bar-wrapper-2' // created this optional parameter for container name (otherwise default container created)
  );
}

setInterval(function(){
  $('.progress-bar-wrapper').empty();
  $('.progress-bar-wrapper-2').empty();
  service_details_progress_bar();
}, 8000);