<?php
/**
 * xFeedback
 *
 * PROPERTIES:
 *
 * &random integer optional
 * &count integer optional. Default: 0
 * &templ string. Default: xFeedback.item
 * &form integer optional
 * &sort string optional
 * &dir string optional
 *
 */
/** @var xFeedback $xFeedback */
if (!$xFeedback = $modx->getService('xfeedback', 'xFeedback', $modx->getOption('xfeedback_core_path', null, $modx->getOption('core_path') . 'components/xfeedback/') . 'model/xfeedback/', $scriptProperties))
	return 'Could not load xFeedback class!';

$pathToCss = $xFeedback->config['cssUrl'].'web/';
$output = '<link rel="stylesheet" type="text/css" href="'.$pathToCss.'main.xfeedback.css">
';
$row = array();

/* Vars of snippet */
$rand = $modx->getOption('random', $scriptProperties, false);
$count = $modx->getOption('count', $scriptProperties, 0);
$templ = $modx->getOption('templ', $scriptProperties, 'xFeedback.item');
$wform = $modx->getOption('form', $scriptProperties, false);
$sort = $modx->getOption('sort', $scriptProperties, false);
if ($sort) $filters['sort'] = $sort;
$dir = $modx->getOption('dir', $scriptProperties, false);
if ($dir) $filters['dir'] = $dir;

$comments = $xFeedback->outputItems($count, $templ, $filters, $rand);

if ($wform == true) {
	if ($_POST['new-feedback']) {
	
		// Create new comment
		$output .= '<h3>'.$xFeedback->addFeedback($_POST, $_FILES).'</h3>';
	}

	// Output Form for new comments
	$output .= $modx->getChunk('xFeedback.form', $row);

	// Output comments
	$output .= $comments;

} else $output .= $comments;

return $output;