<?php
	include "module.conf.php";
	if (!isset($_COOKIE['lang'])) {
		$lang = "de";
	} else {
		$lang = $_COOKIE['lang'];
	}
?>
<div class="contentbox_1 tiles">
	<ul>
		<li><a><?php echo $moduleconfig["feeds"]["$lang"]["0"] ; ?> </a></li>
		<li><a><?php echo $moduleconfig["feeds"]["$lang"]["1"] ; ?> </a></li>
		<li><a><?php echo $moduleconfig["feeds"]["$lang"]["2"] ; ?> </a></li>
		<li><a><?php echo $moduleconfig["feeds"]["$lang"]["3"] ; ?> </a></li>
	</ul>
</div>
<div class="contentbox_2">
	<?php
		$urls = $moduleconfig["feeds"]["url"];
		$i=0;
		foreach ($urls as $url) {
			if ($moduleconfig["feeds"]["type"][$i] == "rss") {
				echo "<div class=\"cal cal-$i\"><textarea style=\"color: white;float:left\" rows=\"8\" cols=\"50\">";
				if ($feed = @simplexml_load_file($url)) {
					foreach ($feed->channel->item as $item) {
						$dc = $item->children('http://purl.org/dc/elements/1.1/');
						echo $dc->creator . ": " . $item->title . "\n";
					}

				} else {
					echo "feed nix gut";
				}
			}



			echo "</textarea></div>";
			$i++;
		}
	?>
</div>
