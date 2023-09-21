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
    <title>Create client</title>
    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <style>
        .card_container {
            /* border: 1px solid #222; */
            color: #e7e7e7;
            text-transform: capitalize;
            display: flex;
            flex-direction: column;
            gap: 1rem 0;

        }

        .card {
            /* background:linear-gradient(to left,#02192a,#0e89c6 ); */
            /* background:linear-gradient(to left,#02192a 30%,#0e89c6 70%); */
            background: linear-gradient(to left, #0e89c6, #02192a);



            border: 2px solid #e7e7e791;
            border-radius: 12px;
            padding: 1rem;

        }

        .card_id {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .card_id_left {
            display: flex;
            gap: 0 10px;
        }

        .card_id_left p:first-child {
            font-weight: 500;

        }

        .card_id_left p:last-child {

            opacity: 0.5;

        }

        .card_email {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
        }

        .card_name {
            display: flex;
            justify-content: space-between;
        }

        .card_name_left p:first-child {
            margin-bottom: 7px;
            opacity: 0.5;
        }

        .card_name_left p:last-child {
            margin: 0;
            font-weight: 700;
        }

        .card_name_right p:first-child {
            margin-bottom: 7px;
            opacity: 0.5;

        }

        .card_name_right p:last-child {
            margin: 0;

        }

        .card_link {
            color: #e7e7e7;
        }
    </style>
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
                        <a class="nav_links" href="./">home</a>
                    </li>
                    <li>
                        <a class="nav_links" href="./custamers.php">customer</a>
                    </li>
                    <li>
                        <a class="nav_links" href="#">contact us</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="create_section">
            <h2 class="create_heading">New Client</h2>

            <form method="post">
                <div class="label_container">
                    <label>name</label>
                    <input type="text" name="name" /> <br />
                </div>

                <div class="label_container">
                    <label>email</label>
                    <input type="email" name="email" /> <br />
                </div>

                <div class="label_container">
                    <label class="balance_label">balance</label>
                    <input type="text" name="balance" /><br />
                </div>

                <div class="create_btn">
                    <button type="submit">create</button>
                    <a href="./index.php">Cancel</a>
                </div>
            </form>
        </div>

        <div class="card_container">
            <div class="card card1">
                <div class="card_id">
                    <div class="card_id_left">
                        <p>01</p>
                        <p>ID</p>

                    </div>
                    <a class="card_link" href="#">Send amount</a>
                </div>
                <div class="card_email">
                    <div class="card_email_left">
                        <p>exampleaaaaaaaaaaaaaaaaaaaaaa@gmail.com</p>
                    </div>
                    <div class="card_email_right">
                        &dollar;2000
                    </div>
                </div>
                <div class="card_name">
                    <div class="card_name_left">
                        <p>name</p>
                        <p>rahul</p>
                    </div>
                    <div class="card_name_right">
                        <p>date</p>
                        <p>2023-08-1</p>
                    </div>

                </div>

            </div>
            <div class="card card2">

                <div class="card_id">
                    <div class="card_id_left">
                        <p>ID</p>
                        <p>01</p>
                    </div>
                    <a href="#">Send amount</a>
                </div>
                <div class="card_email">
                    <div class="card_email_left">
                        <p>example@gmail.com</p>
                    </div>
                    <div class="card_email_right">
                        &dollar;2000
                    </div>
                </div>
                <div class="card_name">
                    <div class="card_name_left">
                        <p>name</p>
                        <p>rahul</p>
                    </div>
                    <div class="card_name_right">
                        <p>date</p>
                        <p>2023-08-1</p>
                    </div>



                </div>
            </div>

        </div>






    </div>
</body>

</html>