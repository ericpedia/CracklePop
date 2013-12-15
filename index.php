<?php include "cracklepop.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>CracklePop</title>
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet/less" type="text/css" href="styles/main.less">
	<script src="js/less.js"></script>
	</head>
<body>

	<div class="results">
		<?php 

			echo flexibleCracklePop( array(
					'min' => 1,
					'max' => 100,
					'template' => '<a class="item-{{item}}" href="audio/{{item}}.mp3">{{item}}</a>',
					'magicnumbers' => array(
						3 => "Crackle",
						5 => "Pop",
					)
				) 
			); 

		?>
	</div>

	<script src="js/jquery.js"></script>
	<script src="cracklepop.audio.js"></script>
</body>
</html>