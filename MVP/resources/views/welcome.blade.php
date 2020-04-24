<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Inside Canada</title>
</head>
<body>
    <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
            <img src="/images/logo_neg.png" alt="Inside Canada: the familiar travel agency">
            </a>
            <a role="button" class="navbar-burger is-active" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item" href="#virtualtrip">Virtual trip</a>
                <a class="navbar-item" href="#gallery">Gallery</a>
                <a class="navbar-item" href="#whoAreWe">Who are we</a>
            </div>
        </div>
    </nav>
    <!-- End Hero Carousel -->
    <div id="app">
        <Root/>
    </div>

</body>
<script src="js/app.js"></script>
<script src="js/root.js"></script>
</html>
