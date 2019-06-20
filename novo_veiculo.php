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
    <title>Novo veiculo</title>


  </head>
  <body>
  <div class="w3-container">
  <?php 
  include "config.php";
  include "classVeiculo.php";

  $veiculo = new Carro ( DB_STRING, DB_USER, DB_PASS);
  $quant = $veiculo->ultimoID();
  
  
if(isset($_GET['incluir']))		
{  
  
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
  $veiculo->Setdtinclu(date("Y-m-d")); // data atual registrada automaticamente
  $veiculo->Setativo(isset($_POST["ativo"])? 1: 0);
  //$veiculo->Setfotonome1(base64_encode(file_get_contents($_FILES["fotonome1"]["tmp_name"])));

  $veiculo->Setfotonome1($_FILES["fotonome1"]["name"]);

      $rsp = $veiculo->Incluir();
      if( $rsp ){
        echo "<script>alert('Cadastrado com Sucesso!');</script>";
        echo "<script>window.location = 'consultar_veiculo.php';</script>";
      }else{
        echo "<script>alert('Erro não foi cadastrado!');</script>";
        echo "<script>window.location = 'consultar_veiculo.php';</script>";
      }
}
?>
    <form action="./novo_veiculo.php?incluir" method="POST" enctype="multipart/form-data">
      <table>
        <th><b><h3>Incluir veiculo</h3></b></th>
        <tr>
              <td><label><b>Código:</b> </label></td>
              <td><label><?php echo $quant?></label></td>
            </tr>
        <tr>
          <td><label><b>Modelo:</b> </label></td>
          <td><input type="text" name="modelo" /></td>
        </tr>
        <tr>
          <td><label><b>Marca:</b> </label></td>
          <td><input type="text" name="marca" /></td>
        </tr>
        <tr>
          <td><label><b>Descrição:</b> </label></td>
          <td><input type="text" name="descricao" /></td>
        </tr>
        <td><label><b>Portas:</b> </label></td>
          <td><input type="number" name="portas" /></td>
        </tr>
        <tr>
          <td><label><b>Ano de Fabricação:</b> </label></td>
          <td><input type="text" name="ano_fab"  maxlength="4"/></td>
        </tr>
        <tr>
          <td><label><b>Ano do Modelo:</b> </label></td>
          <td><input type="text" name="ano_mod"  maxlength="4"/></td>
        </tr>
        <td><label><b>Cor:</b> </label></td>
          <td><input type="text" name="cor" /></td>
        </tr>
        <tr>
          <td><label><b>KM:</b> </label></td>
          <td><input type="number" name="km" /></td>
        </tr>
        <tr>
          <td><label><b>Placa:</b> </label></td>
          <td><input type="text" name="placa" /></td>
        </tr>
        <td><label><b>Valor:</b> </label></td>
          <td><input type="number" name="valor" /></td>
        </tr>
        <tr>
          <td><label><b>Observação:</b> </label></td>
          <td><textarea name="obs" rows="4" cols="50"></textarea></td>
        </tr>
        <td><label><b>Ativo:</b> </label></td>
          <td><input type="checkbox" name="ativo"/></td>
        </tr>
        <tr>
          <td><label><b>Foto 1:</b> </label></td>
          <td><input type="file" name="fotonome1" accept="image/png,image/jpeg" /></td>

        </tr>
        <tr><td><a type="button" class="btn btn-warning btn-sm" href='consultar_veiculo.php'>Voltar</a> <input type="submit" class="btn btn-primary btn-sm"value="Salvar"></td></tr>
      </table>
    </form>
  </body>
</div>
</html>