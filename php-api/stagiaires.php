<?php
session_start();
if( !isset($_SESSION['user']) ) :
    header("location:auth.php");
    exit;
endif;
include 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui suis-je ?</title>
</head>
<body>
<h1>Bievenue &nbsp;<?php echo ($_SESSION["user"].$_SESSION["pd"] ); ?></h1>


    <a href="auth.php?delog">Se déconnecter</a>
</body>
</html>