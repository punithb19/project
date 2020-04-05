<?php 

  require_once "pdo.php";
  session_start();
  if (isset ($_POST["account"]) && isset ($_POST["pw"] ) ) {
    unset($_SESSION["account"]); // Logout current user
    $username = $_POST["account"];
    $_SESSION['login_user'] = $username;
     $sql = "SELECT name from users where customer_no = :customer_no AND password = :password";
     echo "<p>$sql</p>\n";
     $stmt=$pdo->prepare($sql);
     $stmt->execute(array(
           ':customer_no' => $_POST['account'],
           ':password' => $_POST['pw']));
     $row = $stmt->fetch(PDO::FETCH_ASSOC);


     var_dump($row);

     if($row == FALSE) {
      $_SESSION["error"] = "Invalid User ID or password.";
      header('Location: userLogin.php' );
      return;
     // echo "<h1>Login Incorrect</h1>\n";
     } else {
      $_SESSION["account"] = $_POST["account"];
      $_SESSION["success"] = "Logged in.";
      header('Location: viewProfile.php' );
      return;
     // echo "<p>Login Success</p>\n";
     }
     
  }
  // if ( isset($_SESSION["error"]) ) {
  //       echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
  //       unset($_SESSION["error"]);
  //     }
  
 ?>