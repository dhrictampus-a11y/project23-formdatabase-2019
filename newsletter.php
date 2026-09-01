<?php
require 'credentials.php';

$eid = $_GET["eid"];
$approval ="Allowed";
$napproval="Not Allowed";

mysql_connect($host,$user,$password) or die(mysql_error());
mysql_select_db($database);
$query = "SELECT * FROM contact where id = '$eid'";
$res = mysql_query($query);

while ($row = mysql_fetch_array($res))
{
    $id =$row["approval"];
}

if($id == "Not Allowed")
{
    $queryupd = "UPDATE contact SET `approval`= '$approval' WHERE id = '$eid'";
    if(mysql_query($queryupd))
    {
        echo '<script>alert("Subscriber status changed to Allowed") </script>' ;
        //header('Location: messages.php');
        echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
    }
}
else
{
    $queryup ="UPDATE contact SET `approval`= '$napproval' WHERE id = '$eid' ";
    if(mysql_query($queryup))
    {
        echo '<script>alert("Subscriber status changed to Not Allowed") </script>' ;
	//header('Location: messages.php');
        echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
    }
}
?>

