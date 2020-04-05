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
        margin-top: 100px;
      }

      h3{
        padding-left: 35px;
        font-style: italic;
      }

      label{
        padding: 30px;
        font-size: 20px;
      }

      .btn{
        margin-left: 40px;
        padding: 6px 17px;
      }
    </style>

    <title>Update per unit cost</title>
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

        if ( isset($_POST['per_unit_cost'])) {
            $sql = "UPDATE unit_cost SET per_unit_cost = :per_unit_cost"; 
            echo ("<pre>\n".$sql."\n</pre>\n");
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':per_unit_cost' =>$_POST['per_unit_cost']));
            $_SESSION['success'] = 'Record Updated';
            header('Location: updatePerUnitCost.php');
            return;
            }
        if(isset($_SESSION[ 'success'])) {
        echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
        unset($_SESSION['success']);
        }
        ?>

      <div class="jumbotron">
       <h3>Update per Unit Cost</h3>
      <form action="updatePerUnitCost.php" method="POST">
        <label>1 kilowatt-hour(kWh) cost</label>
        <input type="number" step="0.01" name="per_unit_cost"><br>
        <button type="submit" class="btn btn-dark btn-lg">Update</button>
      </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>