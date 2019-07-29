<?php
date_default_timezone_set('Asia/Jakarta');

define('_HOST_NAME','localhost');
define('_DATABASE_NAME','gutbalan_sop');
define('_DATABASE_USER_NAME','root');
define('_DATABASE_PASSWORD','');
$connect = new mysqli(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME); 
 
// check connection 
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
}

function hapus($tabel, $col, $id){
global $connect;
$sql = $connect->query("DELETE FROM $tabel WHERE $col = $id");
if($sql){
	return true;
}else{
	return false;
}
}


// function kelasLama($time){
// 	$t = explode(':', $time);
// 	if($t[0]!='00'){
// 		$h = (int)$t[0];
// 		if($h>24){
// 			$tt = floor($h/24);
// 			return $tt.' hari';
// 		}
// 		return $t[0].' jam';
// 	}else if($t[1]!='00'){
// 		return $t[1].' menit';
// 	}else{
// 		return $t[2].' detik';
// 	}
// }
// function number_shorten($number, $precision = 0, $divisors = null) {
//     if (!isset($divisors)) {
//         $divisors = array(
//             pow(1000, 0) => '', // 1000^0 == 1
//             pow(1000, 1) => 'Rb', // Thousand
//             pow(1000, 2) => 'Jt+', // Million
//             pow(1000, 3) => 'M+', // Billion
//             pow(1000, 4) => 'T+', // Trillion
//         );    
//     }

//     foreach ($divisors as $divisor => $shorthand) {
//         if (abs($number) < ($divisor * 1000)) {
//             break;
//         }
//     }
//     return number_format($number / $divisor, $precision) . $shorthand;
// }

// function sumHasil($time){
// 	global $connect;
// 	if($time==0){
// 		$sql = $connect->query("SELECT SUM(bayar) as bayar FROM keluar WHERE DATE(waktu_out)=CURDATE()");
// 	}else if($time==1){
// 		$sql = $connect->query("SELECT SUM(bayar) as bayar FROM keluar WHERE MONTH(waktu_out) = MONTH(CURRENT_DATE()) AND YEAR(waktu_out) = YEAR(CURRENT_DATE())");
// 	}else if($time==2){
// 		$sql = $connect->query("SELECT SUM(bayar) as bayar FROM keluar");
// 	}
// 	$data = $sql->fetch_assoc();
// 	return $data['bayar'];
// }
// function countTag($tabel){
// global $connect;
// $sql = $connect->query("SELECT * FROM $tabel");
// $count = $sql->num_rows;
// return $count;
// }

// function countTags($tabel, $label, $id){
// global $connect;
// if (strpos($id, 'NOT') !== false) {
// 	$str = explode("NOT", $id);
// 	$id = $str[1];
// 	$sql = $connect->query("SELECT * FROM $tabel WHERE $label!='$id'");
// }else{
// 	$sql = $connect->query("SELECT * FROM $tabel WHERE $label='$id'");
// }
// $count = $sql->num_rows;
// return $count;
// }

function getPage($reload, $page, $tpages, $adjacents) {
	$prevlabel = "&lsaquo; Prev";
	$nextlabel = "Next &rsaquo;";
	$out = "<ul class=\"pagination\">\n";
	//$out ="";
	// previous
	if($page==1) {
		$out.= "<li class=\"disabled previous\"><a href=\"#\">" . $prevlabel . "</a></li >\n";
	}
	elseif($page==2) {
		$out.= "<li class=\"previous\"><a href=\"" . $reload . "\">" . $prevlabel . "</a></li >\n";
	}
	else {
		$out.= "<li class=\"previous\"><a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a></li >\n";
	}
	// first
	if($page>($adjacents+1)) {
		$out.= "<li ><a href=\"" . $reload . "\">1</a></li >\n";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class=\"disabled\"><a href=\"#\">...</a></li >\n";
	}
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class=\"active\"><a href=\"#\">" . $i . "</a></li >\n";
		}
		elseif($i==1) {
			$out.= "<li ><a href=\"" . $reload . "\">" . $i . "</a></li >\n";
		}
		else {
			$out.= "<li ><a href=\"" . $reload . "/page/" . $i . "\">" . $i . "</a></li >\n";
		}
	}
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class=\"disabled\"><a href=\"#\">...</a></li >\n";
	}
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li ><a href=\"" . $reload . "/page/" . $tpages . "\">" . $tpages . "</a></li >\n";
	}
	// next
	if($page<$tpages) {
		$out.= "<li class=\"next\"><a href=\"" . $reload . "/page/" . ($page+1) . "\">" . $nextlabel . "</a></li >\n";
	}
	else {
		$out.= "<li class=\"disabled next\"><a href=\"#\">" . $nextlabel . "</a></li >\n";
	}
	$out.= "</ul>";
	return $out;
}

function getPages($reload, $page, $tpages, $adjacents) {
	$prevlabel = "&lsaquo; Prev";
	$nextlabel = "Next &rsaquo;";
	$out = "<ul class=\"pagination\">\n";
	//$out ="";
	// previous
	if($page==1) {
		$out.= "<li class=\"disabled previous\"><a href=\"#\">" . $prevlabel . "</a></li >\n";
	}
	elseif($page==2) {
		$out.= "<li class=\"previous\"><a href=\"" . $reload . "\">" . $prevlabel . "</a></li >\n";
	}
	else {
		$out.= "<li class=\"previous\"><a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a></li >\n";
	}
	// first
	if($page>($adjacents+1)) {
		$out.= "<li ><a href=\"" . $reload . "\">1</a></li >\n";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class=\"disabled\"><a href=\"#\">...</a></li >\n";
	}
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class=\"active\"><a href=\"#\">" . $i . "</a></li >\n";
		}
		elseif($i==1) {
			$out.= "<li ><a href=\"" . $reload . "\">" . $i . "</a></li >\n";
		}
		else {
			$out.= "<li ><a href=\"" . $reload . "&amp;page=" . $i . "\">" . $i . "</a></li >\n";
		}
	}
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class=\"disabled\"><a href=\"#\">...</a></li >\n";
	}
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li ><a href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $tpages . "</a></li >\n";
	}
	// next
	if($page<$tpages) {
		$out.= "<li class=\"next\"><a href=\"" . $reload . "&amp;page=" . ($page+1) . "\">" . $nextlabel . "</a></li >\n";
	}
	else {
		$out.= "<li class=\"disabled next\"><a href=\"#\">" . $nextlabel . "</a></li >\n";
	}
	$out.= "</ul>";
	return $out;
}
?>