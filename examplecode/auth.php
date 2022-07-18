<?php
if ( isset($_GET['delog']) ) :
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['token']);
    header("location:auth.php");
    exit;
endif;
require 'config.php';
if( isset($_POST['ident'])) :
    $sql = sprintf("SELECT * FROM users WHERE email = '%s' AND password = '%s'",
        $_POST['email'],
        $_POST['password']    
    );
    $result = $connect->query($sql);
    echo $connect->error;
    //test si les data sont justes
    if( $result->num_rows > 0 ) :
        $user = $result -> fetch_assoc();
        session_start();
        $_SESSION['user'] = $user['firstname'];
        $_SESSION['pd'] = $user['lastname'];
        $_SESSION['token'] = md5($user['email'].time());
        header("location:stagiaires.php");
        exit;
        //myPrint_r($_SESSION);
    else:
        echo 'erreur de log et pass';
    endif;
endif;
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
    <form action="" method="post">
        <input type="email" id="email" name="email">
        <input type="password" name="password" placeholder="Votre mot de passe">
        <input type="hidden" name="ident">
        <button>S'identifier</button>
    </form>
</body>
</html>