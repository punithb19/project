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

      h3{
        text-align: center;
        font-style: italic;
        padding: 20px;
      }

      form{
        margin: 5px 550px;
      }

      label{
        text-align: left;
      }

      input{
        margin: auto;
      }
      #update{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.5;
        font-style: italic;
      }

    </style>

    <title>Bill Calculation</title>
  </head>
  <body>
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="registration.php">New Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewCustomers.php">View Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="calculateBill.php">Calculate Bill</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="updatePerUnitCost.php">Update per unit cost</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">Logout</a>     
      </li>
    </ul>

    <?php
      require_once "pdo.php";
      session_start();

      if (isset($_POST['customer_no']) && isset($_POST['bill_no']) && isset($_POST['month']) && isset($_POST['due_date']) && isset($_POST['unit_consumed']))  {
        $stmtx = $pdo->query("SELECT * from unit_cost");
        $row = $stmtx->fetch(PDO::FETCH_ASSOC);

      $sql = "INSERT INTO bill_details (consumer_no, bill_no, month, due_date, unit_consumed, bill_amount)
              VALUES (:consumer_no, :bill_no, :month, :due_date, :unit_consumed, :per_unit_cost*:unit_consumed )";
      //echo ("<pre>\n".$sql."\n</pre>\n");
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
      ':consumer_no' => $_POST['customer_no'],
      ':bill_no' => $_POST['bill_no'],
      ':month' => $_POST['month'],
      ':due_date' => $_POST['due_date'],
      ':unit_consumed' => $_POST['unit_consumed'],
      ':per_unit_cost' => $row['per_unit_cost']));

      // $stmtx->execute(array(
      //   ':per_unit_cost'=> $row['per_unit_cost']));

      $_SESSION['success'] = 'Record Added';
      header('Location: calculateBill.php');
      return;
    }

      if(isset($_SESSION['success'])) {
      echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['success']);
      }
      ?>
      
    <h3>Electricity Bill Calculation</h3>
    <form action="calculateBill.php" method="POST">
      <div class="form-group">
        <label>Customer No.</label>
        <input type="number" name="customer_no" class="form-control" required>
      </div>
      
      <div class="form-group">
        <label>Bill Number</label>
        <input type="number" name="bill_no" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Month</label>
        <select name="month" class="form-control" required>
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
      <div class="form-group">
        <label>Expiry Date</label>
        <input type="Date" name="due_date" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Unit Consumed</label>
        <input type="number" name="unit_consumed" class="form-control" required>
      </div>
      <div class="form-group">
        <?php 
           echo "<pre>\n";
           require_once "pdo.php";
           $stmt = $pdo->query("SELECT * from unit_cost");
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
              echo "<div id='update'>";
              echo "Per Unit Cost : Rs. ";
              echo ($row['per_unit_cost']); 
              echo "</div>";
           echo "</pre>\n";

        ?>

      </div>

      <!-- <div class="form-group">
        <label> Bill Amount</label>
        <input type="number" name="bill_amount" class="form-control">
      </div> -->
      <div class="form-group">
      <button class="btn btn-dark" type="submit" class="form-control">Submit</button>
      </div>
    </form>



    </form> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>