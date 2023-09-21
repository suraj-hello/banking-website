<?php
require_once 'databaseconn.php';
?>

<?php
$name = "";
$email = "";
$balance = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST["name"];
    $email = $_POST["email"];
    $balance = $_POST["balance"];

    do {
        if (empty($name) || empty($email) || empty($balance)) {
            $errorMessage = "All The Fields Are Required";
            break;
        }
        $sql = "INSERT INTO customer (name, email, balance) VALUES ('$name', '$email', '$balance')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }


        $name = "";
        $email = "";
        $balance = "";

        $successMessage = "Client added correctly";


        header("location:./index.php");
        exit;
    } while (false);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create client</title>
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
            <h2 class="create_heading">New Client</h2>

            <form method="post">

                <div class="label_container">
                    <label>name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>"> <br>
                </div>
                <div class="label_container">
                    <label>email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>"> <br>
                </div>
                <div class="label_container">
                    <label class="balance_label">balance</label>
                    <input type="text" name="balance" value="<?php echo $balance; ?>"> <br>
                </div>

                <?php
                if (!empty($successMessage)) {
                    echo "<strong>$successMessage<stronge><br>";
                    echo "$name";
                }

                ?>
                <div class="create_btn">
                    <button type="submit">Create</button>
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