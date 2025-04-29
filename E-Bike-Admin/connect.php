
                <!-- DATABASE CONNECTION CODE -->



                <?php
$host='localhost';
$user='root';
$pass='';
$dbname='account';
$conn=mysqli_connect($host,$user,$pass,$dbname);
if($conn)
{
    echo "."."<br>";
}
else
{
    echo "could not connect"."<br>";
}
?>