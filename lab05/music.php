<!DOCTYPE html>
<html lang="en">

<head>
	<title>Music Library</title>
	<meta charset="utf-8" />
	<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
	<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<h1>My Music Page</h1>

	<!-- Ex 1: Number of Songs (Variables) -->
	<?php
	$song_count = 5678;
	$hours = (int) "10";
	print "I love music.";
	print "I have $song_count total songs,";
	print "which is over $hours hours of music!";
	?>

	<!-- Ex 2: Top Music News (Loops) -->
	<!-- Ex 3: Query Variable -->
	<div class="section">
		<h2>Billboard News</h2>
		
		<ol>
			<?php
			$newspages = $_GET["newspages"];
			$year = 2019;
			$month = 12;
			if($_GET["newspages"] === null)
				$newspages = 5;
			for($i = 0; $i<$newspages; $i++){
				$month = $month - 1;
				if($month==0){
					$month = 12;
					$year = $year - 1;
				}
				$linknum = str_pad($month,"2","0",STR_PAD_LEFT); ?>
				<li><a href="https://www.billboard.com/archive/article/<?= $year ?><?= $linknum ?>"><?= $year ?>-<?= $linknum ?></a></li>
			<?php } ?>
		</ol>
	</div>

	<!-- Ex 4: Favorite Artists (Arrays) -->
	<!-- Ex 5: Favorite Artists from a File (Files) -->
	<div class="section">
		<h2>My Favorite Artists</h2>
		
		<ol>
			<?php $artist = file("favorite.txt");
			for($i = 0; $i<7; $i++){ ?>
				<li><a href="http://en.wikipedia.org/wiki/<?= $artist[$i]?>"><?= $artist[$i] ?></a></li>
			<?php } ?>
		</ol>
	</div>

	<!-- Ex 6: Music (Multiple Files) -->
	<!-- Ex 7: MP3 Formatting -->
	<div class="section">
		<h2>My Music and Playlists</h2>

		<ul id="musiclist">
			<?php 
			$songs = glob("lab5/musicPHP/songs/*.mp3");;
			function cmp($a,$b){
				if(filesize($a) == filesize($b))
					return 0;
				return (filesize($a)>filesize($b)) ? -1:	1;
			}
			usort($songs,cmp);
			foreach ($songs as $songfile){
				print "<li class='mp3item'><a href='lab5/musicPHP/songs/basename($songfile)>'>" . basename($songfile) . "</a> (".floor(filesize($songfile)/1024)." KB)</li>\n";
			}
			?>
			<!-- Exercise 8: Playlists (Files) -->
			<?php 
			$seri = glob("lab5/musicPHP/songs/*.m3u");
			rsort($seri);
			foreach ($seri as $serifile){
				print "<li class='playlistitem'>" . basename($serifile) . "</li>"; 
				$text = explode("\n",file_get_contents($serifile));
				shuffle($text);	
				?>
				<ul>
					<?php 
					$outlier = "#";
					foreach($text as $key)
						if(strpos($key,$outlier) !== 0 and strlen($key)>0)
							print "<li>" .$key. "</li>";
						?>
					</ul>
				<?php } ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
	</html>
