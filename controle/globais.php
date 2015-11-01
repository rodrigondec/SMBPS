<?php
	//AppFog MySQL
	// $services_json = json_decode(getenv("VCAP_SERVICES"),true);
 //    $mysql_config = $services_json["mysql-5.1"][0]["credentials"];
	// // Configurações do Projeto
	// define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	// define('TEMPLATES', ARQUIVOS.'/templates');
	// define('LOGIN', ARQUIVOS.'/login.php');
	// define('CONFIGS', ARQUIVOS.'/configs/configs.php');
	// define('PHPMYADMIN', ARQUIVOS.'/admin/index.php');

	// // Configurações do Banco de Dados OxE
	// define('DB_NAME', $mysql_config["name"]);
	// define('DB_USER', $mysql_config["username"]);
	// define('DB_PASS', $mysql_config["password"]);
	// define('DB_HOST', $mysql_config["hostname"]);
	// define('DB_PORT', $mysql_config["port"]);


	//XAMPP
	define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	define('BASE', 'smbps/');
	define('TEMPLATES', ARQUIVOS.'/'.BASE.'templates/');
	
	define('SOURCE', ARQUIVOS.'/'.BASE.'estaticos/source/');
	define('IMGS', '/'.BASE.'estaticos/source/imgs/');
	define('PROTOCOLOS', '/'.BASE.'estaticos/source/protocolos/');
	define('LOGIN', ARQUIVOS.'/'.BASE.'login.php');
	define('CONFIGS', ARQUIVOS.'/'.BASE.'configs/configs.php');
	
	define('ADMIN', '/'.BASE.'index.php/admin/');
	define('HOSPITAL', '/'.BASE.'index.php/hospital/');
	define('SISTEMA', '/'.BASE.'index.php/sistema/');



	define('DB_NAME', 'smbps');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_HOST', 'localhost'); //Windows

	define('LINK', mysql_connect(DB_HOST, DB_USER, DB_PASS));
	mysql_select_db(DB_NAME, LINK);
	mysql_set_charset('utf8', LINK);

	ob_start(); //Criando Buffer
	session_start();
	date_default_timezone_set('America/Recife');
	include_once('banco.php');
	include_once('functions.php');
	include_once(ARQUIVOS.'/'.BASE.'/estaticos/PHPMailer/PHPMailerAutoload.php');
?>