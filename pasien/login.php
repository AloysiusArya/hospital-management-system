<?php
session_start();
if(isset($_SESSION['admin_username'])){
    header("location:pasienhistori.php");
}
include("koneksi.php");
$username = '';
$password = '';
$err = '';
if (isset($_POST['login'])){
    $username  = $_POST['Username'];
    $password  = $_POST['Password'];
    if ($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan password</li>";
    }
    if(empty($err)){
        $sql1 = "select * from user_login where Username = '$username'";
        $q1 = mysqli_query($koneksi,$sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['Password'] != md5($password)){
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }
    if(empty($err)){    
        $login_id =$r1['Level'];
        $sql1="select * from admin_akses where level ='$login_id'";
        $q1 = mysqli_query($koneksi,$sql1);
        while($r1 = mysqli_fetch_array($q1)){
            $akses[] = $r1['akses_id'];
        }
        if(empty($akses)){
            $err .="<li> Kamu tidak punya akses</li>";
        }
    }
    if(empty($err)){
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_akses'] = $akses;
        header("location:pasienhistori.php");
        exit();
    }
}
?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>Animated login form - Bedimcode</title>
   </head>
   <body>

      <div class="login">
         <img src="assets/img/login-bg.png" alt="login image" class="login__img">

         <form action="" class="login__form" method="post">
            <h1 class="login__title">Login</h1>
            <?php
            if ($err){
                echo "<ul>$err</ul>";
            }
            ?>
            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" value  ="<?php echo $username?>" name =  "Username" required class="login__input" id="login-username" placeholder=" ">
                     <label for="login-username" class="login__label">Username</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name = "Password" required class="login__input" id="login-pass" placeholder=" ">
                     <label for="login-pass" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <input type="checkbox" class="login__check-input" id="login-check">
                  <label for="login-check" class="login__check-label">Remember me</label>
               </div>

               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" name= "login" class="login__button">Login</button>

            <p class="login__register">
               Don't have an account? <a href="#">Register</a>
            </p>
         </form>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
   </body>
</html>
