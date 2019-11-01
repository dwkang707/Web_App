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
		<?php $song_count = 5678; ?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= (int)($song_count / 10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<?php $news_pages = $_GET["newspages"]; ?>
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
				<?php 
					if ($news_pages !== NULL) {
						for ($i = 11; $i > 11 - $news_pages; $i--) {
							if ($i < 10) { ?>
								<li><a href="https://www.billboard.com/archive/article/20190<?= $i ?>">2019-0<?= $i ?></a></li>
							<?php }
							else { ?>
								<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>">2019-<?= $i ?></a></li>
							<?php } ?>
						<?php } ?>
					<?php }

					else {
						for ($i = 11; $i > 6; $i--) {
							if ($i < 10) { ?>
								<li><a href="https://www.billboard.com/archive/article/20190<?= $i ?>">2019-0<?= $i ?></a></li>
							<?php }
							else { ?>
								<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>">2019-<?= $i ?></a></li>
							<?php } ?>							
						<?php } ?>
					<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!--<?php
			$artists = array("Guns N' Roses", "Green Day", "Blink 182", "The Cranberries", "Bruno Mars", "Amy Winehouse", "Jason Mraz");
		?>-->

		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<?php $artists = file("favorite.txt"); ?>
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php 
					foreach ($artists as $artist) { ?>
						<li><a href="http://en.wikipedia.org/wiki/<?= $artist ?>"><?= $artist ?></a></li>
				<?php } ?>				
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php
				$songs = glob("lab5\musicPHP\songs\*.mp3");
				shuffle($songs);
			?>
			<ul id="musiclist">
				<?php
					foreach ($songs as $song) { ?>
				<li class="mp3item">
					<a href="<?= $song ?>"><?= basename($song) ?></a> (<?= (int)(filesize($song) / 1024) ?> KB)
				</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$playlists = glob("lab5\musicPHP\songs\*.m3u");
					shuffle($playlists);
					foreach ($playlists as $playlist) { ?>
						<li class="playlistitem"><?= basename($playlist) ?>:
							<ul>
								<?php
									$list = file($playlist);
									$mp3_list = array();
									foreach ($list as $item) {
										$pos = strpos($item, ".mp3");
										if ($pos !== false) {
											array_push($mp3_list, $item);
										}
									}
									shuffle($mp3_list);
								?>

								<?php foreach ($mp3_list as $item) { ?>
									<li><?= $item ?></li>
								<?php } ?>
							</ul>
						</li>
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
