
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

      h2{
        text-align: center;
        font-style: italic;
        margin: 20px 100px;
      }
      .label{
        font-style: initial;
        font-weight: 600;
        color: #354452;
      }

      div{
        margin: 20px 585px;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 19px;
        font-weight: 450;
        line-height: 1.5;
      }
      .a{
        text-align: center;
        background-color: #05264d;
        color: #e8d49b;
        margin-top: 180px;
        margin-bottom: 0px;
        margin-left: 150px;
        margin-right: 150px;
        
      }
    </style>

    <title>View Profile</title>
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

    <?php include 'login.php';

     if ( isset($_SESSION["error"]) ) {
        echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
        unset($_SESSION["error"]);
      }
      if ( isset($_SESSION["success"]) ) {
        echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
        unset($_SESSION["success"]);
      }
    
  echo "<h2>Personal Details</h2>";

  echo "<pre>\n";
  require_once "pdo.php";
  $sqlx = "SELECT customer_no, name, contact_no,email,address,conc_type from users where customer_no = :login_user";
  $stmtx=$pdo->prepare($sqlx);
  $stmtx->execute(array(
  ':login_user' => $_SESSION['login_user']));
  ///echo '<table border = "1">'."\n";

  echo ("<div>");
  while($rowx = $stmtx->fetch(PDO::FETCH_ASSOC)) {
    ///echo "<tr><td>" ;
    echo "<p>";
    echo "<span class='label'>"; echo "Customer No. :      "; echo "</span>";
    echo ($rowx['customer_no'] );
    echo "</p>";
   // echo ("</td><td>");
    echo "<p>";
    echo "<span class='label'>"; echo "Name :                   "; echo "</span>";
    echo ($rowx['name']  );
    echo "</p>";
   /// echo ("</td><td>");
    echo "<p>";
    echo "<span class='label'>"; echo "Email :                    "; echo "</span>";
    echo ($rowx['email']  );
    echo "</p>";
   ///echo ("</td><td>");
    echo "<p>";
    echo "<span class='label'>"; echo "Contact No. :          "; echo "</span>";
    echo ($rowx['contact_no']  );
    echo "</p>";
    ///echo ("</td><td>");
    echo "<p>";
    echo "<span class='label'>"; echo "Address :                "; echo "</span>";
    echo ($rowx['address']  );
    echo "</p>";
   /// echo ("</td><td>");
    echo "<p>";
    echo "<span class='label'>"; echo "Conection Type :    "; echo "</span>";
    echo ($rowx ['conc_type']  );
    echo "</p>";
   // echo ("</td><td>");
   // echo ($rowx ['password']);
    ///echo ("</td></tr>");
  }
///echo "</table>\n"; 
   echo("</div>");
  echo "</pre>\n";    

 ?>

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