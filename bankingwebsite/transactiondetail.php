<?php
require_once 'databaseconn.php';

$sql = "SELECT * FROM transactiondetail";
$result = $connection->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction Detail</title>
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

        <h2 class="customer_heading">Transaction Detail</h2>
        <?php
        $sql = "SELECT * FROM transactiondetail";
        $transaction_d = $connection->query($sql);
        ?>

        <div class="card_container">
            <?php
            while ($row = $transaction_d->fetch_assoc()) {
            ?>
                <?php
                echo "  
                    <div class='card card1'>
                        <div class='card_id'>
                            <div class='card_id_left'>
                            <p>ID</p>
                            <p>$row[id]</p>
                            </div>
                            <div>
                            <p>$row[created_at]</p>
                            </div>
                                              
                        </div>  
                        <div class='card_email'>
                            <div class='card_email_left'>
                                <p>Send Amount</p>
                            </div>
                            <div class='card_email_right'>
                                &dollar;$row[amount]
                            </div>
                        </div>
                        <div class='card_name'>
                            <div class='card_name_left'>
                                <p>sender name</p>
                                <p>$row[sender_name]</p>
                            </div>
                        <div class='card_name_right'>
                            <p>reciver name</p>
                            <p>$row[receiver_name]</p>
                        </div>
                    </div> 
                </div>
                "; ?>
            <?php
            }
            ?>


        </div>

        <div class="customers_table">
            <table>
                <tr>
                    <th>customer id</th>
                    <th>sender name</th>
                    <th>receiver name</th>
                    <th>amount</th>
                    <!-- <th>created at</th> -->
                    <th>time</th>
                </tr>

                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <?php
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[sender_name]</td>
                    <td>$row[receiver_name]</td>             
                    <td>$row[amount]</td>
                    <td>$row[created_at]</td>  
                    <tr>
                    ";
                    ?>

                <?php
                }
                ?>

        </div>  
        <?php
        $connection->close();
        ?>

        <script src="./javascript/javascript.js">
        </script>
    </div>
</body>

</html>