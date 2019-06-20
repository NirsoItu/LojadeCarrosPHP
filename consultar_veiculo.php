<!DOCTYPE html>
<html>
<head>
<title>Indice Site Veiculos</title>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<div class="w3-container">

<h1 class="text-center">Listagem de Veículos</h1>
	
	
	<?php
	include "config.php";
	include "classVeiculo.php";


	$carro = new Carro( DB_STRING, DB_USER, DB_PASS);
	$quant = $carro->Contar();
	
	?> 

	<table class="table table-dark">
		<tr>
			<td><b>Código</b></td>
			<td><b>Modelo</b></td>
			<td><b>Marca</b></td>
      <td><b>Descrição</b></td>
      <td><b>Portas</b></td>
      <td><b>Ano de Fabricação</b></td>
      <td><b>Ano de Modelo</b></td>
      <td><b>Cor</b></td>
      <td><b>Km</b></td>
      <td><b>Placa</b></td>
      <td><b>Valor</b></td>
      <td><b>Observação</b></td>
      <td><b>Data de Inclusão</b></td>
      <td><b>Ativo</b></td>
      
      
		</tr>
<?php 
$pag = @$_GET['pag'];
if( $pag == "")		
	$pag = 1;
		
$limite = 20;
$inicio = ( ($pag-1) * $limite) ;	
$paginas = ceil($quant / $limite );		

$excluir = @$_GET['excluir'];
if( $excluir != "" )		
{
	$carro->Excluir($excluir);
	
}
		
// chama o método listar da classe
$result = $carro->ListarPag($inicio, $limite);

  // atraves do If checa se houve um retorno válido   
  if (isset($result))
  {
    while ($carro = $result->fetchObject())
    {   ?>
		<tr>
      <td><?php echo $carro->codigovei; ?></td>
			<td><?php echo $carro->modelo; ?></td>
      <td><?php echo $carro->marca; ?></td>
      <td><?php echo $carro->descricao; ?></td>
      <td><?php echo $carro->portas; ?></td>
      <td><?php echo $carro->ano_fab; ?></td>
      <td><?php echo $carro->ano_mod; ?></td>
      <td><?php echo $carro->cor; ?></td>
      <td><?php echo $carro->km; ?></td>
      <td><?php echo $carro->placa; ?></td>
      <td><?php echo $carro->valor; ?></td>
      <td><?php echo $carro->obs; ?></td>
      <td><?php echo $carro->dtinclu; ?></td>
      <td><?php echo $carro->ativo; ?></td>
     

        <td><a type="button" class="btn btn-warning btn-sm" href='alterar_veiculo.php?id=<?php echo $carro->codigovei; ?>'>Editar</a></td>
				<td><a type="button" class="btn btn-danger btn-sm" href='consultar_veiculo.php?excluir=<?php echo $carro->codigovei; ?>'>Excluir</a></td>
		</tr>
		<?php
	 /*
	 echo "<tr><td>".$user->usuarioId."</td>
	 			<td>".$user->nome."</td>
				<td> <a href='usuario.editar.php?id=$user->usuarioId'>Editar</a></td></tr>";
	 
	 	*/
    }
  }
  else
  {
      echo "<tr><td colspan='3'>Não há dados para listar!</td></tr>";
  }
  
?>


  </table>
  <div class="float-center">
  <b>Total de veículos:</b>
  <b font color="blue"><?php echo $quant;
  ?></b>
  </div>
  <div class="float-right">
  <br>
	<a type="button" class="btn btn-primary btn-sm" href="novo_veiculo.php">Novo Veículo</a>
  <a type="button" class="btn btn-secondary btn-sm" href="index.php">Pagina Inicial</a>
</div>

</body>
	
<div id="paginacao">
<br>
  <?php
	for( $i = 1; $i <= $paginas; $i++ )
	{
		echo "<span class='paginacao'><a href='./consultar_veiculo.php?pag=$i'>Página $i</a></span> ";
	}

   ?>
	
</div>	
</div>