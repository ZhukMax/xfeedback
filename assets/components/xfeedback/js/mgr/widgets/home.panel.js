xFeedback.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('xfeedback') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('xfeedback_items'),
				layout: 'anchor',
				items: [{
					html: _('xfeedback_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'xfeedback-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	xFeedback.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(xFeedback.panel.Home, MODx.Panel);
Ext.reg('xfeedback-panel-home', xFeedback.panel.Home);
