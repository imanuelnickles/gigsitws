<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

	$app->group([	'namespace' => 'App\Http\Controllers'
					
				],function($app){

				/*Login*/
		$app->post('/auth/login', 'AuthController@postLogin');
		
		/*Token Checker*/
		$app->get('/auth/authuser','AuthController@getAuthenticatedUser');
		
		/*Register*/
		$app->post('/listener/register','AuthController@listenerRegister');
		$app->post('/artist/register','AuthController@artistRegister');
		/*Get Province Data*/
		$app->get('/province','AuthController@getProvince');
		
		/*Get City*/
		$app->get('/city/{id}','AuthController@getCity');

	});






/*User Profile (Artist and Listener)*/
$app->get('/profile/{id}','ProfileController@getProfile'); //Listener
$app->get('/artist/profile/{id}','ProfileController@getArtistProfile'); //Artist

/*User Edit Profile (Artist and Listener)*/
$app->post('/profileEdit','ProfileController@editProfile'); //Listener
$app->post('/artist/update/profile','ProfileController@editArtistProfile'); //Artist

$app->post('/forgot','MailController@forgot');
$app->get('/register/verify/{confirmationCode}','MailController@verification');
/*$app->get('/register/ver','MailController@verificatione');*/
/*Artist*/

/*Upload*/
$app->group([		
					'prefix' => 'upload',
					'namespace' => 'App\Http\Controllers',
					/*'middleware' => 'jwt.auth'*/
				],function($app){
					$app->post('/','UploadController@uploadData');
					$app->post('/add/song','UploadController@uploadNewSong');		
				});


/*Manage*/
$app->group([		
					'prefix' => 'artist/manage/table',
					'namespace' => 'App\Http\Controllers',
					/*'middleware' => 'jwt.auth'*/
				],function($app){
					$app->get('/{id}','ArtistManageController@artistAlbums');
					$app->get('/album/{albumId}','ArtistManageController@albumDetail');
					$app->post('/album/update','ArtistManageController@albumUpdate');
					$app->get('/song/delete/{songId}','ArtistManageController@songDelete');
					$app->get('/album/delete/{albumId}','ArtistManageController@albumDelete');


				});

/*Monitor*/
$app->get('/monitor/{id}','MonitorController@monitorProvince');


/*Listener*/

/*Artist*/
$app->get('/artist','ContentController@Artist');
$app->get('/artist/{id}','ContentController@ArtistAlbum');
$app->get('/album', 'ContentController@Album' );
$app->get('/albumsong/{id}', 'ContentController@AlbumSong' );
$app->get('/album/{id}','ContentController@albumDetail');
$app->get('/song/{id}','ContentController@songDetail');

$app->get('/play/{song_id}/{user_id}','ContentController@playSong');
$app->get('/changeSong/{song_id}','ContentController@changeSong');

/*Explore*/
$app->group([		
					'prefix' => 'explore',
					'namespace' => 'App\Http\Controllers',
					/*'middleware' => 'jwt.auth'*/
				],function($app){
		
		/*Get only 6 items*/
		$app->get('/getrecommendedalbum','ExploreController@recommendedAlbum');
		$app->get('/getnewrelease','ExploreController@newRelease');
		$app->get('/gethotartist','ExploreController@hotArtist');
		$app->get('/gettopchart','ExploreController@topChart');
		$app->get('/getsliderads','ExploreController@sliderAds');
		
		/*Get all items*/
		/*$app->get('/gethotartist/full','ExploreController@hotArtistFull');
		$app->get('/getnewrelease/full','ExploreController@newReleaseFull');
		$app->get('/getrecommendedalbum/full','ExploreController@recommendedAlbumFull');*/

	});


/*Search*/
$app->group([		
					'prefix' => 'search/data',
					'namespace' => 'App\Http\Controllers',
					/*'middleware' => 'jwt.auth'*/
				],function($app){
					$app->get('/','SearchController@searchData');
					$app->get('/{query}','SearchController@searchQuery');

				});


/*Playlist*/
$app->group([		
					'prefix' => 'playlist',
					'namespace' => 'App\Http\Controllers',
					/*'middleware' => 'jwt.auth'*/
				],function($app){
					$app->get('/data/{id}','PlaylistController@playlistData');
					$app->post('/','PlaylistController@playlistCreate');
					$app->post('/edit','PlaylistController@playlistEdit');
					$app->get('/add/{playlist_id}/song/{song_id}','PlaylistController@playlistAdd');
					$app->get('/detail/{id}','PlaylistController@playlistDetail');
					$app->get('/detail/delete/{id}','PlaylistController@playlistDetailDelete');
					$app->get('/delete/{id}','PlaylistController@playlistDelete');

				});






/* Admin */

/*Album Management*/

