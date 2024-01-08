<?php
/** Template Name: QSS App Template */

use wpQssApp\api\QSSApiClient;
use wpQssApp\api\QSSAuthorsClient;

$client = new QSSApiClient();
//$token  = $client->get_token();

get_header();

$authors_client = new QSSAuthorsClient();
//$authors        = $authors_client->find_by();
//$author         = $authors_client->find_by_id( 62818 );

//$author = $authors_client->add_author( array(
//	'first_name'     => 'Josip',
//	'last_name'      => 'Test',
//	'birthday'       => '2024-01-08T20:13:29.433Z',
//	'biography'      => 'Some description',
//	'gender'         => 'male',
//	'place_of_birth' => 'Zagreb',
//) );

//$author_delete = $authors_client->delete_author(62855);
//$author_edit = $authors_client->edit_author( 62856, array(
//	'last_name' => 'Last Name',
//	'birthday'  => '1995-09-25T00:00:00+00:00',
//) );

echo '<pre>';
var_dump( $authors_client->find_by() );
echo '</pre>';

$var = 0;

get_footer();