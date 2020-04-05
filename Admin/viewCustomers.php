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
        margin-top: 30px;
        font-style: italic;
        text-align: center;
        font-weight: 600;
      }

      table{
        margin: 50px 50px;
        text-align: center;
      }
      th{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.5;
        font-size: 18px;
        height: 40px;
        width: 200px;
      }

      td{
        font-family: serif;
        padding: 3px 3px;
        font-size: 17px;
      }
      #button{
        border: 1px solid white;
      }
      #bt{
        border: 1px solid black;
   

    </style>

    <title>Customer Details</title>
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


    <h3>Customer details</h3>

    <?php 

  echo "<pre>\n";
  require_once "pdo.php";
  $stmt = $pdo->query("Select customer_no, name, email, contact_no, address, conc_type, password from users");
  echo '<table border = "1">'."\n";
  echo "<th>Customer_No</th><th>Name</th><th>Email</th><th>Contact_No</th><th>Address</th><th>Connection_Type</th>";
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>" ;
    echo ($row['customer_no']);
    echo ("</td><td>");
    echo ($row['name']);
    echo ("</td><td>");
    echo ($row['email']);
    echo ("</td><td>");
    echo ($row['contact_no']);
    echo ("</td><td>");
    echo ($row['address']);
    echo ("</td><td id = 'bt'>");
    echo ($row ['conc_type']);
    //echo ("</td><td id='bt'>");
    //echo ($row ['password']);
    echo ("</td><td id='button'>");
    echo ('<a type="button" class="btn btn-primary" href="edit.php?customer_no='.$row['customer_no'].'">Edit</a>');
    echo ("</td></tr>");
    //echo ('<a href="delete.php?customer_no='.$row['customer_no'].'">Delete</a>');
    //echo ("</td></tr>");
  }
  echo "</table>\n"; 

  echo "</pre>\n";

 ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>