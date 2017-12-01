<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>VHSLive</title>
		<link rel="stylesheet" type="text/css" href="./css/main.css"/>
		<link rel="shortcut icon" href="./favicon.ico"/>
		<script src="./js/getVote.js"></script>
		<?php
			$filename = "./poll/selected.txt"; // temp
			$content = file($filename);
			$array = explode("|", $content[0]);
		?>
	</head>
	<body>
		<img id="logo" src="./img/vhslive-logo.png"/>
		<hr/>
			<h4 id="nav">
				<a href="./index.php">Home</a> -
				<a href="./about.html">About</a> -
				<a href="./contact.html">Contact</a> 
			</h4>
		<hr/>
		<iframe src="https://player.twitch.tv/?channel=vhslive" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe>
		<!--iframe src="https://www.twitch.tv/vhslive/chat?popout=" frameborder="0" scrolling="no" height="500" width="350"></iframe-->
		<div id="poll">
			<h4>Pick our next movie.</h4>
			<form>
				<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
				<?php echo($array[0])?>
				<br/>
				<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
				<?php echo($array[1])?>	
				<br/>	
				<input type="radio" name="vote" value="2" onclick="getVote(this.value)">
				<?php echo($array[2])?>		
			</form>
		</div>
		<img src="./img/bg.png" id="bottom"/>
	</body>
</html>
