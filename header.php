<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$page = basename($_SERVER['PHP_SELF']);
echo $page;
$numCart = 0;
if(isset($_SESSION['cart'])){
  $numCart = count($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/header.css" />

</head>
<body>
<header>
      <div class="container-fluid">
        <nav class="navbar">
          <a href="#" class="logo"> VTSTORE </a>
          <ul class="menu">
            <li class="menu-item">
              <a href="index.php"<?php if($page == 'index.php'){ echo 'class="menu-link active"';}?>>Trang Chủ</a>
              <a href="product.php" <?php if($page == 'product.php'){ echo 'class="menu-link active"';}?>>Sản Phẩm</a>
              <a href="about.php" <?php if($page == 'about.php'){ echo 'class="menu-link active"';}?>>Giới Thiệu</a>
            </li>
          </ul>
          <div class="navbar-left">
            <!-- <input class="input-search" placeholder="Tìm Kiếm" type="text" /> -->
            <!-- <i class="bx bx-search"></i> -->
            <a class="icon-cart" href="cart.php"
              ><i class="bx bxs-cart"></i>
              <span class="number-cart"><?=$numCart?></span>
            </a>
            <?php if (!empty($user['email'])) { ?>
                <span><?php echo $user['name']?></span>
            <a href="logout.php"><i class='bx bx-log-out'></i></a>
            <?php } else { ?>
            <a href="login.php"> <i class="bx bxs-user"></i></a>
            <?php } ?>
          </div>
        </nav>
      </div>
    </header>
</body>
</html>