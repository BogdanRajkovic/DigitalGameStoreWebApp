<?php

if(isset($_POST['submit']))
{
    include_once 'connection.php';
    
    $firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    
    
    //Error handlers
    //Check for empty fields
    if(empty($firstname)|| empty($lastname)||empty($email)||empty($username)||empty($password))
    {
        header("Location: ../signup.php?signup=empty");
        exit();
    }
    else
    {
        //Check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $firstname)||!preg_match("/^[a-zA-Z]*$/", $lastname))
        {
            header("Location: ../signup.php?signup=invalid");
            exit();
        }
        else 
        {
           //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL ))
            {
                header("Location: ../signup.php?signup=invalidemail");
                exit();
            }
            else
            {
                $sql = "SELECT * FROM users where Username= '$username'";
                $result = mysqli_query($conncetion, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0)
                {
                   header("Location: ../signup.php?signup=uernametaken");
                    exit(); 
                }
                else 
                {
                    //Hashing the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    
                    //Insert the user into database
                    $sqlINSERT = "INSERT INTO users (First_Name, Last_Name,Email,Username,Password_hash,Date_Created)"
                            . "VALUES ('$firstname','$lastname','$email','$username','$hashedPassword',now());";
                    
                    if(!mysqli_query($connection, $sqlINSERT))
                    {
                        header("Location: ../signup.php?signup=greskaPriUpisu");
                    exit();
                    }
                    else 
                        {
                        header("Location: ../signup.php?signup=success");
                        exit();
                        }
                   
                }
            }
        }
    }
}
else
{
    heder("Location: ../signup.php");
    exit();
}
