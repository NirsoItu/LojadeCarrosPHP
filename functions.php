<?php
function fotoexiste( $arquivo )
{
//   echo "**".BASE_URL.'/'.$arquivo."**";
//   if (file_exists ( $_SERVER{'DOCUMENT_ROOT'}.'/'.$arquivo ) and $arquivo != "" )	 

//	  return $arquivo;
   if ( file_exists ( $arquivo ) and $arquivo != "" )	 
      {
	  return $arquivo;
	  }
   else
      {
	   return "imagens/logo_semfoto.jpg";  
	  }
}

function deleta_arquivo( $arquivo )
{
   if ( file_exists ( $arquivo ) )
      {
	  unlink( $arquivo );	  
	  return true;
	  }
   else
      {
	   return false;  
	  }
}



function Moeda($valor) {
	$valstr = number_format($valor,2,',','.');
	return $valstr;
}

function Reduz($string,$maxwords) {
	$words = explode(' ',$string);
	$numwords = count($words);
	if ($numwords > $maxwords) {
		for ($i=0;$i<$maxwords;$i++) {
			$text .= ' '.$words[$i];
		}
		return trim($text).'...';
	} else {
		return trim($string);
	}
}

function DataExtenso($stamp) {
	$sem = date('N',$stamp);
	$mes = date('m',$stamp);
	switch($sem) {
		case '1':
			$semExt = 'Segunda-feira';
		break;
		case '2':
			$semExt = 'Terça-feira';
		break;
		case '3':
			$semExt = 'Quarta-feira';
		break;
		case '4':
			$semExt = 'Quinta-feira';
		break;
		case '5':
			$semExt = 'Sexta-feira';
		break;
		case '6':
			$semExt = 'Sábado';
		break;
		case '7':
			$semExt = 'Domingo';
		break;
	}
	switch($mes) {
		case '01':
			$mesExt = 'janeiro';
		break;
		case '02':
			$mesExt = 'fevereiro';
		break;
		case '03':
			$mesExt = 'março';
		break;
		case '04':
			$mesExt = 'abril';
		break;
		case '05':
			$mesExt = 'maio';
		break;
		case '06':
			$mesExt = 'junho';
		break;
		case '07':
			$mesExt = 'julho';
		break;
		case '08':
			$mesExt = 'agosto';
		break;
		case '09':
			$mesExt = 'setembro';
		break;
		case '10':
			$mesExt = 'outubro';
		break;
		case '11':
			$mesExt = 'novembro';
		break;
		case '12':
			$mesExt = 'dezembro';
		break;
	}
	return "$semExt, ".date('d',$stamp)." de $mesExt de ".date('Y',$stamp)." - ".date('H:i',$stamp);
}
	
function FormataCep($cep) {
	return substr($cep,0,5).'-'.substr($cep,5,3);
}
	
function FormataFone($fone) {
	return '('.substr($fone,0,2).') '.substr($fone,2,4).' '.substr($fone,6,4);
}

function Redir($pag) {
	echo "<script type=\"text/javascript\">";
	echo "window.open(\"".$pag."\",\"_self\");";
	echo "</script>";
	exit;
}

function Go($pag) {
	//header('Location: '.$pag);
   echo "<script>
        window.location.href ='$pag';
    </script>";

//   echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=$pag'>";
exit;
}



