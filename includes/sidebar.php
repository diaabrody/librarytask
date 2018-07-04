 <div class="col-lg-3">
    <?php

     $Category=new Categories($conn);
      $rows=$Category->getCategories();

      ?>
  <h1 class="my-4">Catories</h1>
    <div class="list-group">

     <?php foreach ( $rows as $cate):  ?>
     <a href="#" class="list-group-item"><?php echo $cate->getName(); ?></a>
     <?php endforeach;?>
   </div>
</div>