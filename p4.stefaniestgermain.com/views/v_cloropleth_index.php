	<style>
		#map {
			width: 960px;
			height: 600px;
		}


		.info {
			padding: 6px 8px;
			font: 14px/16px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255,255,255,0.8);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.info h4 {
			margin: 0 0 5px;
			color: #777;
		}

		.legend {
			text-align: left;
			line-height: 18px;
			color: #555;
		}
		.legend i {
			width: 18px;
			height: 18px;
			float: left;
			margin-right: 8px;
			opacity: 0.7;
		}
	</style>
</head>

	<div id="map"></div>

	
	
	<script type="text/javascript">

		var map = L.map('map').setView([42.373, -71.107], 7);

		var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
			attribution: 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
			key: '0302235d29684d8eae0be1f5149a05b6',
			styleId: 79642
		}).addTo(map);


    	//setting boundary to not allow panning outside Cambridge, MA
    	var southWest = new L.LatLng(42.34078, -71.04755),
        northEast = new L.LatLng(42.39811, -71.16222), 
        boundsmax = new L.LatLngBounds(southWest, northEast);
        map.setZoom(13);
        map.setMaxBounds([boundsmax]);

		// control that shows state info on hover
		var info = L.control();

		info.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info');
			this.update();
			return this._div;
		};

		info.update = function (props) {
			this._div.innerHTML = '<h4>E-75 311 issues by zipcode</h4>' +  (props ?
				'<b>' + props.name + '</b><br />' + props.density + ' issues reported'
				: 'Hover over area');
		};

		info.addTo(map);


		// color based on issue volume per zip code
		// colors from ColorBrewer 

		function getColor(d) {
			return d > 50 ? '#253494' :
			       d > 40  ? '#2C7FB8' :
			       d > 30  ? '#41B6C4' :
			       d > 20  ? '#A1DAB4' :
			       d > 10  ? '#FFFFCC' :
			                 '#FFEDA0';
		}

		function style(feature) {
			return {
				weight: 2,
				opacity: 1,
				color: 'white',
				dashArray: '3',
				fillOpacity: 0.7,
				fillColor: getColor(feature.properties.density)
			};
		}

		function highlightFeature(e) {
			var layer = e.target;

			layer.setStyle({
				weight: 5,
				color: '#666',
				dashArray: '',
				fillOpacity: 0.7
			});

			if (!L.Browser.ie && !L.Browser.opera) {
				layer.bringToFront();
			}

			info.update(layer.feature.properties);
		}

		var geojson;

		function resetHighlight(e) {
			geojson.resetStyle(e.target);
			info.update();
		}

		function zoomToFeature(e) {
			map.fitBounds(e.target.getBounds());
		}

		function onEachFeature(feature, layer) {
			layer.on({
				mouseover: highlightFeature,
				mouseout: resetHighlight,
				click: zoomToFeature
			});
		}


		geojson = L.geoJson(cambridgeData, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);
		

		map.attributionControl.addAttribution('cloudmade leaflet map');


		var legend = L.control({position: 'bottomright'});

		legend.onAdd = function (map) {

			var div = L.DomUtil.create('div', 'info legend'),
				grades =  [0, 10, 20, 30, 40, 50]
				labels = [],
				from, to;

			for (var i = 0; i < grades.length; i++) {
				from = grades[i];
				to = grades[i + 1];

				labels.push(
					'<i style="background:' + getColor(from + 1) + '"></i> ' +
					from + (to ? '&ndash;' + to : '+'));
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map);



	</script>

	


