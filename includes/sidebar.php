 <div class="col-lg-3">
    <?php

     $Category=new Categories($conn);
      $rows=$Category->getCategories();

      ?>
      
      <!-- filer by category -->
  <h2 class="my-4">category</h2>
    <div class="list-group">

     <?php foreach ( $rows as $cate):  ?>

     <a href="index.php?cateid=<?php echo $cate->getId(); ?>" class="list-group-item"><?php echo $cate->getName(); ?></a>

     <?php endforeach;?>
   </div>
</div>