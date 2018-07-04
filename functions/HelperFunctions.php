<?php 

function clean($string){


return htmlentities($string);

}



function redirect($location){


return header("Location: {$location}");

}


 // set_message function simulate to flash messages in frameworks like laravel

function set_message($message){

	if(!empty($message))
	{
		$_SESSION['message']=$message;

	}

	else
	{
		$_SESSION['message']="";

	}


}



function display_message()      
{

	if(isset($_SESSION['message']))
	{
		echo $_SESSION['message'];
		unset($_SESSION['message']);

	}

}


function token_generator()
{
	$token=$_SESSION['token']=md5(uniqid(mt_rand(),true));

	return $token;


}




/******************************* validate functions ************************************/
function validation_errors($error)
{
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			<strong>warning!</strong>' .$error.'
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>
			</div>';
			return $error;

}

function email_exists($email)
{
	$sql_statment= "SELECT * FROM users where email = '$email'";
	$result=query($sql_statment);

	if(mysqli_num_rows($result)>0)
	{
		return true ;

	}
	else
	{
		return false ;
	}


}

function username_exists($username)
{
	$sql_statment= "SELECT * FROM users where username = '$username'";
	$result=query($sql_statment);

	if(mysqli_num_rows($result)>0)
	{
		return true ;

	}
	else
	{
		return false ;
	}


}

function validate_registration()

{

	$errors = [];
	$min = 3;
	$max=20;

	if ($_SERVER['REQUEST_METHOD']== "POST") {

		$username= clean($_POST['username']);
		$Email= clean($_POST['Email']);
		$password= clean($_POST['password']);
		$confirm_password= clean($_POST['confirm_password']);

		if(strlen($username) <$min)
		{
			$errors[]= "your username cannot be less than {$min} characters";
		}


		if(strlen($username) > $max)
		{
			$errors[]= "your username cannot be grater than {$max} characters";
		}

		if(strlen($username) > $max)
		{
			$errors[]= "your username cannot be grater than {$max} characters";
		}

		if($password != $confirm_password)
		{
			$errors[]= "your password field do not match";

		}
		if (email_exists($Email)) {

			$errors[]= "this email already  exits";
		}

		if(username_exists($username))
		{
			$errors[]= "this username already  taken";

		}
		if (strlen($_POST["password"]) <= '8') 
		{
        	$errors[] = "Your Password must contain at least 8 characters!";
    	}

  	  	elseif(!preg_match("#[0-9]+#",$password)) 
  	  	{
  	 	 $errors[] = "Your Password must contain at least 1 Number";

  	 	}
 
    	elseif(!preg_match("#[A-Z]+#",$password)) 
    	{
         $errors[]  = "Your Password must contain at least 1  capital letter";
  		}


		if (!empty($errors)) {
			foreach ($errors as $error) {

				validation_errors($error);
	
			}
		}

		else
		{
	
			if(register_user($username , $Email , $password))
			{
			$message = '<div class="alert alert-success" role="alert">You registed successfully. You can login in Now </div>';

				set_message($message);
				redirect("login.php");

			}

		}

	}
 
}

 function validate_login()
 {

	$errors = [];

	if ($_SERVER['REQUEST_METHOD']== "POST") {

		$Email= clean($_POST['Email']);
		$password= clean($_POST['password']);

		// additional  validation for empty field besides html5 validation

		if(empty($Email))
		{
		$errors[]= "please Enter Email field";

		}
		if(empty($password))
		{
		$errors[]= "please Enter password field";

		}


		if (!empty($errors)) {
			foreach ($errors as $error) {
				validation_errors($error);
	
			}
		}

		else
		{
			if(login_user($Email , $password))
			{
				redirect("index.php");

			}

			else
			{
				$message = '<div class="alert alert-success" role="alert"><strong>warning!</strong> Email or password is invalid </div>';

				set_message($message);
				redirect("login.php");

			}

		}





	}




 }




/******************************* user register function ****************************/


function register_user($username , $Email , $password)
{

		$username= escape($username);
		$Email= escape($Email);
		$password= escape($password);

		if (email_exists($Email)) {

			return false;
		}

		elseif(username_exists($username))
		{
			return false;

		}

		else
		{
			$password = md5($password);
			$sql = "INSERT INTO users (username , password , email)";
			$sql.= "VALUES ('$username' , '$password' , '$Email')";
			$result = query($sql);
			return true ;
		}


}





/******************************* user login function ****************************/

function login_user($Email , $password)
{
	$Email= escape($Email);


	$sql= "SELECT password , username FROM users where email = '$Email' ";

	$result=query($sql);


	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$db_password=$row['password'];
		$username=$row['username'];
		if($db_password === md5($password))
		{
			$_SESSION['email']=$Email;
			$_SESSION['username']=$username;

			return true ;

		}
		else
		{
			return false ;

		}


	
	}
	else
	{
		return false; 
	}



}

function logged_in()
{
	if(isset($_SESSION['email']))
	{
		return true;
	}
	else
	{
		return false;
	}

}

function current_user()
{

	if(isset($_SESSION['email']) && $_SESSION['email'])
	{
		$email=$_SESSION['email'];
		$query = "SELECT * FROM users WHERE email= '$email'";
        $result = query($query);
        $row=mysqli_fetch_array($result);
        $user = new stdClass;
        $user->username=$row['username'];
        $user->email=$row['email'];
        $user->id=$row['id'];

        return $user;

	}



}


?>
