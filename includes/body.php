<?php foreach ( $rows as $book):  ?>
 
<div class="col-lg-4 col-md-6 mb-4">
   <div class="card h-100">
     <a href="#"><img class="card-img-top" src="public/images/image4.jpeg" height="100" alt=""></a>
      <div class="card-body">
         <h4 class="card-title">
           <a href="#"><?php echo  $book->getName() ; ?></a>
          </h4>

          <h6>Author : <?php echo  $book->getAuthorName() ; ?> </h6>
          <h6>Publich Date : <?php echo  $book->getPublicationDate() ; ?> </h6>
          <h6>ISBN: <?php echo  $book->getISBN() ; ?> </h6>
           <p class="card-text">Category : <?php echo  $book->getCatgoryName() ; ?> </p>

        </div> <!-- End .card-body-->

        <div class="card-footer">

           <?php 
            $current_Book=$Books->getBooks($book->getId());
            $current_Book=$current_Book[0];

            if($current_Book->isAvailable)
            {
              echo "<button class='btn btn-danger' disabled>Not available</button>";
           
            }

            else
            {
             echo  "<button class='btn btn-primary Borrow'  book-id= '{$book->getId()}' >  Borrow</button>";

            }
                 
                ?>

      </div> <!-- End .card-footer -->

     </div><!-- End card  -->

  </div>
 <?php endforeach;?>
