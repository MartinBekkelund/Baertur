<?php include("assets/php/topp.php"); ?>

<?php
	$target_dir = "gpx/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if(isset($_POST["submit"])) {
	
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "<p>Turen eksisterer allerede.</p>";
	    $uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "gpx" ) {
	    echo "<p>Du kan kun laste opp turer av typen GPX.</p>";
	    $uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "<p>Turen ble ikke lastet opp.</p>";
	
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "<p>Turen <a href='/tur.php?gpx=". basename( $_FILES["fileToUpload"]["name"]). "'>". basename( $_FILES["fileToUpload"]["name"])."</a> er lastet opp.</p><p>Du kan se den <a href='/tur.php?gpx=". basename( $_FILES["fileToUpload"]["name"]). "'>på et kart</a> eller gå til <a href='/'>oversikten</a>.</p><p>Ønsker du å lime kartet inn på en nettside, kan du bruke følgende kode:</p><p>&lt;iframe src=\"http://kart.bekkelund.net/tur.php?gpx=". basename( $_FILES["fileToUpload"]["name"])."\" class=\"kart\"&gt;&lt;/iframe&gt;</p>";
	    } else {
	        echo "<p>En feil oppstod under opplasting.</p>";
	    }
	}
?>

<?php include("assets/php/bunn.php"); ?>