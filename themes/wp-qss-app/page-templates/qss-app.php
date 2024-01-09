<?php
/** Template Name: QSS App Template */


// Authors
use wpQssApp\api\QSSApiClient;

//$auth_client = new AuthenticationClient( '' );
//$auth_client->get_token();

$token = $_COOKIE['qss_token'];


get_header();

// AUTHORS
//$client  = new QSSApiClient( 'authors', $token );
//$authors = $client->find_by( array() );

if ( ! empty( $authors['items'] ) ) {
	foreach ( $authors['items'] as $item ) {
		echo $item['id'] . ' - ' . $item['first_name'] . ' ' . $item['last_name'];
	}
}

//id = 62858
//$new_author = $client->add_new(array(
//	'first_name' => 'Josip',
//	'last_name' => 'Test Last Name',
//	'birthday' => '1995-01-09T13:40:14.064Z',
//	'biography' => '',
//	'gender' => 'male',
//	'place_of_birth' => 'Zagreb'
//));

//$author = $client->find_by_id(62857);
//$update_author = $client->update_item(62857, array(
//	'first_name' => 'Josip',
//	'last_name' => 'Test Last Name',
//	'birthday' => '1995-01-09T13:40:14.064Z',
//	'biography' => 'Biography description',
//	'gender' => 'male',
//	'place_of_birth' => 'New York'
//));

//$delete_author = $client->delete_item(62856);
// END AUTHORS


// BOOKS
//$client = new QSSApiClient( 'books', $token );
//$items = $client->find_by(array(
//	'direction' => 'DESC',
//	'page' => 1,
//));
//
//if ( ! empty( $items['items'] ) ) {
//	foreach ( $items['items'] as $item ) {
//		echo $item['id'] . ' - ' . $item['title'] . ' ' . $item['release_date'];
//	}
//}
//
//$add_new = $client->add_new(array(
//	'author' => array('id' =>62858 ),
//	'title' => 'WordPress as a framework',
//	'release_date' => '2024-01-09T14:33:14.474Z',
//	'description' => 'How to build WordPress applications',
//	'isbn' => '8432190321',
//	'format' => 'A4',
//	'number_of_pages' => 300,
//));

//$book_by_id  = $client->find_by_id( 620632 );
//$update_book = $client->update_item( 620632, array(
//	'isbn' => '728132190321',
//) );

//$client->delete_item( 620632 );


// END BOOKS

get_footer();