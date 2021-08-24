<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="card border-dark mb-3">
                <div class="card-header text-center bg-dark text-white"><h3>Login Form</h3></div>
                <div class="card-body">
                    <form action="" method='POST'>
                        <div class="form-group py-2">
                          <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email address</label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group py-2">
                          <label for="password"><i class="fa fa-unlock" aria-hidden="true"></i> Password</label>
                          <input type="password" class="form-control" id="password"  name="password" placeholder="Enter password">
                        </div>
                        <div class="row justify-content-center">
                            <button type="login" class="btn btn-primary" id="login" name="login">Login</button>
                        </div> 
                        &nbsp;
                        <div class="row">
                            <p class="text-muted" id="signin">No account?<a href="signup.php">Sign Up</a> now</p>
                        </div> 
                      </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php

    include_once('opendb.php');
    if (isset($_POST['login'])) {
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $query="select * from signup where email=:email and password=:password";
        
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        try{
            $result=$stmt->execute();
            $count=$stmt->rowCount();
            if ($count>0) {
                while($row=$stmt->fetch()) {
                    session_start();
                    $_SESSION['email'] = $row[2];
                    // echo '<script>"window.location.href=index.php"</script>';
                    header("location:index.php");
                }
            }else {
                echo '<script>alert("Wrong email and password");</script>';
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }
?>