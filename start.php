<?php

new Core\Route('/admincp/check-in', function() {
	$app = (new Core\App())->get('Vieber_Check_In');
	Phpfox_Request::instance()->set([
		'auth_id' => $app->auth->id,
		'auth_key' => $app->auth->key,
		'client_id' => PHPFOX_LICENSE_ID,
		'endpoint' => (new Core\Url())->make('admincp')
	]);
	$hook = new Core\Webhook('admincp', ((defined('VIEBER_DEV') && VIEBER_DEV) ? 'http://localhost/openshift/vieber/apps/check-in/admincp/' : 'https://php-moxi9.rhcloud.com/apps/check-in/admincp/'));

	if (isset($hook->response->error)) {
		return [
			'content' => '<div class="error_message">' . $hook->response->error . '</div>'
		];
	}

	return [
		'content' => $hook->response
	];
});