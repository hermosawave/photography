
<?php var_dump($_POST); 

header('Location: formthanks.html&name=' . $_POST["name"]);
exit();
?>