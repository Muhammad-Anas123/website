<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card  border-dark mb-3" style="max-width: 40rem;">
                <div class="card-header text-center bg-dark text-white"><h3>Sign Up</h3></div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                          <label for="fname">First Name</label>
                          <input type="text" class="form-control" id="fname" name="fname" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="row justify-content-center">
                            <button type="login" id="createAccount" name="createAccount" class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php

    if (isset($_POST['createAccount'])) {
        include('opendb.php');
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$password = password_hash($oassword,DEFAULT_PASSWORD);
        $password = md5($password); //password encryption
       
        $query = "insert into signup(firstname,lastname,email,password) values ('$fname','$lname','$email','$password')";

        $result = $conn->query($query);

        if ($result) {
            echo '<script>alert("SUCCESSFUL!");</script>';
            
            // echo "data store successfully !!";
        }
    }

?>