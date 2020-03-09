<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset ('css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset ('style.css') }}">

</head>
<body>

    @includeIf('layouts.componants.search')

    <!-- Header Area Start -->
@includeIf('layouts.componants.header')
    <!-- Header Area End -->

@yield('contant')

    <!-- ##### Newsletter Area Start ##### -->
@yield('news-footer')
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
@includeIf('layouts.componants.footer.main-footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
@includeIf('layouts.componants.js.main')

</body>
</html>