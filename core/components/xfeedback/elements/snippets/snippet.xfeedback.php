<?php
/** @var xFeedback $xFeedback */
if (!$xFeedback = $modx->getService('xfeedback', 'xFeedback', $modx->getOption('xfeedback_core_path', null, $modx->getOption('core_path') . 'components/xfeedback/') . 'model/xfeedback/', $scriptProperties))
	return 'Could not load xFeedback class!';

$pathToCss = $xFeedback->config['cssUrl'].'web/';
$output = '<link rel="stylesheet" type="text/css" href="'.$pathToCss.'main.xfeedback.css">
';
$row = array();

/* Vars of snippet */
$rand = $random == 1 ? true : false;
$count = !$count ? 0 : $count;
$templ = !$templ ? 'xFeedback.item' : $templ;
$wform = $form == 1 ? true : false;
if ($sort) $filters['sort'] = $sort;
if ($dir) $filters['dir'] = $dir;

if ($wform == true) {
	if ($_POST['new-feedback']) {
	
		// Create new comment
		$output .= '<h3>'.$xFeedback->addFeedback($_POST, $_FILES).'</h3>';
	}

	// Output Form for new comments
	$output .= $modx->getChunk('xFeedback.form', $row);

	// Output comments
	$output .= $xFeedback->outputItems($count, $templ, $filters, $rand);

} else $output .= $xFeedback->outputItems($count, $templ, $filters, $rand);

return $output;
