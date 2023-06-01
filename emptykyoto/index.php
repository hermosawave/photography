<?php 
	$goto = $_GET["s"];
switch ($goto) {
	case "qr":
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto");
		break;
	case "url":
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto");
		break;
	default:
		header("location:welcome.html");
}
?>