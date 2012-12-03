
$(document).ready(function() {

    
    //basemap
    var cmAttr = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
        cmUrl = 'http://{s}.tile.cloudmade.com/0302235d29684d8eae0be1f5149a05b6/{styleId}/79642/{z}/{x}/{y}.png';

   
    //setting boundary to not allow panning outside MA
    var southWest = new L.LatLng(40.44695, -74.87183),
        northEast = new L.LatLng(43.11702, -69.20288), 
        boundsmax = new L.LatLngBounds(southWest, northEast);

    
        
    //default map center on MA   
    map = L.map('map', {
        center: [41.91, -72.279],
        zoom: 8,
        //layers: [gray],
        maxBounds: [boundsmax]
    });

   

   


    //L.control.layers(baseLayers, overlays).addTo(map);
    //built-in feature leaflet map

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);

    
		
 }); 