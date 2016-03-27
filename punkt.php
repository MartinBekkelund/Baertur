<!DOCTYPE html>
<html lang="no">
	<head>
		<title><?php echo htmlspecialchars($_GET["sted"]); ?></title>
		<meta charset="utf-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,700,700italic,400italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
		<script src="/bower_components/L.TileLayer.Kartverket/dist/L.TileLayer.Kartverket.min.js"></script>
		
		<style type="text/css">
			body {
				margin: 0;
			}
			
			#mapid {
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
			}
			
			.leaflet-popup {
				font-family: 'Montserrat', sans-serif;
				text-transform: uppercase;
			}
			
			a.leaflet-popup-close-button {
				display: none;
			}
		</style>
		
	</head>
	<body>
		<div id="mapid"></div>
		
		<script>
	
			var mymap = L.map('mapid').setView([<?php echo htmlspecialchars($_GET["punkt"]); ?>], 13);
			
			L.tileLayer.kartverket('topo2').addTo(mymap);
	
			L.marker([60.7388,8.7170]).addTo(mymap)
				.bindPopup("<?php echo htmlspecialchars($_GET['sted']); ?>").openPopup();
	
		</script>
	</body>
</html>