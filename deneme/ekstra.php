<html>
<?php
include'temel.php';
?>
<style>
.div1{
  text-align: center;
  align: center;
  background-color:#ffe5b4;
  margin:10px
  padding-right: 00px;
  padding-bottom: 00px;
  padding-left:25px;
  border: 3px solid #ffd381;
  border-radius: 5px;
}
.div2{
  text-align: center;
  align: center;
  background-color:#ffe5b4;
}
table, th, td {
  border:1px solid black;
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
  background-color: #ffd381;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
a:hover, a:active {
  background-color: #ffd381;
}
#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 15%; /* Full-width */
  font-size: 20px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}

table, th, td {
  border:2px solid black;
}
a:link {
  color: #000000; 
  background-color: #ffdc9b; 
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
  background-color: #ffd381;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
a:hover, a:active {
  background-color: #ffd381;
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
  background-color: #ffe5b4;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
a:hover, a:active {
  background-color: #ffd381;
}
}

</style>
<title>
   Ekstralar
</title>
<body style="background-color: #ffe5b4 ; font-family:verdana;font-size:20px;">
<?PHP
include'connect.php';
?>

<table>
<table bgcolor="#ffeece">
  <tr>
<th>id
<th> Dis_Servis_Formuid</th> 
<th> parcano</th> 
<th> parcaadi</th> 
<th> parcaadet</th> 
<th> reg_date</th> <br><br>
<?PHP
/* Form numarası*/
$sql="SELECT * FROM Parca ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    $veri=$row[0];
    echo "<tr>";
    for($i=0;$i<6;$i=$i+1){
    echo "<td>".$row[$i]."</td>";
            }}
?>
<table>
<table bgcolor="#ffeece">
  <tr>	
<th>id</th>
<th>Dis_Servis_Formuid</th>
<th>kilometre</th>
<th>saat</th>
<th>reg_date</th> <br><br>
 
<?PHP
/* Form numarası*/
$sql="SELECT * FROM Yol ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    $sonid=$row[0];
    echo "<tr>";
    for($i=0;$i<6;$i=$i+1){
    echo "<td>".$row[$i]."</td>";
            }}
?>
<table>
<table bgcolor="#ffeece">
  <tr>
    <th>id</th>
    <th>Dis_Servis_Formuid</th>
    <th>tarih</th> 
    <th>calisanlar</th>
    <th>baslangic_saati</th> 
    <th>bitis_saati</th> 
    <th>sure</th> 
    <th>reg_date</th> <br><br>
<?PHP
/* Form numarası*/
$sql="SELECT * FROM Calisanlar ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    $sonid=$row[0];
    echo "<tr>";
    for($i=0;$i<6;$i=$i+1){
    echo "<td>".$row[$i]."</td>";
            }}
?>
