<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : administration</title>
		<link href="../css/reset.css" rel="stylesheet">
		<link href="../css/admin.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/jquery.tab.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/vendor/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
	    tinymce.init({
		    selector: "textarea",
		    theme: "modern",
		    plugins: [
		         "autolink link lists charmap preview hr spellchecker",
		         "searchreplace wordcount visualblocks visualchars nonbreaking",
		         "save contextmenu directionality paste"
		    ],
	 	}); 
	    </script>
	</head>
	<body>
		<header>
			<h1>Espace d'administration</h1>
			<a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
		</header>

		<main>

		<div id="tabs">
		<ul>
		<li><a href="#tabs-1"><h2>Who we are</h2></a></li>
		<li><a href="#tabs-2"><h2>Calendrier</h2></a></li>
		<li><a href="#tabs-3"><h2>Images et sons</h2></a></li>
		<li><a href="#tabs-4"><h2>Contact</h2></a></li>
		</ul>

		<div id="tabs-1" class="whoweare">
			<?php
			$texte = get_texte();
			echo '<table class="listing_picture">'
					.'<tr>'
					.'<th>Id</th>'
					.'<th>Texte de présentation</th>'
					.'<th></th>'
					.'</tr>'.PHP_EOL
					.'<tr>'.PHP_EOL
					.'<td>'.$texte['id'].'</td>'.PHP_EOL
					.'<td>'.$texte['texte'].'</td>'.PHP_EOL
					.'<td><a href="update-whoweare.php?id='.$texte['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a></td>'.PHP_EOL
					.'</tr>'.PHP_EOL;
				echo '</table>';
			?>
		</div>

		<div id="tabs-2" class="calendrier">
			<?php
			$dates = get_all_date();
			echo '<table class="listing_date">'
				.'<tr>'
				.'<th>Id</th>'
				.'<th>Date</th>'
				.'<th>Heure</th>'
				.'<th>Adresse</th>'
				.'<th>Ville</th>'
				.'<th>Département</th>'
				.'<th></th>'
				.'</tr>'.PHP_EOL;
			foreach ($dates as $date) {
				setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
				$jour = strftime("%d %B %Y",strtotime($date['date']));
				$heure = strftime("%H:%M",strtotime($date['heure']));
			    echo '<tr>'.PHP_EOL
			   		.'<td>'.$date['id'].'</td>'.PHP_EOL
			    	.'<td>'.$jour.'</td>'.PHP_EOL
			    	.'<td>'.$heure.'</cd>'.PHP_EOL
			    	.'<td>'.$date['adresse'].'</td>'.PHP_EOL
			    	.'<td>'.$date['ville'].'</td>'.PHP_EOL
					.'<td>('.$date['departement'].')</td>'.PHP_EOL
			    	.'<td><a href="update-date.php?id='.$date['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
			    	.'<a href="delete_date.php?id='.$date['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007" title="Supprimer"/></a></td>'.PHP_EOL
			    	.'</tr>'.PHP_EOL;
			}
			echo '</table>';
			?>
			<a href="insert_date.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter une date"/></a>
			</div>

			<div id="tabs-3" class="images-sons">
				<section class="image">
				<h3>Images</h3>
				<?php
				$pictures = get_pictures();
				echo '<table class="listing_picture">'
					.'<tr>'
					.'<th>Id</th>'
					.'<th>Nom</th>'
					.'<th>Aperçu</th>'
					.'<th></th>'
					.'</tr>'.PHP_EOL;
				foreach ($pictures as $picture) {
				echo '<tr>'.PHP_EOL
					.'<td>'.$picture['id'].'</td>'.PHP_EOL
					.'<td>'.$picture['nom'].'</td>'.PHP_EOL
					.'<td><img src="../img/slider/'.$picture['nom'].'" alt="" width="40px"/></td>'.PHP_EOL
					.'<td><a href="update-picture.php?id='.$picture['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
					.'<a href="delete-picture.php?id='.$picture['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007" title="Supprimer"/></a></td>'.PHP_EOL
					.'</tr>'.PHP_EOL;
				}
				echo '</table>';
				?>
				<a href="insert_picture.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter une image"/></a>
				</section>
				
				<section class="music">
				<h3>Sons</h3>
				<?php
				$musics = get_all_music();
				echo '<table class="listing_music">'
					.'<tr>'
					.'<th>Id</th>'
					.'<th>Nom</th>'
					.'<th>Date</th>'
					.'<th></th>'
					.'</tr>'.PHP_EOL;
				foreach ($musics as $music) {
				$jour = new DateTime($music['date']);
				echo '<tr>'.PHP_EOL
					.'<td>'.$music['id'].'</td>'.PHP_EOL
					.'<td>'.$music['nom'].'</td>'.PHP_EOL
					.'<td>'.$jour->format('d/m/Y').'</td>'.PHP_EOL
					.'<td><a href="update-music.php?id='.$music['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
					.'<a href="delete-music.php?id='.$music['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007" title="Supprimer"/></a></td>'.PHP_EOL
					.'</tr>'.PHP_EOL;
				}
				echo '</table>';
				?>
				<a href="insert_music.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter un son"/></a>
				</section>

				<section class="video">
				<h3>Video</h3>
				<?php
				$videos = get_all_video();
				echo '<table class="listing_video">'
					.'<tr>'
					.'<th>Id</th>'
					.'<th>Lien</th>'
					.'<th>Titre</th>'
					.'<th></th>'
					.'</tr>'.PHP_EOL;
				foreach ($videos as $video) {
				echo '<tr>'.PHP_EOL
					.'<td>'.$video['id'].'</td>'.PHP_EOL
					.'<td>'.$video['lien'].'</td>'.PHP_EOL
					.'<td>'.$video['titre'].'</td>'.PHP_EOL
					.'<td><a href="update-video.php?id='.$video['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
					.'<a href="delete-video.php?id='.$video['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007" title="Supprimer"/></a></td>'.PHP_EOL
					.'</tr>'.PHP_EOL;
				}
				echo '</table>';
				?>
				<a href="insert_video.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter une vidéo"/></a>
				</section>
			</div>

			<div id="tabs-4" class="contact">
				<?php
				$contact = get_contact();
				echo '<table class="listing_contact">'
					.'<tr>'
					.'<th>Id</th>'
					.'<th>Texte</th>'
					.'<th></th>'
					.'</tr>'.PHP_EOL;
				echo '<tr>'.PHP_EOL
					.'<td>'.$contact['id'].'</td>'.PHP_EOL
					.'<td>'.$contact['texte'].'</td>'.PHP_EOL
					.'<td><a href="update-contact.php?id='.$contact['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a></td>'.PHP_EOL
					.'</tr>'.PHP_EOL;
				echo '</table>';
				?>
			</div>

		</div>



		</main>

		<script>
		$(function() {
		$( "#tabs" ).tabs();
		});
		</script>

	</body>
</html>