function print_array($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function validaCNPJ($cnpj) { 

//	$cnpj = preg_replace ("@[./-]@", "", $cnpj);

    if (strlen($cnpj) <> 18) return 0; 
    $soma1 = ($cnpj[0] * 5) + 

    ($cnpj[1] * 4) + 
    ($cnpj[3] * 3) + 
    ($cnpj[4] * 2) + 
    ($cnpj[5] * 9) + 
    ($cnpj[7] * 8) + 
    ($cnpj[8] * 7) + 
    ($cnpj[9] * 6) + 
    ($cnpj[11] * 5) + 
    ($cnpj[12] * 4) + 
    ($cnpj[13] * 3) + 
    ($cnpj[14] * 2); 
    $resto = $soma1 % 11; 
    $digito1 = $resto < 2 ? 0 : 11 - $resto; 
    $soma2 = ($cnpj[0] * 6) + 

    ($cnpj[1] * 5) + 
    ($cnpj[3] * 4) + 
    ($cnpj[4] * 3) + 
    ($cnpj[5] * 2) + 
    ($cnpj[7] * 9) + 
    ($cnpj[8] * 8) + 
    ($cnpj[9] * 7) + 
    ($cnpj[11] * 6) + 
    ($cnpj[12] * 5) + 
    ($cnpj[13] * 4) + 
    ($cnpj[14] * 3) + 
    ($cnpj[16] * 2); 
    $resto = $soma2 % 11; 
    $digito2 = $resto < 2 ? 0 : 11 - $resto; 
    return (($cnpj[16] == $digito1) && ($cnpj[17] == $digito2)); 
} 


function ValidaSenha($senha,$conf) {
	if (strlen($senha) > 3) {
		if ($senha == $conf) {
			return true;
		} else {
			Erro('A confirmação deve ser idêntica à senha.');
			return false;
		}
	} else {
		Erro('A senha deve conter no mínimo 4 caracteres.');
		return false;
	}
}

function ValidaNome($nome) {
	if (strlen($nome) > 4) {
		return true;
	} else {
		Erro('O nome deve conter no mínimo 5 caracteres.');
		return false;
	}
}

function ValidaCidade($cidade) {
	if (strlen($cidade) > 2) {
		return true;
	} else {
		Erro('O campo cidade deve conter no mínimo 3 caracteres.');
		return false;
	}
}

function ValidaEndereco($endereco) {
	if (strlen($endereco) > 5) {
		return true;
	} else {
		Erro('Endereço inválido.');
		return false;
	}
}

function ValidaUnico($valor,$campo,$tabela,$erro) {
	if (strlen($valor) > 2) {
		$res = mysql_query("SELECT $campo FROM $tabela WHERE $campo = '$valor'");
		if (!mysql_num_rows($res)) {
			return true;
		} else {
			Erro($erro);
			return false;
		}
	} else {
		Erro($erro);
		return false;
	}
}

function ValidaID($id,$campo,$tabela,$msg) {
	if ($msg == '') $msg = 'Identificação inválida.';
	if (!empty($id)) {
		if (is_numeric($id)) {
			$res = mysql_query("SELECT $campo FROM $tabela WHERE $campo = $id");
			if (@mysql_num_rows($res) > 0) {
				return true;
			} else {
				Erro($msg);
				return false;
			}
		} else {
			Erro($msg);
			return false;
		}
	} else {
		Erro($msg);
		return false;
	}
}

function ValidaCEP($cep) {
	if (ereg("^[0-9]{8}$",$cep)) {
		return true;
	} else {
		Erro('CEP inválido.');
		return false;
	}
}

function ValidaEmail($email) {
	if (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$",$email)) { 
		return true;
	} else {
		Erro('E-mail inválido.');
		return false;
	}
}

function ValidaFone($fone,$msg) {
	if (ereg("^[0-9]{10}$",$fone)) {
		return true;
	} else {
		Erro($msg);
		return false;
	}
}

function ValidaVazio($campo,$msg) {
	if (!empty($campo)) {
		return true;
	} else {
		Erro($msg);
		return false;
	}
}

function combo_dia( $nome, $mes , $default )
{
	echo '<select name="'.$nome.'" class="inside_form" id="'.$nome.'">';
	$limitemes = array( 1=>31,29,31,30,31,30,31,31,30,31,30,31 );
	if ($default == 0)
	   {
		       echo '<option selected="selected" value="0">&nbsp;</option>';
	   }
	else
	   {
		   		       echo '<option value="0">&nbsp;</option>';
	   }
	$mes = (int)$mes;
	for ($ct = 1;$ct <= $limitemes[$mes]; $ct++)
	{
		if ($ct == $default )
		   {
            echo '<option selected="selected" value="'.$ct.'" >'.$ct.'</option>';
		   }
		else
		   {
			    echo '<option value="'.$ct.'">'.$ct.'</option>';
		   }
	}
     echo '</select>';
}

function combo_mes( $nome, $default )
{
	echo '<select name="'.$nome.'" class="inside_form" id="'.$nome.'">';
   $mes = array( 1=>"Janeiro","Fevereiro", "Mar&ccedil;o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" );
    if ($default == 0 )
	   {
		       echo '<option selected value="0">&nbsp;</option>';
	   }
	else
	   {
		       echo '<option value="0">&nbsp;</option>';
	   }

	for ($ct = 1; $ct <=12;$ct++)
	   {
		if ($ct == $default )
		  {
		   echo '<option selected value="'.$ct.'">'.$mes[$ct].'</option>';
		  }
		else
		  {
  		   echo '<option value="'.$ct.'">'.$mes[$ct].'</option>';
		  }
	   }
   echo '</select>';
}

function combo_ano( $nome , $default )
{
	echo '<select name="'.$nome.'" class="inside_form" id="ano">';
	if ($default == 0)
	  {
 	  echo "<option selected='selected' value='0'>&nbsp;</option>";
	  }
	else
	  {
		  echo "<option value='0'>&nbsp;</option>";
	  }
	  
	for ($ct=2008;$ct <= 2020; $ct++)
	  {
	  if ($ct == $default)
	  	    {     echo '<option  selected="selected" value="'.$ct.'">'.$ct.'</option>';  }
	  else
	  	     {     echo '<option value="'.$ct.'">'.$ct.'</option>';  }

	  }
	echo "</select>";
}




function le_txt( $nome )
{
	$arquivo=file($nome);
    $linhas=count($arquivo); 

    $retorno = "";
	for($i=0;$i<$linhas;$i++)
	{
		$retorno = $retorno.$arquivo[$i];
//		echo $arquivo[$i];
	}
//	echo $retorno;
    return $retorno;
}


function grava_txt( $arquivo, $texto )
{
	
	if(is_writable($arquivo)) 
	  {
		   
            $manipular = fopen($arquivo, "a+");
		
			if(!$manipular) 
			{
				echo "Erro<br /><br />Não foi possível abrir o arquivo.";
			}
			if(!fwrite($manipular, $texto)) 
			{
				echo "Erro<br /><br />Não foi possível gravar as informações no arquivo.";
			}
			else
			{
    			echo "Informa&ccedil;&atilde;oes gravadas com sucesso!";
			}
			fclose($manipular);
   	  }
	  else 
	  {
			echo "O " .$arquivo. " não tem permissões de leitura e/ou escrita.";
	  }
}




function sendmail( $destino, $origem, $nomeorigem, $assunto, $mensagem , $smtp, $user, $senha , $copia1, $copia2, $copia3)
{
    $erro = 0;
    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
		
		$mail->IsSMTP(); // telling the class to use SMTP
		
		try {
		  $mail->Host       = $smtp; // SMTP server
		  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
		  $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
		  $mail->Username   = $user; // SMTP account username
          $mail->Password   = $senha;        // SMTP account password
          $mail->CharSet = 'utf-8'; //'iso-8859-1';
		//  $mail->AddReplyTo('name@yourdomain.com', 'First Last');
		  $mail->AddAddress($destino);
		  if ($copia1 != '')
		     {	 		  $mail->AddBCC($copia1); 					 }
		  if ($copia2 != '')
		     {	 		  $mail->AddBCC($copia2); 					 }
		  if ($copia3 != '')
		     {	 		  $mail->AddBCC($copia3); 					 }
		 
// 		  $mail->AddBCC('nizzola@ig.com.br', 'Enviado pelo site');
		  $mail->SetFrom($origem, $nomeorigem);
		  
		  $mail->Subject = $assunto;
		  $mail->AltBody = 'Se estiver vendo esta mensagem e nao a mensagem completa habilite html no seu visualizador'; // optional - MsgHTML will create an alternate automatically
		  
		  
		//  $mail->MsgHTML(file_get_contents('contents.html'));
		  $mail->MsgHTML($mensagem );
		//  $mail->AddAttachment('images/logo.jpg');      // attachment
		//  $mail->AddAttachment('images/logo.jpg'); // attachment
		  if( $mail->Send() )
			 {
			 return true;
			 }
		  else
			 {
			 $erro ++;
			 }	 
		} catch (phpmailerException $e) {
		  echo $e->errorMessage(); $erro ++; //Pretty error messages from PHPMailer
		} catch (Exception $e) {
		  echo $e->getMessage(); $erro ++; //Boring error messages from anything else!
		}
		if($erro)
		  {   return false;  }
		else
		  {   return true;   }
}


function RemoveAcentos($str, $enc = 'UTF-8')
{
$acentos = array(    'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;|Á|Â|Ã/',
    'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
    'C' => '/&Ccedil;/',
    'c' => '/&ccedil;/',
    'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;|É|Ê/',
    'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
    'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
    'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
    'N' => '/&Ntilde;/',
    'n' => '/&ntilde;/',
    'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
    'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
    'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
    'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
    'Y' => '/&Yacute;/',
    'y' => '/&yacute;|&yuml;/',
    'a.' => '/&ordf;/',
    'o.' => '/&ordm;/',
	'' => '/&acute;/' 
	  );

    return preg_replace($acentos, array_keys($acentos), htmlentities($str,ENT_NOQUOTES, $enc));
}



function checkCPF($cpf)
{
    $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);

    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '99999999999') {
        return false;
    } else {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true;
    }
}



