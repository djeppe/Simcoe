<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */

/**
 * Print debuginformation from the framework
 */
function get_debug() {
	$sim = CSimcoe::GetInstance();
	$html = "<h2>Debuginformation</h2><p>The content of the config array:</p><pre>" . htmlentities(print_r($sim->config, true)) . "</pre>";
	$html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($sim->data, true)) . "</pre>";
	$html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($sim->request, true)) . "</pre>";
	
	return $html;
}

/**
 * Create a url by prepending the base_url.
 */
function base_url($url) {
    return $sim->request->base_url . trim($url, '/');
}

/**
 * Return the current url.
 */
function current_url() {
    return $sim->request->current_url;
}

?>