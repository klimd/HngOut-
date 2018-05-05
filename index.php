<!DOCTYPE html>
<html>
<head>
<link rel=stylesheet type=text/css href=style.css>
<title>Welcome to Hngout!</title>
<?php
  $meaningOfLife=42; //Obligatory variable declaration
  if($meaningOfLife==42)
  {
    "I checked it very thoroughly and that quite definitely is the answer. I think the problem, to be quite honest with you, is that you've never actually known what the question is.";
  }
  session_start();
?>
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
	
    <h1 id=pageHeader>Welcome to HngOut!</h1><br />

  </div>
	<br><br><br>

	<div id=navDescription>
      <table>
		<tr>
			<td width="100px"></td>
			<td><img src="https://scontent-ord1-1.xx.fbcdn.net/hphotos-xaf1/t39.2365-6/851585_216271631855613_2121533625_n.png" width="50px"/></td>
			<td>
				<table>
				<tr><td id=navDo style="width: 250px"><b>Create an event</b></td></tr>
				<tr><td>that you have in mind</td></tr>
				</table>
		</tr><tr>
			<td width="100px"></td>
			<td><img src="https://scontent-ord1-1.xx.fbcdn.net/t39.2365-6/851565_602269956474188_918638970_n.png" width="50px"/></td>
			<td>
				<table>
				<tr><td id=navDo style="width: 250px"><b>Join events</b></td></tr>
				<tr><td>that others have planned</td></tr>
				</table>
		</tr><tr>
			<td width="100px"></td>
			<td><img src="https://scontent-ord1-1.xx.fbcdn.net/hphotos-xft1/t39.2365-6/851558_160351450817973_1678868765_n.png" width="50px"/></td>
			<td>
				<table>
				<tr><td id=navDo style="width: 250px"><b>Meet new friends</b></td></tr>
				<tr><td>on campus</td></tr>
				</table>
      </tr></table>
    </div>
	
    <div id=informationText>
      <h4>About the Creators:</h4>
      <p>We are a group of five students from Drexel University. For our final project for our Computing and Informatics 103 class we created this website. HngOut! is a web service that allows students to interact and plan events to attend with other students.</p>
    </div>
</body>
</html>
