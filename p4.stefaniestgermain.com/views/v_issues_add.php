<br>
<br>
<br>
<br>

<form name='new-post' method='POST' action='/issues/p_add'>

	<strong>New Issue:</strong><br>
		Description:<br>
		<input type='text' name='description'><br>
		Lat<br>
		<input type='text' name='lat'><br>
		Lon<br>
		<input type='text' name='lon'><br>
		Zip<br>
		<input type='text' name='zipcode'><br>
	<br><br>
	<input type='submit'>

</form>

<div id='results'></div>

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