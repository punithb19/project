<?php 

	echo "<pre>\n";
	require_once "pdo.php";
	$stmt = $pdo->query("Select * from users");
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		print_r($row);
	}
	echo "</pre>\n";

 ?>
 

  




   <?php 
  require_once "pdo.php";
  session_start();
  if (isset ($_POST["account"]) && isset ($_POST["pw"] ) ) {
    unset($_SESSION["account"]); // Logout current user
    $user_id = $_POST['account'];
    $sql1 = "SELECT  customer_no FROM users WHERE customer_no = $user_id";
    $sql2 = "SELECT password FROM users WHERE customer_no = $user_id";
    //$stmt1 = $pdo->prepare($sql1);
    //$stmt2 = $pdo->prepare($sql2);
    if ( $_POST['account'] == $sql1 && $_POST['pw'] == $sql2 ) {
      $_SESSION["account"] = $_POST["account"];
      $_SESSION["success"] = "Logged in.";
      header('Location: viewProfile.php');
      return;
    } else {
      $_SESSION["error"] = "Incorrect password.";
      header('Location: userLogin.php' );
      return;
    }
  }
 ?> 


 <?php 

      require_once "pdo.php";

      if (isset($_POST['unit_consumed'])) {
      $sql = "INSERT INTO bill (SELECT bill_details.unit_consumed*unit_cost.per_unit_cost as bill_amt from bill_details,unit_cost where bill_details.bill_no=101)";
      echo ("<pre>\n".$sql."\n</pre>\n");
      $stmt = $pdo->prepare($sql);
      $stmt->execute();

      }
      ?>




<?php 
  require_once "pdo.php";
  session_start();
  if (isset ($_POST["customer_no"]) && isset ($_POST["password"] ) ) {
    unset($_SESSION["account"]); // Logout current user
    $user_id = $_POST["customer_no"]
    $stmt1 = $pdo->query("SELECT customer_no from users where customer_no like ?");
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt2 = $pdo->query("SELECT password from users where customer_no like ?");
    $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $_POST['customer_no'] == '$row1' && $_POST['password'] == '$row2' ) {
      $_SESSION["account"] = $_POST["customer_no"];
      $_SESSION["success"] = "Logged in.";
      header('Location: viewProfile.php');
      return;
    } else {
      $_SESSION["error"] = "Incorrect password.";
      header('Location: userLogin.php' );
      return;
    }
  }
 ?>


 $_SESSION["success"] = "Logged in.";
     header('Location: viewProfile.php');
      return;
    } else {
      $_SESSION["error"] = "Incorrect password.";
      header('Location: userLogin.php' );
      return;


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

     START TRANSACTION ;
     insert into bill(bill_amt)
SELECT unit_cost.per_unit_cost*bill_details.unit_consumed from bill_details,unit_cost
LIMIT 0,1;
COMMIT;

UPDATE bill_details set bill_amount=cost_unit*unit_consumed where bill_amount=0;


<?php 

        require_once "pdo.php";
        session_start();

        if (isset($_POST['bill_no']) && isset($_POST['owner']) && isset($_POST['cardno']) && isset($_POST['expdate']) && isset($_POST['cvv'])) {
            $sql = "UPDATE bill_details SET status = 'Paid' where bill_no = :bill_no"; 
            echo ("<pre>\n".$sql."\n</pre>\n");
            $stmt = $pdo->prepare($sql);
            $row = $stmt->execute(array(
            ':bill_no' => $_POST['bill_no']));
            $_SESSION['success'] = 'Payment Successful!';
            header('Location: quickPay.php');
            return;
            }
        if(isset($_SESSION[ 'success'])) {
        echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
        unset($_SESSION['success']);
        }
        ?>



        START TRANSACTION;
INSERT INTO paid_bills 
SELECT * from bill_details WHERE status='Paid';
COMMIT;

localhost/ppp/bill_details/   http://localhost/phpmyadmin/tbl_sql.php?db=ppp&table=bill_details
Your SQL query has been executed successfully.

show CREATE TABLE bill_details



bill_details  CREATE TABLE `bill_details` (
  `bill_no` int(70) ... 
