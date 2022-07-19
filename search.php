<?php
include 'connection.php'; 
$a = $_POST['search'];
$sql = "SELECT * FROM products WHERE name LIKE '%$a%'";
$query = mysqli_query($con, $sql);
$num = mysqli_num_rows($query);
if($num > 0){
    while($row = mysqli_fetch_array($query)){


?>
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

<?php

    }
}
?>