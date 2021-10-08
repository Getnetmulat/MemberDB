<?php
    $link= new mysqli("localhost","Getnet","Getnet23","eprdf_mdb");
    $M = $_post['search'];
    //$query = "SELECT * FROM members
   // WHERE start_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";
    // Check database connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
$result = mysqli_query($link, "SELECT * FROM leader
    WHERE Sex LIKE '%{$M}%' OR Party LIKE '%{$M}%'");
while ($row = mysqli_fetch_array($result))
{
        echo $row['Sex'] . " " . $row['Party'];
        echo "<br>";
}
    mysqli_close($link);
    ?>