<?php

namespace wpQssApp\api;

class AuthenticationClient extends QSSApi {
	const TOKEN_URL = 'token';
	const TOKEN_REFRESH_URL = 'token/refresh';
	const RESET_PASSWORD_URL = 'reset-password';
	const MAGIC_LINKS_URL = 'magic-links';

	public function get_token(): array {
		$args = array(
			'sslverify' => false,
			'headers'   => array(
				'Accept'        => 'application/json',
				'Content-Type'  => 'application/json',
			),
			'body' => wp_json_encode(array(
				'email'    => 'ahsoka.tano@q.agency',
				'password' => 'Kryze4President',
			))
		);
		$response = wp_remote_post(self::BASE_URL . self::TOKEN_URL, $args);

		if ( empty( $response ) || is_wp_error( $response ) ) {
			return array();
		}

		$token = json_decode( wp_remote_retrieve_body( $response ), ARRAY_A );

		if ( empty( $token['token_key'] ) ) {
			return array();
		}

		setcookie( 'qss_token', $token['token_key'] );
		setcookie( 'qss_auth', json_encode( $token ) );

		return $token;
	}

	public function refresh_token( string $refresh_token ): array {
		$url      = self::TOKEN_REFRESH_URL . '/' . $refresh_token;
		$response = $this->get( $url );

		// Do something

		return array();
	}

	public function reset_password(): array {
		$args     = array(
			'email'        => 'string',
			'callback_url' => 'string',
		);
		$response = $this->post( self::RESET_PASSWORD_URL, $args );

		// DO something

		return array();
	}

	public function reset_password_hash( string $hash_token ): array {
		$url = self::RESET_PASSWORD_URL . '/' . $hash_token;

		$response = $this->put( $url, array() );

		// Do something

		return array();
	}

	public function send_magic_link(): array {
		$response = $this->post( self::MAGIC_LINKS_URL, array(
			'email' => 'string',
		) );

		// DO Something

		return array();
	}

	public function generate_access_token( string $email, string $hash ): array {
		$url = self::MAGIC_LINKS_URL . '/' . $email . '/' . $hash;

		$response = $this->get( $url );

		// Do Something

		return array();
	}
}