<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The Post</h1>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$postTitle}}</h2>

                    <div class="top-img">
                        <img src="{{$imageUrl}}" class="img-fluid" alt="Responsive image">
                    </div>

                    <p>{{$postDescription}}</p>
                </div><!-- /.blog-post -->

            </div><!-- /.blog-main -->

            <div class="col-sm-3 offset-sm-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <x-form-widget page-uid="{{$pageUid}}"/>
                </div>
            </div><!-- /.blog-sidebar -->

        </div>
    </div>
</body>
</html>
