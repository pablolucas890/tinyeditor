<?php
	
	$op1 = "localhost";
	$op2 = "localhost:3308";
	$op3 = "localhost:3306";

	$servername = $op1; //server -- a porta TCP/IP pode variar, se na sua maquina estiver dando erro, altere entre op1, op2 e op3, alguma dessas funcionará
	$username = "novousuario";	//usuario -- varia em cada configuracao
	$password = "password";	//senha -- varia em cada configuracao
	$dbname = "db_tinyeditor";

	// Cria a conexao
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Checa a conexao
	if (!$conn) {
	    die("A conexão falhou: " . mysqli_connect_error());
	}
?>