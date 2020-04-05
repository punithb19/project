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
      #container{
        margin-left:  650px;
        margin-bottom: 200px;
        font-size: 18px;
      }

      h2{
        margin: 20px auto; 
        text-align: center;
        font-style: italic;
      }

      span{
       font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
       font-size: 1.1rem;
       font-weight: 550;
       line-height: 1.5;
       color: #212529;
      }
      .a{
        text-align: center;
        background-color: #05264d;
        color: #e8d49b;
        /*margin-top: 100px;*/
        margin-bottom: 0px;
        margin-left: 150px;
        margin-right: 150px;
        
      }
    </style>

    <title>View Bill</title>
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
    <h2>Bill Details</h2>
    <p style="font-size: 16px; text-align: center; "><span style="font-style: italic; font-size: 15px;">(NOTE: </span> Please pay your bill before the due-date for uninterrupted electricity supply.)</p>
    <div id="container">
      
    <form action="viewBill.php" method="POST">
      
      <div class="form-group">
        <label style="padding-right: 30px;"><span>Month</span></label>
        <select name="month">
           <option value="0" style="color: #dddddd">Select</option>
           <option value="1">January</option>
           <option value="2">February</option>
           <option value="3">March</option> 
           <option value="4">April</option>
           <option value="5">May</option>
           <option value="6">June</option>
           <option value="7">July</option>
           <option value="8">August</option>
           <option value="9">September</option>
           <option value="10">October</option>
           <option value="11">November</option>
           <option value="12">December</option>
        </select>
      </div>
      <button type="submit" class="btn btn-dark" style="margin-bottom: 15px; padding: 7px 20px;">Search</button>
    </form>

    <?php include 'login.php';
  //echo ("<div>");
  echo "<pre>\n";
  require_once "pdo.php";
  echo "<span>Customer No. : \t</span>";
  echo $_SESSION['login_user'];
  if (isset ($_POST["month"])){
  $sqlx = "SELECT bill_no, due_date, unit_consumed, bill_amount, status from bill_details where consumer_no = :login_user and month = :month"  ;
  //echo "<p>$sqlx</p>\n";
  $stmtx=$pdo->prepare($sqlx);
  $stmtx->execute(array(
  ':login_user' => $_SESSION['login_user'],
  ':month' => $_POST['month']));
  ///echo '<table border = "1">'."\n";
  while($rowx = $stmtx->fetch(PDO::FETCH_ASSOC)) {
      echo "\n\n";
      echo "<span>Bill No. :           \t</span>";
      echo ($rowx['bill_no'] );
      echo("<br><span>Due date :        \t</span>");
      echo ($rowx['due_date']  );
      echo "<br><span>Units Consumed :\t</span>";
       echo ($rowx['unit_consumed']  );
       echo "<br><span>Bill Amount : \t\t</span>";
       echo "Rs:";
       echo ($rowx['bill_amount']  );
       echo "<br><span>Payment Status : \t</span>"; 
       echo ($rowx['status']  );
    
  }
///echo "</table>\n"; 
   //echo("</div>");
  echo "</pre>\n";
 }
?>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <div class="a">
  <h4 style="padding-top: 15px; margin-bottom: 0px;">Electricity Bill Management System</h4><p>by <span style="font-style: italic; color: #e8d49b">PPP</p>
  <p style="margin-bottom: 0px;"><span style="text-decoration: underline; color: #e8d49b;">Email</span>:     pppelectricity@gmail.com</p>
  <p><span style="text-decoration: underline; color: #e8d49b;">Helpline</span>:  +91-9876543210</p>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>