<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container" style="margin-bottom: 170px">
<?php display_message()?>
<br> 
<?php validate_login() ?>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">

	<form method="POST">

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="Email" class="form-control" placeholder="Email address" type="email" required>
    </div> <!-- form-group// -->


    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="password" type="password" required >
    </div> <!-- form-group// -->
                                    
    <div class="form-group">
        <button type="submit" name="login_user" class="btn btn-primary btn-block"> Login  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Do Not Have Account? <a href="register.php">Register</a> </p>                                                                 
</form>
 
 
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>
<?php include "includes/footer.php"?>