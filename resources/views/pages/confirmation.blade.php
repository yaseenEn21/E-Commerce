<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset ('css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset ('style.css') }}">    <title>Document</title>
</head>
<body>
    <div class="jumbotron text-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>The request was received successfully.</strong></p>
        <hr>
        <p>
          Having trouble? <a href="">Contact us</a>
        </p>
        <p class="lead">
        <a  class="btn amado-btn" href="{{route('home.index')}}" role="button">Continue to homepage</a>
        </p>
      </div>
      @includeIf('layouts.componants.footer.main-footer')
</body>
</html>