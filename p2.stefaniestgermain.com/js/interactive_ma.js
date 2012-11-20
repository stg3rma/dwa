
$(document).ready(function() {

    $('.color-choice').click(function() {
    
        // Find out what color was clicked
        var color_selection = $(this).css('background-color');
    
        // Set the page to be that color
        $('html').css('background-color', color_selection);
            
    });
    
   $("#fc").change(function() {
  
    $('.change-font').css("font-family", $(this).val());
 
    });

    $("#fs").change(function() {

        $('.change-font').css("font-size", $(this).val() + "px"); 
    });



   $('a#showhidepagesetup').click(function() {
               
        $('#page-setup').toggle('slow', function(){
    
        });
    });

 

   $('a#showhidemapsetup').click(function() {
               
        $('#map-setup').toggle('slow', function(){
    
        }); 
    });



    $('.map-height').click(function() {
               
        $('#map').css("height", $(this).val() + "px");
        map.invalidateSize()
        map.center();
    
    });

   

    $('.map-width').click(function() {
               
        $('#map').css("width", $(this).val() + "px");
        map.invalidateSize();
        map.center();
    
    });

    function updateMap(layer){
       var map = L.map('map', {
            center: [41.91, -72.279],
            zoom: 8,
            layers: [layer]
        });

       map.invalidateSize();
        map.center();
    
    };

    $('.change-zoom').click(function() {
               
        //$('#map').html("width", $(this).val() + "px");
        map.invalidateSize();
        map.center();
    
    });

        $('.change-layer').click(function() {
               
        var layer =  $(this).val();
        updateMap(layer);
        
    
    });


          var cities = new L.LayerGroup();

       // L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities),
       // L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities),
       // L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities),
       // L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);


        var cmAttr = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
            cmUrl = 'http://{s}.tile.cloudmade.com/8008b6734c6949529af51af504ef115f/{styleId}/256/{z}/{x}/{y}.png';

        var gray = L.tileLayer(cmUrl, {styleId: 20760, attribution: cmAttr}),
            water = L.tileLayer(cmUrl, {styleId: 77488, attribution: cmAttr}),
            parks = L.tileLayer(cmUrl, {styleId: 77999, attribution: cmAttr}),
            cities  = L.tileLayer(cmUrl, {styleId: 78001,   attribution: cmAttr}),
            roads = L.tileLayer(cmUrl, {styleId: 77488, attribution: cmAttr});

        var county = 9, neighborhood = 13, building = 18;

        var southWest = new L.LatLng(40.44695, -74.87183),
            northEast = new L.LatLng(43.11702, -69.20288), 
            boundsmax = new L.LatLngBounds(southWest, northEast);


        
        var map = L.map('map', {
            center: [41.91, -72.279],
            zoom: 8,
            layers: [gray],
            maxBounds: [boundsmax]
        });

        var baseLayers = {
            "Gray": gray,
        };

        var overlays = {
            "Water": water,
            "Parks": parks,
            "Cities": cities,
            "Roads": roads,
        };

    $('input[name=zoom]').click(function() {
               
        var zoom = $(this).val();
        map.setZoom(zoom);
        map.invalidateSize();
        map.center();
    
    });

    $('input[name=layer]').click(function() {
               
        var nlayer = $(this).val();
        // map.addLayer(nlayer);
        //L.control.layers(water).addTo(map);
        //test =L.tileLayer(cmUrl, {styleId: 77488, attribution: cmAttr});
        //map.setView(new L.LatLng(41.91, -72.279), 3).addLayer(test);
        if(nlayer == "water") {
            map.addLayer(water);
        }
        if(nlayer == "parks"){
            map.addLayer(parks);
        }
        if(nlayer == "cities"){
            map.addLayer(cities);
        }
        if(nlayer == "roads"){
            map.addLayer(roads);
        }


    });   



   //L.control.layers(baseLayers, overlays).addTo(map);
   

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);

    
		
 }); 