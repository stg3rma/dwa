 <div id='content'>




 	    <!-- MAP ON THE top -->


    <br><br>
    <!-- MAP LEGEND ON THE LEFT -->
  
    <div id='left-half'>

    	<a id="showhidemapsetup" href="#">show/hide</a>
    	<div id='map-setup'>
	  
	 
	        <h2 class='change-zoom, change-font'>Pick a zoom level</h2>
	        <input type='radio' name='zoom' value='7'>county<br>
	        <input type='radio' name='zoom' value='11'>neighborhood<br>
	        <input type='radio' name='zoom' value='16'>building
	       
	        <br>

	        <h2 class='change-layer, change-font'>Add a layer to map</h2>
	        <input type='radio' name='layer' value='gray'>none<br>
	        <input type='radio' name='layer' value='water'>water<br>
	        <input type='radio' name='layer' value='parks'>parks & trees<br>
	        <input type='radio' name='layer' value='cities'>cities<br>
	        <input type='radio' name='layer' value='roads'>roads
	        

    	</div>
    	<a id="showhidepagesetup" href="#">show/hide</a> 
      	<div id='page-setup'>
	        <h2 class='change-font'>Select page color</h2>
	        <div class='color-choice' id='red'></div>
	        <div class='color-choice' id='orange'></div>
	        <div class='color-choice' id='yellow'></div>
	        <div class='color-choice' id='green'></div>
	    
	        
	        <br>

  		<h2 id='change-font' class=' change-font'>Map dimensions</h2>
			<small>height x width</small><br>
			<select class='map-height '>
				<option value="200">200</option>
				<option value="400">400</option>
				<option value="600">600</option>
				<option value="960">960</option>
				<option value="1024">1024</option>
			</select>
			<select class='map-width'>
				<option value="200">200</option>
				<option value="400">400</option>
				<option value="600">600</option>
				<option value="960">960</option>
				<option value="1024">1024</option>
			</select>

	        <h2 class='change-font'>Font choice</h2>
			<select id="fc">
		        <option value="Arial">Arial</option>
		        <option value="Verdana ">Verdana </option>
		        <option value="Georgia">Georgia </option>
		        <option value="Helvetica">Helvetica</option>
    		</select>

    		<h2 class='change-font'>Font size</h2>
			<select id="fs">
		        <option value="14">14</option>
		        <option value="16">16</option>
		        <option value="18">18</option>
		       
    		</select>
	        
	   
	  
      	</div> 
    </div>
    <div id="right-half">
 		<div id="map"></div>

		<script src="/js/leaflet.js"></script>
    </div>
  
    <!-- MAP SETTINGS ON THE LEFT -->


    
    
</div>

	



