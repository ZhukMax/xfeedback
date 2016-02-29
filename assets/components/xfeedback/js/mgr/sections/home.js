xFeedback.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'xfeedback-panel-home',
			renderTo: 'xfeedback-panel-home-div'
		}]
	});
	xFeedback.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(xFeedback.page.Home, MODx.Component);
Ext.reg('xfeedback-page-home', xFeedback.page.Home);