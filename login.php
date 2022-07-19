<?php
include 'connection.php';
session_start();
$err = [];
if(isset($_POST['email'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(empty($email)){
    $err['email'] = 'vui lòng nhập email';
  }
  if(empty($password)){
    $err['password'] = 'vui lòng nhập mật khẩu';
  }
  if(empty($err)){
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkEmail = mysqli_num_rows($query);
    if($checkEmail == 1){
      $checkPass = password_verify($password, $data['password']);
      if($checkPass == true){
        $_SESSION['user'] = $data;
        if(isset($_GET['order'])){
          header('location: order.php');
        }
        else{
        header("Location: index.php");
        }
    }
    }
    else{
      $err['email'] = 'email không tồn tại';
    }

  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/login.css" />
  </head>
  <body>
    <?php
    include 'header.php';
    ?>
    <main>
      <section class="login container">
        <div class="signin-main">
          <h3 class="headding">Đăng Nhập</h3>
          <form class="form-sign" action="" method ="POST">
            <div class="text-field">
              <label for="email">Nhập email tài khoản</label>
              <input
                name = "email"
                autocomplete="off"
                type="email"
                id="email"
                placeholder="Nhập Tên Tài Khoản"
              />
              <span class="error"><?php echo (isset($err['email']))? $err['email'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="password">Mật Khẩu</label>
              <input
                name = "password"
                autocomplete="off"
                type="password"
                id="password"
                placeholder="Nhập Mật Khẩu"
              />
              <span class="error"><?php echo (isset($err['password']))? $err['password'] : '' ?></span>
            </div>
            <button type="submit">Đăng Nhập</button>
          </form>
        </div>
        <div class="signup-main">
          <h3 class="headding">Đăng Ký</h3>
          <p class="signup-desc">
            Nếu quý khách vẫn chưa có tài khoản trên shop của chúng tôi hãy thử
            sử dụng tùy chọn này để đăng ký tài khoản mới.
          </p>
          <div>
            <a href="signup.php">
              <button type="submit">Đăng Ký</button>
            </a>
          </div>
        </div>
      </section>
    </main>
    <?php
    include 'footer.php';
?>
  </body>
</html>
