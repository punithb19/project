<!doctype html>
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

    <style type="text/css">
      ul{
        font-weight: 600;
        background-color: #343c45;
      }
      li{
        height: 50px;
      }
      a{
        height: inherit;
        padding-top: 5px;
        font-size: 18px;
      }
    </style>

    <style type="text/css">
      .container{
        padding-top: 75px;
        width: 700px;
      }
      h2{
        text-align: center;
        font-style: italic;
      }
      label{
        font-size: 19px;
      }
      #exampleFormControlInput1{
        width: 250px;
      }
      .a{
        text-align: center;
        background-color: #05264d;
        color: #e8d49b;
        margin-top: 130px;
        margin-bottom: 0px;
        margin-left: 150px;
        margin-right: 150px;
        
      }
    </style>

    <title>Feedback</title>
  </head>
  <body>
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="viewProfile.php">View Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewBill.php">View Bill</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="quickPay.php">Bill Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Admin/logout.php" role="button">Logout</a>
      </li>
    </ul>


<?php include "login.php";

require_once "pdo.php";
//session_start();

if (isset($_POST['feedback'])) {
$sql = "INSERT INTO feedbacks (cust_no, feedback)
        VALUES (:cust_no, :feedback)";
echo ("<pre>\n".$sql."\n</pre>\n");
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':cust_no' => $_SESSION['login_user'],
':feedback' => $_POST['feedback']));

$_SESSION['success'] = 'Feedback submitted';
header('Location: Feedback.php');
return;
}
if(isset($_SESSION[ 'success'])) {
  echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
  unset($_SESSION['success']);
}
?>
  
  <div class="container">
   <h2>Customer Feedback Form</h2>
   <form action="Feedback.php" method="POST">
     <div class="form-group">
        <label for="exampleFormControlInput1">Customer No.</label>
       <input type="number" class="form-control" name="cust_no" id="exampleFormControlInput1">
     </div>
     <div class="form-group">
        <label for="exampleFormControlTextarea1">Feedback</label>
        <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" placeholder="Type your feedback..." rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-dark">Send Feedback</button>
    </form> 
    </div>  
    <div class="a">
  <h4 style="padding-top: 15px; margin-bottom: 0px;">Electricity Bill Management System</h4><p>by <span style="font-style: italic;">PPP</p>
  <p style="margin-bottom: 0px;"><span style="text-decoration: underline;">Email</span>:     pppelectricity@gmail.com</p>
  <p><span style="text-decoration: underline;">Helpline</span>:  +91-9876543210</p>
</div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>