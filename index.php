<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora</title>
		<link href="css/reset.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/simpleplaylist.css" rel="stylesheet"><!-- plugin simple playlist -->
		<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet"><!-- plugin scrollbar -->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/vendor/jquery.simpleplaylist.js"></script><!-- plugin simple playlist -->
		<script src="js/vendor/jquery.mCustomScrollbar.concat.min.js"></script><!-- plugin scrollbar -->
	</head>
	<body>

	<div id="screen" class="">
		<nav>
			<img src="img/logo-arbre.png" alt="logo" title="logo" class="logo"/>
			<ul class="menu">
				<li><a href="index.php?menu=#who" class="lienvisible">who we are</a></li>
				<li><a href="index.php?menu=#calendrier" class="lienvisible">calendrier</a></li>
				<li><a href="index.php?menu=#images-sons" class="lienvisible">images / sons</a></li>
				<li><a href="index.php?menu=#contact" class="hide">contact</a></li>
			</ul>
		</nav>

		<div id="content">

			<div id="who" class="who hide">
				<p>Tels des nénuphars, au milieu de l’eau, cet orchestre
				nous embarque dans son délire « aqua’zic ».
				Voguant, se déplaçant au fil de l’eau, ils diffusent
				leur musique jusqu’aux berges.</p>
				<p>On écoute, on danse, on regarde, on observe... du
				rêve à la réalité ! Un moment paisible, original,
				unique, que nous offrent ces six compères. Ici,
				l’esthétisme et la musique s’allient parfaitement.</p>
				<p>Cet orchestre/fanfare joue de manière acoustique
				et peut s’installer sur toutes les eaux tranquilles :
				lacs, étangs, douves, rivières, ports, mers calmes et
				piscines.</p>

				<h1>Ambiance cubaine</h1>

				<p>Ces musiciens détiennent une solide expérience
				dans les répertoires cubains. Ils ont tous étudié sur
				l’île, chacun dans sa spécialité. Leur répertoire
				aborde les styles du « Son » et du « Cha Cha Cha »
				sans oublier les morceaux résolument « Salsa ».
				Le groupe existe aussi dans une configuration terrestre 
				sous le nom de <a href="http://www.orquestadelacalle.com/"
				class="lien-accueil" target="_blank">Orquesta de la Calle</a>.
				</p>

				<h1>Musiciens :</h1>

				<ul class="groupe">
					<li>Benjamin Lebert : Tuba</li>
					<li>Aurélien Bucco : Trompette</li>
					<li>Cyrille Maillard, Tobie Koppé : Percussions</li>
					<li>Denis Peduzzi : Guitare</li>
					<li>Erwan Thobie  : Trombone</li>
  					<li>Cécile Dugué : Création costumes & scénographie</li>
				</ul>
			</div>

			<div id="calendrier" class="calendrier hide">
				<h1>Retrouvez-nous !</h1>
				<?php
				$nb_date = $config['nb_date_future'];
				$dates = get_last_date($nb_date);
				foreach($dates as $date) {
					setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
					$jour = strftime("%d %B %Y",strtotime($date['date']));
					echo '<p class="date">'.$jour.'</p>'
						.'<p class="lieu">'.$date['heure'].' '.$date['adresse'].' - '.$date['ville'].' ('.$date['departement'].')</p>';
				}
				?>
				<h2>Vous avez pu nous voir...</h2>
				<?php
				$nb_date = $config['nb_date_passee'];
				$dates = get_previous_date($nb_date);
				foreach($dates as $date) {
					setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
					$jour = strftime("%d %B %Y",strtotime($date['date']));
					echo '<p class="date passe">'.$jour.'</p>'
						.'<p class="lieu passe">'.$date['heure'].' '.$date['adresse'].' - '.$date['ville'].' ('.$date['departement'].')</p>';
				}
				?>
			</div>

			<div id="images-sons" class="images-sons hide">
				<h1>PHOTOS</h1>
				    <div class="gallery">
			        <?php
			        $nb_pages = get_page_count();

			        // on récupère le numéro de page souhaité
			        if(isset($_GET['page']) && is_numeric($_GET['page'])) {
			            if($_GET['page'] < 1) {
			                $page = 0;
			            } elseif($_GET['page'] > $nb_pages) {
			                $page = $nb_pages - 1;
			            } else {
			                $page = $_GET['page'] - 1;
			            }
			        } else {
			            $page = 0;
			        }

			        $images = get_pictures_from_page($page);

			        // pour chaque image de la liste d’images,
			        foreach($images as $image) {
			            // afficher le HTML correspondant à une image
			            echo '<div class="slide">
			                    <a href="image.php?id='.$image['id'].'&amp;refpage='.($page+1).'"><img
			                        src="img/slider/'.$image['nom'].'" alt="Image '.$image['nom'].'"
			                        width="63" height="63"/></a>
			                </div>'.PHP_EOL;
			        }
			        ?>
			    </div>
			    <!--<?= menu_pagination($page + 1, $nb_pages); ?>-->


				<!--<div class="slide">
					<ul class="bxslider">-->
					<?php
					/*$pictures = get_pictures();
					foreach($pictures as $picture) {
						echo '<li><a href="image.php?id='.$picture['id'].'" target="_blank"><img src="img/slider/'.$picture['nom'].'" alt="" title="" width="63px"/></a></li>';
					}*/
					?>
					<!--</ul>
				</div>-->

				<h1>VIDÉOS</h1>

				<div class="listing-video">
					<?php
					$videos = get_all_video();
					foreach($videos as $video) {
						echo '<p class="info-video">'.$video['titre'].'</p>'
							.'<a href="' .$video['lien'].'" target="_blank">'.$video['lien'].'</a>';
					}
					?>
				</div>

				<h1>MUSIQUE</h1>

				<ul class="playlist">
					<?php
					$nb_music = $config['nb_music'];
					$musics = get_last_music($nb_music);
					foreach($musics as $music) {
						echo '<li><div class="track">'
							.'<span class="controls" id="playToggle"></span>'
							.'<span class="title"> ' .$music['nom'].'</span>'
							.'</div>'
							.'<audio>'
							.'<source src="audio/'.$music['nom'].'" type="audio/mp3" />
							Your browser does not support the <code>audio</code> element.'
							.'</audio>'
							.'</li>';
					}
					?>
				</ul>	

			</div>

			<div id="contact" class="contact">
				<ul class="nom">
					<li>Michel MAILLARD</li>
					<li>Tel. : 06 75 25 23 58</li>
					<li><a class="mail" href="mailto:contact@agua-sonora.fr">contact@agua-sonora.fr</a></li>
				</ul>
				<ul class="adresse">
					<li>-</li>
					<li><strong>Agua Sonora</strong></li>
					<li>Blockhaus DY10</li>
					<li>5 bis, Bd Léon Bureau</li>
					<li>44200 - Nantes</li>
				</ul>
			</div>

		</div><!-- fin de .content -->

		</div><!--fin de .screen -->

		<div id="mobile" class="display">

			<!--<div id="contact" class="contact">
				<ul class="nom">
					<li>Michel MAILLARD</li>
					<li>Tel. : 06 75 25 23 58</li>
					<li>contact@agua-sonora.fr</li>
				</ul>
				<ul class="adresse">
					<li>-</li>
					<li><strong>Agua Sonora</strong></li>
					<li>Blockhaus DY10</li>
					<li>5 bis, Bd Léon Bureau</li>
					<li>44200 - Nantes</li>
				</ul>
			</div>-->

			<img src="img/background.jpg" alt="" title="Agua-Sonora" class="image-mobile"/>

		</div><!-- fin de mobile -->

		 <script>
        	$(document).ready(function() {
          		$('.playlist').playlist();
        	});
		</script>

	</body>
</html>