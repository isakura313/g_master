@include('includes.header')
  <body>
  @include('includes.nav')

    <div class="container">
   <div class="starter-template">
        <div class="media">
          <img class="media-object pull-left"alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
          <div class="media-body">
            <h2 class="media-heading" style="font-size: 26px;">Название альбома:</h2>
            <p>{{$album->name}}</p>
          <div class="media">
          <h2 class="media-heading" style="font-size: 26px;">Описание альбома :</h2>
          <p>{{$album->description}}<p>
          <a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Добавить новую фотографию в альбом</button></a>
          <a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Вы уверены?')"><button type="button"class="btn btn-danger btn-large">Удалить альбом</button></a>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
        @foreach($album->Photos as $photo)
          <div class="col-lg-3">
            <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
              <img alt="{{$album->name}}" src="/albums/{{$photo->image}}">
              <div class="caption">
                <p>{{$photo->description}}</p>
                <p>Дата создания:  {{ date("d F Y",strtotime($photo->created_at)) }}at {{ date("g:ha",strtotime($photo->created_at)) }}</p>
                <a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="returnconfirm('Вы уверены?')"><button type="button"class="btn btn-danger btn-small">Удалить изображение</button></a>
                <p>Переместить фотографию в другой альбом :</p>
                <form name="movephoto" method="POST"action="{{URL::route('move_image')}}">
                    {{ csrf_field() }}
                  <select name="new_album">
                    @foreach($albums as $others)
                      <option value="{{$others->id}}">{{$others->name}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" name="photo"value="{{$photo->id}}" />
                  <button type="submit" class="btn btn-smallbtn-info" onclick="return confirm('Вы уверены?')">Перемещение изображения</button>
                </form>
              </div>
            </div>
          </div>
      @endforeach
    </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
  </body>
</html>