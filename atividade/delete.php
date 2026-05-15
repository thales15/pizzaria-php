<?php

include "./connection.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="lista.php">lista</a>
</body>

</html>

<?php

if (isset($_GET["dado"])) {
    $delete = R::trash("pizza", $_GET['dado']);

    header("location: lista.php?del=sucess");
}else{
     header("location: lista.php?del=fail");
}
?>