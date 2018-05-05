<!DOCTYPE html>
<html>
<head>
<link rel=stylesheet type=text/css href=style.css>
<title>Find an Event</title>
</head>

  <body id=bodyContent> 

    <div id=pageWrapper>

      <div id=navBarWrapper>
      <?php
        $dbid=$_GET['dbid'];
      ?>
        <ul>
        <li id=navButtons><a href="homepage.php?dbid=<?php echo $dbid; ?>" class="button">Home</a></li>
          <li id=navButtons><a href="createevent.php?dbid=<?php echo $dbid; ?>"  class="button">Create an Event</a></li>
          <li id=navButtons><a href="findevent.php?dbid=<?php echo $dbid; ?>"  class="button">Find an Event</a></li> 
          <li class=dropdown>
            <a href=index.php class="button">Account</a>
            <div class="dropdown-content">
              <a href="index.php" class=button>Logout</a>
              
              <a href="myevents.php?dbid=<?php echo $dbid;?>" class=button>My Events</a> 
          </li>
        </ul>
      </div>
      <hr><hr><hr><hr><hr>

<h1 id=loginPageHeader>Current Events</h1>
<div id=EventpageWrapper> <br>
<form action="" method="POST">
Event Type: <select name="eventType">
  <option value="-----">-----</option>
  <option value="squash">Squash</option>
  <option value="pool">Pool</option>
  <option value="airhockey">Air Hockey</option>
  <option value="soccer">Soccer</option>
  <option value="frisbee">Frisbee</option>
</select>
<br /><br />
</div>
<br /><br />
<input type="submit" value="Find Events" name="submit">
<br /><br />
</form>
</div>
<div id=informationText>
<?php
if(isset($_POST['submit']))
{
  $con=mysqli_connect('localhost','root','') or die (mysqli_error());
  mysqli_select_db($con, 'hngout') or die ("cannot select db");

  $eventType=$_POST['eventType'];

  $query=mysqli_query($con, "SELECT * FROM `events` WHERE event_type='".$eventType."'");

  if(mysqli_num_rows($query)>0)
  {
    echo "<h1>Avaliable Events:</h1>";
    $i=1;
    while($row=mysqli_fetch_assoc($query))
    {
      echo $i."."." <strong>Event Name: </strong>".$row['event_name']."&nbsp | &nbsp <strong>Event Type: </strong>".$row['event_type']."&nbsp | &nbsp <strong>Event Time: </strong>".$row['event_time'].$row['event_amOrpm']."&nbsp | &nbsp <strong>Event Location: </strong>".$row['event_location']."&nbsp | &nbsp";

      $query=mysqli_query($con, "SELECT uniEmail FROM login WHERE id=".$row['userId']);
      $lrow=mysqli_fetch_assoc($query);
      echo "<strong>Contact Email: </strong>".$lrow['uniEmail']."<br><br>";
      $i++;
    }
  } 
}
?>
</div>
</body>
</html>
