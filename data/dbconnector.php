<?php
    $host="127.0.0.1:3306";
    $user="root";
    $pass="";
    $dbname="kinbo.com";

    function executeSQL($sql){
        global $host, $user, $pass, $dbname, $port;

        $link=mysqli_connect($host, $user, $pass, $dbname);
        $result = mysqli_query($link, $sql);
        mysqli_close($link);

        return $result;
    }
?>
