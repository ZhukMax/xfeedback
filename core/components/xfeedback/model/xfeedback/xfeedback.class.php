<?php

/**
 * The base class for xFeedback.
 */
class xFeedback {
	/* @var modX $modx */
	public $modx;


	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array()) {
		$this->modx =& $modx;

		$corePath = $this->modx->getOption('xfeedback_core_path', $config, $this->modx->getOption('core_path') . 'components/xfeedback/');
		$assetsUrl = $this->modx->getOption('xfeedback_assets_url', $config, $this->modx->getOption('assets_url') . 'components/xfeedback/');
		$connectorUrl = $assetsUrl . 'connector.php';

		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'cssUrl' => $assetsUrl . 'css/',
			'jsUrl' => $assetsUrl . 'js/',
			'imagesUrl' => $assetsUrl . 'images/',
			'connectorUrl' => $connectorUrl,

			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'templatesPath' => $corePath . 'elements/templates/',
			'chunkSuffix' => '.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/',
			'processorsPath' => $corePath . 'processors/'
		), $config);

		$this->modx->addPackage('xfeedback', $this->config['modelPath']);
		$this->modx->lexicon->load('xfeedback:default');
	}


	/**
	 * @return boolen
	 */
	public function tablexists($class, $table) {

		$tablexists = $this->modx->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '".$this->modx->getOption('dbname')."' AND table_name = '".$this->modx->getOption('table_prefix').$table."'");

		if(!$tablexists->fetch(PDO::FETCH_COLUMN)){
			$m = $this->modx->getManager();
			$created = $m->createObjectContainer($class);
		}

		return true;

	}


	/**
	 * @return array
	 */
	public function dataForAdd($data, $file) {

		$goodArray = array();
		$goodArray = array(
    		'name' => $data['name'],
			'rating' => $data['rating'],
    		'comment' => $data['text'],
			'photo' => $file,
			'rating' => $data['reviewStars'],
			'pub_date' => time(),
			'active' => 0
		);
		return $goodArray;

	}


	/**
	 * @return string
	 */
	public function fileUpload($data) {

		$uploaddir = $this->modx->getOption('xfeedback_upload_dir');
		if (!is_dir($uploaddir)) mkdir($uploaddir, 0777, true);

		$uploadfile = $uploaddir . basename($data['userfile']['name']);

		if (move_uploaded_file($data['userfile']['tmp_name'], $this->modx->getOption('core_path') . '../' . $uploadfile))
			return $uploadfile;
		else return false;

	}


	/**
	 * @return string
	 */
	public function addFeedback($data, $files) {

		$file = $this->fileUpload($files);
		$goodData = $this->dataForAdd($data, $file);

		// Create table w/comments, if not exists
		$this->tablexists('xFeedbackItem', 'xfeedback_items');

		// Add new comment to DB
		$item = $this->modx->newObject('xFeedbackItem');
		$item->fromArray($goodData);

		if ($item->save())
			return $this->modx->lexicon('xfeedback_item_created');
		else return $this->modx->lexicon('xfeedback_item_err_save');

	}


	/**
	 * @return int
	 */
	public function countItems() {

		$c = $this->modx->newQuery('xFeedbackItem');
		$c->where(array('active' => 1));
		$items = $this->modx->getCollection('xFeedbackItem',$c);
		return count($items);

	}


	/**
	 * @return string
	 */
	public function outputItems($count = 0, $templ = 'xFeedback.item', $filters = array(), $rand = false) {

		$countItems = (int)$this->countItems();
		if ($countItems < 1) return $this->modx->lexicon('xfeedback_item_err_noitems');

		$sort = !$filters['sort'] ? 'pub_date' : $filters['sort'];
		$dir = !$filters['dir'] ? 'ASC' : $filters['dir'];
		$output = '';
		$whereArray = array();
		
		$c = $this->modx->newQuery('xFeedbackItem');
		$c->sortby($sort, $dir);
		$whereArray['active'] = 1;
		if ($rand == false && $count != 0) $c->limit($count);
		elseif ($rand == true) {
			$idArray = array();
			for ($i = 0; $count > $i; $i++) {
				$randID = rand(0, $countItems);
				if (array_search($randID, $idArray) == false) $idArray[] = $randID;
				else $i--;
			}
			$whereArray['id:IN'] = $idArray;
		}
		$c->where($whereArray);
		$items = $this->modx->getCollection('xFeedbackItem',$c);

		foreach ($items as $item) {
    		$itemArray = $item->toArray();
    		$output .= $this->modx->getChunk($templ, $itemArray);
		}

		return $output;

	}

}