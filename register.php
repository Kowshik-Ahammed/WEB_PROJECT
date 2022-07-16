<?php include("path.php") ?>

<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
        <!-- Using awesome font-->
        <script src="https://kit.fontawesome.com/21cfdc1486.js" crossorigin="anonymous"></script>  
        <!--  Custom style-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- google font-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal|Lora">
    <title>Register</title>
</head>
<body>
    <!--INCLUDE HEADER-->
    <?php include (ROOT_PATH . "/app/includes/header.php"); ?>


<div class="auth-content">
<form action="register.php" method="post">
    <h2 class="form-title">Register</h2>

  
    <?php include (ROOT_PATH . "/app/helpers/formErrors.php"); ?>
       




    <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
    </div>


    <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
    </div>


    <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
    </div>


    <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
    </div>

    <div>
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>

    </div>
    <p>Or <a href="<?php echo BASE_URL .'/login.php'?>"> Sign In</a></p>
</form>

</div>




    
   <!--Jquery-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
   
   
   <!---Custom script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>