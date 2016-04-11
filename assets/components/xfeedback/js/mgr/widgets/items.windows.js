xFeedback.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'xfeedback-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('xfeedback_item_create'),
		width: 550,
		autoHeight: true,
		url: xFeedback.config.connector_url,
		action: 'mgr/item/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	xFeedback.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(xFeedback.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('xfeedback_item_description'),
			name: 'comment',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_rating'),
			name: 'rating',
			id: config.id + '-rating',
			anchor: '99%',
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_photo'),
			name: 'photo',
			id: config.id + '-photo',
			anchor: '99%',
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_pub_date'),
			name: 'pub_date',
			id: config.id + '-pub_date',
			anchor: '99%',
            flex: 2,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('xfeedback_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('xfeedback-item-window-create', xFeedback.window.CreateItem);


xFeedback.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'xfeedback-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('xfeedback_item_update'),
		width: 550,
		autoHeight: true,
		url: xFeedback.config.connector_url,
		action: 'mgr/item/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	xFeedback.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(xFeedback.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('xfeedback_item_description'),
			name: 'comment',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_rating'),
			name: 'rating',
			id: config.id + '-rating',
			anchor: '99%',
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_photo'),
			name: 'photo',
			id: config.id + '-photo',
			anchor: '99%',
		}, {
			xtype: 'textfield',
			fieldLabel: _('xfeedback_item_pub_date'),
			name: 'pub_date',
			id: config.id + '-pub_date',
			anchor: '99%',
            flex: 2,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('xfeedback_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('xfeedback-item-window-update', xFeedback.window.UpdateItem);