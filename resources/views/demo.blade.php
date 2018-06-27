<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" media="all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.plyr.io/3.3.20/plyr.css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <div id="video-container">
                        <video poster="/path/to/poster.jpg" id="player" playsinline controls>
                            <source src="/media/video/18/06/26/vgL57cvPkhUjxqbS03iHIEdmwTTeOPfu8snY5lpZ.mp4" type="video/mp4">
                        </video>
                </div>
            </div>
        </div>
        <script src="https://cdn.plyr.io/3.3.20/plyr.js"></script>
        <script type="text/javascript" src="/js/video.js"></script>
    </body>
</html>
