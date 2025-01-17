 

<div class="row">
  <div class="span12">
    <h2>Report an Issue</h2>
    <p>If you setup your account with 'Admin' access check out the <a href="/admin/dashboard">Admin Dashboard</a> which lists some issue stats. Otherwise click 'Map Edit Mode' then click within the Cambridge boundaries outlined in blue on the map to report an E-75 311 issue to the map. If this were a live 311 system city officials would respond to your report. Admins have access to view and close all issues on the map.
    </p>
    <p>
  </div>
</div>
<div class="row">
  <div class="span12">
    <div>
      <!-- button to toggle map edit -->
      <div class="btn-group" data-toggle="buttons-radio">
        <div><button type="button" class="btn btn-primary" id="mapediton">Map Edit Mode</button><button type="button" class="btn btn-primary" id="mapeditoff">Map View Mode</button></div>
      </div>

      <!-- button to toggle markers show/hide -->
      <div class="btn-group" data-toggle="buttons-radio">
        <div><button type="button" class="btn btn-primary" id="hidemarkers">Hide Map Markers</button><button type="button" class="btn btn-primary" id="showmarkers">Show Map Markers</button></div>
      </div>
      <!-- button to update list & markers -->
        <button type="button" class="btn btn-primary" data-toggle="button"  id="updatelistmarkers">Update List|Map</button></div>
    

  </div>
</div> 
<div class="row">&nbsp;</div>  
<div class="row">
  <div class="span8">
      <!-- map -->
      <div id="map" class="map"></div>
      <script src="/js/leaflet.js"></script>
  </div>
  <div class="span1"></div>
  <div class="span3">
    <div>
    <h2><?= $user->first_name ?>'s Issues:</h2>
    <? if($show_no_issues_message): ?>
      Sorry there are no issues.
    <? endif; ?>
    <? if($show_issues): ?>
   
        <section>
          <table>
            <? foreach($issues as $post): ?>
              <tr id='issue_<?=$post['issue_id']?>'>
                <td>
                  #<?=$post['issue_id']?>: <?=$post['description']?>
                  <br>on <?= date('D M d, Y, h:ia', $post['created']) ?>
                </td>
                <td>
                  <input type='button' class='delete' data-issue-id='<?=$post['issue_id']?>' value='close'>
                </td>
              </tr>
            <? endforeach; ?>
          </table>
        </section>
    <? endif; ?>

    </div>
  </div>
</div>
   



<!-- modalAddIssue content -->
    <div id="modalAddIssue" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalAddIssueLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h3 id="modalAddIssueLabel">Report an Issue</h3>
    </div>
    <div class="modal-body">

    <form name='addIssue'>
    <strong>New Issue:</strong><br>
      Description:<br>
      <input type='text' name='description'><br>
      Category<br>
      <select name='category_id'><br>
      <option value="1" selected>utility</option>
      <option value="2">transportation</option>
      <option value="3">sanitation/recyling</option>
      <option value="4">animal control</option>
      <option value="5">health & safety</option>
      <option value="6">vandalism</option>
      <option value="7">parks & recreation</option>

      </select><br>

      Lat<br>
      <input type='text' name='lat' id='lat'><br>
      Lng<br>
      <input type='text' name='lng' id='lng'><br>
      Zip<br>
      <select name='zipcode_id'><br>
      <option value="1" selected>02138</option>
      <option value="2">02139</option>
      <option value="3">02140</option>
      <option value="4">02141</option>
      <option value="5">02142</option>
      </select>
      <br>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Save changes</button>
      </div>
    </form>



<script>
  $('.delete').click(function() {
    var issue_id = $(this).attr('data-issue-id');
      $.ajax({
          type: 'POST',
          url: '/issues/delete',
          success: function(response) {
          // Fade out this isse row since it has now been deleted
          $('#issue_' + issue_id).hide('slow');
          },
          data: {
          // Make sure we tell our method what issue is
          issue_id: issue_id,
      },
    });
  });
</script>