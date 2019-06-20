<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Venda de Carros - Rogerio Shop Vehicle</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
</head>

<body>

<div class="header">
		<div class="wrap">
			<div class="header-bot">
				<div class="logo">
					<a href="index.php">
						<img src="images/logo.png" alt="">
					</a>
				</div>
				<div class="cart">
					<ul class="ph-no">
						<li class="item  first_item">
							<div class="item_html">
								<span class="text1">WhatsApp:</span>
								<span class="text2">(11) 96766-6566</span>
							</div>
						</li>
					</ul>
					<div id="top-search">
						<form method="get" action="#">
							<input type="text" name="s" class="input-search">
							<input type="submit" value="Search" id="submit">
						</form>
					</div>

					<?php
					include "menu.php";					
					?>
					
	<div class="main">
		<div class="content-box">
			<div class="wrap">
				<div class="banner2">
					<a href="#">
						<div class="price">$5.000</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="content-box1">
			<div class="wrap">
				<div class="banner2">
					<a href="#">
						<div class="price">$4.000</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="main-content">
		<div class="wrap">
			<div class="main-box">
				<div class="box_wrapper">
					<h1>VEÍCULOS EM DESTAQUE</h1>
				</div>
<?php

include "config.php";
include "classVeiculo.php";
$veiculo = new Carro ( DB_STRING, DB_USER, DB_PASS);
  //======================================   Produtos em Destaque
  $result2 = $veiculo->Listar(); //listar todos carros tipo section

  if (isset($result2))
  {
    $i= 1;
    while ($Linha = $result2->fetchObject())
    {
	  
      if($i == 1|| $i ==5){
      echo "<div class='section group' style='min-height:400px;'>"; // inicia section
      }
	  
	  echo "
		<div class='col_1_of_4 span_1_of_4'>
			<img src='images/".$Linha->fotonome1."'/>
			<div class='grid_desc'>
					<p class='title'>".$Linha->modelo."</p>
					<p class='title1'>","Marca - ".$Linha->marca."</p>
        			<div class='price1' style='height: 19px;'>
						<span class='reducedfrom'>".$Linha->valor."</span>
						<span class='actual'>".$Linha->valor."</span>
					</div>
			</div>
			<div class='Details'>
				<a href='#' title='Mais detalhes' class='button'>Details<span></span></a>
			</div>
		</div>";
		
      
      if($i == 4 || $i == 8 ){
        echo "<div class='clear'></div></div>"; // fecha section
	  }
	  $i++;
	}
}
    
?>
		</div>
	</div>
	</div>
	<div class="footer">
		<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_5 span_1_of_5">
					<div class="footer-grid twitts">
						<h3>Latest Tweets</h3>
						<p>
							<label>@Lorem ipsum</label>dolor sit amet, consectetur adipisicing elit.</p>
						<span>10 minutes ago</span>
						<p>
							<label>@consectetur</label>dolor sit amet, consectetur adipisicing elit.</p>
						<span>15 minutes ago</span>
					</div>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<div class="footer-grid center-grid">
						<h3>Recent posts</h3>
						<ul>
							<li>
								<a href="#">eiusmod temporinc</a>
							</li>
							<li>
								<a href="#">adipisicing elit, sed</a>
							</li>
							<li>
								<a href="#">mod tempor incididunt</a>
							</li>
							<li>
								<a href="#">dipisicing elit, sed do</a>
							</li>
							<li>
								<a href="#">eiusmod temporinc</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<div class="footer-grid twitts">
						<h3>Our Company</h3>
						<div class="f_menu">
							<ul>
								<li>About your Company Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh eui</li>
								<li>Terms &amp; conditions Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh eui</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<div class="call_info">
						<p class="txt_3">Call us toll free:</p>
						<p class="txt_4">1 800 234 23456</p>
					</div>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<div class="footer-grid twitts">
						<h3>Get in touch</h3>
						<ul class="follow_icon">
							<li>
								<a href="#" style="opacity: 1;">
									<img src="images/follow_icon.png" alt="">
								</a>
							</li>
							<li>
								<a href="#" style="opacity: 1;">
									<img src="images/follow_icon1.png" alt="">
								</a>
							</li>
							<li>
								<a href="#" style="opacity: 1;">
									<img src="images/follow_icon2.png" alt="">
								</a>
							</li>
							<li>
								<a href="#" style="opacity: 1;">
									<img src="images/follow_icon3.png" alt="">
								</a>
							</li>
							<li>
								<a href="#" style="opacity: 1;">
									<img src="images/follow_icon4.png" alt="">
								</a>
							</li>
							<li>
								<a href="#" style="opacity: 1;">
									<img src="images/follow_icon5.png" alt="">
								</a>
							</li>
						</ul>
						<p>+1 111-111-1111</p>
						<span>
							<a href="mailto:info@example.com">support(at)carssale.com</a>
						</span>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="copy-right">
		<div class="wrap">
			<p>Copyright &copy; 2013 Car Sale. All Rights Reserved | Design by
				<a href="http://w3layouts.com/"> W3layouts</a>
			</p>
		</div>
	</div>
	
</body>

</html>