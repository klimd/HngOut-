<html>
<head>
  <link rel=stylesheet type=text/css href=style.css>
  <title>My Events</title>

</head>
<body id=bodyContent>

  <div id=pageWrapper>
    
    <div id=navBarWrapper>

      <ul>
      <li id=navButtons><a href="homepage.php?dbid=<?php echo $_GET['dbid']; ?>" class=button>Home</a></li>
        <li id=navButtons><a href="createevent.php?dbid=<?php echo $_GET['dbid']; ?>" class=button>Create an Event</a></li>
        <li id=navButtons><a href="findevent.php?dbid=<?php echo $_GET['dbid']; ?>" class=button>Find an Event</a></li>
        <li class=dropdown>
          <a href='' class=dropbtn>Account</button>
          <div class=dropdown-content>
            <a href=index.php class=button>Logout</a>
            <a href=myevents.php class=button>My Events</a>
          </div>
        </li>
      </ul>

    </div>
    <hr><hr><hr><hr><hr>
    <h1 id=pageHeader>My Events</h1>

  </div>
<?php
  require_once "connect.php";
  $sql="SELECT * FROM events WHERE userId=".$_GET['dbid'];
  $result = mysqli_query($con, $sql);
?>

  <form name=editeventform method=POST>
    Event Name: <input type=text name=neweventname placeholder="Input new event name">
    <br><br>
    Event Description: <input type=text name=neweventdescription placeholder="Input new event description">
    <br><br>
    Event Location: <input type=text name=neweventlocation placeholder="Input new event location">
    <br><br>
    Event Type: <select name=neweventtype>
      <option selected disabled value=NULL></option>
      <option value='squash'>Squash</option>
      <option value='pool'>Pool</option>
      <option value='airhockey'>Air Hockey</option>
      <option value='soccer'>Soccer</option>
      <option value='frisbee'>Frisbee</option>
    </select>
    <br><br> 
    Event Time: <select value=null name=neweventtime><option selected disabled value=NULL></option><?php require_once "displayTime.php"; ?></select>
    Am or Pm?: <select name=newamorpm>
      <option selected disabled value=NULL></option>
      <option value=am>AM</option>
      <option value=pm>PM</option>
    </select>
    <br><br><br>
    <input type=submit name=submitchanges value=Submit>
    <br><br>
  </form>

<?php 

  if(isset($_POST['submitchanges']))
  {

    $eventid = $_GET['eventid'];

    if(isset($_POST['neweventname']))
    {
      $neweventname=$_POST['neweventname'];
      $sql="UPDATE `events` SET event_name='$neweventname' WHERE event_id=".$_GET['eventid'];
      $result=mysqli_query($con, $sql);
    }
    if(isset($_POST['neweventtype']))
    {
      $neweventtype=$_POST['neweventtype'];
      $sql="UPDATE `events` SET event_type='$neweventtype' WHERE event_id=".$_GET['eventid'];
      $result=mysqli_query($con, $sql);
    }
    if(isset($_POST['neweventdescription']))
    {
      $neweventdescription=$_POST['neweventdescription'];
      $sql="UPDATE `events` SET event_description='$neweventdescription' WHERE event_id=".$_GET['eventid'];
      $result=mysqli_query($con, $sql);
    }
    if(isset($_POST['neweventlocation']))
    {
      $neweventlocation=$_POST['neweventlocation'];
      $sql="UPDATE `events` SET event_location='$neweventlocation' WHERE event_id=".$_GET['eventid'];
      $result = mysqli_query($con, $sql);
    }
    if(isset($_POST['neweventtime']))
    {
      $neweventtime=$_POST['neweventtime']; 
      $sql="UPDATE `events` SET event_time='$neweventtime' WHERE event_id=".$_GET['eventid'];
      $result=mysqli_query($con, $sql);
    }
    if(isset($_POST['newamorpm']))
    {
      $newamorpm=$_POST['newamorpm'];
      $sql="UPDATE `events` SET event_amOrpm='$newamorpm' WHERE event_id=".$_GET['eventid'];
      $result=mysqli_query($con, $sql);
    } 
  }
?>
