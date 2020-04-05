<!doctype html>

<?php 
	session_start();
	if (isset ($_POST["account"]) && isset ($_POST["pw"] ) ) {
	 	unset($_SESSION["account"]); // Logout current user
		if ( $_POST['account'] == 'admin' && $_POST['pw'] == 'ppp123' ) {
			$_SESSION["account"] = $_POST["account"];
			$_SESSION["success"] = "Logged in.";
			header('Location: registration.php');
			return;
		} else {
			$_SESSION["error"] = "Invalid user name or password.";
			header('Location: adminLogin.php' );
			return;
		}
	}
 ?>

<html lang="en">
  <head>
  	<script language="javascript" type="text/javascript">
  		window.history.forward();
  	</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="adminAssets/adminLogin.css">

    <title>Admin login </title>
  </head>
  <body>
  	<?php 
  		if ( isset($_SESSION["error"]) ) {
  			echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
  			unset($_SESSION["error"]);
  		}
  		if ( isset($_SESSION["success"]) ) {
  			echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
  			unset($_SESSION["success"]);
  		}

  	 ?>

   <form action="adminLogin.php" method="POST">
      <div class="container">
        <h2>Admin Login</h2>
        <div class="form-group">
          <label for="formGroupExampleInput">User ID</label>
          <input type="text" class="form-control" id="formGroupExampleInput" name="account" placeholder="Enter your ID">
        </div>
     <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
       <input type="password" class="form-control" id="exampleInputPassword1" name="pw" placeholder="Enter Password">
     </div>
       <button type="submit" class="btn btn-primary">Log In</button>
     </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>