/*Album Registration*/
$app->get('/admin/albumregistration','AlbumManagementController@albumRegistrations');//Get Data (Read)
$app->get('/admin/albumregistration/approve/{id}','AlbumManagementController@albumApproved');//Approve (Update)
$app->get('/admin/albumregistration/decline/{id}','AlbumManagementController@albumDecline');//Decline (Update)
/*Album Manager*/
$app->get('/admin/albummanager','AlbumManagementController@albumManager');//Get Data (Read)
$app->get('/admin/albummanager/edit/{id}','AlbumManagementController@albumEdit');//Get Data to Edit (Read)
$app->post('/admin/albummanager/edit','AlbumManagementController@albumSubmitEdit');//Do Edit (Update)
$app->get('/admin/albummanager/delete/{id}','AlbumManagementController@albumDelete');//Do Delete (Delete)
/*Song Manager*/
$app->get('/admin/songmanager','AlbumManagementController@songManager');//Get Data (Read)
$app->get('/admin/songmanager/edit/{id}','AlbumManagementController@songEdit');//Get Data to Edit (Read)
$app->post('/admin/songmanager/edit','AlbumManagementController@songSubmitEdit');//Do Edit (Update)
$app->get('/admin/songmanager/delete/{id}','AlbumManagementController@songDelete');//Do Delete (Delete)
/*Decline Album*/
$app->get('/admin/declinedalbum','AlbumManagementController@declinedAlbum');//Get Data (Read)
$app->get('/admin/undeclinedalbum/{id}','AlbumManagementController@undeclinedAlbum');//Do Undeclined (Update)


/*User Manager*/

/*Listener Manager*/
$app->get('/admin/listenermanager','UserManagerController@listenerManager');//Get Data (Read)
$app->get('/admin/listenermanager/edit/{id}','UserManagerController@listenerEdit');//Get Data to Edit (Read)
$app->post('/admin/listenermanager/edit','UserManagerController@listenerSubmitEdit');//Do Edit (Update)
$app->get('/admin/listenermanager/delete/{id}','UserManagerController@listenerDelete');//Do Delete (Delete)
/*Artist Manager*/
$app->get('/admin/artistmanager','UserManagerController@artistManager');//Get Data (Read)
$app->get('/admin/artistmanager/edit/{id}','UserManagerController@artistEdit');//Get Data to Edit (Read)
$app->post('/admin/artistmanager/edit','UserManagerController@artistSubmitEdit');//Do Edit (Update)
$app->get('/admin/artistmanager/delete/{id}','UserManagerController@artistDelete');//Do Delete (Delete)
/*Artist Registration*/
$app->get('/admin/artistregistration','UserManagerController@artistRegistration');//Get Data (Read)
$app->get('/admin/artistregistration/approve/{id}','UserManagerController@artistRegistrationApprove');//Do Update
$app->get('/admin/artistregistration/decline/{id}','UserManagerController@artistRegistrationDecline');//Do Update

/*Artist Registration*/
$app->get('/admin/artistdeclined','UserManagerController@artistDeclined');//Get Data (Read)
$app->get('/admin/artistdeclined/undecline/{id}','UserManagerController@artistUndecline');//Do Update


/*Content Manager*/

/*Slider Ads*/
$app->get('/admin/contentmanager/sliderads','ContentManagerController@sliderAds');//Get Data (Read)
$app->get('/admin/contentmanager/sliderads/edit/{id}','ContentManagerController@sliderAdsEdit');//Get Data to Edit (Read)
$app->post('/admin/contentmanager/sliderads/edit','ContentManagerController@sliderAdsSubmitEdit');//Do Edit (Update)
$app->get('/admin/contentmanager/sliderads/delete/{id}','ContentManagerController@sliderAdsDelete');//Do Delete (Delete)
$app->post('/admin/contentmanager/slideradsnew','ContentManagerController@sliderAdsNew');//Add New Data (Create)
/*Recommended Album*/
$app->get('/admin/contentmanager/recommendedalbum','ContentManagerController@recommendedAlbum');//Get Data (Read)
$app->get('/admin/contentmanager/recommendedalbum/edit/{id}','ContentManagerController@recommendedAlbumEdit');//Get Data to Edit (Read)
$app->get('/admin/contentmanager/recommendedalbum/selectalbumdata','ContentManagerController@recommendedAlbumSelectAlbum');//Get Album Data (Read)
$app->post('/admin/contentmanager/recommendedalbum/edit','ContentManagerController@recommendedAlbumSubmitEdit');//Do Edit (Update)
$app->post('/admin/contentmanager/recommendedalbum/undefined','ContentManagerController@recommendedAlbumUndefined');//Do Edit (Update)

/*Monitor*/
$app->get('/admin/monitor/artist','MonitorController@monitorArtist');//Get Data (Read)
$app->get('/admin/monitor/artist/{id}','MonitorController@monitorArtistAlbum');//Get Data by Province (Read)
