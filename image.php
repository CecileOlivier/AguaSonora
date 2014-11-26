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
		<script src="js/bxslider/jquery.bxslider.min.js"></script><!-- plugin bxslider -->
		<script src="js/jquery.simpleplaylist.js"></script><!-- plugin simple playlist -->
	</head>
	<body>

			<div class="full-picture">
				<img src="img/slider/select-slide-2.png" alt="" title="" height="100%"/>
			</div>

			<div id="images-sons" class="images-sons">
				<h1>PHOTOS</h1>
				<div class="slide">
					<ul class="bxslider">
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide1.jpg" alt="" title="" width="63px"/></li>
						<li><img src="img/slider/slide2.jpg" alt="" title="" width="63px"/></li>
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

				<p class="retour"><a href="index.php#images-sons">[&#10132 RETOUR]</a></p>

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