<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<p><a href="register1.php">Register</a> | <a href="login1.php">Login</a></p>
<h1>Login Form</h1>
<form action="" method="POST">
Username: <input type="text" name="user"><br />
Password: <input type="pass" name="pass"><br />
<input type="submit" value="Login" name="login">
</form>
<?php
if(isset($_POST["login"]))
{
  if(!empty($_POST['user']) && !empty($_POST['pass']))
  {
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $con=mysqli_connect('localhost','root','') or die (mysqli_error());
    mysqli_select_db($con, 'hngout') or die ("cannot select DB");

    $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");
    $numrows=mysqli_num_rows($query); 
    $verified=mysqli_query($con, "SELECT `isVerified` FROM login WHERE username='".$user."' AND password='".$pass."'");

    if($numrows!=0)
    {
      while($row=mysqli_fetch_assoc($query))
      {
        $dbusername=$row['username'];
        $dbpassword=$row['password'];
      }
      if($user==$dbusername && $pass==$dbpassword)
      {
        if($verified=='1')
        {
          echo "Verified login successful!";
          //session_start();
          //$_SESSION['sess_user']=$user;

          /*Redirect browser*/
          //header("Location: member1.php");
        }
        echo "Your email isn't verified!";
        //Probably add a 'resend' button or something here
        exit;
      }
    } 
    else
    {
      echo "Invalid username or password!";
    }
  }
  else
  {
    echo "All fields are required!";
    exit;
  }
}
