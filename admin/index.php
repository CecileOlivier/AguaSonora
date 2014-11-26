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
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<header>
			<h1>Espace d'administration</h1>
			<a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
		</header>

		<main>
			
			<div class="calendrier">
			<h2>Calendrier</h2>
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
				$jour = new DateTime($date['date']);
			    echo '<tr>'.PHP_EOL
			   		.'<td>'.$date['id'].'</td>'.PHP_EOL
			    	.'<td>'.$jour->format('d F o').'</td>'.PHP_EOL
			    	.'<td>'.$date['heure'].'</cd>'.PHP_EOL
			    	.'<td>'.$date['adresse'].'</td>'.PHP_EOL
			    	.'<td>'.$date['ville'].'</td>'.PHP_EOL
					.'<td>('.$date['departement'].')</td>'.PHP_EOL
			    	.'<td><a href="update_date.php?id='.$date['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
			    	.'<a href="delete_date.php?id='.$date['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007"title="Supprimer"/></a></td>'.PHP_EOL
			    	.'</tr>'.PHP_EOL;
			}
			echo '</table>';
			?>
			<a href="insert_date.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter une date"/></a>
			</div>

			<div class="image">
			<h2>Images</h2>
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
				.'<td><a href="update.php?id='.$picture['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
				.'<a href="delete.php?id='.$picture['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007" title="Supprimer"/></a></td>'.PHP_EOL
				.'</tr>'.PHP_EOL;
			}
			echo '</table>';
			?>
			<a href="insert_picture.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter une image"/></a>
			</div>
			
			<div class="music">
			<h2>Sons</h2>
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
				.'<td><a href="update.php?id='.$music['id'].'"><input type="button" class="btn-style" name="update" value="&#10000" title="Modifier"/></a>'
				.'<a href="delete.php?id='.$music['id'].'"><input type="button" class="btn-style" name="delete" value="&#10007"title="Supprimer"/></a></td>'.PHP_EOL
				.'</tr>'.PHP_EOL;
			}
			echo '</table>';
			?>
			<a href="insert_music.php"><input type="button" name="ajouter"  class="btn-style add" value="Ajouter un son"/></a>
			</div>

		</main>

	</body>
</html>