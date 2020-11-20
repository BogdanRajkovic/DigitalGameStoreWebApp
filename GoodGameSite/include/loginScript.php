<?php
session_unset();
session_destroy();
session_start();

if(isset($_POST['submit']))
{
    include 'connection.php';
    
    $username =$_POST['username'] ;
    $password =$_POST['password'];
    
    if(empty($username)|| empty($password))
    {
        header("Location:../index.php?login=empty");
        exit();
    }
    else 
    {
        $sql = "SELECT * FROM users WHERE Username='$username'";
        $result = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck<1)
        {
            header("Location:../index.php?login=error1");
            exit();
        }
        else 
        {
         if($row = mysqli_fetch_assoc($result)) 
         {
             //De-hasing the password
             $hashedPasswordCheck = password_verify($password, $row['Password_hash']);
             if($hashedPasswordCheck == false)
             {
                 header("Location:../index.php?login=error2");
                exit();
             }
             elseif($hashedPasswordCheck == true)
             {
                 //Login the user
                 $_SESSION['u_id']=$row['UserID'];
                 $_SESSION['u_firstname']=$row['First_Name'];
                 $_SESSION['u_lastname']=$row['Last_Name'];
                 $_SESSION['u_email']=$row['Email'];
                 $_SESSION['u_username']=$row['Username'];
                 header("Location:../index.php?login=success");
                    exit();
             }
         }
        }
    }
            
}

else
{
    header("Location:../index.php?login=error");
    exit();
}