function formatadatadmy( $dataymd )
{
	$data = explode( "-", $dataymd );
	  $txtdata = $data[2]."/".$data[1]."/".$data[0];

	  return $txtdata;
}

function pegaultcontador( $contrato )
{
   $ultcount = retornacampo($contrato, "ct_id", "contratos", "inicial", "produto invalido ");
  
   $sql = "select * from contadores where contrato_id=".$contrato." order by dtinclu desc";
   if ( $tab1 = mysql_query($sql) )
   {
    if (mysql_num_rows($tab1))
	  { 	   
      $linha = mysql_fetch_array($tab1);
	  $ultcount = $linha['contador'];
	  }
	
   }
   return $ultcount;
}

function pegaultmescont( $contrato )
{
   $ultcount = "";
  
   $sql = "select * from contadores where contrato_id=".$contrato." order by dtinclu desc";
   if ( $tab1 = mysql_query($sql) )
   {
    if (mysql_num_rows($tab1))
	  { 	   
      $linha = mysql_fetch_array($tab1);
	  $ultcount = $linha['mesref'];
	  }
	
   }
   return $ultcount;
}

function formatadatasql( $data )
{
	$datave = explode( "/", $data );
	$datauni = $datave[2]."-".$datave[1]."-".$datave[0];
	return $datauni;
}

