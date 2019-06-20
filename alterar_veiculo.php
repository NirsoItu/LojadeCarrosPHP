<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><b>Editar Veiculo</b></title>
  </head>
  <body>
  <div class="w3-container" >

  <?php
    include "config.php";
    include "classVeiculo.php";
    
    $veiculo = new Carro( DB_STRING, DB_USER, DB_PASS);

   
    $alterar = @$_POST['codigo'];
    
    if($alterar != "" ){
    $veiculo->Setcodigo($_POST['codigo']);
    $veiculo->Setmodelo($_POST["modelo"]);
    $veiculo->Setmarca($_POST["marca"]);
    $veiculo->Setdescricao($_POST["descricao"]);
    $veiculo->Setportas($_POST["portas"]);
    $veiculo->Setano_fab($_POST["ano_fab"]);
    $veiculo->Setano_mod($_POST["ano_mod"]);
    $veiculo->Setcor($_POST["cor"]);
    $veiculo->Setkm($_POST["km"]);
    $veiculo->Setplaca($_POST["placa"]);
    $veiculo->Setvalor($_POST["valor"]);
    $veiculo->Setobs($_POST["obs"]);
    $veiculo->Setdtinclu(date("Y/m/d")); // data atual registrada automaticamente
    $veiculo->Setativo(isset($_POST["ativo"])? 1: 0);
    //$veiculo->Setfotonome1(base64_encode(file_get_contents($_FILES["fotonome1"]["tmp_name"])));
    $veiculo->Setfotonome1($_FILES["fotonome1"]["name"]);
    if( $veiculo->Alterar() )
    {
       echo "<script>alert('Veiculo alterado com sucesso!');</script>";
    }
    else
    {
      echo "Erro ao alterar !";
    }

    $ativado = $veiculo->Getativo() ? "Sim":"Não";

    
 echo"
<table>
    <th>Informações do Veiculo</th>
        <tr>
            <td>Codigo Veiculo: </td>
            <td>".$alterar."</td>
        </tr>
        <tr>
            <td>Modelo: </td>
            <td>".$veiculo->Getmodelo()."</td>
        </tr>
        <tr>
            <td>Marca: </td>
            <td>". $veiculo->Getmarca()."</td>
        </tr>
        <tr>
            <td>Descrição: </td>
            <td>".$veiculo->Getdescricao()."</td>
        </tr>
        <tr>
            <td>Portas: </td>
            <td>".$veiculo->Getportas()."</td>
        </tr>
        <tr>
            <td>Ano de Fabricação: </td>
            <td>".$veiculo->Getano_fab()."</td>
        </tr>
        <tr>
            <td>Ano do Modelo: </td>
            <td>".$veiculo->Getano_mod()."</td>
        </tr>
        <tr>
            <td>Cor: </td>
            <td>".$veiculo->Getcor()."</td>
        </tr>
        <tr>
            <td>KM: </td>
            <td>".$veiculo->Getkm()."</td>
        </tr>
        <tr>
            <td>Placa: </td>
            <td>".$veiculo->Getplaca()."</td>
        </tr>
        <tr>
            <td>Valor: </td>
            <td>".$veiculo->Getvalor()."</td>
        </tr>
        <tr>
            <td>Observação: </td>
            <td>".$veiculo->Getobs()."</td>
        </tr>
        <tr>
            <td>data da Inclusão: </td>
            <td>".$veiculo->Getdtinclu()."</td>
        </tr>  
        <tr>
            <td>Ativo: </td>
            <td>".$ativado."</td>
        </tr>
</table>";


echo '<img src="images/'.$veiculo->getfotonome1().'">';


echo "<p><a  href='consultar_veiculo.php'> <== Voltar</a></p>";

   }
   
else
   {
    $alt = @$_GET['id'];

if($alt != "" ){
    
   $veiculo = new Carro (DB_STRING, DB_USER, DB_PASS);
    if( $veiculo->Consultar($alt) )
      {
        ?>
        <form action="./alterar_veiculo.php?id=<?php echo $alt ?>" method="POST" enctype="multipart/form-data">
          <table>
            <th>Alterar Veiculo</th>
            <tr>
              <td><label><b>Código:</b> </label></td>
              <td><label><?php echo $alt ?></label><input type="hidden" name="codigo" value="<?php echo $alt ?>"></td>
            </tr>
            <tr>
              <td><label><b>Modelo:</b> </label></td>
              <td><input type="text" name="modelo" value="<?php echo $veiculo->getmodelo(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Marca:</b> </label></td>
              <td><input type="text" name="marca" value="<?php echo $veiculo->getmarca(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Descrição:</b> </label></td>
              <td><input type="text" name="descricao" value="<?php echo $veiculo->getdescricao(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Portas:</b> </label></td>
              <td><input type="number" name="portas" value="<?php echo $veiculo->getportas(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Ano de fabricação:</b> </label></td>
              <td><input type="text" name="ano_fab" maxlength="4" value="<?php echo $veiculo->getano_fab(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Ano do Modelo:</b> </label></td>
              <td><input type="text" name="ano_mod" maxlength="4" value="<?php echo $veiculo->getano_mod(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Cor:</b> </label></td>
              <td><input type="text" name="cor" value="<?php echo $veiculo->getcor(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Km: </b></label></td>
              <td><input type="number" name="km" value="<?php echo $veiculo->getkm(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Placa:</b> </label></td>
              <td><input type="text" name="placa" value="<?php echo $veiculo->getplaca(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Valor: </b></label></td>
              <td><input type="number" name="valor" value="<?php echo $veiculo->getvalor(); ?>" /></td>
            </tr>
            <tr>
              <td><label><b>Observação: </b></label></td>
              <td><textarea name="obs" rows="4" cols="50"><?php echo $veiculo->getobs(); ?></textarea></td>
            </tr>
            <tr>
              <td><label><b>Ativo: </b></label></td>
              <td><input type="checkbox" name="ativo" <?php  if($veiculo->getativo() == 1) echo "checked"; ?> value="<?php echo $veiculo->getativo();?>" /></td>
            </tr>
            <tr>
              <td><label><b>Foto: </b></label></td>
              <td><input type="file" name="fotonome1" accept="image/png,image/jpeg" value="<?php echo $veiculo->getfotonome1(); ?>" /></td>
            </tr>
            <tr><td><a href='consultar_veiculo.php'> <== Voltar</a> <input type="submit" name="alterar" value="Salvar"></td></tr>
          </table>
        </form>
        <?php echo '<img src="'.$veiculo->getfotonome1().'">';  ?>
      <?php 
       }
       else
       {
           echo "<script>alert('Código do veiculo inválido!');</script>";
           echo "<script>window.location = 'consultar_veiculo.php';</script>";
       }
    }
  }
?>
  </body>
</div>
</html>