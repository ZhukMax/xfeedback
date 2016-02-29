Ext.onReady(function() {
	xFeedback.config.connector_url = OfficeConfig.actionUrl;

	var grid = new xFeedback.panel.Home();
	grid.render('office-xfeedback-wrapper');

	var preloader = document.getElementById('office-preloader');
	if (preloader) {
		preloader.parentNode.removeChild(preloader);
	}
});