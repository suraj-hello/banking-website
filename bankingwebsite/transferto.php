<?php
require_once 'databaseconn.php';
?>
<?php

$sender_name = $_GET['name'];
$sender_amount = $_GET['balance'];
$receiver_name = "";
$send_amount = "";
$reciver_balance = "";
$sqlDetail = "";

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $sender_name = $_POST["name"];
    $receiver_name  = $_POST["receiver_name"];
    $send_amount = $_POST["send_amount"];

    do {
        if (empty($sender_name) || empty($receiver_name) || empty($send_amount)) {
            $errorMessage = "All The Fields Are Required";
            break;
        }
        echo "$sender_name";
        echo "$receiver_name";
        echo "$send_amount";

        $sql = "SELECT * FROM customer";
        $result = $connection->query($sql);


        while ($row = $result->fetch_assoc()) {
            if ($row["name"] == $receiver_name) {
                echo "<tr>";
                // echo "<td>{$row['id']}</td>";
                echo "<td>{$row['balance']}</td>";
                echo "</tr>";
                $reciver_balance = $row['balance'];
            }
        }

        $sqlReceiver = "UPDATE customer SET balance = balance + $send_amount WHERE name = '$receiver_name'";
        $resultReceiver = $connection->query($sqlReceiver);


        $sqlSender = "UPDATE customer SET balance = balance - $send_amount WHERE name = '$sender_name'";
        $resultSender = $connection->query($sqlSender);

        $transactiondetail = "INSERT INTO transactiondetail (sender_name, receiver_name, amount) VALUES ('$sender_name', '$receiver_name', '$send_amount')";
        $sqlDetail = $connection->query($transactiondetail);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }


        $sender_name = "";
        $receiver_name = "";
        $send_amount = "";

        $successMessage = "Client added correctly";


        header("location:./custamers.php");
        exit;
    } while (false);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Amount</title>
    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./css/style.css" />

</head>

<body>
    <div class="container">
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

        <?php
        if (!empty($errorMessage)) {
            echo "<strong>$errorMessage</strong>";
        }

        ?>
        <div class="create_section">
            <h2 class="create_heading">Send Amount</h2>

            <form class="transfer" method="post">

                <div class="label_container">
                    <label class="sent_from">Sent&nbsp;from </label>
                    <input type="text" name="name" value="<?php echo $sender_name; ?>"> <br>
                </div>
                <div class="label_container">
                    <label class="sent_to">Send&nbsp;To</label>
                    <input type="text" name="receiver_name" value="<?php echo $receiver_name; ?>"> <br>
                </div>
                <div class="label_container">
                    <label class="balance_label amount">Amount ($)</label>
                    <input type="text" name="send_amount" value="<?php echo $send_amount; ?>"> <br>
                </div>

                <?php
                if (!empty($successMessage)) {
                    echo "<strong>$successMessage<stronge><br>";
                    echo "$sender_name";
                }


                ?>
                <div class="create_btn">
                    <button type="submit">Send</button>
                    <a href="./index.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    $connection->close();
    ?>
    <script src="./javascript/javascript.js">
    </script>
</body>

</html>