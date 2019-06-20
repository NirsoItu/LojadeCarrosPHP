<?php
    define('BASE_URL', 'http://localhost/');
			
	define("DB",'mysql');
	define("DB_NAME","carros"); 	// nome do banco de dados
	define("DB_HOST","localhost");  // endereço do servidor
	define('DB_USER', 'root');		// nome do usuário do mysql
	define('DB_PASS', '');			// senha do usuário

	define('DB_STRING', DB.':host='.DB_HOST.';dbname='.DB_NAME);
?>