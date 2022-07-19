<?php
session_start();
include 'connection.php';
if(isset($_POST['update'])){
  if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $value) {
      if($_POST["quantity".$value["id"]] <= 0){
        unset($_SESSION['cart'][$value["id"]]);
      }
      else{
        $_SESSION['cart'][$value["id"]]["quantity"] = $_POST["quantity".$value["id"]];
      }
    }
  }
}
if(isset($_POST['order'])){
  if(isset($_SESSION['user'])){
    header("Location: order.php");
  }
  else{
    header('location: login.php');
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
    <link rel="stylesheet" href="./css/cart.css" />
  </head>
  <body>
    <?php
    include 'header.php';
    ?>
    <main>
      <section class="cart">
        <div class="headding"><h2>Giỏ Hàng Của Bạn</h2></div>
        <div class="container">
          <div class="table">
            <form action="cart.php" method = "POST">
              <table class="content-table">
                <thead>
                  <tr>
                    <th>Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tổng Giá</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $value) {
                      $sumAll = 0;
                      $sumAll = $sumAll + $value["price"] * $value["quantity"];
                      $sum = 0;
                      $sum += $value['price'] * $value['quantity'];
                      ?>
                      <tr>
                        <td class="img-product"><img src="<?php echo $value['img'] ?>" alt="" /></td>
                        <td><?php echo $value['name'] ?></td>
                        <td class="quantity"><input min=1 name="quantity<?php echo $value["id"]?>" type="number" value="<?php echo $value['quantity'] ?>"></td>
                        <td><?php echo number_format($value['price'],0,",",".") ?></td>
                        <td><?php echo  number_format($sum,0,",",".") ?></td>
                        <td><a href="detelecart.php?id=<?php echo $value["id"];?>"><i class='bx bx-x'></i></a></td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                  <!-- <tr>
                    <td class="img-product">
                      <img
                        src="https://admin.vuahanghieu.com/upload/product/2020/06/nuoc-hoa-nam-christian-dior-sauvage-edp-dam-chat-hien-dai-100ml-5eec8f69593c6-19062020171153.jpg"
                        alt=""
                      />
                    </td>
                    <td>Dior</td>
                    <td class="quantity">
                      <input type="number" value="1" />
                    </td>
                    <td>5000</td>
                    <td>5000</td>
                    <td><i class='bx bx-x'></i></td>
                  </tr> -->
                  <div class="btn-update">
                    <button name="update" >Cập Nhật</button>
                  </div>
                </tbody>
              </table>
            </form>
          </div>
          <div class="cart-footer">
            <div class="discount">
              <span>Mã Giảm giá</span>
              <input type="text" />
              <button>Áp Dụng</button>
            </div>
            <div class="bill">
              <div class="bill-headding"><h3>Phiếu Thanh Toán</h3></div>
              <div class="temporary">
                <span>Tạm Tính</span>
                <span>
                  <?php
                  if(isset($_SESSION['cart'])){
                    $sum = 0;
                    foreach ($_SESSION['cart'] as $value) {
                      $sum += $value['price'] * $value['quantity'];
                    }
                    echo number_format($sum,0,",",".");
                  }
                  ?>
                </span>
              </div>
              <div class="total">
                <span>Tổng</span>
                <span>
                  <?php
                  if(isset($_SESSION['cart'])){
                    $sum = 0;
                    foreach ($_SESSION['cart'] as $value) {
                      $sum += $value['price'] * $value['quantity'];
                    }
                    echo number_format($sum,0,",",".");
                  }
                  ?>
                  </span>
              </div>
              <div class="btn-pay modal-btn">
                <form action="" method="POST">
                  <button name="order">Thanh Toán</button>
                </form>
              </div>
            </div>
          </div>
        </div>
          ?>
      </section>
    </main>
    <?php
    include 'footer.php';
?>
    <script src="./js/main.js"></script>
  </body>
</html>
