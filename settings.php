<?php

$settings[0]["name"] = "lang";
$settings[0]["desc"]["en"] = "Language";
$settings[0]["desc"]["de"] = "Sprache";
$settings[0]["options"]["de"] = "Deutsch";
$settings[0]["options"]["en"] = "English";
$settings[0]["icon"] = "language";

$settings[1]["name"] = "css";
$settings[1]["desc"]["en"] = "Skin";
$settings[1]["desc"]["de"] = "Skin";
$settings[1]["options"]["colors.css"] = "Colors";
$settings[1]["options"]["lcars.css"] = "LCARS";
$settings[1]["options"]["hellokitty.css"] = "Hallo Kadse";
$settings[1]["options"]["slideshow.css"] = "Slideshow";

$settings[1]["icon"] = "eye";

$settings[2]["name"] = "dev";
$settings[2]["desc"]["en"] = "Devmode";
$settings[2]["desc"]["de"] = "Entwicklermodus";
$settings[2]["options"]["false"] = "0";
$settings[2]["options"]["true"] = "1";

$settings[2]["icon"] = "file-code-o";

include("cookiemonster.php");

$lang = cookiemonster("lang","de");
$dev = cookiemonster("dev","false");
$css = cookiemonster("css","slideshow.css");


?>
<!DOCTYPE>
<html>
	<head>
		<title>Space Monitor</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		<?php
			echo "<link rel=\"stylesheet\" href=\"$css\">";
		?>
		
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="main.js"></script>
	</head>
<body>

<div class="content">
<?php
	echo "<div class=\"box setting inactive\">
			<h2><span class=\"title\"><span class=\"fa fa-gear\"> </span>Settings</span></h2>
			</div>";
	echo "<div class=\"box setting inactive\"><br />
			</div>";

	foreach ($settings as $setting) {
		
		echo "
		<div class=\"box setting inactive\">
		<div class=\"controls\">";
		$options = $setting["options"];
		foreach($options as $option => $optname) {
			if (cookiemonster($setting["name"],"") == $option) {
				$class = "active";
			} else {
				$class="inactive";
			}
			echo "<li class=\"fa\"><span class=\"$class\" onclick=\"location.href='settings.php?" . $setting["name"] . "=" . $option. "';\">$optname</span></li>";
			/*
			<li class="fa fa-smile-o"><span> Bereit</span></li>

			*/

		}
		echo "</div>
			<h2><span class=\"title\"><span class=\"fa fa-" . $setting["icon"] . "\"> </span>" . $setting["desc"][$lang] . "</span></h2>
		</div>";

	}
?>
</div>

<footer>
	<div class="footerright">
		<ul>
			<li><a class="fa fa-check" href="index.php"><span>OK</span></a></li>
		</ul>
	</div>
</footer>

</body>
</html>