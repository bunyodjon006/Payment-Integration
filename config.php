
<?php 
$dbhost = "localhost"; // Eslatma: Port qo'shish shart emas, agar u 3306 bo'lsa (standart MySQL porti).
$dbuser = "root";
$dbpass = "";
$dbname = "shopping";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
   die("Could not connect to the database: " . mysqli_connect_error());
}
?>
