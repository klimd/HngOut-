<?php

$subject = 'Signup | Verification';
$message = '

Thank you for signing up!
Yout account has been created. You may log in with the following username:

--------------------
Username: '.$user.'
--------------------

Please click the link below to activate your account:
http://www.hngout.com/verify1.php?email='.$email.'&hash='.$hash.'&isVerified=0

';

$headers = 'From:noreply@localhost' . "\r\n";

// Just trying this to see error reports
$result = mail($email, $subject, $message, $headers) or die ("");

if($result == true)
{
  echo "gus";
}
else
{
  echo "buh";
}

// For testing
/*
if(mail($email, $subject, $message, $headers))
{
  echo 'SHIT WENT RIGHT';
}
else
{
  echo 'SHIT WENT WRONG';
}
*/
?>
