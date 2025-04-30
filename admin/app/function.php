
<?php
function TanggalIndo($date, $type=null){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
    $HariIndo = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $BulanIndoShort = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nop", "Des");
          
    $hari = substr($date, 0, 10);
    $tahun = substr($date, 0, 4);
    $bulan = (substr($date, 5, 2))-1;
    $tgl   = substr($date, 8, 2);
    $jam   = substr($date, 11, 2).":".substr($date, 14, 2);
    if ($type=="shortmonth"){
        $result = $tgl . "-" . $BulanIndoShort[(int)$bulan] . "-". $tahun;
    } else {
        $result = $HariIndo[date('w',strtotime($hari))];
    }  
    return($result);
}

function Tanggal($date, $type=null){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
    $HariIndo = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $BulanIndoShort = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nop", "Des");
          
    $hari = substr($date, 0, 10);
    $tahun = substr($date, 0, 4);
    $bulan = (substr($date, 5, 2))-1;
    $tgl   = substr($date, 8, 2);
    $jam   = substr($date, 11, 2).":".substr($date, 14, 2);
    if ($type=="shortmonth"){
        $result = $tgl . "-" . $BulanIndoShort[(int)$bulan] . "-". $tahun;
    } else {
        $result = $tgl . " " . $BulanIndo[(int)$bulan] . " ". $tahun;
    }  
    return($result);
}
?>
