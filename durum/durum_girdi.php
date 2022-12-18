
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>dürüm randevusu?</title>
</head>
  
<style>
.div1{
  background-color:#f5fffa;
  margin:10px;
  padding-right: 00px;
  padding-bottom: 20px;
  padding-left:25px;
        border: 3px solid #73AD21;}
.div2{
  background-color:#f5fffa;
  margin:10px;
  padding-top: 000px;
  padding-right: 000px;
  padding-bottom: 20px;
  padding-left:25px;
        border: 3px solid #73AD21;}
.div3{
  background-color:#f5fffa;
  margin:10px;
  padding-top: 000px;
  padding-right: 000px;
  padding-bottom: 20px;
  padding-left:0px;
        border: 3px solid #73AD21;}
/* Style the navbar */
.topnav {
  overflow: hidden;
  background-color: #dcffee;
}

/* Navbar links */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Navbar links on mouse-over */
.topnav a:hover {
  background-color: #008e49;
  color: black;
}

/* Active/current link */
.topnav a.active {
  background-color: #f5fffa;
  color: white;
}

/* Add responsiveness - On small screens, display the navbar vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc; 
  }
}
img {
  max-width: 100%;
  max-height: 100%;
}

.vertical-menu {
  width: 200px;
  height: 150px;
  overflow-y: auto;
}

a:link, a:visited {
  background-color: #a9ffd4;
  color: 000000;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
a:hover, a:active {
  background-color: #f5fffa;
}
  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 1rem;
  }

  label {
    font-size: 1rem;
    font-weight: bold;
  }

  textarea {
    font-size: 1.5rem;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
  }

  input[type="submit"] {
    font-size: 2rem;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.25rem;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
  }
</style>
<form action="durum_girdi.php">
<?PHP
include'../temel/temel.html';
include'../php/connect.php';
?>
<h1>Dürüm Randevusu</h1>
<form>
  <div class="form-group">
    <label for="name">İsim:</label>
    <textarea id="name" name="name" rows="2"></textarea>
  </div>
  <div class="form-group">
    <label for="why">Neden:</label>
    <textarea id="why" name="why" rows="2"></textarea>
  </div>
  <div class="form-group">
    <label for="the_date">Tarih:</label>
    <textarea id="the_date" name="the_date" rows="2"></textarea>
  </div>
  <input type="submit" value="Gönder">
</form>
  </nav>
<?PHP
// Değişkenleri Tanımlama
$name=$_GET["name"];
$why=$_GET["why"];
$the_date=$_GET["the_date"];

// Veri tabanına bilgileri işleme
$sql = "INSERT INTO durum (name,why,the_date) VALUES ('$name','$why','$the_date')";

// Veri tabanına bilgileri işleme

if ($conn->query($sql) === TRUE) {
    echo "<br>Veriler mySQL veri tabanına başarılı bir şekilde girildi.<br>";
} else {
    echo "<br>Bir sorun oluştu:<br>" . $sql . "<br><br>" . $conn->error;
}
?>
</DIV>
</BODY>
</HTML>