<?php
		include_once 'Carrito.php';
	?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<title>Macro</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
				  		<div class="row justify-content-center">
						      <div id="logo">
						        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
						      </div>
				  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-center d-flex">			
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="index.php">inicio</a></li>
                          <?php echo "<li><a href='menu.php?codigo=3'>Menu</a></li>"?>
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Menus				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <?php echo "<a href='menu.php?codigo=3'>Menu</a>"?></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->			

			<!-- Start menu-area Area -->
            <section class="menu-area section-gap" id="menu">
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">La cuenta y dos policias!!</h1>
							</div>
						</div>
					</div>	

                    <ul class="filter-wrap filters col-lg-12 no-padding">
                        
						<li><?php
                        require_once './/php/ConexionesBD/consultas.php';

                        $obj = new restaurante();

                        $obj->seleccionTipoComida();
					 ?></i>
					 	<li>
						 <i class="fa fa-cart-plus fa-3x" aria-hidden="true"></i>
                        <ion-icon name="cart-outline" size="large"></ion-icon>
                    (<?php 
                        echo ( empty($_SESSION['CARRITO']) )?0:count($_SESSION['CARRITO']);
                    ?>)</a>
						</li>
                    </ul>
                    <div class="container p-3">
        <div class="row justify-content-center">
        <div class="container my-3">
        <h3>Carrito</h3>
        <?php 
            $columnas = "";
            $TotalCompra = 0;

            if( !empty( $_SESSION['CARRITO'] ) ){

                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    $columnas.=" <tr>
                                <td width='5%'>".$producto['IN']."</td>
                                <td width='35%'>".$producto['NOMBRE']."</td>
                                <td width='15%'>".$producto['CAN']."</td>
                                <td width='20%'>".$producto['PRE']."</td>
                                <td width='20%'>".number_format($producto['PRE'] * $producto['CAN'],2 )."</td>
                                <td width='5%'>
                                <form action='' method='post'>
                                    <input type = 'hidden' name = 'id' placeholder='ID' value = ".$producto['IN']." >
                                    <button name = 'btnAccion' value = 'Eliminar' class ='btn btn-outline-danger' type = 'submit'>Eliminar</button></td>
                                </form>
                            </tr>";
                            $TotalCompra = $TotalCompra + ( $producto['PRE'] * $producto['CAN']);
                }

        echo "<table class='table table-hover table-dark'>
            <thead class='thead-dark'>
                <tr>
                    <td colspan = '6' aling = 'right'>Contenido del carrito</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width='5%''>NO</th>
                        <th width='35%''>Descripcion</th>
                        <th width='15%'>Cantidad</th>
                        <th width='20%'>Precio</th>
                        <th width='20%''>Total</th>
                        <th width='5%'></th>
                    </tr>".
                    $columnas
                    ."<tr>
                        <td class='table-secondary'colspan = '4' aling = 'right'> <h3>Total :</h3> </td>
                        <td class='table-secondary' aling = 'right'> <h3>".number_format($TotalCompra,2)."</h3></td>
                        <td class='table-secondary'>
                            <form action='' method='post'>
                                <button type='submit'  name = 'btnAccion' value = 'Cancelar' class = 'btn btn-outline-primary' >Cancelar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
        </table>
        
        <form action='' method='post'>
            <center><button type='submit'  name = 'btnAccion' value = 'Guardar' class = 'btn btn-success btn-lg ' >Guardar</button></center>
        </form>

        ";
        
            }else{
                echo"<div class='alert alert-light'>
                    <strong>Mensaje!</strong> El carrrito esta vacio.
                  </div>";
            }
        ?>
        
    </div>
        </div>
    </div>
        </div>
                     
            <!-- End menu-area Area -->						

			<!-- Start reservation Area -->
			
			<!-- End reservation Area -->				

			<!-- start footer Area -->		
			<footer class="footer-area">
				<div class="footer-widget-wrap">
					<div class="container">
						<div class="row section-gap">
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Horario de apertura</h4>
									<ul class="hr-list">
										<li class="d-flex justify-content-between">
											<span>Lunes - Viernes</span> <span>08.00 am - 10.00 pm</span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Sábado</span> <span>08.00 am - 10.00 pm</span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Domingo</span> <span>08.00 am - 10.00 pm</span>
										</li>																				
									</ul>
								</div>
							</div>
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Contactanos</h4>
									<p>
										Complejo Regional Centro. San José Chiapa Puebla. BUAP.
									</p>
									<p class="number">
										012-6532-568-9746 <br>
										012-6532-569-9748
									</p>
								</div>
							</div>						
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Boletin informativo</h4>
									<p>Puedes confiar en nosotros. solo enviamos ofertas promocionales, no un solo spam.</p>
									<div class="d-flex flex-row" id="mc_embed_signup">


										  <form class="navbar-form" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
										    <div class="input-group add-on align-items-center d-flex">
										      	<input class="form-control" name="EMAIL" placeholder="Tu correo electrónico" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email address'" required type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
										      <div class="input-group-btn">
										        <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
										      </div>
										    </div>
										      <div class="info mt-20"></div>
										  </form>
									</div>
								</div>
							</div>						
						</div>					
					</div>					
				</div>
				<div class="footer-bottom-wrap">
					<div class="container">
						<div class="row footer-bottom d-flex justify-content-between align-items-center">
							<p class="col-lg-8 col-mdcol-sm-6 -6 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">TECHOFRIENDS</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							<ul class="col-lg-4 col-mdcol-sm-6 -6 social-icons text-right">
	                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
	                            <li><a href="#"><i class="fa fa-behance"></i></a></li>           
	                        </ul>
						</div>						
					</div>
				</div>
			</footer>
			<!-- End footer Area -->	

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>			
            <script src="js/isotope.pkgd.min.js"></script>								
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>