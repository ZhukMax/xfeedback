<?php

/**
 * Get an Item
 */
class xFeedbackItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'xFeedbackItem';
	public $classKey = 'xFeedbackItem';
	public $languageTopics = array('xfeedback:default');


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return mixed
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		return parent::process();
	}

}

return 'xFeedbackItemGetProcessor';