<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Team Member Login</title>

  <link rel="icon" href="<?php echo base_url()?>assets/users/desktop/images/icon.jpg">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
  
  <!-- Lato Font Starts -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/lato-font.css"> -->

  <!-- Custom Css Starts -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/admin-login.css">
  <script>  
    var base_url = "<?php echo $this->config->item('my_base_url')?>";
  </script>
</head>
<body class="hold-transition login-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 pl-0">
        <img class="admin-login-side-img" src="<?php echo base_url();?>assets/dist/img/logo/login-side-image.png">
      </div>
      <div class="col-md-6">
        <div class="login-box">
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <div class="login-logo">
                <img src="<?php echo base_url()?>assets/dist/img/logo/logo.png" class="login-logo-img">
              </div>
              <p class="login-box-msg mt-5">Team Member Login</p>
              <div class="input-group">
                <input type="email" id="email" class="form-control login-input" placeholder="Email Id">
              </div>
              <div class="text-danger error-msg mb-3" id="login-email-error"></div>
              <div class="input-group">
                <input type="password" id="password" class="form-control login-input" placeholder="Password">
              </div>
              <div class="text-danger error-msg" id="login-password-error"></div>
              <div class="w-100 text-center" id="login-error"></div>
              <p class="mb-1">
                <a href="#" class="forgot-password-link d-none">Forgot Password ?</a>
              </p>
              <div class="row">
                <div class="col-md-12">
                  <button id="submit" onclick="adminLogin()" name="submit" class="btn btn-login btn-block text-white">Login</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer>
          <div class="container-fluid">
            <script>
              var d = new Date();
              var current_year = d.getFullYear();
            </script>
            <div class="text-center footer-txt">Hello Network Services © <script>document.write(current_year)</script> All Rights Reserved</div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Custome JS -->
  <script src="<?php echo base_url()?>assets/custom-js/team-member/team-member-login.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>

<script>
// document.onkeydown = function(e) {
// if(event.keyCode == 123) {
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
// return false;
// }
// // if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
// // return false;
// // }
// if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
// return false;
// }
// }
</script>
<script>
/* To Disable Inspect Element */
// $(document).bind("contextmenu",function(e) {
//  e.preventDefault();
// });

// $(document).keydown(function(e){
//     if(e.which === 123){
//        return false;
//     }
// });
</script>
</body>
</html>