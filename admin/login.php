<?php 
  include'../core/koneksi.php';
  if (isset($_SESSION['loginAdmin'])) {
      header("Location: index.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= $url_login;  ?>admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= $url_login;  ?>admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $url_login;  ?>admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= $url_login;  ?>admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" method="post" >
                      
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" name="login">Login</button>
                   
                        </form>
                    </div>
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-xs-8">
                          <a href="#">I forgot my password</a><br>
                        </div>
                      </div>
                      <div class="row">
                        <?php 

                            if (isset($_POST['login'])) {
                                $user = $_POST['user'];
                                $pass = $_POST['password'];
                                $sql = "SELECT * FROM akun_admin WHERE username ='$user' AND password='$pass'";
                                $check = mysqli_query($conn,$sql);
                                $result = mysqli_num_rows($check);
                                if ($result == 1) {
                                  $ambil = mysqli_fetch_assoc($check);
                                  echo "<div class='alert alert-success'>
                                         <i class='icon fa fa-check'></i>Login Berhasil
                                      </div>";
                                  echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                  $_SESSION['loginAdmin'] = true;
                                  $_SESSION['id_Admin'] = $ambil['id_akun'];
                                }
                                else{
                                 echo " <div class='alert alert-danger'>
                                          <i class='icon fa fa-ban'></i>Login Gagal
                                        </div>";
                                }
                              }
                         ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= $url_login;  ?>admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $url_login;  ?>admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= $url_login;  ?>admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= $url_login;  ?>admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
