<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con, 'hngout');

//Set variables
$event_id = $_GET['eventid'];
$dbid = $_GET['dbid'];

$sql = "DELETE FROM events WHERE event_id=".$event_id;
$result = mysqli_query($con, $sql);

echo "Success!";
echo "<meta http-equiv='refresh' content='0;URL=myevents.php?dbid=".$dbid."'>";
