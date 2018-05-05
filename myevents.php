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
            <a href="index.php" class=button>Logout</a>
            <a href="myevents.php?dbid=<?php echo $_GET['dbid']; ?>" class=button>My Events</a>
          </div>
        </li>
      </ul>

    </div>
    <hr><hr><hr><hr><hr>
    <h1 id=pageHeader>My Events</h1>

  </div>

  <div id=informationText>
    <h1>My Events:</h1>
    <p>
      <?php
        $con=mysqli_connect('localhost','root','') or die (mysqli_error()); 
        mysqli_select_db($con, 'hngout') or die ("Could not select database");
         
        $result=mysqli_query($con, "SELECT * FROM events WHERE userId=".$_GET['dbid']);

        $numRows=mysqli_num_rows($result); 

        if($numRows>0)
        {
          $i=1;
          while($row=mysqli_fetch_assoc($result))
          {
            echo $i."."." <strong>Event Name: </strong>".$row['event_name']."&nbsp | &nbsp <strong>Event Type: </strong>".$row['event_type']."&nbsp | &nbsp <strong>Event Time: </strong>".$row['event_time'].$row['event_amOrpm']."&nbsp | &nbsp <strong>Event Location: </strong>".$row['event_location']."<br>";
            echo "<a href = 'editevent.php?eventid=".$row['event_id']."&dbid=".$_GET['dbid']."'>Edit Event</a>";
            echo "&nbsp &nbsp";
            echo "<a href = 'deleteevent.php?eventid=".$row['event_id']."&dbid=".$_GET['dbid']."'>Delete Event</a>";
            echo "<br><br>";
            $i++;
          }
        } 
      ?>
    </p>
</body>
</html>
