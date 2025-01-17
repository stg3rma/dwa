/*
maps views created with custom map API key at www.cloudmade.com
jquery selectors used to interact with Leaflet javascript map API
& cloropleth map example based on Leaflet example featuring population density in US,
Referenced Brian McBride's Leaflet User Map to figure out map marker add/update 
layout & refactor usermap.js with help from Susan Buck
*/

  $(document).ready(function() {

  /*-------------------------------------------------------------------------------------------------
  Set up
  -------------------------------------------------------------------------------------------------*/ 

  var initialView = true;
  var map = L.map('map').setView([42.373, -71.107], 7);
  var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
      key: '0302235d29684d8eae0be1f5149a05b6',
      styleId: 998
  }).addTo(map);


  // Setting boundary to not allow panning outside Cambridge, MA
  var southWest = new L.LatLng(42.34078, -71.04755),
      northEast = new L.LatLng(42.39811, -71.16222),
      boundsmax = new L.LatLngBounds(southWest, northEast);
      map.setZoom(13);
      map.setMaxBounds([boundsmax]);

  // New Leaflet layer group for markers
  var userLayer = new L.LayerGroup();
  map.addLayer(userLayer);

  // Polyline cambridge_02138.js
    cambridge_02138.bindPopup("02138").addTo(map);
    cambridge_02139.bindPopup("02139").addTo(map);
    cambridge_02140.bindPopup("02140").addTo(map);
    cambridge_02141.bindPopup("02141").addTo(map);
    cambridge_02142.bindPopup("02142").addTo(map);

  //global for adding text to markers
  var popup = L.popup();


  /*-------------------------------------------------------------------------------------------------
  Listeners
  -------------------------------------------------------------------------------------------------*/

  // On page load the first thing we want to do is make an Ajax call to get all the existing markers
  $.ajax({
          type: 'POST',
          url: '/issues/p_load_issues/',  
          success: function(response) {
            show_markers(response);
          },
  });

  // Toggle map editing on/off for user page

  $('#mapediton').on('click', function (e) {
    map.on('click', onMapClick);
  });

  $('#mapeditoff').on('click', function (e) {
    map.off('click', onMapClick);
  });

  $('#hidemarkers').on('click', function (e) {
    userLayer.clearLayers()('click', onMapClick);
  });

  $('#showmarkers').on('click', function (e) {
    //reload_markers()('click', onMapClick);
      $.ajax({
          type: 'POST',
          url: '/issues/p_load_issues/',  
          success: function(response) {
            show_markers(response);
          },
      });
  });

  $('#updatelistmarkers').on('click', function (e) {
    document.location.reload(true)('click', onMapClick);
  });

  

  // Ajaxify the "add new issue form"
  var options = {
                type: 'POST',
                url: '/issues/p_add_issue',
                beforeSubmit: function() {
                // Empty
                },
                success: function(data) {
                  // Parse the json we get back
                    var mdata = jQuery.parseJSON(data);
                  // Send it to this function
                  show_markers(data);
                  // Hide the window we just added the issue input
                  $('#modalAddIssue').modal('hide');
                } // end success
  }; // end options
  $('form[name=addIssue]').ajaxForm(options);

  /*-------------------------------------------------------------------------------------------------
  Functions
  -------------------------------------------------------------------------------------------------*/
  /*
  * show_markers
  * Accepts a string of JSON
  */

  function show_markers(json_data) {
      // Parse the json we get back
      var mdata = jQuery.parseJSON(json_data);
          // Loop through the results
          for (var i = 0; i < mdata.length; i++) {
                //var title;
                var issue_id = mdata[i].issue_id;
                var location = new L.LatLng(mdata[i].lat, mdata[i].lng);
                var lat = mdata[i].lat;
                var lng = mdata[i].lng;
                var desc = mdata[i].description;
                var coords = new L.LatLng(mdata[i].lat, mdata[i].lng);
                var marker = new L.Marker(coords, {title:desc}).addTo(map);
                marker.bindPopup("#"+issue_id+": "+ desc + "");
                userLayer.addLayer(marker);

          }
  }
  

  /*
  * onMapClick
  *
  */

  function onMapClick(e){
        var userLatLng = new L.LatLng(e.latlng.lat, e.latlng.lng);
        var userLat = e.latlng.lat;
        var userLng = e.latlng.lng;
        var userMarker = new L.Marker(userLatLng);
        userLayer.addLayer(userMarker).addTo(map);
        var form = '<form id="userform" enctype="multipart/form-data">' +
                   '<input type="text" id="name" name="name" />'
                   '</form>';
        // Pass lat and lng from click to modal
        document.getElementById("lat").value = userLat;
        document.getElementById("lng").value = userLng;
        var data = $('#modal-div').data('mydata');
        $('#modalAddIssue').modal('show');
  }



  /**
  * style
  *
  */

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

   

   

  }); // end doc ready

 

 

