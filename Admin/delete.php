<?php 
require_once 'pdo.php';
session_start();

if(isset($_POST['delete']) && isset($_POST['customer_no'])){
  $sqlx = "DELETE FROM bill_details WHERE consumer_no = :zips ";
  $stmtx = $pdo->prepare($sqlx);
  $stmtx->execute(array(':zips' => $_POST['customer_no']));
  $_SESSION['success'] = 'Record deleted';
  header( 'Location: viewCustomers.php' );
  return;
  
}

$stmt = $pdo->prepare("SELECT customer_no, name FROM  users WHERE customer_no = :xyz ");
$stmt->execute(array(":xyz" => $_GET['customer_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if( $row === false ) {
  $_SESSION['error'] = 'Bad value for customer_no' ;
  header( 'Location: viewCustomers.php' );
  return;
}

?>

<p>Confirm: Deleting <?= htmlentities($row['name']) ?></p>
<form method="post"><input type="hidden"
name="customer_no" value="<?= $row['customer_no'] ?>">
<input type= "submit" value="Delete" name="delete">
<a href="viewCustomers.php">Cancel</a>
</form>
<?php

if ( isset($_SESSION['error']) ) {
  			echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
  			unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
  	echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
  	unset($_SESSION['success']);
}

?>
