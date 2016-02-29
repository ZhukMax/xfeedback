<?php

/**
 * Class xFeedbackMainController
 */
abstract class xFeedbackMainController extends modExtraManagerController {
	/** @var xFeedback $xFeedback */
	public $xFeedback;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('xfeedback_core_path', null, $this->modx->getOption('core_path') . 'components/xfeedback/');
		require_once $corePath . 'model/xfeedback/xfeedback.class.php';

		$this->xFeedback = new xFeedback($this->modx);

		$this->addCss($this->xFeedback->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->xFeedback->config['jsUrl'] . 'mgr/xfeedback.js');
		$this->addHtml('
		<script type="text/javascript">
			xFeedback.config = ' . $this->modx->toJSON($this->xFeedback->config) . ';
			xFeedback.config.connector_url = "' . $this->xFeedback->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('xfeedback:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}


	/**
	 * @return array
	 */
	public function addFeedback() {
		return 'its ok!';
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends xFeedbackMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}