function chkfoto( $foto )
{
   if ($foto != '')
      {
	  return $foto;
	  }
   else  
      {
	  return "semfoto.png";
      }
} 

function valida_vazio($nome,$campo){
	if($nome == ''){
		return '<span class="erro">O campo '.$campo.' n&atilde;o pode ser vazio !</span>';
	}
}

function valida_numero($numero,$quant,$campo){
	if(is_numeric($numero) && strlen($numero) == $quant){
		return "";
	}
	else{
		return"<span class='erro'>O campo ".$campo." deve ser preenchido com ".$quant." n&uacute;meros!</span>";
	}
}



function valida_email($variavel){
	if(substr_count($variavel,"@") == 1){
		return"";	
	}
	else{
		return "<span class='erro'>O email digitado n&atilde;o &eacute; v&aacute;lido!</span>";
	}
}

function valida_tamanho($campo){
	if(strlen($campo) < 6){
		return "<span class='erro'>Este campo deve ter no m&iacute;nimo 6 caracteres!</span>";
	}
}

function valida_minimo($campo, $tamanho ){
	if(strlen($campo) < $tamanho ){
		return "<span class='erro'>Este campo deve ter no m&iacute;nimo ".$tamanho." caracteres!</span>";
	}
}


function validaCPF($cpf)
{	// Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
	
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
	{
	return false;
    }
	else
	{   // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true;
    }
}


