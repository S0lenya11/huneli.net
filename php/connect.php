<?PHP
// Server ismi:
$servername = "localhost";
$username = "u800995683_huneli";
$password = "Metin2006";
$dbname = "u800995683_durum";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Veri Tabanına bağlanılamadı. Bir sorun var." . $conn->connect_error);
}
echo "<br/><br/>Veri Tabanına Bağlanıldı."."<br><br>";
/* Form numarası*/
$sql="SELECT * FROM u800995683_durum.durum ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>