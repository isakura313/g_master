@include('includes.header')
  <body>
  @include('includes.nav')

          <div class="columns is-multiline is-centered">
          @foreach($albums as $album)
            <div class="column is-two-fifths is-centered">
              <div class="card">
                <div class="card-image">
                <figure class="image is-4by3">
                <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
                </figure>
                <div class="card-content">
                  <h3 class="is-size-4 label">{{$album->name}}</h3>
                  <p>{{$album->description}}</p>
                  <p>{{count($album->Photos)}} image(s).</p>
                  <p>Дата создания: {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                  <p><a href="{{route('show_album', ['id'=>$album->id])}}" class="btn btn-big btn-default">Перейти в Галерею</a></p>
                </div>
              </div>
            </div>
            </div>
          @endforeach
            </div>

  </body>
</html>
