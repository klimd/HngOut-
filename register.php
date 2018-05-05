<!DOCTYPE html>
<html>
<head>
<link rel=stylesheet type=text/css href=style.css>
<title>Register</title>
</head>

<body id=bodyContent>
  <div id=pageWrapper>
    <div id=navBarWrapper>
      <ul>
        <li id=navButtons><a href="index.php" class="button">Main</a></li>
        <li id=navButtons><a href="login.php" class="button">Login</a></li>
        <li id=navButtons><a href="register.php" class="button">Register</a></li>
      </ul>
    </div>

  <hr><hr><hr><hr><hr>

  <h1 id=loginPageHeader>Registration Form</h1>
  <div class=probno>
  <form action="" method="POST">
    <input type="text" name="user" placeholder=Username><br />
    <input type="password" name="pass" placeholder=Password><br />
    <input type="password" name="pass2" placeholder="Re-enter Password"><br />
    <input type="text" name="email" placeholder='University Email'><br /><br />
    <input type="submit" value="Submit" name="submit">
</form>
</div>

<?php
srand(time(NULL)); // For getting a random hash
//If the submit button is pressed...
if(isset($_POST["submit"]))
{
  //If there's something in the user, pass, and pass2 boxes...
  if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['pass2']))
  {
    //Set POST values to local variables
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];
    $email=$_POST['email'];

    //Initiate connection and select database
    $con=mysqli_connect('localhost','root','') or die (mysqli_error());
    mysqli_select_db($con, 'hngout') or die ("cannot select DB");

    //Define query | See if there's a row where the username is equal to what the user input
    $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");

    //Get the total number of rows (this is hopefully equal to 0)
    $numrows=mysqli_num_rows($query);

    //If there's no place where the username is already used...
    if($numrows==0)
    { 
      //If the length of the password is greater than 5...
      if(strlen($pass)>5)
      {
        //If the passwords are equal to each other...
        if($pass==$pass2)
        {
        //An easier way to authenticare is this...:
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
          {
            //echo "The email is valid";
          }
          else
          {
            echo "The email is invalid";
            exit;
          }
         
        /*if(!preg_match("#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$#", $email))
        {
          echo "Email invalid! Please try again.";  
          exit;
        }*/

        //Figure out a way to send the users an email with a link that they can click to verify their email. Google it again because I'm sure it's been done a million times

      //Generate a random hash for the new user
      $hash=md5(rand(0, 1000));

      //Set hash to a POST variable
      $_POST['hash'] = $hash;

      //Define sql
      $sql="INSERT INTO login(username,password,uniEmail,hash) VALUES('$user','$pass','$email','$hash')"; 
      }
      else
      {
        echo "Your passwords didn't match!";
        exit;
      }    
    } 
    else
    {
      echo "Your password must be at least 6 characters.";
      exit;    
    }
    $result=mysqli_query($con, $sql);

    if($result)
    {
      //require_once 'sendemail.php';
      echo "Your account was created! Please login."; 
    }
    else
    {
      echo "Something's amiss!";
    }
  }
  else
    {
      echo "That username already exists. Please try another.";
    }
  }
  else
  {
    echo "All fields are required!";
  }
}
?>
</body>
</html>
