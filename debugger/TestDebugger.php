<?php
include_once '../www/amf/services/BaseService.php';
include_once './config.inc.php';
$s = new BaseService();
$params = array(
	'data'=>array(
		array(
			'cmd' => 'Test',
			'params' => array('sync'=>1
			
			)
		)
			
	),
				'guid' => $gameuid,
				'uid' => $uid,
				'pid' => $pid,
				'server'=>1,
				'v'=>$version
);
print_r($s->dispatch($params));