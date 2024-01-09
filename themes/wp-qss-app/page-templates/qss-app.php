<?php
/** Template Name: QSS App Template */

use wpQssApp\api\AuthenticationClient;

$client   = new AuthenticationClient();
$qss_user = $client->get_current_user();

//$refresh_token = $client->refresh_token();

if ( ! empty( $_POST['qss_login'] ) ) {
	$email    = ! empty( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$password = ! empty( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';

	if ( ! empty( $email ) && ! empty( $password ) ) {
		$qss_user = $client->authenticate( $email, $password );
	}
}

get_header();

if ( empty( $qss_user ) ) {
	get_partial( 'qss/login-form' );
} else {
	get_partial( 'qss/screen', array(
		'qss_user' => $qss_user,
	) );
}


get_footer();