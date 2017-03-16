<?php

/* Settings */
$mpdServer = '10.10.20.50';
$mpdPort = '6600';
$mpdPassword = NULL;
$volDownSteps = 2;
$volUpSteps = 2;



include 'mpd.class.php';


$mpd = new mpd($mpdServer, $mpdPort, $mpdPassword);


if($mpd->connected == FALSE) {
    	echo "Error: " .$mpd->errStr;
} else {
	if (isset($_GET["a"])) {

		switch($_GET['a']) {
			case 'volup':
				$mpd->AdjustVolume($volUpSteps); break;
			case 'voldown':
				$mpd->AdjustVolume('-'.$volDownSteps); break;
			case 'play':
				$mpd->Play(); break;
			case 'pause':
				$mpd->Pause();  break;
			case 'prev':
				$mpd->Previous(); break;
			case 'next':
				$mpd->Next(); break;
			case 'stop':
				$mpd->Stop(); break;
			case 'load':
				$mpd->PLClear();$mpd->PLLoad($_GET["b"]);$mpd->Play(); break;

		}
	}
	echo $mpd->GetVolume() . "%";
}
?>
