<?php
require_once("DB_connection.php");
$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="all_users.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System - All Users</title>
    <style>
    .logo {
    position: relative;
    left: 7%;
    padding-top: 3%;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 25px;
}

#logo-p1 {
    color: white;
    font-weight: bold;
}

#logo-p2 {
    color: rgb(233, 179, 41);
    font-weight: bold;
}
.links {
    position: relative;
    left: 45%;
    margin-top: -1.2%;
}

.links a {
    text-decoration: none;
    font-family: sans-serif;
    font-size:1.7rem;
    color: white;
    margin-left: 3%;
    font-weight: bold;
}

.links > a:hover {
    color: greenyellow;
}


</style>
</head>

<body>
<div class="logo"><span id="logo-p1">SmartEdge</span><span id="logo-p2">Bank</span></div>
    <div class="links">
        <a href="show_all_users.php">Users</a>
        <a href="show_all_transaction.php">History</a>
        <a href="index.html">Home</a>
    </div>
    <?php if ($result->num_rows < 1) { ?>
        <div class="msg-container">
            <p>Sorry, No Users Found</p>
            <button><a href="add_user.php">Add User</a></button>
        </div>
    <?php } else { ?>
        <table>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Balance</th>
                <th>Transactions</th>
                <th>Transfer</th>
                <th>Deposit</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?php echo $row["user_Id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["first_name"]; ?>
                    </td>
                    <td>
                        <?php echo $row["last_name"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email"]; ?>
                    </td>
                    <td>
                        <?php echo $row["phone_number"]; ?>
                    </td>
                    <td>
                        <?php echo $row["balance"]; ?>
                    </td>
                    <td>
                        <button><a href="user_transactions.php?id=<?php echo $row["user_Id"]; ?>">View</a></button>
                    </td>
                    <td>
                        <button id="send"><a href="transfer.php?id=<?php echo $row["user_Id"]; ?>">Send</a></button>
                    </td>
                    <td>
                        <button><a href="deposit.php?id=<?php echo $row["user_Id"]; ?>">Deposit</a></button>
                    </td>
                </tr>
            <?php }
            $conn->close();
    } ?>

        </td>
        <tr>
    </table>

</body>

</html>