function valida_cpf($cpf){
	if(empty($cpf)){
		return "<span class='erro'>Cpf inv&aacute;lido!Preencha o campo cpf corretamente.</span>";
	}
	elseif($cpf == 11111111111 || $cpf == 22222222222 || $cpf == 33333333333 || $cpf == 44444444444 || $cpf == 55555555555 || $cpf == 66666666666 || $cpf == 77777777777 || $cpf == 88888888888 || $cpf == 99999999999){
		return "<span class='erro'>Cpf inv&aacute;lido!Preencha o campo cpf corretamente.</span>";
	}
	else{
		$pt_dir = substr($cpf,9,2);
		$pr_esq = substr($cpf,0,-2);
		
		$cont = 10;
		$n = 0;
		do{
			$result[$cont] = $cont*substr($pr_esq,$n,1);
			$soma = $result[$cont] + $soma;
			$cont--;
			$n++;
		}while($cont >=2);

			$div1 = $soma % 11;
			if($div1<2){
				$dig1 = 0;
			}
			else{
				$dig1 = 11 - $div1;
			}

		$cont2 = 11;
		$n2 = 0;
		do{	
			$result2[$cont2] = $cont2*substr($pr_esq,$n2,1);
			$soma2 = $result2[$cont2] + $soma2;
			$cont2--;
			$n2++;
			//echo "*".$result2."* ";
		}while($cont2 >=2);
			//echo "*".$soma2."*";
			
			$div2 = $soma2 % 11;
			$dig2 = 11-$div2;
			
			$id = $dig1.$dig2;
			
			if($id == $pt_dir){
				return "";
			}
			else{
				return "<span class='erro'>Cpf inv&aacute;lido!Preencha o campo cpf corretamente.</span>";
			}
	}
}

function formatadata( $str )
{  
  return date('d/m/Y', strtotime($str));
}

function formatadatahora( $str )
{  
  return date('d/m/Y', strtotime($str))." ".substr( $str, 11,5);
}


function ConverteData($Data)
 {
	if (strstr($Data, "/"))//verifica se tem a barra /
	{
	 $d = explode ("/", $Data);//tira a barra
	 $rstData = "$d[2]-$d[1]-$d[0]";//separa as datas
	 return $rstData;
	} elseif(strstr($Data, "-")){
	 $d = explode ("-",$Data);
	 $rstData = "$d[2]/$d[1]/$d[0]"; 
	 return $rstData;
	}else{
	 return "";
	}
}

function valida_data($dat){
	
	// formatdo dia/mes/ano 
	if ( $dat != '' )
	{
		$char = strpos($dat, "/")!==false?"/":"-";
		$data = explode($char,$dat); // fatia a string $dat em pedados, usando / como referência
		$d = $data[0];
		$m = $data[1];
		$y = $data[2];
		if ( $d > 1000 )
		  {
			$d = $data[2];
			$m = $data[1];
			$y = $data[0];	  
		  }
	
		// verifica se a data é válida!
		// 1 = true (válida)
		// 0 = false (inválida)
		if ( $m != '' and $d != '' and $y != '' )
 		    $res = checkdate($m,$d,$y);
	
		if ($res == 1)
		   return true;
	}
	 else 
	 {
	   return false;
	}
}


function diferenca_dias($inicial,$final)
{
  // enviar a data no formato 2000/01/30


  $data1 = explode( "/", $inicial );
//  if ( $data1[0] > 1000 )
//      $inicial = $data1[2]."/".$data1[1]."/".$data1[0];
//  else
      $inicial = $data1[0]."-".$data1[1]."-".$data1[2];
  
  $data2 = explode( "/", $final );
//  if ( $data2[0] > 1000 )
//     $final = $data2[2]."/".$data2[1]."/".$data2[0];
//  else
     $final = $data2[0]."-".$data2[1]."-".$data2[2];
  
  $inicial = strtotime($inicial); // 07/04/2003 (mm/dd/aaaa) data menor
  $final = strtotime($final);    // 07/10/2003 (mm/dd/aaaa) data maior
  
//  echo "final:".$final." / inicio:".$inicial;
  
  $resp = ($final-$inicial)/86400; //transformação do timestamp em dias 
  
  //echo "*resp:".$resp."*";
  return  $resp;
/*
valor positivo: $final > $inicial
valor negativo: $final < $inicial
valor igual a zero: $final == $inicial
*/

}

function diferenca_dias_seg($inicial1,$final1)
{
  // formatando data 1
  echo "<br>--*".$inicial1."*".$final1."*--<br>";
  
  $data1 = explode( "/", substr( $inicial1,0,10) );
  $inicial = $data1[1]."/".$data1[0]."/".$data1[2];
  
  $data2 = explode( "/", substr( $final1, 0,10) );
  $final = $data2[1]."/".$data2[0]."/".$data2[2];
  
//  echo "**".$inicial.substr( $inicial1, 10,9 )."**".$final.substr($final1, 10,9 );
  $inicial = strtotime($inicial.substr( $inicial1, 10,9 ) ); // 07/04/2003 (mm/dd/aaaa) data menor
  $final = strtotime($final.substr($final1, 10,9 ) );    // 07/10/2003 (mm/dd/aaaa) data maior
// echo "<br>*".$final." * ".$inicial."*";
  return ($final-$inicial); //transformação do timestamp em dias 
/*
valor positivo: $final > $inicial
valor negativo: $final < $inicial
valor igual a zero: $final == $inicial
*/
}



