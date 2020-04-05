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

      .jumbotron{
        width: 700px;
        margin: auto;
        margin-top: 30px;
        padding: 25px 70px 30px 140px;

      }

      h2{
        padding-bottom: 20px;
        padding-left: 125px;
        font-style: italic;
        
      }
      .container{
        width: 600px;
        margin-top: 30px;
      }

      img{
        width: 50px;
        height: 30px;
      }
    </style>

    <title>Quick Pay</title> 
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

   

    <div class="jumbotron">
      <h2>Bill Payment</h2>
    <form action="quickPay.php" method="POST">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bill No.</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="bill_no" required style="width: 300px">
      </div>
      </div>
      <div><button type="submit" class="btn btn-dark" style="margin-bottom: 15px;">Search</button></div>
     </form>
     <?php include "login.php";
          
           require_once "pdo.php";
           

           if (isset($_POST['bill_no'])){
           $bills = $_POST['bill_no'];
           $_SESSION['paybill'] = $bills;
           $sqly = ("SELECT bill_amount from bill_details where consumer_no = :login_user AND bill_no = :bill_no");
           $stmty = $pdo->prepare($sqly);
           $stmty->execute(array(
            ':login_user' => $_SESSION['login_user'],
            ':bill_no' => $_POST['bill_no']));
           $rowy = $stmty->fetch(PDO::FETCH_ASSOC);
              echo "Amount to be paid :  Rs.";
              echo ($rowy['bill_amount']);  
            }
        ?>
     </div>
     

      <div class="container">
      <h3>Card Details</h3>

     <form method = 'POST' action = 'quickPay.php' onsubmit="myFunction()">
            <div class="form-group owner">
                <label for="owner">Name on the Card</label>
                <input type="text" class="form-control" id="owner" name="owner" required>
            </div>
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" name="cardno" required maxlength="16" minlength="16" id="cardNumber">
            </div>
            <div class="form-group" id="expiration-date">
                <label style="padding-right: 35px;padding-top: 10px;">Expiration Date</label>
                <select required name = "expdate"> 
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select required>
                    <option value="16"> 2019</option>
                    <option value="17"> 2020</option>
                    <option value="18"> 2021</option>
                    <option value="19"> 2022</option>
                    <option value="20"> 2023</option>
                    <option value="21"> 2024</option>
                    <option value="21"> 2025</option>
                    <option value="21"> 2026</option>
                </select>
            </div>
            <div class="form-group CVV">
                <label for="cvv">CVV</label>
                <input type="password" class="form-control" name="cvv" required minlength="3" maxlength="3" id="cvv" style="width: 250px;">
            </div>
            <div class="form-group" id="credit_cards">
                <img src="../assets/images/visa.png" id="visa">
                <img src="../assets/images/mastercard.png" id="mastercard">
                <img src="../assets/images/rupay.jpg" id="rupay">
            </div>
            <div class="form-group" id="pay-now">
                <button type="submit" class="btn btn-md btn-dark" id="confirm-purchase">Make Payment</button>
            </div>
        </form>
        <script>
function myFunction() {
  alert("PAYMENT SUCCESSFUL!");
}
</script>
        
         <?php 
        require_once "pdo.php";

        if (isset($_POST['owner']) && isset($_POST['cardno']) && isset($_POST['expdate']) && isset($_POST['cvv'])) {
            $sqlx = "UPDATE bill_details SET status = 'Paid' where bill_no = :bill_no"; 
            //echo ("<pre>\n".$sqlx."\n</pre>\n");
            $stmtx = $pdo->prepare($sqlx);
            $stmtx->execute(array(
            ':bill_no' => $_SESSION['paybill']));

            $_SESSION['payment'] = 'Payment Successful!';
            //header('Location: quickPay.php');
            return;
            
            $_SESSION['failure'] = 'Payment Failed!';
            //header('Location: quickPay.php');
            return;
            
            }
      //        if ( isset($_SESSION["failure"]) ) {
      //   echo('<p style="color:red">'.$_SESSION["failure"]."</p>\n");
      //   unset($_SESSION["failure"]);
      // }
      // if ( isset($_SESSION["payment"]) ) {
      //   echo('<p style="color:green">'.$_SESSION["payment"]."</p>\n");
      //   unset($_SESSION["payment"]);
      // }
            ?>

      </div>


         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>
