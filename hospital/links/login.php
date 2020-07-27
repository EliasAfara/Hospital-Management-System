<?php 
require_once 'authController.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/main.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body style="background: black">
 <div class="container login">
        <div class="row">
            <div class="col-md-4 form-div">
                <form action="login.php" method="post">
                    <h3 class="text-center">Login</h3>
                    <?php if(count($errors)>0):?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                        <?php endforeach?>
                    </div>
                    <?php endif?>

                    <div class="form-group">
                        <label for="username">Username or E-mail</label>
                        <input type="text" name="username" value="<?php echo $email; ?>" class="form-control form-control-lg">
                    </div>
					
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
					
                    <div class="form-group"> 
                        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
                    </div>

                    <p class="text-center">Dont have an account? <a href="signup.php">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>