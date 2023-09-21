<?php
require_once 'databaseconn.php';

$sql = "SELECT * FROM customer";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transper Amount</title>
</head>

<body>
    <?php
    $selected_client=$_GET['id'];

    while ($row = $result->fetch_assoc()) {
    ?>
        <?php
        if($row["name"] == $reciver_name){
            echo "
              <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[balance]</td>
                <td>$row[created_at]</td><br>     
              </tr>
            ";
             
        }
            
        ?>


    <?php
    }
    ?>
 

 





</body>

</html>