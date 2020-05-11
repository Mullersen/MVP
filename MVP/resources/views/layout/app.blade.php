<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/css/bulma-carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-quickview@2.0.0/dist/css/bulma-quickview.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <title>Inside Canada</title>
</head>
<body>
   @yield('content')
    <footer class="footer">
            <span class="has-text-grey">All rights reserved <strong>@InsideCanada</strong></span>
    </footer>
</body>
<script src="js/app.js"></script>
<script src="js/root.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bulma-quickview@2.0.0/dist/js/bulma-quickview.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
 bulmaCarousel.attach('#welcomeCarousel', {
                slidesToScroll: 1,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 10000,
                loop: true,
                duration: 600,
        });

var quickviews = bulmaQuickview.attach();
</script>
</html>
