<?php

$Debug = true;


$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

if (isset($_SESSION['pseudoCompte']))
{
	if(isset($_POST['formdéco']))
	{
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('login', '');
		setcookie('pass_hache', '');
	}
}




?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>

    <meta charset="utf-8" />	
	<link rel="stylesheet" href="petite_resolution.css" />
	<link rel="stylesheet" href="css/css.css" />
	</head>
	
<body>
	<div id="bloc_page">
		<header>
			<nav>
		
				<div class="back">	

					<div class="logo">
						<a href="https://www.veretz.com/"><img src="image/logo.png" alt=""></a>
					</div>
					
					<div class="iden">
						<img src="image/iden.png" class="ident" alt="">
					</div
					
					<main>
						<div class="Biblio">		
							<h1>Librairie de Veretz  " <?php echo 'Bonjour ' .$_SESSION['pseudoCompte']; ?>"  </h1>
						</div>
					</main>
							  
					</div>
				</div>
				
		</header>
		
		
		<form method="GET" action="recherche.php">
		
			<div class="recherche" >

				<label for="site-search">Nom du livre à rechercher : </label>
				<input type="search" name="q" placeholder="Nom livre ..."/>
				<input type="submit" value="Valider" name="recherche"/>
				
				

			</div>
			
		</form>


				<div class="iconjeu">
					<a href="jeu.php">
						<img src="image/base.png" alt="" width="300" height="70"/>
					</a>
				</div>

				<div class="textjeu">
					<label for="site-search"><font size="6">Jeu</font></label> 
				</div>

				<div class="iconlivre">
					<a href="pageacceuil.php">
						<img src="image/base2.png" alt="" width="300" height="90"/>
					</a>
				</div>

				<div class="textlivre">
					<label for="site-search"><font size="12">Livres</font></label> 
				</div>
				
			</nav>

				<div class="texteclassement">

				<div style="margin-top: 150px;"><font size="10">
				Résumé du Livre : 
				</font></div>
				<br><br>
				</div>

				<center>

						<div class="container h-100">
						
							<div class="d-flex justify-content-center h-100">
							
								<div class="livre">
								
								
									
									
									
									
									<div class="d-flex justify-content-center form_container">
										<form>
											
											<div class="input-group mb-3">
													<div class="input-group-append">
														<span class="input-group-text"><i class="fas fa-user"></i></span>
													</div>							
											</div>
											
											<div class="d-flex justify-content-center mt-3 login_container">
												
												
											<?php  //Lire la description
											// Ici j'ai essayé de récupérer les informations du livre rechercher
													
													//J' avais pensé à faire ca mais cela ne marche pas car il ne retrouve pas la variable $livre de la page recherche et je ne sais pas comment lui communiquer l'information.
													//$resL = $pdo->prepare('SELECT descriptionLivre, nomLivre FROM livre WHERE nomLivre = "' . $livre['nomLivre'] . '" ');
													
													$resL = $pdo->prepare('SELECT descriptionLivre, nomLivre, auteurLivre FROM livre');
													$resL->execute();
													while($data = $resL->fetch(PDO::FETCH_ASSOC))
														// Et la je veux récuperer la description du livre
													
														{
															// Ici je veux l'afficher
															echo 'Nom du Livre : '.$data['nomLivre']; ?><br>
															<?php echo 'Auteur du livre : '.$data['auteurLivre']?> <br><br>
															<?php echo $data['descriptionLivre'];?>
															<br><br>
															<?php
															
														}
													
													
											
											
											?>
										
											
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>

	</div>
	

	<footer>
        <p>Adresse: rue Moreau Vincent, 37270 Véretz</p>
		<p>Numéro: 02 47 35 70 13</p>
		<div class="butonDéco">
		<a href="Acceuil.php"><input type="submit" name="formdéco" value="Se déconnecter !"/></a>
		</div>
		
    </footer>

</center>


</body>
</html>