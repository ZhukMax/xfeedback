<?php

/**
 * Create an Item
 */
class xFeedbackItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'xFeedbackItem';
	public $classKey = 'xFeedbackItem';
	public $languageTopics = array('xfeedback');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));
		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('xfeedback_item_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
			$this->modx->error->addField('name', $this->modx->lexicon('xfeedback_item_err_ae'));
		}

		return parent::beforeSet();
	}

}

return 'xFeedbackItemCreateProcessor';