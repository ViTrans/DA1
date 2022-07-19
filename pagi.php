
<ul class="pagi">
  <?php
  if($current_page > 3){
    $frist_page = 1;
    ?>
     <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$frist_page?>">
      <li class="pagi-item">First</li>
    </a>
    <?php } ?>
  <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
    <?php if($i != $current_page){?>
      <?php if ($i > $current_page - 3 && $i < $current_page + 3) { ?>
    <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$i?>">
      <li class="pagi-item"><?=$i?></li>
    </a>
      <?php } ?>
    <?php }else{?>
    <li class="pagi-item is-active"><?=$i?></li>
    <?php }?>
              <?php } ?>
  <?php if($current_page < $total_pages - 3){?>
    <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$total_pages?>">
      <li class="pagi-item">Last</li>
    </a>
    <?php } ?>
            </ul>