<?php

namespace wpQssApp\api;

class AuthenticationClient extends QSSApi {
	const TOKEN_URL = 'token';
	const TOKEN_REFRESH_URL = 'token/refresh';
	const RESET_PASSWORD_URL = 'reset-password';
	const MAGIC_LINKS_URL = 'magic-links';

	public function __construct( string $token_type = 'database' ) {
		parent::__construct( $token_type );
	}

	// ahsoka.tano@q.agency
	// Kryze4President
	/**
	 * @param array $params (string|$email, string|$password)
	 *
	 * @return array
	 */
	public function authenticate( array $params = array() ): array {
		if ( empty( $params['email'] ) || empty( $params['password'] ) ) {
			return $this->get_current_user();
		}

		$args     = array(
			'sslverify' => false,
			'headers'   => array(
				'Accept'       => 'application/json',
				'Content-Type' => 'application/json',
			),
			'body'      => wp_json_encode( array(
				'email'    => $params['email'],
				'password' => $params['password'],
			) ),
		);
		$response = wp_remote_post( self::BASE_URL . self::TOKEN_URL, $args );

		$parsed_data = $this->parse_response( $response );

		if ( ! $this->save_token_data( $parsed_data ) ) {
			// token has not been stored
			// log in error log
		}

		return ! empty( $parsed_data['user'] ) ? $parsed_data['user'] : array();
	}

	public function get_current_user(): array {
		$response = $this->get( 'me' );

		return $this->parse_response( $response );
	}

	private function save_token_data( array $data ): bool {
		if ( empty( $data ) || empty( $data['token_key'] ) ) {
			return false;
		}

		// If only one user can be logged in on website like integration then store token in database
		if ( 'database' === $this->token_type ) {
			update_option( 'qss_token_key', $data['token_key'] );
			update_option( 'qss_token_data', $data );

			return true;
		}

		// If multiple users can be logged in then store token in cookie
		if ( 'cookie' === $this->token_type ) {
			setcookie( 'qss_token_key', $data['token_key'] );
			setcookie( 'qss_token_data', json_encode( $data ) );

			return true;
		}

		return false;
	}

	public function refresh_token(): array {
		$token_data = $this->get_token_data();

		if ( empty( $token_data['refresh_token_key'] ) ) {
			return array();
		}

		$url      = self::TOKEN_REFRESH_URL . '/' . $token_data['refresh_token_key'];
		$response = $this->get( $url );

		$parsed_data = $this->parse_response( $response );

		if ( ! $this->save_token_data( $parsed_data ) ) {
			// token has not been stored
			// log in error log
		}

		return $parsed_data;
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

	public function send_magic_link( string $email = '' ): array {
		if ( empty( $email ) ) {
			return array();
		}
		$response = $this->post( self::MAGIC_LINKS_URL, array(
			'email' => $email,
		) );

		return $this->parse_response( $response );
	}

	public function generate_access_token( string $email, string $hash ): array {
		$url = self::MAGIC_LINKS_URL . '/' . $email . '/' . $hash;

		$response = $this->get( $url );

		// Do Something

		return array();
	}
}