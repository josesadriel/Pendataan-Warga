<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'JANUARI',
		'FEBRUARI',
		'MARET',
		'APRIL',
		'MEI',
		'JUNI',
		'JULI',
		'AGUSTUS',
		'SEPTEMBER',
		'OKTOBER',
		'NOVEMBER',
		'DESEMBER'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

include("koneksi.php");
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
if (isset($_GET['nik']) && isset($_GET['noSurat'])) {
$surat = preg_replace('/[^a-zA-Z0-9\']/', '_', $_GET['surat']);
$surat = str_replace("'", '', $surat);
$lebur = explode("_", $surat);
$hasil = "";
for ($i = 0; $i < count($lebur); $i++) {
	$simpan = $lebur[$i];
    $hasil .= $simpan[0];
}
$nik = $_GET['nik'];
$cekNik = mysqli_query($db, "SELECT * FROM penduduk WHERE nik = '$nik'");
$html = "<center>
<table width='100%'>
<tr>
<td valign='middle' align='center' width='125px'>
<img src='img/logo-jaya-raya.png' style='max-width:80px'/>
</td>
<td align='center' valign='baseline'>
<h3 style='margin-left:-100px; margin-top:9px'><b>PEMERINTAH KOTA JAKARTA<br/>
KECAMATAN TANJUNG PRIOK<br/>
KELURAHAN SUNTER AGUNG<br/></b></h3>
</td>
</tr>
</table>
<hr style='border:3px solid #000'/>
<br/>
<b><u>SURAT PENGANTAR</u></b><br/>
Nomor: <span style='margin-left:60px; margin-right:100px'></span><br/>
</center>";
while($orang = mysqli_fetch_array($cekNik)) {
	$html .= "<p style='text-indent:60px'>Yang bertanda tangan dibawah ini kami Ketua RT " . $orang['rt'] . " RW " . $orang['rw'] ." menerangkan dengan sebenarnya bahwa yang bernama sebagai berikut:</p>
	<br/>
	<table width='100%'>
	<tr valign='top'>
	<td width='35%'>Nama</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['nama']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Tempat/Tanggal Lahir</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['tempatLahir']) . ", " . tgl_indo($orang['tglLahir']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Jenis Kelamin</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['gender']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Agama</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['agama']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Kewarganegaraan</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>INDONESIA</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>No KTP</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['nik']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Nomor Kartu Keluarga</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['no_kk']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Alamat</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['alamat']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>RT/RW</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . $orang['rt'] . "/" . $orang['rw'] . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%'>Pekerjaan</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . strtoupper($orang['pekerjaan']) . "</td>
	</tr>
	<tr valign='top'>
	<td width='35%' colspan='1' rowspan='2'>Maksud/Keperluan</td>
	<td width='25px'>:</td>
	<td style='border-bottom:1px dotted #000'>" . $_GET['surat'] . "</td>
	</tr>
	</table>
	<br/>
	<br/>
	<br/>
	<table>
	<tr>
	<td width='10px'>Nomor</td><td>:</td>
	</tr>
	<tr>
	<td width='10px'>Tanggal</td><td>:</td>
	</tr>
	</table>
	<br/>
	<br/>
	<br/>
	<table width='100%'>
	<tr valign='top'>
	<td align='center' width='50%'>
	Mengetahui,<br/>
	Pengurus RW 05<br/>
	Ketua
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	(..........................)
	</td>
	<td align='center' width='50%'>
	Jakarta, " . $_GET['tglSurat'] . "<br/>
	Pengurus RT " . $orang['rt'] . " RW " . $orang['rw'] ."<br/>
	Ketua
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	(..........................)
	</td>
	</tr>
	</table>";
}
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('surat-' . $nik . '_' . $hasil . '.pdf');
}
?>