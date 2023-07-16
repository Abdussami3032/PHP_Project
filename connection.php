<?php
define("host",'localhost');
define("user",'root');
define("password",'');
define("db",'movie_tickets');

$conn=mysqli_connect(constant("host"),constant("user"),constant("password"),constant("db"));
if(!$conn)
{
    die("Error : ".mysqli_error($conn));
}

?>