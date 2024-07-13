<?php
try {
	$account_email = ''; // Login data.grandlyon.com (e-mail address)
	$account_pwd = ''; // Password data.grandlyon.com
	$url = "https://data.grandlyon.com/fr/datapusher/ws/rdata/tcl_sytral.tclparcrelaistr/all.json";
	
	$curlOpts = array(
        CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
        CURLOPT_USERPWD        => "$account_email:$account_pwd",     // HTTP auth user & pwd
		CURLOPT_RETURNTRANSFER => true,   // return web page
		CURLOPT_HEADER         => false,  // return headers
		CURLOPT_FOLLOWLOCATION => true,   // follow redirects
		CURLOPT_ENCODING       => "gzip, deflate, br, zstd",     // handle compressed
		CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
		CURLOPT_CONNECTTIMEOUT => 30,     // time-out on connect
		CURLOPT_TIMEOUT        => 30,     // time-out on response
	); 

	$ch = curl_init($url);
	curl_setopt_array($ch, $curlOpts);
	$content  = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	
	if($httpcode == 200) {
        header('Content-type: application/json');
		echo $content;
	} else {
		throw new Exception();
	}
} catch(Throwable $e) {
	http_response_code(404);
	echo "<div style='font-family: arial, sans-serif'>Not found</div>";
	exit();
}
?>