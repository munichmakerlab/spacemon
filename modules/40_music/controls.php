	<script>
	function mpd_sendcmd(cmd) {
			$("#volume").load( 'modules/40_music/mpd.php?a=' + cmd);
	}

	function get_volume() {
		$("#volume").load("modules/40_music/mqtt_get_volume.php");
	}

	function send_command(params) {
			$("#commandsender").load(encodeURI('modules/40_music/publish.php?command=' + params));
			console.log("sending " + params);
			get_volume();
	}
	//mpd_sendcmd("volume");
	get_volume();
	window.setInterval("get_volume();",20000);
	</script>
	<div id="commandsender" style="display:none;"></div>
	<?php
	include("module.conf.php");

	?>
	<div id="mpdresult" style="display: none;"></div>
	<li onclick="mpd_sendcmd('prev');" class="fa fa-step-backward"></li>
	<li onclick="mpd_sendcmd('stop');" class="fa fa-stop"></li>
	<li onclick="mpd_sendcmd('pause');" class="fa fa-pause"></li>
	<li onclick="mpd_sendcmd('play');" class="fa fa-play"></li>
	<li onclick="mpd_sendcmd('next');" class="fa fa-step-forward"></li>
	<li class="fa">&nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li onclick="send_command('volume down');" class="fa fa-volume-down"></li>
	<li class="fa"><span id="volume">%</span></li>
	<li onclick="send_command('volume up');" class="fa fa-volume-up"></li>
