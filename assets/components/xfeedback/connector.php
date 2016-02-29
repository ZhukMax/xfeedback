<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var xFeedback $xFeedback */
$xFeedback = $modx->getService('xfeedback', 'xFeedback', $modx->getOption('xfeedback_core_path', null, $modx->getOption('core_path') . 'components/xfeedback/') . 'model/xfeedback/');
$modx->lexicon->load('xfeedback:default');

// handle request
$corePath = $modx->getOption('xfeedback_core_path', null, $modx->getOption('core_path') . 'components/xfeedback/');
$path = $modx->getOption('processorsPath', $xFeedback->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));