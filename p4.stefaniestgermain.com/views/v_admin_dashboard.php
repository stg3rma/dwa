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
      issues 02138: <div id='open_issues_02138'></div>
      issues 02139: <div id='open_issues_02139'></div>
      issues 02140: <div id='open_issues_02140'></div>
      issues 02141: <div id='open_issues_02141'></div>
      issues 02142: <div id='open_issues_02142'></div>
      <br>
      active issues: <div id='active_issues'></div>
      closed issues: <div id='closed_issues'></div>
      all issues: <div id='all_issues'></div>
      <br>
      utility issues (1): <div id='category1'></div>
      transportaiton (2): <div id='category2'></div>
      sanitation/recyling (3): <div id='category3'></div>
      animal control (4): <div id='category4'></div>
      health & safety (5): <div id='category5'></div>
      vandalism (6): <div id='category6'></div>
      parks & recreation (7): <div id='category7'></div>

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
      <p>
                    Pie charts 
                    <span class="sparkpie">1,1,2</span> 
                    <span class="sparkpie">1,5</span> 
                    <span class="sparkpie">20,50,80</span>
                </p>
                   <p>
                    Bar charts <span class="sparkbar">10,8,9,3,5,8,5</span> 
                    negative values: <span class="sparkbar">-3,1,2,0,3,-1</span>
                    stacked: <span class="sparkbar">0:2,2:4,4:2,4:1</span>
                </p>
      <p>
      Inline Sparkline: <span class="inlinesparkline">1,4,4,7,5,9,10</span>.
      </p>
      <p>
      Sparkline with dynamic data: <span class="dynamicsparkline">Loading..</span>
      </p>
      <p>
      Bar chart with dynamic data: <span class="dynamicbar">Loading..</span>
      </p>
      <p>
      Bar chart with inline data: <span class="inlinebar">1,3,4,5,3,5</span>
      </p>
    </div>
  </div>

</section>

<script type="text/javascript">

  $('#refresh_stats_button').click(function() {

     $.Ajax({
      type: 'POST',
      url: '/admin/p_dashboard',
      success: function(response){
        //debug console
        console.log(response);
        var data = JQuery.parseJSON(response);
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



    //sparkline library from http://omnipotent.net/jquery.sparkline
    /* <![CDATA[ */
    $(function() {
        /** This code runs when everything has been loaded on the page */
        /* Inline sparklines take their values from the contents of the tag */
        $('.inlinesparkline').sparkline(); 

        /* Sparklines can also take their values from the first argument passed to the sparkline() function */
        var myvalues = [10,8,5,7,4,4,1];
        $('.dynamicsparkline').sparkline(myvalues);

        /* The second argument gives options such as specifying you want a bar chart */
        $('.dynamicbar').sparkline(myvalues, {type: 'bar', barColor: 'green'} );

        /* Use 'html' instead of an array of values to pass options to a sparkline with data in the tag */
        $('.inlinebar').sparkline('html', {type: 'bar', barColor: 'red'} );

    });
    /* ]]> */
</script>


