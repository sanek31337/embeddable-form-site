<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
    <div class="container">

        <div class="header row">
            <div class="col-sm-12">
                <h1 class="text-center">Header</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                @foreach($posts as $key => $post)
                    @if ($key == 0)
                        <div class="card-deck">
                    @endif

                    @if ($key > 0 && $key % 3 == 0)
                        </div>
                        <div class="card-deck mt-3">
                    @endif

                            <div class="card" style="max-width: 300px;">
                                <img src="{{$post->getPostImage()}}" class="card-img-top img-thumbnail" width="250" height="250" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$post->getPostTitle()}}</h5>
                                    <p class="card-text">{{$post->getPostDescription()}}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="/post/{{$post->getPostId()}}">Link</a>
                                </div>
                            </div>

                    @if ($key == (count($posts) - 1))
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="sidebar col-sm-4">
                <x-form-widget page-uid="{{$pageUid}}"/>
            </div>
        </div>

    </div>

</body>
</html>
