<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</HEAD>
<BODY>
<?PHP
// Değişkenleri Tanımlama
$firma=$_GET["firma"];
$muracat_alan=$_GET["muracat_alan"];
$muracat_eden=$_GET["muracat_eden"];
$muracat_alan_gorev=$_GET["muracat_alan_gorev"];
$tel=$_GET["tel"];
$email=$_GET["email"];
$musteri_fatura_adres=$_GET["musteri_fatura_adres"];
$vd=$_GET["vd"];
$vno=$_GET["vno"];
$makine_tipi=$_GET["makine_tipi"];
$makine_seri_no=$_GET["makine_seri_no"];
$makine_model=$_GET["makine_model"];
$makine_marka=$_GET["makine_marka"];
$makinetcs=$_GET["makinetcs"];
$makineytcs=$_GET["makineytcs"];
$parola1=$_GET["parola1"];
$parola2=$_GET["parola2"];
$makine_adres=$_GET["makine_adres"];
$makine_atel=$_GET["makine_atel"];
$saatsonra=$_GET["saatsonra"];
$servistipi=$_GET["servistipi"];
$calismasaati=$_GET["calismasaati"];
$ariza=$_GET["ariza"];
$aciklamalar=$_GET["aciklamalar"];
$parcano1=$_GET["parcano1"];
$parcaadi1=$_GET["parcaadi1"];
$parcaadet1=$_GET["parcaadet1"];
$parcano2=$_GET["parcano2"];
$parcaadi2=$_GET["parcaadi2"];
$parcaadet2=$_GET["parcaadet2"];
$parcano3=$_GET["parcano3"];
$parcaadi3=$_GET["parcaadi3"];
$parcaadet3=$_GET["parcaadet3"];
$parcano4=$_GET["parcano4"];
$parcaadi4=$_GET["parcaadi4"];
$parcaadet4=$_GET["parcaadet4"];
$parcano5=$_GET["parcano5"];
$parcaadi5=$_GET["parcaadi5"];
$parcaadet5=$_GET["parcaadet5"];
$parcano6=$_GET["parcano6"];
$parcaadi6=$_GET["parcaadi6"];
$parcaadet6=$_GET["parcaadet6"];
$parcano7=$_GET["parcano7"];
$parcaadi7=$_GET["parcaadi7"];
$parcaadet7=$_GET["parcaadet7"];
$parcano8=$_GET["parcano8"];
$parcaadi8=$_GET["parcaadi8"];
$parcaadet8=$_GET["parcaadet8"];
$parcano9=$_GET["parcano9"];
$parcaadi9=$_GET["parcaadi9"];
$parcaadet9=$_GET["parcaadet9"];
$parcano10=$_GET["parcano10"];
$parcaadi10=$_GET["parcaadi10"];
$parcaadet10=$_GET["parcaadet10"];
$oneriler=$_GET["oneriler"];
$tarih1=$_GET["tarih1"];
$calisanlar1=$_GET["calisanlar1"];
$baslangic1=$_GET["baslangıc1"];
$bitis1=$_GET["bitis1"];
$sure1=$_GET["sure1"];
$tarih2=$_GET["tarih2"];
$calisanlar2=$_GET["calisanlar2"];
$baslangic2=$_GET["baslangıc2"];
$bitis2=$_GET["bitis2"];
$sure2=$_GET["sure2"];
$tarih3=$_GET["tarih3"];
$calisanlar3=$_GET["calisanlar3"];
$baslangic3=$_GET["baslangic3"];
$bitis3=$_GET["bitis3"];
$sure3=$_GET["sure3"];
$tarih4=$_GET["tarih4"];
$calisanlar4=$_GET["calisanlar4 "];
$baslangic4=$_GET["baslangic4"];
$bitis4=$_GET["bitis4"];
$sure4=$_GET["sure4"];
$km1=$_GET["km1"];
$saat1=$_GET["saat1"];
$km2=$_GET["km2"];
$saat2=$_GET["saat2"];
// Değişkenleri Tanımlama

include'connect.php';

// Veri tabanına bilgileri işleme
$sql = "insert into Dis_Servis_Formu (id,firma,muracat_alan,muracat_eden,muracat_alan_gorev,tel,email,musteri_fatura_adres,vd,vno,makine_tipi,makine_seri_no,makine_model,makine_marka,makinetcs,makineytcs,parola1,parola2,makine_adres,makine_atel,saatsonra,servistipi,calismasaati,ariza,aciklamalar,oneriler,reg_date) VALUES (NULL,'$firma','$muracat_alan','$muracat_eden','$muracat_alan_gorev','$tel','$email','$musteri_fatura_adres','$vd','$vno','$makine_tipi','$makine_seri_no','$makine_model','$makine_marka','$makinetcs','$makineytcs','$parola1','$parola2','$makine_adres','$makine_atel','$saatsonra','$servistipi','$calismasaati','$ariza','$aciklamalar','$oneriler',CURRENT_TIMESTAMP)";

// Veri tabanına bilgileri işleme

if ($conn->query($sql) === TRUE) {
    echo "<br>Veriler veri tabanına başarılı bir şekilde girildi.<br>";
} else {
    echo "<br>Bir sorun oluştu:<br>" . $sql . "<br><br>" . $conn->error;
}

/* Form numarası*/

$sql="SELECT id FROM Dis_Servis_Formu ORDER BY id DESC LIMIT 1 ";
$result = mysqli_query($conn, $sql);

if ( $result) {
    echo "id sıralama başarılı";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
while ($row = mysqli_fetch_array($result)) {
            $sonid= $row['id'];
            echo $sonid;
        }

$sql = "insert into Parca (id, Dis_Servis_Formuid, parcano, parcaadi, parcaadet, reg_date) 
VALUES (NULL, '$sonid', '$parcano1','parcaadi1','$parcaadet1', CURRENT_TIMESTAMP)";
$conn->query($sql);
$sql = "insert into Calısanlar (id, Dis_Servis_Formuid, tarih,calisanlar,baslangic_saati,bitis_saati,sure, reg_date) 
VALUES (NULL, '$sonid', '$tarih1', '$calisanlar1','$baslangic1','$bitis1','$sure1', CURRENT_TIMESTAMP)";
$conn->query($sql);
$sql = "insert into Yol (id, Dis_Servis_Formuid, kilometre,saat, reg_date) 
VALUES (NULL, '$sonid', '$km1','$saat1', CURRENT_TIMESTAMP)";
$conn->query($sql);

?>
</DIV>
</BODY>
</HTML>