<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<?php

  
  
	for( $i =0; $i < 128; $i ++ )
	{
		$palavra = chr($i);
		for( $i2 =0; $i2 < 128; $i2 ++ )
		{
			echo $palavra.chr($i2)."<br>";
		}

		
		
	    //echo $i." = ". chr($i)."<br>";
	}
  
	
?>	
</body>
</html>