<?php
/**
 * The home manager controller for xFeedback.
 *
 */
class xFeedbackHomeManagerController extends xFeedbackMainController {
	/* @var xFeedback $xFeedback */
	public $xFeedback;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('xfeedback');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->xFeedback->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->xFeedback->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->xFeedback->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->xFeedback->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->xFeedback->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->xFeedback->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->xFeedback->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "xfeedback-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->xFeedback->config['templatesPath'] . 'home.tpl';
	}
}