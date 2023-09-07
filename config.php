

<?php 

$host = "localhost";
$user = "root";
$password="";
$dbname = "mailer";

$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){

    die("invalid database connection". mysqli_connect_errno());
}

?>