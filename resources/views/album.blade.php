@include('includes.header')
  <body>
  @include('includes.nav')

    <div class="columns">
   <div class="card">
        <div class="card-image">
        <figure class="image is-4by3">
          <img class="media-object pull-left"alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
          </figure>
          </div>
          <div class="card-content has-text-light has-background-black-ter">
            <h2 class="is-size-5">Название альбома:</h2>
            <p>{{$album->name}}</p>
          <div class="field">
          <h3 class="is-size-5">Описание альбома :</h3>
          <p>{{$album->description}}<p>
          </div>
          <a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button"class="button is-primary">Добавить новую фотографию в альбом</button></a>
          <a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Вы уверены?')"><button type="button" class="button is-primary">Удалить альбом</button></a>
        </div>
      </div>
    </div>
    </div>
  </div>
    <div class="columns is-multiline is-centered">
        @foreach($album->Photos as $photo)
          <div class="column is-two-fifths">
            <div class="card">
          <div class="card-image">
              <figure class="image is-4by3">
              <a href="/albums/{{$photo->image}}">
              <img alt="{{$album->name}}" src="/albums/{{$photo->image}}" class="is-128x128">
              </a>
              </figure>
              </div>
              <div class="card-content has-text-light has-background-black-ter">
                <p>{{$photo->description}}</p>
                <p>Дата создания:  {{ date("d F Y",strtotime($photo->created_at)) }}at {{ date("g:ha",strtotime($photo->created_at)) }}</p>
                <a href="{{route('delete_image',array('id'=>$photo->id))}}" onclick="returnconfirm('Вы уверены?')"><button type="button"class="button is-primary is-small">Удалить изображение</button></a>
                <p>Переместить фотографию в другой альбом :</p>
                <form name="movephoto" method="POST"action="{{URL::route('move_image')}}">
                    {{ csrf_field() }}
                  <select name="new_album">
                    @foreach($albums as $others)
                      <option value="{{$others->id}}">{{$others->name}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" name="photo" value="{{$photo->id}}" />
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