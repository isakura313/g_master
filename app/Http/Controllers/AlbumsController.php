<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;
use App\Album;

class AlbumsController extends Controller
{
    public function getList() //получение списка альбомов
  {
      $albums = Album::with('Photos')->get(); 
      return view('index')->with('albums',$albums);
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
      $rules = ['name' => 'required', 'cover_image'=>'required|image'];  // нельзя создать альбом без имени и обложки
      $input = ['name' => null];
    //валидатор мы обсудим в следующей части
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        return redirect()->route('create_album_form')->withErrors($validator)->withInput();
      }
      $file = $request->file('cover_image');
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name.'_cover.'.$extension;
      $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
      $album = Album::create(array(
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'cover_image' => $filename,
      ));

      return redirect()->route('show_album',['id'=>$album->id]);
  }

  public function getDelete($id) // возможность удаления альбома
  {
      $album = Album::find($id);
      $album->delete();
      return Redirect::route('index');
  }
}