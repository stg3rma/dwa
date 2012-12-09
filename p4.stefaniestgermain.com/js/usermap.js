/*
maps views created with custom map API key at www.cloudmade.com
jquery selectors used to interact with Leaflet javascript map API 
& cloropleth map example featuring population density in US 
*/
$(document).ready(function() {

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

        //L.control.layers(baseLayers, overlays).addTo(map);
    	//built-in feature leaflet map
		//L.marker([42.373, -71.107]).addTo(map)
		//.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

		var popup = L.popup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(map);
		}


		L.marker([42.373, -71.107]).addTo(map)
			.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

		L.marker([42.383, -71.108]).addTo(map)
			.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

		L.circle([42.383, -71.121], 500, {
			color: 'red',
			fillColor: '',
			fillOpacity: 0
		}).bindPopup("I am a circle.");

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

		L.polyline([
			[42.383, -71.107],
			[42.393, -71.127],
			[42.363, -71.227]
		]).addTo(map);


		map.on('click', onMapClick);

 }); 


     
