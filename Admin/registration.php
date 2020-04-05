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
.container{
  width: 500px;

}

h3{
  margin-top: 20px;
  text-align: center;
  font-style: italic;
}

    </style>

    <title>REGISTRATION</title>
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

if (isset($_POST['customer_no']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact_no']) && isset($_POST['address']) && isset($_POST['conc_type'])
&& isset($_POST['password'])) {
$sql = "INSERT INTO users (customer_no, name, email, contact_no, address, conc_type, password)
        VALUES (:customer_no, :name, :email, :contact_no, :address, :conc_type, :password)";
echo ("<pre>\n".$sql."\n</pre>\n");
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':customer_no' => $_POST['customer_no'],
':name' => $_POST['name'],
':email' => $_POST['email'],
':contact_no' => $_POST['contact_no'],
':address' => $_POST['address'],
':conc_type' => $_POST['conc_type'],
':password' => $_POST['password']));

$_SESSION['success'] = 'Record Added';
header('Location: registration.php');
return;
}

if(isset($_SESSION[ 'success'])) {
  echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
  unset($_SESSION['success']);
}
?>

  
    <div class="container">
    <h3>Fill in the details</h3>
    <form action="registration.php" method="POST">
      <div class="form-group">
        <label for="formGroupExampleInput">Customer No.</label>
        <input type="text" name="customer_no" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Contact No.</label>
        <input type="text" name="contact_no" class="form-control" id="formGroupExampleInput" required="">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Email ID</label>
        <input type="text" name="email" class="form-control" id="formGroupExampleInput">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Address</label>
        <input type="text" name="address" class="form-control" id="formGroupExampleInput" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Connection Type</label>
        <!-- <input type="text" name="conc_type" class="form-control" id="formGroupExampleInput" required> -->
        <select name="conc_type" class="form-control" id="formGroupExampleInput" required>
          <option value="Domestic">Domestic</option>
          <option value="Commercial">Commercial</option>
        </select>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Login Password</label>
        <input type="text" name="password" class="form-control" id="formGroupExampleInput" required>
      </div>
      <button class="btn btn-dark" type="submit" >Add User</button>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

