<html>
	<head>
		<title> MEU CEP </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>
	<body> 
		<form action="index.php" method="post">
			<div class= "container text-left">
			<label> Insira o CEP: </label>
			<input type="text" name="cep">
			<input type="submit" class="btn btn-primary" value="Enviar">
			</div>
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</body>
</html>

<?php
require_once('Address.php');

//Melhorias sugeridas
//1 - Separar o formulário do código PHP em 2 arquivos, um com frontend e outro com banckend
//2 - Limitar a quantidade de caracteres do campo "cep"
//2 - Adicionar validação na busca para mostrar uma mensagem pro usuário caso o CEP não exista
//3 - Mudar a chamada da API de XML para JSON, por ser mais rápido, de fácil compreensão e menos suscetível a erros.
//https://viacep.com.br/ws/$cep/json/

if(!empty($_POST['cep'])){
	
	$cep = $_POST['cep'];

	$addressObj = new Address();
	$address = $addressObj->get_address($cep);
	echo "<div class= 'container card text-left'>";
	echo "<div class= 'card-header'>";
	echo "<h4>Endereço</h4>";
	echo "</div>";
	echo "<ul class= 'list-group list-group-flush'>";
	echo "<li class='list-group-item'>CEP Informado: $cep </li>";
	echo "<li class='list-group-item'>Rua: {$address->logradouro} </li>";
	echo "<li class='list-group-item'>Bairro: {$address->bairro} </li>";
	echo "<li class='list-group-item'>Estado: {$address->uf} </li>";
	echo "</ul>";
	echo "</div>";
}

?>