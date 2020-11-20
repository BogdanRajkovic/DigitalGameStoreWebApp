<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GG - Digital Gaming Marketplace</title>
        <link  rel="stylesheet" href="CSS/style.css">
        <link  rel="stylesheet" href="CSS/bootstrap.css">
        <link  rel="stylesheet" href="CSS/bootstrap.min.css">
        <link  rel="stylesheet" href="CSS/bootstrap-theme.css">
        <link  rel="stylesheet" href="CSS/bootstrap-theme.min.css">
        
    </head>
    <body>
        <div class="header-wrapper row text-left">
            <div class="col-md-2">
                <img class="header-image" src="img/gg.png"/>
            </div>
            <div class="navigation-wrapper col-lg-4 col-md-4">
                <li class="navigation"><a href="index.php">Home</a></li>
                <li class="navigation"><a href="shoppingCart.php">Store</a></li> 
                <li class="navigation"><a href="support.html">Support</a></li>
            </div>
            <div class="form-wrapper col-lg-5 col-md-6 text-right">
                <?php
                if(isset($_SESSION['u_id']))
                {
                    echo
                        '<form action="include/logoutScript.php" method="POST">
                            <button type="submit" name="submit">Logout</button>
                        </form>'; 
                }
                else
                {
                    echo
                        '<form class="form1" action="include/loginScript.php" method="POST">
                            <input type="text" name="username" placeholder="Username "/>
                            <input type="password" name="password" placeholder="Password"/>
                            <button type="submit" name="submit">Login</button>
                            <a href="signup.php">Sign up</a>
                        </form>';
                }
                ?>
            </div>
        </div>