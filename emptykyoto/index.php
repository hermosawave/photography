<?php 
	$goto = $_GET["s"];
switch ($goto) {
	case "qr":  // from booklet QR code //
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto?ref=dg0o4m");
		break;
	case "url": // from booklet url //
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto?ref=dg0o4m");
		break;
		
	case "ghost": // from emptykyoto blog //
		header("location:welcome.html");
		// header("location:https://www.kickstarter.com/projects/hermosawave/empty-kyoto?ref=atvp9q");
		break;
	default:
		header("location:welcome.html");
}
?>