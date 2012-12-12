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
			styleId: 998
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

	/*	function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(map);
        //alert("You clicked at: " + e.latlng.lat + " " + e.latlng.lng);
		}*/

    //new Leaflet layer group for markers
    userLayer = new L.LayerGroup();


    //map.on('click', onMapClick);

    function onMapClick(e){
      var userClickLatLng = new L.LatLng(e.latlng.lat, e.latlng.lng);
      var userMarker = new L.Marker(userClickLatLng);
      userLayer.addLayer(userMarker);
    
      var form = '<form id="userinput">' + '<input type="text" id="description" name="description">'
      <!--form goes here -->
      '</form>'
      ;

      userMarker.bindPopup(form).openPopup();
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

  //polyline cambridge_02138.js
  cambridge_02138.bindPopup("02138").addTo(map);
  cambridge_02139.bindPopup("02139").addTo(map);
  cambridge_02140.bindPopup("02140").addTo(map);
  cambridge_02141.bindPopup("02141").addTo(map);
  cambridge_02142.bindPopup("02142").addTo(map);

	map.on('click', onMapClick);



 }); 


     
