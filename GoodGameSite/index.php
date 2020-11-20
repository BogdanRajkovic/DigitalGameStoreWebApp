<?php
                include_once 'include/header.php';
?>
Home
   <?php
        if(isset($_SESSION['u_id']))
        {
            echo 'You are logged in';
        }
        ?>
<?php
                include_once 'include/footer.php';
?>
