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
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/jquery.simpleplaylist.js"></script><!-- plugin simple playlist -->
	</head>
	<body>

			<div class="full-picture">
				<?php
				if(isset($_GET['id'])) {
					$pictures = get_pictures_by($_GET['id']);
    				if($pictures) {
    					echo '<img src="img/slider/'.$pictures['nom'].'" alt="'.$pictures['nom'].'" height="100%"/>';
    				}
    				else {
        				echo 'Aucune valeur trouvée';
    				}
				}
				$suivant = ($_GET['id'])+1;
				$precedent = ($_GET['id'])-1;
				$nb_images = count_pictures();
				if(($_GET['id'])< $nb_images){
					echo '<a class="nav-full-picture" href="image.php?id='.$suivant.'">></a>';
				}
				else {
					echo '<a class="nav-full-picture" href="image.php?id='.$precedent.'"><</a>';
				}
				?>
			</div>

			<div id="images-sons" class="images-sons">
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

				<h1>VIDÉOS</h1>

				<div class="listing-video">

				<p class="info-video">Clip Agua Sonora - novembre 2014</p>
				<a href="http://vimeo.com/113073557" target="_blank">http://vimeo.com/113073557</a>


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

				<p class="retour"><a href="index.php#images-sons">[&#10132 RETOUR]</a></p>

			</div>

		 <script>
        	$(document).ready(function() {
          		$('.playlist').playlist();
        	});
		</script>

	</body>
</html>