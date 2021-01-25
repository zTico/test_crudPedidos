<?php

	require_once '../app_pizza/tarefa_controller.php';

	if(isset($_GET['ac']) && $_GET['ac'] == 'inse'){

		$sabor = $_POST['sabores'];
		$cliente = $_POST['cliente'];
		$entregador = $_POST['entregador'];
		$endereco = $_POST['endereco'];
		$bairro = $_POST['bairro'];
	
		
			$query = "insert into pedidos(id_sabores, nome_cliente, id_entregadores, endereco, id_bairro)
			values($sabor, '$cliente', $entregador, '$endereco', $bairro)";
			$conexao = new Conexao;
			$stmt = $conexao->conectar()->prepare($query);
			$stmt->execute();
			echo '<pre>';
			var_dump($stmt);

	}
	




?>