<?php
include 'connection.php';
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = ".$id."");
$product = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="./css/productdetail.css" />
  </head>
  <body>
<?php
include 'header.php';
?>
    <main>
      <section class="product-details">
        <div class="container">
          <ul class="breadcrums">
            <li class="breadcrums-item">
              <a href="" class="breadcrums-link">Sản Phẩm</a>
            </li>
            <li class="breadcrums-item">
              <a href="" class="breadcrums-link active">Chi Tiết Sản Phẩm</a>
            </li>
          </ul>
          <div class="product-detail-main">
            <div class="product-left">
              <div class="product-img">
                <img
                  src="<?php echo $product['img'] ?>"
                  alt=""
                />
              </div>
            </div>
            <div class="product-right">
              <h3 class="product-title"><?php echo $product['name'] ?></h3>
              <span class="product-price"><?php echo number_format($product['price'],0,",",".") ?></span>
              <p class="product-desc">
              <?php echo $product['description'] ?>
              </p>
              <form action="addtocart.php?id=<?php echo $product['id']?>" method= "POST">
              <div class="btn-add-cart"><button name="add-to-cart">Thêm Vào Giỏ Hàng</button></div>
                </form>
            </div>
          </div>
        </div>
      </section>
      <section class="related container">
        <h2 class="headding">Sản Phẩm Liên Quan</h2>
        <!-- <div class="card-list">
          <div class="card-item">
            <div class="card-image">
              <img
                src="https://xxivstore.com/wp-content/uploads/2021/10/XXIV-Dior-Sauvage-Elixir-1.png"
                alt=""
              />
            </div>
            <div class="card-content">
              <h2 class="card-title">
                <a href="#">Dior Sauvage Elixir</a>
              </h2>
              <p class="card-desc">
                Điều đầu tiên tôi nhận ra khi vừa xịt Sauvage Elixir lên tay, đó
                là hương citrus từ cam chanh bưởi, tuy nhiên nó không kiểu quá
                fresh như Sauvage bản gốc, mà có vẻ đầm hơn và ít hơn và chúng
                dịu đi khá là nhanh. Bên
              </p>
              <div class="card-price">
                <span class="card-price-new">800.000 VND</span>
              </div>
              <div class="card-action">
                <a href="#" class="card-action-link">
                  <i class="bx bx-cart"></i>
                  <span>Mua Ngay</span>
                </a>
                <a href="#" class="card-action-link">
                  <i class="bx bx-heart"></i>
                  <span>Yêu Thích</span>
                </a>
              </div>
            </div>
          </div>
          <div class="card-item">
            <div class="card-image">
              <img
                src="https://xxivstore.com/wp-content/uploads/2021/07/Ultra-Blue.png"
                alt=""
              />
            </div>
            <div class="card-content">
              <h2 class="card-title">
                <a href="#">Monblanc Explorer Ultra Blue</a>
              </h2>
              <p class="card-desc">
                Montblanc Explorer Ultra Blue ra đời đầu năm 2021 với kỳ vọng có
                thể tiếp tục được thành công của người đàn anh Explorer. Lấy chủ
                đạo là hương biển, Ultra Blue không đi theo hướng Aquatic như
                những chai Aqva Pour Homme hay Light Blue Eau Intense for men mà
                đậm hương biển theo hướng salty, cảm giác mặn mặn của muối biển
                kết hợp với hương cam Bergamote từ xứ sở Sicili và Long diên
                hương tạo ra 1 vibe khá là dễ chịu và kết thúc bằng 1 base gỗ
                nhẹ nhàng. Một chai nước hoa không quá hay, không quá nổi bật
                nhưng fresh và dễ dùng. Với những người đã chơi nước hoa một
                thời gian, đây có thể không phải là một sản phẩm phải có. Nhưng
                với những người mới chơi nước hoa, đây hoàn toàn là một sản phẩm
                bạn có thể cân nhắc để sở hữu vì tính dễ dùng và mát mẻ dành cho
                mùa hè.
              </p>
              <div class="card-price">
                <span class="card-price-new">800.000 VND</span>
              </div>
              <div class="card-action">
                <a href="#" class="card-action-link">
                  <i class="bx bx-cart"></i>
                  <span>Mua Ngay</span>
                </a>
                <a href="#" class="card-action-link">
                  <i class="bx bx-heart"></i>
                  <span>Yêu Thích</span>
                </a>
              </div>
            </div>
          </div>
          <div class="card-item">
            <div class="card-image">
              <img
                src="https://xxivstore.com/wp-content/uploads/2021/05/nuoc-hoa-giorgio-armani-acqua-di-gio-profondo-eau-de-parfum-orchard.vn_.jpg"
                alt=""
              />
            </div>
            <div class="card-content">
              <h2 class="card-title">
                <a href="#">Acqua di Gio Profondo</a>
              </h2>
              <p class="card-desc">
                2020 là một năm đáng nhớ, hay theo cách chúng ta hay nói đùa là
                năm Covid. Đại dịch xảy ra ảnh hưởng khá nhiều tới cuộc sống mọi
                người, mọi ngành nghề. Tuy nhiên trong năm này cũng có khá nhiều
                sáng tạo thơm hay ho ra đời. Và như đã nói ở trên, tôi rất có
                cảm tình với dòng Giò, thế nên tôi rất hứng thú với Giò Profondo
                tức Giò xanh. Giò xanh với tôi là một chai khá hay ho. Cảm giác
                là một bản trưởng thành hơn, nam tính hơn của Giò trắng vậy. Xịt
                ra, cảm giác vẫn thế, vẫn là cái DNA quen thuộc như Giò trắng
                với cam chanh và hương biển. Tuy nhiên, ngửi kĩ sẽ thấy Giò xanh
                so với Giò trắng thì sẽ thiên hơn chút về hương biển, cảm giác
                khá là mát mẻ dễ chịu. Thêm nữa, nếu bạn là một người khá nhạy
                cảm với các mùi theo hướng hương biển, thường sẽ cảm thấy nhiều
                mùi có cảm giác gì đó hơi lợ và …tanh. Tuy nhiên Giò xanh làm
                mùi hương biển khá tốt, khó mà có thể khiến người khác bạn cảm
                thấy khó chịu. Về sau, cảm nhận rõ nhất có lẽ là mùi của oải
                hương lên rất mượt mà, một chút ngọt nhẹ của amber trên nền xạ
                và hoắc hương. Lúc này mùi hương trở nên khá nam tính, và hơi lạ
                kì nhưng tôi có cảm giác gợi
              </p>
              <div class="card-price">
                <span class="card-price-new">800.000 VND</span>
              </div>
              <div class="card-action">
                <a href="#" class="card-action-link">
                  <i class="bx bx-cart"></i>
                  <span>Mua Ngay</span>
                </a>
                <a href="#" class="card-action-link">
                  <i class="bx bx-heart"></i>
                  <span>Yêu Thích</span>
                </a>
              </div>
            </div>
          </div>
          <div class="card-item">
            <div class="card-image">
              <img
                src="https://xxivstore.com/wp-content/uploads/2022/07/Dame-Minty-Man.png"
                alt=""
              />
            </div>
            <div class="card-content">
              <h2 class="card-title">
                <a href="#">Minty Man</a>
              </h2>
              <p class="card-desc">
                Minty Man bởi Dame Perfumery là một trong những chai nước hoa
                với chủ điểm bạc hà hay nhất mà tôi từng được thử. Bạc hà ở chai
                này làm rất tốt, để diễn giải bằng lời thì khó, nhưng cảm giác
                nó làm vừa đủ. Nếu làm bạc hà không tới, sẽ chỉ cảm thấy một mùi
                man mát nhẹ trống rỗng. Nếu làm quá lên, thì sẽ có cảm giác
                giống mùi kem đánh răng vậy. Còn ở Dame Minty Man, khi vừa xịt
                ra bạn sẽ có cảm giác giống như mình v
              </p>
              <div class="card-price">
                <span class="card-price-new">800.000 VND</span>
              </div>
              <div class="card-action">
                <a href="#" class="card-action-link">
                  <i class="bx bx-cart"></i>
                  <span>Mua Ngay</span>
                </a>
                <a href="#" class="card-action-link">
                  <i class="bx bx-heart"></i>
                  <span>Yêu Thích</span>
                </a>
              </div>
            </div>
          </div>
          <div class="card-item">
            <div class="card-image">
              <img
                src="https://xxivstore.com/wp-content/uploads/2022/06/DG-Light-Blue-Italian-Love.png"
                alt=""
              />
            </div>
            <div class="card-content">
              <h2 class="card-title">
                <a href="#">Light Blue Italian Love Pour Homme</a>
              </h2>
              <p class="card-desc">
                Ra mắt vào mùa hè năm 2022, có thể nói Light Blue Italian Love
                Pour Homme có rất nhiều điểm tương đồng so với đàn anh Light
                Blue Forever ra mắt vào mùa hè năm trước. Vẫn là cái accord mùi
                hương Citrus – Ozonic ở phần mở đầu và drydown về một cái base
                gỗ nhẹ nhàng, sạch sẽ nam tính. Vậy điểm khác biệt giữa hai
                phiên bản này là gì? Light Blue Italian Love Pour Homme có một
                cái opening khá là giống vớ
              </p>
              <div class="card-price">
                <span class="card-price-new">800.000 VND</span>
              </div>
              <div class="card-action">
                <a href="#" class="card-action-link">
                  <i class="bx bx-cart"></i>
                  <span>Mua Ngay</span>
                </a>
                <a href="#" class="card-action-link">
                  <i class="bx bx-heart"></i>
                  <span>Yêu Thích</span>
                </a>
              </div>
            </div>
          </div>
          <div class="card-item">
            <div class="card-image">
              <img
                src="https://xxivstore.com/wp-content/uploads/2022/04/XXIV-Store-Eau-de-Bavx.png"
                alt=""
              />
            </div>
            <div class="card-content">
              <h2 class="card-title">
                <a href="#">L’Occitane Eau de Bavx</a>
              </h2>
              <p class="card-desc">
                Mới xịt L’Occitane Eau de Bavx ra, bạn sẽ cảm nhận được rõ sự
                xuất hiện của bạch đậu khấu và tiêu hồng, nếu là fan của YSL La
                nuit de Lhomme thì chắc chắn sẽ nhận thấy ngay bạch đậu khấu khá
                rõ và dày. Nó cho ta
              </p>
              <div class="card-price">
                <span class="card-price-new">800.000 VND</span>
              </div>
              <div class="card-action">
                <a href="#" class="card-action-link">
                  <i class="bx bx-cart"></i>
                  <span>Mua Ngay</span>
                </a>
                <a href="#" class="card-action-link">
                  <i class="bx bx-heart"></i>
                  <span>Yêu Thích</span>
                </a>
              </div>
            </div>
          </div>
        </div> -->
      </section>
    </main>
<?php include 'footer.php'; ?>
  </body>
</html>
