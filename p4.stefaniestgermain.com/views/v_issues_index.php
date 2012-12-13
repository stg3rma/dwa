
<div class="row">
  <div class="span12">
        <h3>Report an Issue</h3>
        <p>Click within the Cambridge boundaries outlined in blue on the map to report an E-75 311 issue to the map. If this were a live 311 system city officials would respond to your report. Admin fucntion enables city admin to flag issues as assigned or resolved at which point they will drop off the map.</p>

          <!-- modalAddIssue content -->
          <div id="modalAddIssue" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalAddIssueLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="modalAddIssueLabel">Modal Heading</h3>
          </div>
          <div class="modal-body">
              
              <h4>Text in a modal</h4>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

              <h4>Popover in a modal</h4>
              <p>This <a href="#" role="button" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on click.</p>

              <h4>Tooltips in a modal</h4>
              <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

              <hr>

              <h4>Overflowing text to show optional scrollbar</h4>
              <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          </div>
          <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
          </div>
        </div>
          <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#modalAddIssue" class="btn btn-primary btn-large">Launch demo modal</a>
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
      <div id="map"></div>
      <script src="/js/leaflet.js"></script>
  </div>

</div>
