@include('includes.header')
  <body>

    <div class="columns is-centered has-background-link" >
      <div class="span4">
        @if(isset($errors) && $errors->has(''))
          <div class="alert alert-block alert-error fade in"id="error-block">
            <?php
            $messages = $errors->all('<li>:message</li>');
            ?>
            <button type="button" class="button close" data-dismiss="alert">×</button>

            <h4>Warning!</h4>
            <ul>
              @foreach($messages as $message)
                {{$message}}
              @endforeach

            </ul>
          </div>
        @endif
        <div class="column has-text-white">
        <form name="addimagetoalbum" method="POST" action="{{route('add_image_to_album')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <input class="input" type="hidden" name="album_id" value="{{$album->id}}" />
          <fieldset>
            <h5 class="is-size-4 label has-text-white">Добавить фотографию в {{$album->name}}</h5>
            <div class="field">
              <label for="description" class="is-size-2">Описание изображения</label>
              <div class="control">
              <textarea cols="50" rows="5" name="description" type="text" class="textarea is-size-5" placeholder="Описание изображения"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="image">Выбрать изображение</label>
              {{Form::file('image')}}
            </div>
            <button type="submit" class="button is-pulled-right">Добавить</button>
          </fieldset>
        </form>
        </div>
      </div>
    </div> <!-- /container -->
  </body>
</html>