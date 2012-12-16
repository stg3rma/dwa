
<div class="row">
  <div class="span12">
        <h3>Report an Issue</h3>
        <p>Click 'Map Edit Mode' then click within the Cambridge boundaries outlined in blue on the map to report an E-75 311 issue to the map. If this were a live 311 system city officials would respond to your report. Admin fucntion enables city admin to flag issues as assigned or resolved at which point they will drop off the map.</p>
          <!-- button to toggle map edit -->
          <p><div class="btn-group" data-toggle="buttons-radio">                 
            <button type="button" class="btn btn-primary" id="mapediton">Map Edit Mode</button>                 
            <button type="button" class="btn btn-primary" id="mapeditoff">Map View Mode</button>      
          </div></p>  

          <!-- modalAddIssue content -->
          <div id="modalAddIssue" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalAddIssueLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="modalAddIssueLabel">Report an Issue</h3>
          </div>
          <div class="modal-body">
    
      <form name='new-post' method='POST' action='/issues/p_add' onsubmit='updateUserMap()'>
      <strong>New Issue:</strong><br>
        Description:<br>
        <input type='text' name='description'><br>
        Category<br>
        <input type='text' name='category_id'><br>
        Lat<br>
        <input type='text' name='lat' id='lat'><br>
        Lng<br>
        <input type='text' name='lng' id='lng'><br>
        Zip<br>
        <input type='text' name='zipcode_id'><br>
        <br><br>
        <input type='submit'>
      </form>


          <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
          </div>
        </div>
  
  </div>
</div>
<div class="row">
  <div class="span4">

    <? if($show_no_issues_message): ?>
    Sorry there are no issues. 
    <? endif; ?>

    <? if($show_issues): ?>
    <h3><?= $user->first_name ?>'s Issues:</h3>
    <section id = "comments">
      <? foreach($issues as $post): ?>
        <article class="comment">
          <a class="comment-img" href="#non">
            <img src="" alt="" width="50" height="50">
          </a>
          <div class="comment-body">
            <div class="text">
              <p><?=$post['description']?></p>
            </div>
            <p class="attribution">on <?= date('D M d, Y, h:ia', $post['created']) ?></p>
          </div>
        </article>
      <? endforeach; ?>
    </section>
    <? endif; ?>
 
  </div>
     <br> 
  <div class="span8">
      <!-- map -->
      <div id="map"  class="map"></div>
      <script src="/js/leaflet.js"></script>
  </div>

</div>
