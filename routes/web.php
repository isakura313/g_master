<?php


Route::get('/', array('as' => 'index','uses' => 'AlbumsController@getList')) ->middleware('auth');;
//middleware позволяют нам делать фильтрацию http запросов на странице
Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm')) ->middleware('auth');;
//создание альбома из формы
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate')) ->middleware('auth');;
//само создание альбома
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete')) ->middleware('auth');;
// удаление альбома
Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum')) ->middleware('auth');;
// удаление альбома

//Эта часть связана с обработкой самих фотографий
Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImageController@getForm'));
//добавление изображений в форме
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImageController@postAdd'));
//добавление изображений в сам альбом
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImageController@getDelete'));
//удаление
Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImageController@postMove'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('index');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');



