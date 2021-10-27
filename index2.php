<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Integration Test</title>
</head>
<body>

    <?php
    echo "release";
    echo $_POST["total_price"];
    echo "           here";
    echo "Ksh ".number_format($_POST["total_price"], 2);
    echo "Ksh ".number_format($_POST[""], 2);
    echo $_POST["txn_id"];
    ?>

</body>
</html>
