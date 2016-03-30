
<form id="xfeedback" enctype="multipart/form-data" action="[[++site_url]][[~[[*id]]]]" method="POST">
	<input type="hidden" name="new-feedback" value="1">

	<!--[if lte IE 7]><style>#reviewStars-input{display:none}</style><![endif]-->

	<div id="reviewStars-input">
		<input id="star-4" type="radio" name="reviewStars" value="5"/>
		<label title="gorgeous" for="star-4"></label>
	
		<input id="star-3" type="radio" name="reviewStars" value="4"/>
		<label title="good" for="star-3"></label>
	
		<input id="star-2" type="radio" name="reviewStars" value="3"/>
		<label title="regular" for="star-2"></label>
	
		<input id="star-1" type="radio" name="reviewStars" value="2"/>
		<label title="poor" for="star-1"></label>
	
		<input id="star-0" type="radio" name="reviewStars" value="1"/>
		<label title="bad" for="star-0"></label>
	</div>

	<div class="form-group-photo">
		<!-- name="userfile" is requred for normal work -->
		<input name="userfile" type="file">
	</div>
	<div class="form-group">
		<label>[[+xfeedback_item_name]]*</label>
		<input type="text" name="name" placeholder="">
	</div>

	<div class="form-group">
		<label>[[+xfeedback_item_description]]*</label>
		<textarea name="text"></textarea>
	</div>

	<input type="submit" value="[[+xfeedback_item_button]]">

</form>