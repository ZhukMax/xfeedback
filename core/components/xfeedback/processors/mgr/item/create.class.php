<?php

/**
 * Create an Item
 */
class xFeedbackItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'xFeedbackItem';
	public $classKey = 'xFeedbackItem';
	public $languageTopics = array('xfeedback');


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));

		return parent::beforeSet();
	}

}

return 'xFeedbackItemCreateProcessor';