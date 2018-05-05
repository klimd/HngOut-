<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel=stylesheet type=text/css href=style.css>
</head>
<body id=bodyContent >

  <div id=pageWrapper>

    <div id=navBarWrapper>
      <ul>
        <li id=navButtons><a href="index.php" class="button">Main</a></li>
        <li id=navButtons><a href="login.php" class="button">Login</a></li>
        <li id=navButtons><a href="register.php" class="button">Register</a></li>
      </ul>
    </div>

    <hr><hr><hr><hr><hr>

    <h1 id=loginPageHeader>Login Form</h1><br />
	<div class=probno>
    <form action="" method="POST" align="center">
        <input type="text" name="user" placeholder=Username><br />
        <input type="password" name="pass" placeholder=Password><br /><br /> 
	
        <input type="submit" value="Login" name="login"><br />
    </form>
	</div>
	<br /><br /> 
<div id=loginForm name=loginForm>

<?php
//If the submit login button is pressed...
if(isset($_POST["login"]))
{
  //If there's something in the user box and in the pass box...
  if(!empty($_POST['user']) && !empty($_POST['pass']))
  {
    //Set POST variables to local variables
    $user=$_POST['user'];
    $pass=$_POST['pass']; 
  
    //Initiate connection and select database
    $con=mysqli_connect('localhost','root','') or die (mysqli_error());
    mysqli_select_db($con, 'hngout') or die ("cannot select DB");

    //Set session varaibles
    /*session_start();
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['hash'] = mysqli_query($con, "SELECT hash FROM login WHERE username=$user");
    $_SESSION['id'] = mysqli_query($con, "SELECT id FROM login WHERE username=$user"); 
     */
    //Define query | Get the row where the username and password match the input
    $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");
    //Get number of rows (which should be 1)
    $numrows=mysqli_num_rows($query); 
    //Set true/false depending if the user is verified
    $verified=mysqli_query($con, "SELECT `isVerified` FROM login WHERE username='".$user."' AND password='".$pass."'");

    //If the number of rows isn't 0...
    if($numrows!=0)
    {
      //As long as the query is good...
      if($row=mysqli_fetch_assoc($query))
      {
        //Set username and password from the database to local variables
        $dbusername=$row['username'];
        $dbpassword=$row['password'];
        $dbid=$row['id'];
      }
      if($user==$dbusername && $pass==$dbpassword)
      {
        /*if($verified=='1')
        {
          echo "Verified login successful!";
          //session_start();
          //$_SESSION['sess_user']=$user;

          //Redirect browser
          //header("Location: member1.php");
        }
        echo "Your email isn't verified!";
        */
        //Probably add a 'resend' button or something here
        echo "Login Successful!";
        header("Location: homepage.php?dbid=".$dbid);
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
?>
    </div>

  </div> <!--End page wrapper div-->
</body>
</html>
