<?php
include 'connection.php';
$sql = "SELECT * FROM products ORDER BY id DESC limit 6"; 
$products = mysqli_query($con,$sql);
$sellingProducts = mysqli_query($con,"SELECT * FROM `products` WHERE `category_id` = 102 ORDER BY `id` DESC limit 6");
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
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>
<?php include './header.php'; ?>
<div class="hero">
        <div class="slider">
          <ul class="slider-dots">
            <li class="slider-dot-item active" data-index="0"></li>
            <li class="slider-dot-item" data-index="1"></li>
            <li class="slider-dot-item" data-index="2"></li>
            <li class="slider-dot-item" data-index="3"></li>
          </ul>
          <div class="slider-wrapper">
            <div class="slider-main">
              <div class="slider-item">
                <img
                  src="https://nuochoamy.vn/upload/images/nuoc-hoa-nam-bleu-chanel-chinh-hang.jpg"
                  alt=""
                />
              </div>
              <div class="slider-item">
                <img
                  src="https://images.unsplash.com/photo-1589782431746-713d84eef3c4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                  alt=""
                />
              </div>
              <div class="slider-item">
                <img
                  src="https://i.ytimg.com/vi/305cSV304mU/maxresdefault.jpg"
                  alt=""
                />
              </div>
              <div class="slider-item">
                <img
                  src="https://fimgs.net/mdimg/vijesti/o.12656.2.jpg"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    <main>
      <section class="feature container">
        <h2 class="headding">Sản Phẩm Nổi Bật</h2>
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
      </section>
      <section class="selling container">
        <h2 class="headding">Sản Phẩm Bán Chạy</h2>
        <div class="card-list">
        <?php while ($row = mysqli_fetch_array($sellingProducts)){ ?>
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
      </section>
    </main>
<?php include 'footer.php'; ?>
    <script src="./js/main.js"></script>
  </body>
</html>
