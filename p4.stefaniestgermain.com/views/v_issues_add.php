
<div class="row">
	<div class="span4">
		<form name='new-post' method='POST' action='/issues/p_add'>
			<strong>New Issue:</strong><br>
				Description:<br>
				<input type='text' name='description'><br>
				Category<br>
				<input type='text' name='category'><br>
				Lat<br>
				<input type='text' name='lat'><br>
				Lng<br>
				<input type='text' name='lng'><br>
				Zip<br>
				<input type='text' name='zipcode_id'><br>
			<br><br>
			<input type='submit'>
		</form>
		<br>
		<div id='results'></div>
	</div>

	<div class="span8">
	    <!-- map -->
	 		<div id="map" class="map"></div>
				<script src="/js/leaflet.js"></script>
	</div>
</div>

<script type='text/javascript'>
	
	// Set up the options for Ajax and our form
	var options = { 
		type: 'POST',
		url: '/issues/p_add/',
		beforeSubmit: function() {
			$('#results').html("Adding...");
		},
		success: function(response) { 	
			$('#results').html("Your issue was added.");
		} 
	}; 
		
	// Using the above options, Ajax'ify the form	
	$('form[name=new-issue]').ajaxForm(options);
	
</script>