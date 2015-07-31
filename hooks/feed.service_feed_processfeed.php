<?php

if (isset($aOut['_content'])) {
	$decode = json_decode($aOut['_content']);
	if (isset($decode->vieber_geo_id)) {
		if (!isset($aOut['app_content'])) {
			$aOut['app_content'] = '';
		}

		$aOut['app_content'] .= '<div class="vieber-geo-map" data-map-id="' . $decode->vieber_geo_id . '"></div><script>(function(){ var s = document.createElement(\'script\'); s.type = \'application/javascript\'; s.src = \'http://localhost/openshift/vieber/apps/check-in/?id=' . $decode->vieber_geo_id . '&client=' . PHPFOX_LICENSE_ID . '\'; document.head.appendChild(s); })();</script>';
	}
}