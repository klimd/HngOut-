<?php
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
  $email = mysqli_real_escape_string($_GET['email']);
  $hash = mysqli_real_escape_string($_GET['hash']);

  $searchquery = mysqli_query("SELECT email, hash, isVerified FROM login WHERE $email='".$email."' AND hash='".$hash."' AND isVerified='0'") or die (mysqli_error());
  $match = mysqli_num_rows($searchquery);
}

/*if($match > 0)
{
  mysqli_query("UPDATE login SET isVerified='1' WHERE email='".$email."' AND hash='".$hash."' AND isVerified='0')" or die (mysqli_error()));
  echo "Your account has been activated! You may now login.";
}*/

?>