function addDayIntoDate($date,$days) {
	 $adata = explode( "/", $date );
	 
     $thisyear = $adata[2];
     $thismonth = $adata[1];
	 $thisday =  $adata[0];
     $nextdate = mktime ( 0, 0, 0, $thismonth, $thisday + $days, $thisyear );
     return strftime("%d/%m/%Y", $nextdate);
}

function subDayIntoDate($date,$days) {
	 $adata = explode( "/", $date );
	 
     $thisyear = $adata[2];
     $thismonth = $adata[1];
	 $thisday =  $adata[0];
	 
     $nextdate = mktime ( 0, 0, 0, $thismonth, $thisday - $days, $thisyear );
     return strftime("%d/%m/%Y", $nextdate);
}


function paginacao( $pag, $pags, $link )
{
		 if ( $pags > 1 )
		    {
	     	 echo "<br>Paginas ";
	        if ( $pag > 1 )
			   {
				echo '<a href="'.$link.'&pag='.($pag-1).'">Anterior</a> ';
			   }
			for( $i = 1; $i <= $pags; $i++)
			   {
				 if ( $i == $pag )
				    {
					echo " ".$i." ";   	
					}
			     else
				    {
                     echo " <a href='$link&pag=".($i)."'>".$i."</a> ";   
					}
			   }
			 if ( $pag < $pags )
			   {
 				echo '<a href="'.$link.'&pag='.($pag+1).'"> Proxima</a> ';		   
			   }
			}
}


function paginacao2( $pag, $pags, $link )
{
		 if ( $pags > 1 )
		    {
	     	 echo "<br>Paginas ";
	        if ( $pag > 1 )
			   {
				echo '<a href="'.$link.'-pag-'.($pag-1).'">Anterior</a> ';
			   }
			for( $i = 1; $i <= $pags; $i++)
			   {
				 if ( $i == $pag )
				    {
					echo " ".$i." ";   	
					}
			     else
				    {
                     echo " <a href='$link-pag-".($i)."'>".$i."</a> ";   
					}
			   }
			 if ( $pag < $pags )
			   {
 				echo '<a href="'.$link.'-pag-'.($pag+1).'"> Proxima</a> ';		   
			   }
			}
}

function paginacao3( $pag, $pags, $link )
{
	echo '<div id="paginacao">';
		 if ( $pags > 1 )
		    {
	     	 echo "Paginas | ";
	        if ( $pag > 1 )
			   {
				echo '<a href="'.$link.'-pag-'.($pag-1).'">Anterior</a> | ';
			   }

			for( $i = 1; $i <= $pags; $i++)
			   {
				 if ( $i == $pag )
				    {
					echo '<span id="pag_atual"><strong>'.$i.'</strong> </span> | ';   	
					}
			     else
				    {
                     echo " <a href='$link-pag-".($i)."'>".$i."</a> |";   
					}
			   }
			 if ( $pag < $pags )
			   {
 				echo '<a href="'.$link.'-pag-'.($pag+1).'"> Proxima</a> ';		   
			   }
			}
}




function tamanho_arquivo( $nomearquivo ) 
{
  // funcao retorna tamaho do arquivo  BY MRN
   $tamanhoarquivo = filesize( $nomearquivo );

	$bytes = array('B' ,'KB', 'MB', 'GB', 'TB');

	if($tamanhoarquivo <= 999) {
		$tamanhoarquivo = 1;
	}

	for($i = 0; $tamanhoarquivo > 999; $i++) {
		$tamanhoarquivo /= 1024;
	}

	return round($tamanhoarquivo)." ".$bytes[$i];
}


function getextensao( $nome )
{
	$vetor = explode( ".", $nome );
	return $vetor[count($vetor) -1];
}


function sonumero( $var )
{
	$limpo = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
	$limpo = str_replace( "-", "", $limpo );
	return $limpo;
}




?>
