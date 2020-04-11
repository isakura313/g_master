@include('includes.header')
  <body>
  @include('includes.nav')

          <div class="columns is-multiline is-centered has-background-black-ter gallery_wrapper">
          @foreach($albums as $album)
            <div class="column is-two-fifths is-centered">
              <div class="card">
                <div class="card-image">
                <figure class="image">
                <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}">
                </figure>
                <div class="card-content">
                  <h3 class="is-size-4 label has-text-centered">{{$album->name}}</h3>
                 <span class="is-size-4 has-text-danger"> Альбом создан пользователем: </span>  <span class="is-size-4  has-text-primary has-text-weight-bold"> {{$album->created_by}}</span> 
                  <p> Описание альбома: <span  class="is-size-4 has-text-danger" >{{$album->description}}   </span> </p>
                  <p class="is-size-5">{{count($album->Photos)}} image(s).</p>
                  <p> Альбом создан: {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                  <p> Уровень доступа: {{$album->access}}</p>
                  <p><a href="{{route('show_album', ['id'=>$album->id])}}" class="btn btn-big btn-default">Перейти в Галерею</a></p>
                </div>
              </div>
            </div>
            </div>
          @endforeach
            </div>
  </body>
</html>
