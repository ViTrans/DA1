<?php
include 'connection.php'; 

// lọc giá từ cao đến thấp từ thấp đến cao
$orderConditon = "";
$orderField = isset($_GET['field']) ? $_GET['field'] : "";
$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
if(!empty($orderField)){
    $orderConditon = "ORDER BY `products`.`".$orderField."` ".$orderSort;
    $param .= "field=".$orderField."&sort=".$orderSort."&";
}


// phân trang là loop products ra giao diện

$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; // xac dinh trang hien tai
$offset = ($current_page - 1)* $item_per_page;
$products = mysqli_query($con,"SELECT * FROM products ".$orderConditon." limit ".$item_per_page." offset ".$offset."");
$total_records = mysqli_query($con,"SELECT * FROM products");
$total_records = $total_records->num_rows;
$total_pages = ceil($total_records/$item_per_page);
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
    <link rel="stylesheet" href="./css/product.css" />
  </head>
  <body>
    <?php
    include 'header.php';
?>
    <main>
      <section class="product container-fluid">
        <h1 class="headding">Sản Phẩm</h1>
        <div class="product-main">
          <div class="product-left">
            <div class="nav-top">
              <span class="nav-top-title">Thương Hiệu</span>
              <input type="text" id="search" placeholder="Tìm Kiếm Nhanh" />
            </div>
            <!-- <div class="nav-center">
              <span class="nav-top-title">Theo Giá</span>
              <form id="form" method= "POST">
                <div class="price">
                  <input value="1500000" type="radio" name="price" class="checkbox"/>
                  <span>1.500.000 - 3.000.000</span>
                </div>
                <div class="price">
                  <input  type="radio" name="price" class="checkbox"/>
                  <span>3.000.000 - 5.000.000</span>
                </div>
                <div class="price">
                  <input  type="radio" name="price" class="checkbox"/>
                  <span>5.000.000</span>
                </div>
              </form>
            </div> -->
            <div class="nav-bottom">
              <span class="nav-top-title">Danh Mục</span>
              <div class="sex-main">
                <div class="sex">
                  <input type="radio" value="4" name="sex"/>
                  <span>Nam</span>
                </div>
                <div class="sex">
                  <input type="radio" value="96" name="sex"/>
                  <span>Nữ</span>
                </div>
                <div class="sex">
                  <input type="radio" value="97" name="sex"/>
                  <span>Unisex</span>
                </div>
              </div>
            </div>
          </div>
          <div class="product-right">
            <!-- select -->
            <div class="select-main">
              <div class="select-right">
                <span>Sắp Xếp Theo</span>
                <select name="select" id="select" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                  <option value="?">Bộ lọc</option>
                  <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?field=price&sort=desc">Cao đến thấp</option>
                  <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?field=price&sort=asc">Thấp đến cao</option>
                </select>
              </div>
            </div>
            <div class="products">
              <div class="card-list">
              <?php while ($row = mysqli_fetch_array($products)){ ?>
                <div class="card-item">
                  <div class="card-image">
                    <a href="productdetail.php?id=<?php echo $row['id'] ?>">
                      <img
                        src="<?php echo $row['img'] ?>"
                        alt=""
                      />
                    </a>
                  </div>
                  <div class="card-content">
                    <h2 class="card-title">
                      <a href="productdetail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                    </h2>
                    <p class="card-desc">
                    <?php echo $row['description'] ?>
                    </p>
                    <div class="card-price">
                      <span class="card-price-new"><?=number_format($row['price'],0,",",".")?>đ</span>
                    </div>
                    <form action="addtocart.php?id=<?php echo $row['id']?>" method= "POST">
                      <div class="card-action">
                        <a href="" class="card-action-link">
                          <i class="bx bx-cart"></i>
                          <button name="add-to-cart">Thêm vào giỏ hàng</button>
                        </a>
                      </div>
                    </form>
                  </div>
                </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <?php 
          include "./pagi.php"
           ?>
        </div>
      </section>
    </main>
    <?php
    include 'footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/main.js"></script>
  </body>
</html>
