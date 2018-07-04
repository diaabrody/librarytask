<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

          <!-- sidebar --> 

        <?php include "includes/sidebar.php"?>


        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="public/images/image1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="public/images/image2.jpeg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="public/images/image3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>



          <div class="row">

          <?php

            $Books=new Books($conn);
            $rows=$Books->getBooks();

          ?>

          <?php include "includes/body.php"?>



          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

     <!-- /.js -->
 

    <!-- Footer -->
<?php include "includes/footer.php"?>