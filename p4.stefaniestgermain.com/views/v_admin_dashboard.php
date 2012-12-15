
<section id="typography">
  <h1>Admin Dashboard for P4 e-75 311!</h1> 
  <br>
  <p>Please <a href='/users/signup'>Sign up</a> to report an issue. If you an existing user, please <a href='/users/login'>Login</a>                      
  <div class="row">
    <div class="span4">
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
    <div class="span8">  
      <!-- cloudmade leaftjs map -->
      <div id="map"></div>
      <script src="/js/leaflet.js"></script> 
      <br>
    </div>  
  </div>
  
  <div class="row"> 
    <div class="span12">
    <div>list of issues goes here</div>
  </div>  
 
  <div class="row">
    <div class="span12">

    </div>
  </div>

</section>



