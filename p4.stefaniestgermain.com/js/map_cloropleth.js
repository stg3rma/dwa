/*
maps views created with custom map API key at www.cloudmade.com
jquery selectors used to interact with Leaflet javascript map API 
& cloropleth map example featuring population density in US 
http://leafletjs.com/examples/choropleth-example.html
*/
$(document).ready(function() {

		var mapc = L.map('mapc').setView([42.373, -71.107], 7);

		var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
			attribution: 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
			key: '0302235d29684d8eae0be1f5149a05b6',
			styleId: 79642
		}).addTo(mapc);


    	//setting boundary to not allow panning outside Cambridge, MA
    	var southWest = new L.LatLng(42.34078, -71.04755),
        northEast = new L.LatLng(42.39811, -71.16222), 
        boundsmax = new L.LatLngBounds(southWest, northEast);
        mapc.setZoom(13);
        mapc.setMaxBounds([boundsmax]);

     

		// control that shows state info on hover
		var info = L.control();

		info.onAdd = function (mapc) {
			this._div = L.DomUtil.create('div', 'info');
			this.update();
			return this._div;
		};

		info.update = function (props) {
			this._div.innerHTML = '<h4>E-75 311 issues by zipcode</h4>' +  (props ?
				'<b>' + props.name + '</b><br />' + props.density + ' issues reported'
				: 'Hover over area');
		};

		info.addTo(mapc);


		// color based on issue volume per zip code
		// colors from ColorBrewer
		//permalink for color scheme 0xEFF3FF; 0xC6DBEF; 0x9ECAE1; 0x6BAED6; 0x3182BD; 0x08519C; 

		function getColor(d) {
			return d > 50  ? '#08519C' :
			       d > 40  ? '#3182BD' :
			       d > 30  ? '#6BAED6' :
			       d > 20  ? '#9ECAE1' :
			       d > 10  ? '#C6DBEF' :
			                 '#EFF3FF' ;
		}

		function style(feature) {
			return {
				weight: 1,
				opacity: 1,
				color: '666',
				dashArray: '1',
				fillOpacity: 0.6,
				fillColor: getColor(feature.properties.density)
			};
		}

		function highlightFeature(e) {
			var layer = e.target;

			layer.setStyle({
				weight: 2,
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
			mapc.fitBounds(e.target.getBounds());
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
		}).addTo(mapc);
		

		mapc.attributionControl.addAttribution('cloudmade leaflet mapc');

		//add marker
		//L.marker([42.373, -71.107]).addTo(mapc);


		var legend = L.control({position: 'bottomright'});

		legend.onAdd = function (mapc) {

			var div = L.DomUtil.create('div', 'info legend'),
				density =  [0, 10, 20, 30, 40, 50]
				labels = [],
				from, to;

			for (var i = 0; i < density.length; i++) {
				from = density[i];
				to = density[i + 1];

				labels.push(
					'<i style="background:' + getColor(from + 1) + '"></i> ' +
					from + (to ? '&ndash;' + to : '+'));
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(mapc);



    

 }); 


     
