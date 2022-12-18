<html>
<?php
include'temel.php';
include 'connect.php';
$id=$_GET["id"];
/* Form numarası*/
$sql="SELECT * FROM Dis_Servis_Formu where id=$id";
$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    $sonid=$row[0];
    echo "<tr>";
?>
    <form action="edittamam.php">

  <tr>
    <th> id</th><td><textarea type="text"style=font-size:30px id="fname" name="id"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> firma</th><td><textarea type="text"style=font-size:30px id="fname" name="firma"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> muracat_alan</th> <td><textarea type="text"style=font-size:30px id="fname" name="muracat_alan"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td>&emsp;&emsp;<br><br>
    <th> muracat_eden</th> <td><textarea type="text"style=font-size:30px id="fname" name="muracat_eden"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> muracat_alan_gorev<td><textarea type="text"style=font-size:30px id="fname" name="muracat_alan_gorev"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> <br><br>
    <th> tel</th> <td><textarea type="text"style=font-size:30px id="fname" name="tel"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> email</th> <td><textarea type="text"style=font-size:30px id="fname" name="id"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> <br><br>
    <th> musteri fatura_adres</th> <td><textarea type="text"style=font-size:30px id="fname" name="musteri fatura_adres"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> Vergi Dairesi</th> <td><textarea type="text"style=font-size:30px id="fname" name="Vergi Dairesi"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> <br><br>
    <th> vno</th> <td><textarea type="text"style=font-size:30px id="fname" name="vno"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makine_tipi</th> <td><textarea type="text"style=font-size:30px id="fname" name="makine_tipi"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makine_seri_no</th> <td><textarea type="text"style=font-size:30px id="fname" name="makine_seri_no"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makine_model</th> <td><textarea type="text"style=font-size:30px id="fname" name="makine_model"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makine_marka</th> <td><textarea type="text"style=font-size:30px id="fname" name="makine_marka"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makinetcs</th> <td><textarea type="text"style=font-size:30px id="fname" name="makinetcs"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makineytcs</th> <td><textarea type="text"style=font-size:30px id="fname" name="makineytcs"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> parola1</th> <td><textarea type="text"style=font-size:30px id="fname" name="parola1"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> parola2</th> <td><textarea type="text"style=font-size:30px id="fname" name="parola2"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makine_adres</th> <td><textarea type="text"style=font-size:30px id="fname" name="makine_adres"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> makine_atel</th><td><textarea type="text"style=font-size:30px id="fname" name="makineatel"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> saatsonra</th> <td><textarea type="text"style=font-size:30px id="fname" name="saatsonra"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> servistipi</th> <td><textarea type="text"style=font-size:30px id="fname" name="servistipi"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> calismasaati</th> <td><textarea type="text"style=font-size:30px id="fname" name="calısmasaati"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> ariza</th> <td><textarea type="text"style=font-size:30px id="fname" name="ariza"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> aciklamalar</th> <td><textarea type="text"style=font-size:30px id="fname" name="acıklamalar"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> oneriler</th> <td><textarea type="text"style=font-size:30px id="fname" name="oneriler"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
    <th> reg_date</th><td><textarea type="text"style=font-size:30px id="fname" name="reg_date"cols="20" rows="1" ><?php echo $row[0];?></textarea>&emsp;&emsp;</td> 
   </tr>

<?php
            }
?>
  <input type="submit" style=font-size:100px id="fname" value="Gönder" size="20"><br><br/><br/><br/>
