<html>
    <style>
img {
  max-width: 100%;
  max-height: 100%;
}
a:link {
  color: #000000; 
  background-color: #ffdc9b; 
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
  }
a:hover, a:active {
  background-color: #ffd381;
}
table, th, td {
  border:2px solid black;
}
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
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<head>
  <title>Data Table</title>
</head>
<body>
<?PHP
include'../temel/temel.html';
include'../php/connect.php';

$sql = "SELECT name, why, the_date FROM durum";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>name</th><th>why</th><th>date</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    for($i=0;$i<4;$i=$i+1){
    if ($i==0)
    echo "<tr><td>".$row["name"]."</td><td>".$row["why"]."</td><td>".$row["the_date"]."</td></tr>";
    }
            }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();



?>
</table>
</body>
</html>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
