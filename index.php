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
		<link href="css/bxslider/jquery.bxslider.css" rel="stylesheet"><!-- plugin bxslider -->
		<link href="css/simpleplaylist.css" rel="stylesheet"><!-- plugin simple playlist -->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/bxslider/jquery.bxslider.min.js"></script><!-- plugin bxslider -->
		<script src="js/jquery.simpleplaylist.js"></script><!-- plugin simple playlist -->
	</head>
	<body>
		<nav>
			<img src="img/logo-arbre.png" alt="logo" title="logo" class="logo"/>
			<ul class="menu">
				<li><a href="#who">who we are</a></li>
				<li><a href="#calendrier">calendrier</a></li>
				<li><a href="#images-sons">images / sons</a></li>
				<li><a href="#contact">contact</a></li>
			</ul>
		</nav>

		<div id="content">

			<div id="who" class="who">
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
				sans oublier les morceaux résolument « Salsa ».</p>

				<h1>Musiciens :</h1>

				<ul class="groupe">
					<li>Benjamin Lebert : Tuba</li>
					<li>Aurélien Bucco : Trompette</li>
					<li>Cyrille Maillard, Tobie Koppé : Percussions</li>
					<li>Denis Peduzzi : Guitare</li>
				</ul>
			</div>

			<div id="calendrier" class="calendrier">
				<h1>Retrouvez-nous !</h1>
				<p>_ _ _ </p>

				<?php
				/*$nb_date = $config['nb_date_future'];
				$dates = get_last_date($nb_date);
				foreach($dates as $date) {
					echo '<p class="date">'.$date['date'].'</p>'
						.'<p class="lieu">'.$date['heure'].' '.$date['adresse'].' - '.$date['ville'].' ('.$date['departement'].')</p>';
				}*/
				?>

				<p class="date">14 DÉCEMBRE 2014</p>
				<p class="lieu">16:00 Marché de noël / Place Travot – Cholet (49)</p>

				<p class="date">21 DÉCEMBRE 2014</p>
				<p class="lieu">15:30 Marché de noël / centre ville – Saint-Nazaire (44)</p>

				<p class="date">10 JANVIER 2015</p>
				<p class="lieu">20:30 Espace culturel – Saint-Jouan-des-Guerets (35)</p>

				<p class="date">23 JANVIER 2015</p>
				<p class="lieu">20:30 La cave à sons – L'herbergement (85)</p>

				<h2>Vous avez pu nous voir...</h2>
				<p>_ _ _ </p>

				<p class="date passe">05 NOVEMBRE 2014</p>
				<p class="lieu passe">20:30 Australian café – Nantes (44)</p>

				<p class="date passe">06 NOVEMBRE 2014</p>
				<p class="lieu passe">20:30 Altercafé – Nantes (44)</p>

			</div>

			<div id="images-sons" class="images-sons">
				<h1>PHOTOS</h1>
				<div class="slide">
					<ul class="bxslider">
					<?php
					$pictures = get_pictures();
					foreach($pictures as $picture) {
						echo '<li><a href="image.php?id='.$picture['id'].'" target="_blank"><img src="img/slider/'.$picture['nom'].'" alt="" title="" width="63px"/></a></li>';
					}
					?>
					</ul>
				</div>

				<h1>VIDÉOS</h1>

				<p class="info-video">Lieu, date de la vidéo</p>
				<a href="http://www.xxxxxxxxxxxxx..." target="_blank">http://www.xxxxxxxxxxxxx...</a>

				<p class="info-video">Lieu, date de la vidéo</p>
				<a href="http://www.xxxxxxxxxxxxx..." target="_blank">http://www.xxxxxxxxxxxxx...</a>

				<p class="info-video">Lieu, date de la vidéo</p>
				<a href="http://www.xxxxxxxxxxxxx..." target="_blank">http://www.xxxxxxxxxxxxx...</a>

				<h1>MUSIQUE</h1>

				<ul class="playlist">
					<?php
					$nb_music = $config['nb_music'];
					$musics = get_last_music($nb_music);
					foreach($musics as $music) {
						echo '<li><div class="track">'
							.'<span class="controls" id="playToggle"></span>'
							.'<span class="title"> '.$music['nom'].'</span>'
							.'</div>'
							.'<audio>'
							.'<source src="audio/'.$music['nom'].'" type="audio/mp3" />
							Your browser does not support the <code>audio</code> element.'
							.'</audio>'
							.'</li>';
					}
					?>

					<li>
						<div class="track">
						<span class="controls" id="playToggle"></span>
						<span class="title">Titre morceau</span>
						</div>
						<audio>
						<source src="audio/test.mp3" type="audio/mp3" />
						Your browser does not support the <code>audio</code> element.
						</audio>
					</li>
					<li>
						<div class="track">
						<span class="controls" id="playToggle"></span>
						<span class="title">Titre morceau</span>
						</div>
						<audio>
						<source src="audio/speed.mp3" type="audio/mp3" />
						<source src="audio/speed.ogg" type="audio/ogg" />
						Your browser does not support the <code>audio</code> element.
						</audio>
					</li>
					<li>
						<div class="track">
						<span class="controls" id="playToggle"></span>
						<span class="title">Titre morceau</span>
						</div>
						<audio>
						<source src="audio/top90(radio).mp3" type="audio/mp3" />
						<source src="audio/top90(radio).ogg" type="audio/ogg" />
						Your browser does not support the <code>audio</code> element.
						</audio>
					</li>
				</ul>	

			</div>

			<div id="contact" class="contact">
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
			</div>

		</div>

		<script>
			$(document).ready(function(){
			  $('.bxslider').bxSlider(
			  	{
			    slideWidth: 300,
			    minSlides: 4,
			    maxSlides: 4,
			    moveSlides: 3,
			    slideMargin: 5
			  	}
			  	);
			});
		</script>

		 <script>
        	$(document).ready(function() {
          		$('.playlist').playlist();
        	});
		</script>

	</body>
</html>