<?php
require_once 'databaseconn.php';

$sql = "SELECT * FROM customer";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Custamers table</title>
  <link rel="stylesheet" href="./css/normalize.css" />
  <link rel="stylesheet" href="./css/style.css" />

</head>

<body>
  <div class="container" style="min-height: auto;">
    <header>
      <nav class="navbar">
        <a class="nav_logo" href="./">FunBank</a>
        <div class="toggler">
          <div class="line line_one"></div>
          <div class="line line_two"></div>
        </div>
        <ul class="nav_list">
          <li>
            <a class="nav_links" href="./">Home</a>
          </li>
          <li>
            <a class="nav_links" href="./createuser.php">Create</a>
          </li>
          <li>
            <a class="nav_links" href="./custamers.php">Customer</a>
          </li>
          <li>
              <a class="nav_links" href="./transactiondetail.php">Transaction Detail</a>
          </li>
          <li>
          <a class="nav_links" href="https://surajadhav.netlify.com">contact us</a>
          </li>
        </ul>
      </nav>
    </header>

    <h2 class="customer_heading">Customers tables</h2>
    <div class="customers_table">
      <table>
        <tr>
          <th>customer id</th>
          <th>name</th>
          <th>email</th>
          <th>balance ($)</th>
          <!-- <th>created at</th> -->
          <th>Transfer To</th>
          <th>transaction detail</th>

        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

          <?php
          echo "
              <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[balance]</td><br>
                <td>
                    <a href='transferto.php?id={$row['id']}&name={$row['name']}&balance={$row['balance']}'>Transfer</a>
                </td>   
                <td>
                <a href='transactiondetail.php?id={$row['id']}&name={$row['name']}&balance={$row['balance']}'>Transation detail</a>
                </td>           
              </tr>
              ";
          ?>


        <?php
        }
        ?>
      </table>
    </div>

    <?php 
    $sql = "SELECT * FROM customer";
    $card_data = $connection->query($sql);
    
    ?>
  

    <div class="card_container">
      <?php
      while ($row = $card_data->fetch_assoc()) {
      ?>
      <?php
        echo"  
      
        <div class='card card1'>
          <div class='card_id'>
            <div class='card_id_left'>
              <p>$row[id]</p>
              <p>ID</p>
            </div>
            <a class='card_link' href='transferto.php?id={$row['id']}&name={$row['name']}&balance={$row['balance']}'>Send Amount</a>                   
          </div>  
          <div class='card_email'>
          <div class='card_email_left'>
            <p>$row[email]</p>
          </div>
          <div class='card_email_right'>
            &dollar;$row[balance]
          </div>
        </div>
        <div class='card_name'>
          <div class='card_name_left'>
            <p>name</p>
            <p>$row[name]</p>
          </div>
          <div class='card_name_right'>
            <p>date</p>
            <p>$row[created_at]</p>
          </div>
        </div> 

        </div>
        
        ";
        ?>
      <?php
      }
      ?>


    </div>
  </div>
  <?php
  $connection->close();
  ?>

  <script src="./javascript/javascript.js"></script>
</body>
</html>