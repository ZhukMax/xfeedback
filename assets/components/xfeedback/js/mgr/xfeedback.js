var xFeedback = function (config) {
	config = config || {};
	xFeedback.superclass.constructor.call(this, config);
};
Ext.extend(xFeedback, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('xfeedback', xFeedback);

xFeedback = new xFeedback();