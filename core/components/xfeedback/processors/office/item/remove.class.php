<?php

/**
 * Remove an Items
 */
class xFeedbackOfficeItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'xFeedbackItem';
	public $classKey = 'xFeedbackItem';
	public $languageTopics = array('xfeedback');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('xfeedback_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var xFeedbackItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('xfeedback_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'xFeedbackOfficeItemRemoveProcessor';