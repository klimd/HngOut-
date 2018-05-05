<html>
  <head><title>Welcome to HngOut!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body id=bodyContent> 

    <div id=pageWrapper>

      <div id=navBarWrapper>

        <?php
          $dbid=htmlspecialchars($_GET['dbid']);
        ?>

        <ul>
          <li id=navButtons><a href=homepage.php?dbid=<?php echo $dbid;?> class="button">Home</a></li>
          <li id=navButtons><a href=createevent.php?dbid=<?php echo $dbid;?> class="button">Create an Event</a></li>
          <li id=navButtons><a href=findevent.php?dbid=<?php echo $dbid;?> class="button">Find an Event</a></li>
          <li class=dropdown>
            <a href='' class=dropbtn>Account</button>
            <div class=dropdown-content>
              <a href="index.php" class=button>Logout</a>

              <a href=myevents.php?dbid=<?php echo $dbid;?> class=button>My Events</a>
            </div>
          </li>
          <!--<li id=navButtons style="float: right"><a href=index.php class="button">Logout</a></li>-->
        </ul>

      </div>
      <hr><hr><hr><hr><hr>
      <h1 id=pageHeader>Welcome to HngOut!</h1>
      <p style="color:white">Hey! This is HngOut!<br>With HngOut, you can connect with other students to create events around campus or find existing ones.<p>
      <br>
    </div>
	<div id=informationText>
		<!-- Maybe make these stylized buttons or something? Probably remove explanitory text -->
        <h1><a href=createevent.php?dbid=<?php echo $dbid;?>>Create an Event</a></h1>
        <p>To create an event, click on the 'Create an Event' link on the top of the page. From there, fill in the form and press submit and you've registered an event on HngOut!</p>
        <h1><a href=findevent.php?dbid=<?php echo $dbid;?>>Join an Event</a></h1>
        <p>To join an already existing event, click on 'Find an Event'. On that page, search for events that you'd like to join. If you'd like to join the event, click on the 'I'm going' button and presto! You've joined an event.</p>
      </div>
      <br>
  </body>
</html>
