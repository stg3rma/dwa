
$(document).ready(function() {

    $('.color-choice').click(function() {
    
        // Find out what color was clicked
        var color_that_was_chosen = $(this).css('background-color');
    
        // Set the canvas to be that color
        $('#canvas, .texture-choice').css('background-color', color_that_was_chosen);
            
    });
    
    $("#font-choice").change(function() {

        $('.font-choice').css("font-family", $(this).val());

    });

    $('.texture-choice').click(function() {
    
        var image_that_was_chosen = $(this).css('background-image');
        console.log(image_that_was_chosen);
        $('#canvas').css('background-image', image_that_was_chosen);
    
    });
    
    $('input[name=message]').click(function() {
    
        // Figure out what the message is
        var message = $(this).val();
        
        $('#message').html(message);
            
    });
    
    $('#recipient').keyup(function() {
    
        var recipient = $(this).val();
        
        var length = recipient.length;
        
        var characters_left = 10 - length;
        
        if(characters_left <= 3 && characters_left > 0) {
            $('#characters-left').css('color','orange');
        }
        else if(characters_left == 0) {
            $('#characters-left').css('color','red');
        }
        else {
            $('#characters-left').css('color', 'black');
        }
        
        $('#characters-left').html(characters_left);
        
        $('#recipient-output').html(recipient);
    
    });
    
    $('.graphic-choice').click(function() {
    
        var image = $(this).attr('src');
        
        var full_image = "<img class='draggable' src='" + image + "'>";
        
        $('#canvas').prepend(full_image);        
        
        $(".draggable").draggable({ containment: "#canvas" });
    
    });
        

       var cities = new L.LayerGroup();

       // L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities),
       // L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities),
       // L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities),
       // L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);


        var cmAttr = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
            cmUrl = 'http://{s}.tile.cloudmade.com/8008b6734c6949529af51af504ef115f/{styleId}/256/{z}/{x}/{y}.png';

        var gray = L.tileLayer(cmUrl, {styleId: 20760, attribution: cmAttr}),
            night  = L.tileLayer(cmUrl, {styleId: 31643,   attribution: cmAttr}),
            water = L.tileLayer(cmUrl, {styleId: 77488, attribution: cmAttr});
            parks = L.tileLayer(cmUrl, {styleId: 77999, attribution: cmAttr}),
            cities  = L.tileLayer(cmUrl, {styleId: 78001,   attribution: cmAttr}),
            roads = L.tileLayer(cmUrl, {styleId: 77488, attribution: cmAttr});

        var map = L.map('map', {
            center: [41.91, -72.279],
            zoom: 8,
            layers: [gray,  cities]
        });

        var baseLayers = {
            "Gray": gray,
            "Night": night
        };

        var overlays = {
            "Water": water,
            "Parks": parks,
            "Cities": cities,
            "Roads": roads,
        };

        L.control.layers(baseLayers, overlays).addTo(map);
   
       *************** 


        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);


		
 });