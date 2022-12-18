<html>
<?php
include'temel.php';
?>
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
<title>
   One to One Servis Formları
</title>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<?PHP
include'connect.php';

?>
<table bgcolor="#ffeece" id="myTable">
  <tr>
    <th> Edit Links</th> 
    <th> id</th> 
    <th> firma</th>
    <th> muracat_alan</th> 
    <th> muracat_eden</th> 
    <th> muracat_alan_gorev
    <th> tel</th> 
    <th> email</th> 
    <th> musteri fatura_adres</th> 
    <th> Vergi Dairesi</th> 
    <th> vno</th> 
    <th> makine_tipi</th> 
    <th> makine_seri_no</th> 
    <th> makine_model</th> 
    <th> makine_marka</th> 
    <th> makinetcs</th> 
    <th> makineytcs</th> 
    <th> parola1</th> 
    <th> parola2</th> 
    <th> makine_adres</th> 
    <th> makine_atel</th> 
    <th> saatsonra</th> 
    <th> servistipi</th> 
    <th> calismasaati</th> 
    <th> ariza</th> 
    <th> aciklamalar</th> 
    <th> oneriler</th> 
    <th> reg_date</th>
    <th> Ekstralar Links</th>
    <th> PDF Links</th>
   </tr>
<?PHP
while ($row = mysqli_fetch_array($result)) {
    $sonid=$row[0];
    echo "<tr>";
    for($i=0;$i<28;$i=$i+1){
    if ($i==0)
    echo "<td><a class=\"btn btn-warning\" href=\""."edit.php?id=".$row['id']."\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a></td>";
    if ($i==27){
    echo "<td><a href=\"ekstra.php?id=".$row[$i]."\" target=\"_blank\">".$row[$i]."</a></td>"; 
    echo "<td><a href=\"pdf.php?id=".$row[$i]."\" target=\"_blank\">".$row[$i]."</a></td>"; 
    }
    else
    echo "<td>".$row[$i]."</td>";
    }echo "</tr>";
            }
?>
</table>
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