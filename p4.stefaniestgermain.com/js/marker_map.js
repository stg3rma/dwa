/*
maps views created with custom map API key at www.cloudmade.com
jquery selectors used to interact with Leaflet javascript map API 
& cloropleth map example featuring population density in US 
*/
$(document).ready(function() {

 	 //basemap
    var cmAttr = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
        cmUrl = 'http://{s}.tile.cloudmade.com/030235d29684d8eae0be1f5149a05b6/{styleId}/79642/{z}/{x}/{y}.png';

   
    //setting boundary to not allow panning outside MA
    var southWest = new L.LatLng(42.34078, -71.04755),
        northEast = new L.LatLng(42.39811, -71.1622), 
        boundsmax = new L.LatLngBounds(southWest, northEast);

    
        
    //default map center on MA   
    map = L.map('map', {
        center: [42.373, -71.107],
        zoom: 13,
        maxBounds: [boundsmax]
  


		
 }); 
		
		
		//L.control.layers(baseLayers, overlays).addTo(map);
    	//built-in feature leaflet map

        var popup = L.popup();

        function onmapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onmapClick);

    

 }); 






		