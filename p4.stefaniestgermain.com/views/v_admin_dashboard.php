<? if($admin == '0'): ?>
  <div>
    You must be a system admin to access this page.
  </div>
<? endif; ?>
<section id="typography">
  <h3>Admin Dashboard for P4 e-75 311!</h3> 
  <br>
  <div class="row">
    <div class="span3">
      <h2>issues</h2>
      02138: <div id='open_issues_02138'></div>
      02139: <div id='open_issues_02139'></div>
      02140: <div id='open_issues_02140'></div>
      02141: <div id='open_issues_02141'></div>
      02142: <div id='open_issues_02142'></div>
      <br>
      active: <div id='active_issues'></div>
      closed: <div id='closed_issues'></div>
      all: <div id='all_issues'></div><br>
      <br>
      utility: <div id='category1'></div>
      transportation: <div id='category2'></div>
      sanitation/recyling: <div id='category3'></div>
      animal control: <div id='category4'></div>
      health & safety: <div id='category5'></div>
      vandalism: <div id='category6'></div>
      parks & recreation: <div id='category7'></div>
      <br>
      <button id='refresh_stats_button'>refresh stats</button>
      
    </div> 
    <div class="span4">
        <!-- map -->
        <div id="map400"></div>
        <script src="/js/leaflet.js"></script>
    </div>
    <div class="span1"> </div>
    <div class="span4">
        <!-- map -->
        <div id="mapc"></div>
        <script src="/js/leaflet.js"></script>
    </div>
  </div>
  
  <div class="row"> 
    <div class="span4">
    <div>list of issues goes here</div>
  </div>  
 
  <div class="row">
    <div class="span8">
      <h3>Simple Sparkline Examples</h3>
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
        $('#category7').html(data['category7']);
     },
  });
});
    
</script>







