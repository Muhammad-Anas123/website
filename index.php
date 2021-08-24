<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

</body>
<?php
session_start();
if(isset($_SESSION['email'])){
    echo '<h3 class="text-white text-center">welcome '.$_SESSION['email'].'</h3>';
    echo '<h3><a href="logout.php">Logout</a></h3>';

}else{
    //echo '<h2 class="text-white">Access denied</h2>';
    header("location:login.php");
}

?>
</html>