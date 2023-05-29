<?php 
	$goto = $_GET["s"];
switch ($goto) {
	case "qr":
		header("location:https://www.kickstarter.com/projects/hermosawave/1909053314");
		break;
	case "url":
		header("location:https://www.kickstarter.com/projects/hermosawave/1909053314");
		break;
	default:
		header("location:welcome.html");
}
?>