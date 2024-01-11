<?php

use wpQssApp\api\AuthenticationClient;

$client   = new AuthenticationClient();
$params   = ! empty( $_POST['qss_login'] ) ? $_POST : array();
$qss_user = $qss_user = $client->authenticate( $params );

//$refresh_token = $client->refresh_token();
?>
<div class="wrap">
	<?php
	if ( empty( $qss_user ) ) {
		get_partial( 'qss/login-form' );
	} else {
		get_partial( 'qss/screen', array(
			'qss_user'   => $qss_user,
			'token_type' => 'database',
		) );
	}
	?>
</div>
