/*
maps views created with custom map API key at www.cloudmade.com
jquery selectors used to interact with Leaflet javascript map API 
& cloropleth map example featuring population density in US 
*/

 /*     updateUserMap(){
          $.ajax({
        type: 'POST',
        url: '/issues/get_issue_markers', 
        success: function(response) {
        //debug
        console.log(response);
        var data = JQuery.parseJSON(response);



      for(var i = 0; i < data.length, i++){
        var location = new L.LatLng(data[i].lat, data[i].lng);
        var id = data[i].issue_id;
        var description = data[i].description;
        var marker = new L.Marker(location, {title: description });
        marker.bindPopup("Please work!");
        userLayer.addLayer(marker);
      },
    });
 });
}*/

$(document).ready(function() {

  // map on index page 

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

    //new Leaflet layer group for markers
    userLayer = new L.LayerGroup();

    //L.control.layers(baseLayers, overlays).addTo(map);
    //built-in feature leaflet map
    //L.marker([42.373, -71.107]).addTo(map)
    //.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

    var popup = L.popup();

    //toggle map editing on/off for user page
    $('#mapediton').on('click', function (e) {
      map.on('click', onMapClick);
    });
    $('#mapeditoff').on('click', function (e) {
      map.off('click', onMapClick);
    });  

    //get user markers & add to map

        function updateUserMap() {
        map.on;
        $.getJSON("/issues/p_get_issue_markers", function(data){ 
            var mdata = JQuery.parseJSON(data);
            console.log("this is data" + mdata);
            for (var i = 0; i < mdata.length; i++) {
            var title = "descr:";
            var location = new L.LatLng(mdata[i].lat, mdata[i].lng);
            var lat = mdata[i].lat;
            var lng = mdata[i].lng;
            var coords = new L.LatLng(mdata[i].lat, mdata[i].lng);
            var marker = new L.Marker(coords, {title:description});
            marker.bindPopup("popup text from getIssueMarker");
            userLayer.addLayer(marker);
          }
        });
      }
      

    //<button type="button" class="btn" data-complete-text="finished!" >...</button>
    //<script>
    //$('.btn').button('complete');
   
    //</script>

    function onMapClick(e){
        
    var userLatLng = new L.LatLng(e.latlng.lat, e.latlng.lng);
    var userLat = e.latlng.lat;
    var userLng = e.latlng.lng;
        var userMarker = new L.Marker(userLatLng);
        //data-userLat = e.latlng.lat;
        //userLayer.clearLayers();
        userLayer.addLayer(userMarker).addTo(map);
        var form = '<form id="userform" enctype="multipart/form-data">' +
          '<input type="text" id="name" name="name" />'
          '</form>';
        //userMarker.bindPopup(form).openPopup();
        //$(".modal-body"#lat.val(mylat);
        //var lat = $(this).data('userLat');
        //$(".modal-body #lat").val(userLat);
        //pass lat and lng from click to modal
        document.getElementById("lat").value = userLat;
        document.getElementById("lng").value = userLng;
        var data = $('#modal-div').data('mydata');

        $('#modalAddIssue').modal('show');
        //getIssueMarkers();
       //getIssueMarkers();    
    }




/*    var form = '<form id="userinput">' + '<input type="text" id="description" name="description">'
      <!--form goes here -->
      '</form>'
      ;
    $('#modalAddIssue').modal(options)
      userMarker.bindPopup(form).openPopup(); }
*/
    

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


 }); 


     
