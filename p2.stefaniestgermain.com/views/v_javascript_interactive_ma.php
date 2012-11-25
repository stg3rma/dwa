 <div class="row-fluid">




 	    <!-- MAP ON THE top -->


    <br><br>
    <!-- MAP LEGEND ON THE LEFT -->
  
    <div class="span2">

    	 
    	<div id='map-setup' >
	 
	 
	        <h3 class='change-zoom, change-font'>Pick a zoom level</h3>
	        <input type='radio' name='zoom' value='7' checked="true">county<br>
	        <input type='radio' name='zoom' value='11'>neighborhood<br>
	        <input type='radio' name='zoom' value='16'>building
	       
	        <br>

	        <h3 class='change-layer, change-font'>View map layer</h3>
	        <input type='radio' name='layer' value='gray' checked="true">grey<br>
	      	<input type='radio' name='layer' value='water'>water<br>
	        <input type='radio' name='layer' value='parks'>parks & trees<br>
	        <input type='radio' name='layer' value='cities'>cities<br>
	        <input type='radio' name='layer' value='roads'>roads<br>
	        

    	</div>
    	<a id="showhidepagesetup" href="#">edit page</a> 
      	<div id='page-setup' >

	        <h3 class='change-font'>Select page color</h3>
	        <div class='color-choice' id='white'></div>
	        <div class='color-choice' id='red'></div>
	        <div class='color-choice' id='orange'></div>
	        <div class='color-choice' id='yellow'></div>
	        <div class='color-choice' id='green'></div>
	    
	        
	        <br>

  		<h3 id='change-font' class=' change-font'>Map dimensions</h3>
			<small>height x width</small><br>
			<select class='map-height '>
				<option value="200" width="10">200</option>
				<option value="400" selected>400</option>
				<option value="600">600</option>
				<option value="960">960</option>
				<option value="1024">1024</option>
			</select>
			<select class='map-width'>
				<option value="200">200</option>
				<option value="400">400</option>
				<option value="600">600</option>
				<option value="960" selected>960</option>
				<option value="1024">1024</option>
			</select>

	        <h3 class='change-font'>Font choice</h3>
			<select id="fc">
		        <option value="Arial">Arial</option>
		        <option value="Verdana ">Verdana </option>
		        <option value="Georgia">Georgia </option>
		        <option value="Helvetica Neue" selected>Helvetica Neue</option>
    		</select>

    		<h3 class='change-font'>Font size</h3>
			<select id="fs">
		        <option value="14">14</option>
		        <option value="16">16</option>
		        <option value="18">18</option>
		        <option value="25" selected>25</option>
		       
    		</select>
	        
	   
	  
      	</div> 
    </div>
    <div class="span10" id="right-half">
 		<div id="map"></div>

		<script src="/js/leaflet.js"></script>
    </div>
  
    <!-- MAP SETTINGS ON THE LEFT -->


    
    
</div>

	



