<?php 
	$goto = $_GET["s"];
switch ($goto) {
	case "qr":
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto?ref=dg0o4m");
		break;
	case "url":
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto?ref=dg0o4m");
		break;
	default:
		header("location:welcome.html");
}
?>