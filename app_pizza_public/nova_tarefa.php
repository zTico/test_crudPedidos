<?php 
require "tarefa_controller.php"; 
function recuperar($column) { //read
	$query = "
		select 
			*
		from 
		$column
			
		";
	$conexao = new Conexao;
	$stmt = $conexao->conectar()->prepare($query);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema de pedidos</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Sistema de pedidos
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo Pedido</h4>
								<hr />

								<form action="tarefa_controller.php?ac=inse" method="POST">

								<div class="form-group">
								<label >Sabor</label>
									<select class="form-control" name="sabores">

									<?php 
									$recu = recuperar('sabores');

									foreach ($recu as $key => $value) { ?>

									<option value="<?php echo $value->id ?>"> <?php echo $value->nome ?> </option>
										
								<?php } ?>
								
									
										
									</select>
									<div class="form-group">
										<label>Nome do cliente</label>
										<input type="text" class="form-control" name="cliente">
									</div>

									<div class="form-group">
								<label for="exampleFormControlSelect1">Entregador</label>
									<select class="form-control" name="entregador">
										<option>selecione</option>
										
										<?php 

									
									$recu = recuperar('entregadores');

									foreach ($recu as $key => $value) { ?>

									<option value="<?php echo $value->id ?>"> <?php echo $value->nome ?> </option>
										
								<?php } ?>

									</select>

								<div class="form-group">
										<label>Endereço</label>
										<input type="text" class="form-control" name="endereco" placeholder="Exemplo: Rua das violetas">
								</div>

								<div class="form-group">
								<label >Bairro</label>
									<select class="form-control" name="bairro">
										<option>Selecione</option>
										<?php 

									
									$recu = recuperar('bairros');

									foreach ($recu as $key => $value) { ?>

									<option value="<?php echo $value->id ?>"> <?php echo $value->nome ?> </option>
										
								<?php } ?>
									</select>
									
									<br>
									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>