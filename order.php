<?php
session_start();
include 'connection.php';
$user = $_SESSION['user'];
if(isset($_POST['name'])){
  $name = $_POST['name'];
  $id_user = $user['id'];
  $note = $_POST['note'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $status = 0;
  $query = mysqli_query($con,"INSERT INTO `orders` (`id`, `time`, `name_receive`, `phone_receive`, `address_receive`, `note`, `status`, `user_id`, `status_delete`, `total_price`) VALUES (NULL, current_timestamp(), '$name', '$phone', '$address', '$note', '$status', '$id_user', '0', '0');");
  if($query){
    $id_order = mysqli_insert_id($con);
    if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $value) {
      $id_product = $value['id'];
      $quantity = $value['quantity'];
      $price = $value['price'];
      $total = $quantity * $price;
      $query = mysqli_query($con,"INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`) VALUES (NULL, '$id_order', '$id_product', '$quantity', '$price', '$total');");
    }
    $totalSum = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
      $totalSum += $value['price'] * $value['quantity'];
    }
    $query = mysqli_query($con,"UPDATE `orders` SET `total_price` = '$totalSum' WHERE `orders`.`id` = '$id_order';");
  }
    unset($_SESSION['cart']);
    header("location:index.php");
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
    <link rel="stylesheet" href="./css/order.css" />
  </head>
  <body>
    <?php
    include 'header.php';
    ?>
    <main>
      <!-- form order -->
      <section class="order">
        <div class="headding"><h2>Thông Tin Đặt Hàng</h2></div>
        <form class="form-main" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Enter name"
              value = "<?php echo $user['name'] ?>"
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="Enter email"
              value = "<?php echo $user['email'] ?>"
            />
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input
              type="text"
              class="form-control"
              id="phone"
              name="phone"
              placeholder="Enter phone"
              value = "<?php echo $user['phone'] ?>"
            />
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input
              type="text"
              class="form-control"
              id="address"
              name="address"
              placeholder="Enter address"
              value = "<?php echo $user['address'] ?>"
            />
          </div>
          <div class="form-group">
            <label for="note">Note</label>
            <textarea
              class="form-control"
              id="note"
              name="note"
              rows="3"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </section>
    </main>
  </body>
</html>
