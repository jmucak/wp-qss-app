<?php

namespace wpQssApp\api;

use WP_Error;
use WP_HTTP_Requests_Response;
use WpOrg\Requests\Exception;

class QSSApiClient {
	const BASE_URL = 'https://symfony-skeleton.q-tests.com/api/v2/';
	const TOKEN_URL = 'token';
	const AUTHOR_URL = 'authors';
	const BOOK_URL = 'books';
	const TAG_URL = 'tags';
	const USER_URL = 'users';

	private function get_headers(): array {
		return array();
	}

	public function get_token(): array {
		$args = array(
			'sslverify'   => false,
			'data_format' => 'body',
			'headers'     => array(
				'Accept'       => 'application/json',
				'Content-Type' => 'application/json',
			),
			'body'        => wp_json_encode( array(
				'email'    => 'ahsoka.tano@q.agency',
				'password' => 'Kryze4President',
			) ),
		);

		$response = wp_remote_post( self::BASE_URL . self::TOKEN_URL, $args );

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

	protected function get_data( string $url ): array {
		if ( empty( $_COOKIE['qss_token'] ) ) {
			return array();
		}

		$args = array(
			'sslverify' => false,
			'headers'   => array(
				'Authorization' => 'Bearer ' . $_COOKIE['qss_token'],
				'Accept'        => 'application/json',
			),
		);

		$response = wp_remote_get( $url, $args );

		if ( empty( $response ) || is_wp_error( $response ) ) {
			return array();
		}

		return json_decode( wp_remote_retrieve_body( $response ), ARRAY_A );
	}

	protected function post( string $url, array $data ): array {
		if ( empty( $_COOKIE['qss_token'] ) ) {
			return array();
		}

		$args = array(
			'sslverify' => false,
			'headers'   => array(
				'Authorization' => 'Bearer ' . $_COOKIE['qss_token'],
				'Accept'        => 'application/json',
				'Content-Type'  => 'application/json',
			),
			'body'      => wp_json_encode( $data ),
		);

		$response = wp_remote_post( $url, $args );

		if ( ( empty( $response ) || is_wp_error( $response ) ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
			return array();
		}

		return json_decode( wp_remote_retrieve_body( $response ), ARRAY_A );
	}

	protected function delete( string $url ): array|WP_Error {
		if ( empty( $_COOKIE['qss_token'] ) ) {
			return array();
		}

		$args = array(
			'sslverify' => false,
			'method'    => 'DELETE',
			'headers'   => array(
				'Authorization' => 'Bearer ' . $_COOKIE['qss_token'],
				'Accept'        => 'application/json',
				'Content-Type'  => 'application/json',
			),
		);

		return wp_remote_request( $url, $args );
	}

	protected function put( string $url, array $data ): array|WP_Error {
		if ( empty( $_COOKIE['qss_token'] ) ) {
			return array();
		}

		$args = array(
			'sslverify' => false,
			'method'    => 'PUT',
			'headers'   => array(
				'Authorization' => 'Bearer ' . $_COOKIE['qss_token'],
				'Accept'        => 'application/json',
				'Content-Type'  => 'application/json',
			),
			'body'      => wp_json_encode( $data ),
		);

		$response = wp_remote_request( $url, $args );

		if ( 200 !== wp_remote_retrieve_response_code( $response ) || empty( wp_remote_retrieve_body( $response ) ) ) {
			return $response;
		}

		return json_decode( wp_remote_retrieve_body( $response ) );
	}
}