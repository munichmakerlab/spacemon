<?php
include("cookiemonster.php");

$lang = cookiemonster("lang","de");
$dev = cookiemonster("dev","false");
$css = cookiemonster("css","slideshow.css");

$modules = glob("modules/*",GLOB_ONLYDIR);
$cssfiles = glob("*.css");

?>
<!DOCTYPE>
<html>
	<head>
		<title>Space Monitor</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		<?php
			echo "<link id=\"css\" rel=\"stylesheet\" href=\"$css\">";
		?>
		
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="main.js"></script>
		<script type="text/javascript">
		lang="<?php echo $lang; ?>";
		dev="<?php echo $dev; ?>";
		$(document).keypress(function(e) {
		$( document ).ready(function() {
		    if(e.which >= 48 && e.which <= 57) {
		    	number = e.which-48;
		        <?php
		        $i=0;
		        foreach ($cssfiles as $cssfile) {
		        	$i++;
		        	//echo "if (number==$i) { location.href=\"index.php?css=$cssfile\"; }";
		        	echo "if (number==$i) { $(\"head link#css\").attr(\"href\",\"$cssfile\"); }";
		        }

		        ?>
		    }
		    if (e.which==43) {
		    	randomizer();
		    }

			});
		});
		</script>


	</head>
<body>

<div class="content">
<?php
	foreach ($modules as $module) {
		$module = explode("/",$module)[1];
		$modulename = explode("_",$module,2)[1];
		$moduleconfig = false;
		include("modules/$module/module.conf.php");
		if (!isset($moduleconfig["dev"]) || ($dev == "true"))  {
			echo "\n<div id=\"box-$module\" class=\"box box-$modulename inactive\">" . 
			"<div class=\"controls\">";

			if (file_exists("modules/$module/controls.php")) {
				echo "<span onclick=\"getControls('$module','$lang')\">be loading moar</span>";
				echo "\n<script type=\"text/javascript\">
				getControls(\"$module\",\"$lang\");
				</script>\n";
			} else {
				echo "<!-- no controls.php, so no controls! -->\n";
			}
			echo "</div>" .
			"<h2 id=\"h2-" . $modulename . "\"><span class=\"title\">" . 
				"<span class=\"fa fa-" . $moduleconfig["icon"] . "\"> </span>" . 
				$moduleconfig["name"]["$lang"] .
			"</span></h2>";

			if (file_exists("modules/$module/content.php")) {
				echo "<div class=\"contentbox content-" . $modulename . "\" id=\"content-" . $module . "\"><span class=\"contentloading\">content loading</span></div>\n\n";
			}
			echo "</div>";
			if ($moduleconfig["refresh"] > 0) {
				echo "<script>window.setInterval(\"getControls('$module','$lang')\"," . $moduleconfig["refresh"]  . "000);</script>";
			}
		}
	}
?>
</div>

<footer>
	<div class="footerleft">
		<ul>
			<li id="settings"><span class="fa fa-language"></span> <a href="?lang=en">EN</a> / <a href="?lang=de">DE</a> <a href="settings.php" class="fa fa-gear"></a></li>
			
		</ul>
	</div>
	<div class="footerright">
		<ul>
			<li id="clock"><script>window.setInterval("setTime();",1000);</script></li>
		</ul>
	</div>
</footer>
</body>
</html>
