<?php

  //echo "<select name=time>";
  $hour=1;
  $minute=0.0;
  //echo '<option selected disabled value=NULL> </option>';

  for($o=1; $o<=12; $o++)
  {
    echo '<option value='.$hour.':'.$minute.'0>'.$hour.':'.$minute.'0</option>';
    $minute = $minute+30;
    echo '<option value='.$hour.':'.$minute.'>'.$hour.':'.$minute.'</option>';
    $minute = $minute-30;
    $hour++; 
  }
  echo "</select>";

?>
