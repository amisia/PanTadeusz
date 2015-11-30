<?php
	$servername = "10.254.94.2";
	$database = "s174328";
	$username = "s174328";
	$password = "9311130874513";

	$connection = pg_connect("host=$servername port=5432 user=$username dbname=$database password=$password");

	if($connection){
		echo "Sukces!";

	}
	else{
		echo "buu";
	}
	
	$query = ("INSERT into reflectionspt (title, reflection) values ('".$_POST['title']."', '".$_POST['reflection']."');");

	$result = pg_query($connection, $query);
	
	if($result) {
		echo "Sukces!";
	}
	else {
		echo "buu";
	}

	$title=$_POST['title'];
	$reflection=$_POST['reflection'];

	$url = 'https://mandrillapp.com/api/1.0/messages/send.json';
	$params = [
		'message' => array(
			'subject' => $title,
			'text' => $reflection,
			'html' => '<p>'.$reflection.'</p>',
			'from_email' => 'uek@no-replay.com',
			'to' => array(
	  			array(
	    			'email' => 'wojcikk@wizard.uek.krakow.pl',
	    			'name' => 'AlaMakota'
	  			)
			)
		)
	];

	$params['key'] = '1G6Ee5e6hCDaJTiU4QVkgw';
	$params = json_encode($params);
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

	$head = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	header("Location: ".$_SERVER['HTTP_REFERER']);


