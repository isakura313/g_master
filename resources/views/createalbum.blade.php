@include('includes.header')
  <body>
  @include('includes.nav')



    <div class="main has-background-link" style="text-align: center;">
      <div class="span4" style="display: inline-block; margin-top:100px;">

        @if (isset($errors) && $errors->has(''))
          <div class="alert alert-block alert-error fade in"id="error-block">
             <?php
             $messages = $errors->all('<li>:message</li>');
            ?>
            <button type="button" class="close"data-dismiss="alert">×</button>

            <h4>Warning!</h4>
            <ul>
              @foreach($messages as $message)
                {{$message}}
              @endforeach
            </ul>
          </div>
        @endif

        <form name="createnewalbum"   method="POST" action="{{route('create_album')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
           <h3 class="is-size-3 has-text-light"> Создайте альбом </h3>

            <div class="field">
              <label for="name" class="has-text-light" >Имя альбома</label>
              <div class="control">
                <input name="name" type="text" class="input" placeholder="Название альбома" value="{{old('name')}}">
              </div>
            </div>

            <div class="field">
              <label for="description" class="has-text-light">Описание альбома</label>
              <div class="control">
                <textarea name="description" type="text" class="input" placeholder="Описание альбома">{{old('descrption')}}</textarea>
              </div>
            </div>


              <div class="file">
              <label class="file-label">

              <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
                  <span class="file-label">
                  {{Form::file('cover_image')}}
              </span>
                </span>
            </label>
              </div>
             <div class="field">
                <button type="submit" class="button is-primary is-pulled-right submit">Создать!</button>
            </div>
            </div>
        </form>
      </div>
    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
  .main{
    height: 93vh;

  }
   .submit{
     margin-top:20px;
   }
    </style>
  </body>
</html>
