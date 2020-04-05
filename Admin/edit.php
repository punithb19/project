<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <style type="text/css">
    	.jumbotron{
    		width: 700px;
    		margin: auto;
    		padding: 30px 50px;
    		margin-top: 50px;
    		background-color: #f0f0f0;
    	}
    	h3{
    		font-style: italic;
    	}
    	label{
    		font-size: 18px;
    	}
    </style>

    <title>Edit User Details</title>
  </head>
  <body>
    <?php 

require_once "pdo.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact_no']) && isset($_POST['address'])
&& isset($_POST['conc_type'])) {
$sql = "UPDATE users SET name= :name, email=:email, contact_no=:contact_no, address= :address, conc_type=:conc_type WHERE customer_no= :customer_no";
echo ("<pre>\n".$sql."\n</pre>\n");
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':customer_no' => $_POST['customer_no'],
':name' => $_POST['name'],
':email' => $_POST['email'],
':contact_no' => $_POST['contact_no'],
':address' => $_POST['address'],
':conc_type' => $_POST['conc_type']));


}


$stmt = $pdo->prepare("SELECT * FROM  users WHERE customer_no = :xyz ");
$stmt->execute(array(":xyz" => $_GET['customer_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if( $row === false ) {
  $_SESSION['error'] = 'Bad value for customer_no' ;
  header( 'Location: viewCustomers.php' );
  return;
}

$n = htmlentities($row['name']);
$c = htmlentities($row['contact_no']);
$e = htmlentities($row['email']);
$a = htmlentities($row['address']);
$ct = htmlentities($row['conc_type']);
?>
<div class="jumbotron">
	<h3>Edit the required fields</h3>
	<form action="edit.php" method="POST">
		<div class="form-group">
			<label>Name</label>
		    <input type="text" value="<?= $n ?>" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Contact No.</label>
		    <input type="text" value="<?= $c ?>" name="contact_no" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
		    <input type="email" value="<?= $e ?>" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Address</label>
		    <input type="text" value="<?= $a ?>" name="address" class="form-control">
		</div>
		<div class="form-group">
			<label>Connection Type</label>
		    <input type="text" value="<?= $ct ?>" name="conc_type" class="form-control">
		</div>
		<input type="hidden" name="customer_no" value="<?= $row['customer_no'] ?>" class="form-control">
		<div class="form-group">
			<button type="submit" class="btn btn-dark" value="Update">Submit</button>
			<a style="font-size: 18px;" href="viewCustomers.php">Cancel</a>
		</div>
	</form>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  </body>
</html>




