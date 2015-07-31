<?php

if (isset($_POST['vieber_geo_input'])) {

	$app = (new Core\App())->get('Vieber_Check_In');
	Phpfox_Request::instance()->set([
		'auth_id' => $app->auth['id'],
		'auth_key' => $app->auth['key']
	]);
	$hook = new \Core\Webhook('feed.service_process_add__end2', 'http://localhost/openshift/vieber/apps/check-in/webhooks/');

	if (isset($hook->response->id)) {
		$content = json_encode(['vieber_geo_id' => $hook->response->id]);
	}
}