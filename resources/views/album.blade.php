@include('includes.header')

<body>
  @include('includes.nav')
<link rel="stylesheet" href="{{ asset('css/mag.css') }}">
  <div class="columns">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img class="media-object pull-left" alt="{{$album->name}}" src="/albums/{{$album->cover_image}}"
            width="350px">
        </figure>
      </div>
      <div class="card-content has-background-black-ter">
        <h5 class="is-size-5 has-text-light"> Создан пользователем: <span class="has-text-primary">
            {{$album->created_by}}</span> </h2>
          <h2 class="is-size-3 has-text-danger font-weight-bold"> {{$album->name}} </h2>

          <div class="field">

            @if ($album->description == '' )
            <h3 class="is-size-5 has-text-light is-italic"> описание отсутствует </h3>
            @else
            <h3 class="is-size-5 has-text-light is-italic">{{$album->description}}</h3>
            @endif

            <a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button"
                class="button is-primary">Добавить новую фотографию в альбом</button></a>
            <a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Вы уверены?')"><button
                type="button" class="button is-primary">Удалить альбом</button></a>
          </div>
      </div>
    </div>
  </div>
  </div>
  <div class="columns is-multiline ">
    @foreach($album->Photos as $photo)
    <div class="column is-half">
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3 arts_gallery">
            <a href="/albums/{{$photo->image}}">
              <img alt="{{$album->name}}" src="/albums/{{$photo->image}}" class="is-128x128">
            </a>
          </figure>
        </div>
        <div class="card-content has-text-light has-background-black-ter ">
          <p>{{$photo->description}}</p>
         
          <p>Дата создания: {{ date("d F Y",strtotime($photo->created_at)) }}at
            {{ date("g:ha",strtotime($photo->created_at)) }}</p>
          <a href="{{route('delete_image',array('id'=>$photo->id))}}" onclick="returnconfirm('Вы уверены?')"><button
              type="button" class="button is-primary is-small">Удалить изображение</button></a>
          <p>Переместить фотографию в другой альбом :</p>
          <form name="movephoto" method="POST" action="{{route('move_image')}}">
            {{ csrf_field() }}
            <select name="new_album">
              @foreach($albums as $others)
              <option value="{{$others->id}}">{{$others->name}}</option>
              @endforeach
            </select>
            <input type="hidden" name="photo" value="{{$photo->id}}" />
            <button type="submit" class="btn btn-smallbtn-info" onclick="return confirm('Вы уверены?')">Перемещение
              изображения</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" defer></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" defer></script>
 <script src="{{ asset('js/code.js') }}" defer></script>
</body>

</html>