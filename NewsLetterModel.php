<?php
require 'Entity/NewsLetterEntity.php';

class NewsLetterModel {
    
    function InsertNewsLetters(NewsLetterEntity $news)
    {
        require 'credentials.php';
        
        mysql_connect($host,$user,$password) or die(mysql_error());
        mysql_select_db($database);
        $query = sprintf("INSERT INTO newsletterlog(title,subject,news)VALUES('%s','%s','%s')",
                mysql_real_escape_string($news->title),
                mysql_real_escape_string($news->subject),
                mysql_real_escape_string($news->news));
        if(mysql_query($query))
        {
            echo "<script type='text/javascript'> alert('NewsLetter has been sent')</script>";
            mysql_close();
        }
        else
        {
            echo "<script type='text/javascript'> alert('Something might not right')</script>";
        }
    }
}
