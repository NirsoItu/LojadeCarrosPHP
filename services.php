<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Cars Sale a Auto mobile Category Website Template | Services :: w3layouts</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($) {
			$(".swipebox").swipebox();
		});
	</script>
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
								<span class="text1">Order delivery:</span>
								<span class="text2">+800-0005-5289</span>
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
	
	<div class="header-bottom">
		<div class="wrap">
			<div class="main-box">
				<div class="filter-wrapper ">
					<div class="category">
						<strong>SERVICES: </strong>
						<div class="clear"></div>
					</div>
				</div>
<?php
include "config.php";
include "classVeiculo.php";
$veiculo = new Carro ( DB_STRING, DB_USER, DB_PASS);

$result3 = $veiculo->Listar(); //listar todos carros tipo grid 
$i = 0;

if (isset($result3))
{
  echo "<div class='gallery-grids'>"; // inicia section
  while ($Linha = $result3->fetchObject())
  {
	if($i == 0){
		echo "<div class='section group'>"; // inicia section
	}
	echo "<div class='col_1_of_4 span_1_of_4'><img src='".$Linha->fotonome1."'/>";
	  echo "<h4>".$Linha->descricao."</h4><p>".$Linha->obs."</p>";	 
	  echo "<p><a href='#' class='btn btn-primary'>Ler mais</a></p></div>";
	  
	  $i++;

      if($i == 4){
        echo "<div class='clear'></div></div>"; // fecha section
        $i = 0;
      }
    }
    if(($i % 2) == 1)
      echo "<div class='clear'></div></div>"; // fecha section
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