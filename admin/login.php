<?php
ob_start();
include '../includes/config.php';
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AAM Foundation | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>AAM</b> FOUNDATION</a>
<?php
  if(isset($_REQUEST['done'])){
    echo $_REQUEST['done'];
  }
?>
      </div>
      <!-- /.login-logo -->
      <div class="card" style="width: 360px">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
<?php
  if(isset($_POST['username'])){
    $username = v($_POST['username']);
    $username = mysqli_real_escape_string($cont, $username);
    
    $password = v($_POST['password']);
    $password = mysqli_real_escape_string($cont, $password);
    $encryptedPass = md5(sha1($password));

    $showRole = mysqli_query($cont, "SELECT * FROM users");
      while($show = mysqli_fetch_array($showRole)){
      $hc_id = $show['role'];
    }
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$encryptedPass' and role='1'";
    $result = mysqli_query($cont, $query);
    $rows = mysqli_num_rows($result);
    if($rows===1){
      $_SESSION['username'] = $username;
      header("Location:index.php");
    }elseif($rows===0) {
      echo "<h3 class='btn btn-danger'>User Name/Password is incorrect.</h3><br><br><br>Click Here to <a href='login.php'>Login</a>";
    }elseif($hc_id=='0'){
      echo "<h3 class='btn btn-danger'>You are a new user please wait for activation</h3><br><br><br>Click Here to <a href='login.php'>Login</a>";
    }
  }else{
?>
          <form action="" method="post">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="username" placeholder="User Name">
              <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <?php } ?>
          <?php
            function v($post){
              $post = trim($post);
              $post = stripcslashes($post);
              $post = htmlspecialchars($post);
              return $post;
            }
          ?>
          
          <!-- /.social-auth-links -->
          <!-- <p class="mb-1">
            <a href="#">I forgot my password</a>
          </p> -->
          <p class="mb-0">
            <a href="register.php" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass   : 'iradio_square-blue',
        increaseArea : '20%' // optional
      })
    })
    </script>
  </body>
</html>