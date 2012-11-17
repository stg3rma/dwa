 <div id='wrapper'>
 	<div id="map" style="width: 960px; height: 400px"></div>

	<script src="/js/leaflet.js"></script>



 	    <!-- MAP ON THE top -->


    <br><br>
    <!-- MAP LEGEND ON THE LEFT -->
    <div id='bottom-half'>
    	<div id='map-setup'>
	  
	        <h2>Pick a basemap style</h2>
	        <input type='radio' name='basemap' value='20760'>day<br>
	        <input type='radio' name='basemap' value='31643'>night
	       
	        <br>

	        <h2>Pick a zoom level</h2>
	        <input type='radio' name='zoom' value='9'>county<br>
	        <input type='radio' name='zoom' value='13'>neighborhood<br>
	        <input type='radio' name='zoom' value='18'>building
	       
	        <br>

	        <h2>Add a layer to map</h2>
	        <input type='radio' name='layer' value='77488'>water<br>
	        <input type='radio' name='layer' value='77999'>parks & trees<br>
	        <input type='radio' name='layer' value='78001'>cities<br>
	        <input type='radio' name='layer' value='77488'>roads
	        

    	</div>
      	<div id='page-setup'>
	        <h2>Select page color</h2>
	        <div class='color-choice' id='red'></div>
	        <div class='color-choice' id='orange'></div>
	        <div class='color-choice' id='yellow'></div>
	        <div class='color-choice' id='green'></div>
	    
	        <br>
	        
	        <h2>Pick a texture</h2>
	        <div class='texture-choice' id='texture1'></div>
	        <div class='texture-choice' id='texture2'></div>
	        <div class='texture-choice' id='texture3'></div>
	        <div class='texture-choice' id='texture4'></div>
	        
	        <br>

	        <h2>Font choice</h2>
	        <div class="font-choice" id="font-choice">
<select id="fs">

        <option value="Arial">Arial</option>

        <option value="Verdana ">Verdana </option>

        <option value="Impact ">Impact </option>

        <option value="Comic Sans MS">Comic Sans MS</option>

    </select>
	        
	        
	        <h2>Enter your recipient</h2>
	        <small>You have <span id='characters-left'>10</span> characters left</small><br>
	        <input type='text' id='recipient' maxlength=10>
	        
	        <br>
	        
	        <h2>Add some graphics</h2>
	        <img src='/images/graphic_burst.png' class='graphic-choice'>
	        <img src='/images/graphic_gift_2.png' class='graphic-choice'>
	        <img src='/images/graphic_gift_3.png' class='graphic-choice'>
	        <br>
	        <img src='/images/graphic_gift.png' class='graphic-choice'>
	        <img src='/images/graphic_heart.png' class='graphic-choice'>
	        <img src='/images/graphic_star.png' class='graphic-choice'>
      	</div> 
    </div>
    
    <!-- MAP SETTINGS ON THE LEFT -->


    
    
</div>

	



