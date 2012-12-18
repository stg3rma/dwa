<? if($admin == '0'): ?>
  <div>
    You must be a system admin to access this page.
  </div>
<? endif; ?>
<section id="typography">
  <h3>Admin Dashboard for P4 e-75 311!</h3> 
  <br>
  <div class="row">
    <div class="span8">
        <!-- map -->
        <div id="map400"></div>
        <script src="/js/leaflet.js"></script>
    </div>
    <div class="span1"></div>
    <div class="span3">
      <h2>Issue Stats</h2>
         <button id='refresh_stats_button'>refresh stats</button>
      <table id="zip">
        <th>Open Issues by Zip Code</th>
        <tr><td>02138: </td><td><div id='open_issues_02138'></div></td></tr>
        <tr><td>02139: </td><td><div id='open_issues_02139'></div></td></tr>
        <tr><td>02140: </td><td><div id='open_issues_02140'></div></td></tr>
        <tr><td>02141: </td><td><div id='open_issues_02141'></div></td></tr>
        <tr><td>02142: </td><td><div id='open_issues_02142'></div></td></tr>
      </table>
      <br>      
      <table id="status">
      <th>Issue Status</th>
        <tr><td>open: </td><td><div id='active_issues'></div></td></tr>
        <tr><td>closed: </td><td><div id='closed_issues'></div></td></tr>
        <tr><td>all: </td><td><div id='all_issues'></div></td></tr>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="span8">
        <!-- map -->
        <div id="mapc"></div>
        <script src="/js/leaflet.js"></script>
    </div>
    <div class="span1"></div>
    <div class="span3">
      <table id="category">
        <th>Issue by Category</th>
        <tr><td>utility: </td><td><div id='category1'></div></td></tr>
        <tr><td>transportation: </td><td><div id='category2'></div></td></tr>
        <tr><td>sanitation/recyling: </td><td><div id='category3'></div></td></tr>
        <tr><td>animal control: </td><td><div id='category4'></div></td></tr>
        <tr><td>health & safety: </td><td><div id='category5'></div></td></tr>
        <tr><td>vandalism: </td><td><div id='category6'></div></td></tr>
        <tr><td>parks & recreation: </td><td><div id='category7'></div></td></tr>
      </table>
    </div>
</div>  

</section>

<script>
 
 //update stats on admin dashboard

  $('#refresh_stats_button').click(function() {

     $.ajax({
      type: 'POST',
      url: '/admin/p_dashboard',
      success: function(response){
        //debug console
        console.log(response);
        var data = jQuery.parseJSON(response);
        $('#open_issues_02138').html(data['open_issues_02138']);
        $('#open_issues_02139').html(data['open_issues_02139']);
        $('#open_issues_02140').html(data['open_issues_02140']);
        $('#open_issues_02141').html(data['open_issues_02141']);
        $('#open_issues_02142').html(data['open_issues_02142']);
        $('#open_issues').html(data['open_issues']);
        $('#closed_issues').html(data['closed_issues']);
        $('#all_issues').html(data['all_issues']);
        $('#category1').html(data['category1']);
        $('#category2').html(data['category2']);
        $('#category3').html(data['category3']);
        $('#category4').html(data['category4']);
        $('#category5').html(data['category5']);
        $('#category6').html(data['category6']);
        mdata[i].open_issues_02139;
     },
  });
});

  function get_stats(json_data) {
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

//could not get values above into data array below
//http://code.google.com/p/jqbargraph/
//jqbargraph plugin
/*
//data from db for open/closed by zip
openclosedbyzip = new Array(
    [[77, 33],'02138'],
    [[2,38],'02139'],
    [[36,57],'02140'],
    [[36,57],'02141'],
    [[36,57],'02142']
  );
  
$("#barchart").jqBarGraph({
  data: openclosedbyzip ,
  colors: ['#6B0E1D','#AB2522'],
  legends: ['open', 'closed'],
  legend: true,
  width: 500,
  color: '#ffffff',
  type: 'multi',
  postfix: '%',
  title: '<small>Open & Closed Issues by Zip Code</small>'
});
} */
</script>







