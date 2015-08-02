<?php

new Core\Route('/admincp/check-in', function() {
	$app = (new Core\App())->get('Vieber_Check_In');
	Phpfox_Request::instance()->set([
		'auth_id' => $app->auth->id,
		'auth_key' => $app->auth->key,
		'client_id' => PHPFOX_LICENSE_ID
	]);
	$hook = new Core\Webhook('admincp', 'https://vieber-moxi9.rhcloud.com/apps/check-in/admincp/');

	return [
		'content' => $hook->response
	];
});