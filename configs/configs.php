<?php
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
	echo 'SMBPS:<br>';
	$config['username'] = $mysql_config["username"];
	$config['password'] = $mysql_config["password"];
	$config['hostname'] = $mysql_config["hostname"];
	$config['port'] = $mysql_config["port"];
	$config['name'] = $mysql_config["name"];
	
	echo '<br>';
	var_dump($config);
?>