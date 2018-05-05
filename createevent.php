<!DOCTYPE html>
<html>
<head>
<link rel=stylesheet type=text/css href=style.css>
<title>Create and Event</title>
</head>
  <body id=bodyContent> 

    <div id=pageWrapper>

      <div id=navBarWrapper>
        <?php
          $dbid=$_GET['dbid'];
        ?>
        <ul>
        <li id=navButtons><a href="homepage.php?dbid=<?php echo $dbid;?>" class="button">Home</a></li>
          <li id=navButtons><a href="createevent.php?dbid=<?php echo $dbid;?>"  class="button">Create an Event</a></li>
          <li id=navButtons><a href="findevent.php?dbid=<?php echo $dbid;?>" class="button">Find an Event</a></li>
          <li class=dropdown>
            <a href=index.php class="button">Account</a>
            <div class=dropdown-content>
              <a href="index.php" class=button>Logout</a>
              
              <a href="myevents.php?dbid=<?php echo $dbid;?>" class=button>My Events</a> 
          </li>
        </ul>
      </div>
      <hr><hr><hr><hr><hr>

<h1 id=loginPageHeader>Create Event</h1>
<br>

<?php
// Doing all the DB connection stuff here because it's easier
$con=mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db($con, 'hngout') or die ("cannot select databse");
?>
<div id=EventpageWrapper> <br>
<form action="" method="POST">
  <input type="text" name="eventName" placeholder="Event Name">
  <br /><br />
  <select name="eventType">
    <option selected disabled>Choose Event Type...</option>
    <option value="squash">Squash</option>
    <option value="pool">Pool</option>
    <option value="airhockey">Air Hockey</option>
    <option value="soccer">Soccer</option>
    <option value="frisbee">Frisbee</option>
</select>
<br /><br />
<select name="time">
  <option selected disabled>Select Event Start Time...</option>

<?php
require_once "displayTime.php";
//displayTimeMenu();
?>

</select>

<br><br>
  <select name="amOrpm">
    <option selected disabled>Select AM or PM...</option>
    <option value="AM">AM</option>
    <option value="PM">PM</option>
  </select>
<br><br>
  <input type=text name=eventLocation placeholder="Event Location">
<br><br>

  <input type=text name=eventDescription placeholder="Event Description">
<br><br><br>
</div>
  
 <p align="center">  <input type="submit" value="Submit" name="submit"> </p>
</form>

<?php
if(isset($_POST["submit"]))
{
  $eventName=$_POST['eventName'];
  $amOrpm=$_POST['amOrpm'];
  $eventType=$_POST['eventType'];
  $eventTime=$_POST['time'];
  $eventLocation=$_POST['eventLocation'];
  $eventDescription=$_POST['eventDescription'];

  $query=mysqli_query($con, "INSERT INTO events(userId, event_name, event_description, event_type, event_time, event_amOrpm, event_location) VALUES(".$_GET['dbid'].",'$eventName','$eventDescription','$eventType','$eventTime','$amOrpm','$eventLocation')");

  echo "Event Successfully Created! Redirecting you to the home page...";
  header("Refresh:1; url=homepage.php?dbid=".$_GET['dbid'].", true, 303");
  exit;    
}
?>

<?php
/*function displayTimeMenu()
{
  $hour=1;
  $minute=0.0;
  for($o=1; $o<=12; $o++)
  {
    echo '<option value='.$hour.':'.$minute.'0>'.$hour.':'.$minute.'0</option>';
    $minute = $minute+30;
    echo '<option value='.$hour.':'.$minute.'>'.$hour.':'.$minute.'</option>';
    $minute = $minute-30;
    $hour++; 
  }
}
 */

?>
</div>
</body>
</html>
