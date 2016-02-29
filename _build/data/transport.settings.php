<?php

$settings = array();

$tmp = array(
	'upload_dir' => array(
		'xtype' => 'string',
		'value' => 'photos/',
		'area' => 'xfeedback_main',
	),
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'xfeedback_' . $k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	), '', true, true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
