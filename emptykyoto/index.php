<?php 
	if ($_GET=="qr") elseif ($_GET=="url") {
		header("location:https://www.kickstarter.com/projects/hermosawave/1909053314")
	} else {
		header("location:welcome.html")
	}
?>