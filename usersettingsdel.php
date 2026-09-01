<?php

require 'credentials.php';
        
        mysql_connect($host,$user,$password) or die(mysql_error());
        mysql_select_db($database);
        
        $id = $_GET["eid"];
        $query = sprintf("DELETE FROM login WHERE id = $id");
        if(mysql_query($query))
        {
            echo' <script language="javascript" type="text/javascript"> alert("Deleted") </script>';
            mysql_close();
        }
        echo '<meta http-equiv="refresh" content="1; URL=usersettings.php" />';
?>

