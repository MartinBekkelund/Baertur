<!DOCTYPE html>
<html lang="no">
	<head>
		<title>Tur — <?php echo htmlspecialchars($_GET["gpx"]); ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
		<script src="assets/lib/L.TileLayer.Kartverket/dist/L.TileLayer.Kartverket.min.js"></script>
		<script src="assets/lib/leaflet-gpx/gpx.js"></script>
		<style type="text/css">
			#map {
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
			}
		</style>
	</head>
	<body>
		<div id="map"></div>

		<script type="text/javascript">

			(function () {
				'use strict';

				var map = L.map('map');
				L.tileLayer.kartverket('topo2').addTo(map);

				var gpx = 'gpx/<?php echo htmlspecialchars($_GET["gpx"]); ?>';
				var options = {
					async: true,
					marker_options: {
						startIconUrl: 'assets/lib/leaflet-gpx/pin-icon-start.png',
						endIconUrl: 'assets/lib/leaflet-gpx/pin-icon-end.png',
						shadowUrl: 'assets/lib/leaflet-gpx/pin-shadow.png'
					}
				};

				new L.GPX(gpx, options).on('loaded', function(e) {
					map.fitBounds(e.target.getBounds());
				}).addTo(map);
			}());

		</script>
	</body>
</html>