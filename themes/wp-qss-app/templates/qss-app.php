<?php
/** Template Name: QSS App Template */

use wpQssApp\api\AuthenticationClient;

$client   = new AuthenticationClient( 'cookie' );
$params   = ! empty( $_POST['qss_login'] ) ? $_POST : array();
$qss_user = $client->authenticate( $params );

//$refresh_token = $client->refresh_token();

get_header();

if ( empty( $qss_user ) ) {
	get_partial( 'qss/login-form' );
} else {
	get_partial( 'qss/screen', array(
		'qss_user' => $qss_user,
	) );
}


get_footer();