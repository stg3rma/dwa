<? if(!$user): ?>
	<h1><strong>Welcome the P4 e-75 311!</strong></h1> 
	<br>
	<p>Please <a href='/users/signup'>Sign up</a> to report an issue. If you an existing user, please <a href='/users/login'>Login</a>                      
<? else: ?>
	<h1>Welcome back <strong><?=$user->first_name?></strong><h1><br>
	<a href='/users/logout'>Logout</a> |
	<a href='/users/profile/$user'>Profile</a>
<? endif; ?>
	<br>
	<br>

	
<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span6">
      <h1>United</h1>
      <p class="lead">A preview of changes in this swatch.</p>
    </div>
    <div class="span6">
      <div class="bsa well">
          <div id="bsap_1277971" class="bsarocks bsap_c466df00a3cd5ee8568b5c4983b6bb19"></div>
          <div class="clearfix"><a href="http://adpacks.com" id="bsap_aplink">via Ad Packs</a></div>
      </div>
    </div>
  </div>
  <div class="subnav">
    <ul class="nav nav-pills">
      <li><a href="#typography">Typography</a></li>
      <li><a href="#navbar">Navbar</a></li>
      <li><a href="#buttons">Buttons</a></li>
      <li><a href="#forms">Forms</a></li>
      <li><a href="#tables">Tables</a></li>
      <li><a href="#miscellaneous">Miscellaneous</a></li>
    </ul>
  </div>
</header>




<!-- Typography
================================================== -->
<section id="typography">
  <div class="page-header">
    <h1>Typography</h1>
  </div>

  <!-- Headings & Paragraph Copy -->
  <div class="row">

    <div class="span4">
      <div class="well">
        <h1>h1. Heading 1</h1>
        <h2>h2. Heading 2</h2>
        <h3>h3. Heading 3</h3>
        <h4>h4. Heading 4</h4>
        <h5>h5. Heading 5</h5>
        <h6>h6. Heading 6</h6>
      </div>
    </div>

    <div class="span4">
      <h3>Example body text</h3>
      <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui.</p>
    </div>

    <div class="span4">
      <h3>Example addresses</h3>
      <address>
        <strong>Twitter, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>
      <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@gmail.com</a>
      </address>
    </div>

  </div>
  
  <div class="row">
    <div class="span6">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
      </blockquote>
    </div>
    <div class="span6">
      <blockquote class="pull-right">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
      </blockquote>
    </div>
  </div>

</section>



