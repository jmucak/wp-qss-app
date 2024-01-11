<?php

use wpQssApp\api\AuthenticationClient;
use wpQssApp\api\QSSApiClient;

extract( $args );
/**
 * @var array $qss_user
 * @var string $token_type
 */
?>
    <div>
		<?php if ( ! empty( $qss_user['first_name'] ) && ! empty( $qss_user['last_name'] ) ) {
			echo sprintf( '%s %s', $qss_user['first_name'], $qss_user['last_name'] );
		} ?>

        Email: <?php echo ! empty( $qss_user['email'] ) ? esc_html( $qss_user['email'] ) : ''; ?>
        User ID: <?php echo esc_html( $qss_user['id'] ); ?>
        Email confirmed: <?php echo ! empty( $qss_user['email_confirmed'] ); ?>
    </div>

<?php
// Example of API calls


// AUTHORS

//$client = new QSSApiClient( 'authors', $token_type );
//
//// Get authors
//$items = $client->find_by( array(
//  'orderBy'   => 'id',
//  'direction' => 'ASC',
//  'limit'     => 12,
//  'page'      => 1,
//) );
//
//
//// Save author
//$item = $client->add_new( array(
//  'first_name'     => 'First name',
//  'last_name'      => 'Last name',
//  'birthday'       => '1995-09-20T13:37:20.597Z',
//  'biography'      => 'Author biography',
//  'gender'         => 'male',
//  'place_of_birth' => 'Zagreb',
//) );
//
//$id = ! empty( $item['id'] ) ? $item['id'] : null;
//// Get author by id
//$item = $client->find_by_id( $id );
//
//// Update
//$item = $client->update_item( $id, array(
//  'first_name'     => 'First name Updated!',
//  'last_name'      => 'Last name Updated!',
//  'birthday'       => '1996-05-07T13:37:20.597Z',
//  'biography'      => 'Author biography Updated!',
//  'gender'         => 'female',
//  'place_of_birth' => 'Zagreb Updated!',
//) );
//
//// Delete
//$client->delete_item( $id );
// END AUTHORS

// BOOKS
//$author_id = 62818;
//$client    = new QSSApiClient( 'books', $token_type );
//
//// Get items
//$items = $client->find_by( array(
//	'orderBy'   => 'id',
//	'direction' => 'ASC',
//	'limit'     => 12,
//	'page'      => 1,
//) );
//
//// Save item
//$item = $client->add_new( array(
//	'author'          => array(
//		'id' => $author_id,
//	),
//	'title'           => 'Professional WordPress: Design and Development',
//	'release_date'    => '2013-01-04T13:37:20.597Z',
//	'description'     => 'WordPress is the most popular self-hosted open source website software in use today',
//	'isbn'            => '9781118442272',
//	'format'          => 'Paperback',
//	'number_of_pages' => 456,
//) );
//
//$id = ! empty( $item['id'] ) ? $item['id'] : null;
//// Get item by id
//$item = $client->find_by_id( $id );
//
//// Update item
//$item = $client->update_item( $id, array(
//	'author'          => array(
//		'id' => $author_id,
//	),
//	'title'           => 'Professional WordPress: Design and Development v2',
//	'release_date'    => '2014-01-04T13:37:20.597Z',
//	'description'     => 'WordPress is the most popular self-hosted open source website software in use today v2',
//	'isbn'            => '9781118442272',
//	'format'          => 'Paperback',
//	'number_of_pages' => 457,
//) );
//
//// Delete item
//$client->delete_item( $id );

// END BOOKS

// TAGS
//$client = new QSSApiClient( 'tags', $token_type );
//
//// Get items
//$items = $client->find_by( array(
//	'orderBy'   => 'id',
//	'direction' => 'ASC',
//	'limit'     => 12,
//	'page'      => 1,
//) );
//
//// Save item
//$item = $client->add_new( array(
//	'name'  => 'Test tag',
//	'color' => 'blue',
//) );
//
//$id = ! empty( $item['id'] ) ? $item['id'] : null;
//// Get item by id
//$item = $client->find_by_id( $id );
//
//// Update item
//$item = $client->update_item( $id, array(
//	'name'  => 'Test tag updated',
//	'color' => 'green',
//) );
//
//// Delete item
//$client->delete_item( $id );
// END TAGS

// USERS
//$client = new QSSApiClient( 'users', $token_type );
//
//// Get items
//$items = $client->find_by( array(
//	'orderBy'   => 'id',
//	'direction' => 'ASC',
//	'limit'     => 12,
//	'page'      => 6,
//) );
//
//// Save item
//$item = $client->add_new( array(
//	'email'      => 'email@email.com',
//	'roles'      => array( 'ROLE_USER' ),
//	'password'   => wp_hash_password( 'securepassword123' ),
//	'first_name' => 'Word',
//	'last_name'  => 'Press',
//	'gender'     => 'male',
//	'active'     => true,
//) );
//
//$id = ! empty( $item['id'] ) ? $item['id'] : null;
//// Get item by id
//$item = $client->find_by_id( $id );
//
//// Update item
//$item = $client->update_item( $id, array(
//	'email'           => 'email@email.com',
//	'first_name'      => 'Press',
//	'last_name'       => 'Word',
//	'gender'          => 'female',
//	'active'          => true,
//) );
//
//// Add user tag
//$tag_id = 34750; // 34752
//$item   = $client->add_new_user_tag( $id, $tag_id );
//$item   = $client->add_new_user_tag( $id, 34752 );
//
//// Remove tag from a user
//$item = $client->remove_user_tag( $id, $tag_id );
//
//$authentication_api = new AuthenticationClient( $token_type );
//$magic_link = $authentication_api->send_magic_link( $item['email'] );
//
//// Delete item
//$client->delete_item( $id );
// END USERS

