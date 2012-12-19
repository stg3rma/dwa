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
<div class="row">&nbsp;</div>
<div class="row">
  <div class="span12">
    The top map showing Cambridge zip code with polylines was supposed to be a map similar to the one on the users page. To declare a Leaflet map it needs an L.map object in the js with baselayer, center, zoom, dimensions for css for #map and a div on the page with id=#map.
    You can have multiple maps but need to have separate entries in css, div and js so all operations
    would be map2.on, etc. Did not have time to adapt the js to handle this and rather than duplicate code in usersmap.js I just let all admins see all 
    issues on the users page.
  </div>
</div>
<div class="row">&nbsp;<br></div>
<div class="row">
  <div class="span12">
    The cloropleth map of Cambridge above, based on Leaflet tutorial, is setup to change shade based on the density of calls per zipcode. The file zipcode_ca.js has data for each zip code in JSON format like this: “type”:”FeatureCollection”, “feature”:[{“type”: “Feature”, “id”: “1”, “properties”:{“name” : “02138”, “density”: “33”}]. I was not able to figure out how to update “density” so the map will not change shade as various call types are added. On searching how to open/edit a json file I found threads suggesting json decode be used then loop through with a for each.
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
        
     },
  });
});


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







