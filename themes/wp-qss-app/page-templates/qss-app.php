<?php
/** Template Name: QSS App Template */

//$auth_client = new AuthenticationClient( '' );
//$auth_client->get_token();

use wpQssApp\api\AuthenticationClient;
use wpQssApp\api\QSSApiClient;

//$token = $_COOKIE['qss_token'];
$token = '';


if ( ! empty( $_POST['qss_login'] ) ) {
	$email    = ! empty( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$password = ! empty( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';

//	if ( ! empty( $email ) && ! empty( $password ) ) {
//		$client = new AuthenticationClient( '' );
//		$client->get_token();
//	}
}

get_header();

$client   = new QSSApiClient( 'users', $token );
$qss_user = $client->get_current_user();

if ( empty( $qss_user ) ) {
	get_partial( 'qss/login-form' );
} else {
	get_partial( 'qss/screen', array(
		'qss_user' => $qss_user,
	) );
}


get_footer();