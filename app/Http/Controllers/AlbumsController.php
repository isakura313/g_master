<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Album;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


class AlbumsController extends Controller
{
    public function getList() //получение списка альбомов
  {
    //   $albums = Album::with('Photos')->get();
      return view('index')->with('albums', $private_album );
  }


  public function getUser(){
        $users = Users::with('Users')->get();
        return view('index')-> with('users', $users);
  }

  public function getAlbum($id)
  {
      $album = Album::with('Photos')->find($id);
      $albums = Album::with('Photos')->get();
      return view('album', ['album'=>$album, 'albums'=>$albums]);
  }

  public function getForm()
  {
      return view('createalbum'); //форма создания альбома
  }

  public function postCreate(Request $request)
  {
      $users = User::get();
      $file = $request->file('cover_image');
      $random_name = Str::random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name.'_cover.'.$extension;
      $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
      $album = Album::create(array(
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'access' => $request->get('access'),
        'created_by'=> Auth::user()->name,
        'cover_image' => $filename
      ));

      return redirect()->route('show_album',['id'=>$album->id]);
  }

  public function getDelete($id) // возможность удаления альбома
  {
      $album = Album::find($id);
      $album->delete();
      return Redirect::route("index");
  }

}
