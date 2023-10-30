<?php

function userLogin() {
    $db = \Config\Database::connect();
    return $db->table('users')->where('id_user', session('id_user'))->get()->getRow();
}

function format_tgl($tgl)
{
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;       
}

function getLink($segment) {
    $db = \Config\Database::connect();
    $sub_menu = $db->table('menu')->getWhere(['link' => $segment]);
    if ($sub_menu->resultID->num_rows > 0) {
        $sm = $sub_menu->getRow();
        if ($sm->id_parent > 0) {
            $menu = $db->table('menu')->getWhere(['id_menu' => $sm->id_parent])->getRow();
            $link = $menu->link;
        } else {
            $link = $segment;
        }
    } else {
        $ex = explode('/', $segment);
        $segment_1 = $ex[0];
        if (isset($ex[3])) {
            $linksegment = $segment_1.'/'.$ex[1].'/'.$ex[2];
            $sub_menu = $db->table('menu')->getWhere(['link' => $linksegment]);
            if ($sub_menu->resultID->num_rows > 0) {
                $sm = $sub_menu->getRow();
                if ($sm->id_parent > 0) {
                    $menu = $db->table('menu')->getWhere(['id_menu' => $sm->id_parent])->getRow();
                    $link = $menu->link;
                } else {
                    $link = $linksegment;
                }
            } else {
                $link = site_url('beranda');
            }
            
        }else {
            $sub_menu = $db->table('menu')->getWhere(['link' => $segment_1]);
            if ($sub_menu->resultID->num_rows > 0) {
                $sm = $sub_menu->getRow();
                if ($sm->id_parent > 0) {
                    $menu = $db->table('menu')->getWhere(['id_menu' => $sm->id_parent])->getRow();
                    $link = $menu->link;
                } else {
                    $link = $segment_1;
                }
            } else {
                $link = site_url('beranda');
            }
            
        }
    }
    return $link;
}

function sensor($teks){
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM sensorkomentar");
    foreach ($query->getResult() as $r) {
        $teks = str_replace($r->kata, $r->ganti, $teks);       
    }
    return $teks;
}

function getBulan($bln){
    switch ($bln){
        case 1: 
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Agu";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Okt";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Des";
            break;
    }
}


function hari_ini($w){
    $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $hari_ini = $seminggu[$w];
    return $hari_ini;
}

function cek_terakhir($datetime, $full = false) {
    $today = time();    
    $createdday= strtotime($datetime); 
    $datediff = abs($today - $createdday);  
    $difftext="";  
    $years = floor($datediff / (365*60*60*24));  
    $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
    $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
    $hours= floor($datediff/3600);  
    $minutes= floor($datediff/60);  
    $seconds= floor($datediff);  
    //year checker  
    if($difftext=="")  
    {  
      if($years>1)  
       $difftext=$years." Tahun";  
      elseif($years==1)  
       $difftext=$years." Tahun";  
    }  
    //month checker  
    if($difftext=="")  
    {  
       if($months>1)  
       $difftext=$months." Bulan";  
       elseif($months==1)  
       $difftext=$months." Bulan";  
    }  
    //month checker  
    if($difftext=="")  
    {  
       if($days>1)  
       $difftext=$days." Hari";  
       elseif($days==1)  
       $difftext=$days." Hari";  
    }  
    //hour checker  
    if($difftext=="")  
    {  
       if($hours>1)  
       $difftext=$hours." Jam";  
       elseif($hours==1)  
       $difftext=$hours." Jam";  
    }  
    //minutes checker  
    if($difftext=="")  
    {  
       if($minutes>1)  
       $difftext=$minutes." Menit";  
       elseif($minutes==1)  
       $difftext=$minutes." Menit";  
    }  
    //seconds checker  
    if($difftext=="")  
    {  
       if($seconds>1)  
       $difftext=$seconds." Detik";  
       elseif($seconds==1)  
       $difftext=$seconds." Detik";  
    }  
    return $difftext;  
}
?>