@extends('layout.app')

@section('content')
<div>
    <section id="heroWrapper" class="hero is-fullheight has-carousel">
        <div id="welcomeCarousel" class="hero-carousel">
            @foreach($carouselImages as $carouselImage)
            <div class="carousel has-background">
                <img class="carouselImg" src="{{$carouselImage->images}}" alt="Inside Canada is a small Denmark-based travel agency, selling travels to Canada">
            </div>
            @endforeach
        </div>
        <div class="hero-head">
            <nav id="myNavbar" class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="/">
                            <img src="/images/logo_neg.png" alt="Inside Canada: the familiar travel agency" style="max-height:3.25rem">
                        </a>
                        <a role="button" class="navbar-burger has-text-white" aria-label="menu" aria-expanded="false" data-target="navMenu">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>
                    <div id="navMenu" class="navbar-menu has-text-white">
                        <div class="navbar-end">
                            <a class="navbar-item " href="#virtualTrip">Virtual trip</a>
                            <a class="navbar-item" href="#whoAreWe">Who are we</a>
                            <a class="navbar-item" data-show="quickview" data-target="quickviewDefault">Cart</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <p id="canadaTitle" class="title has-text-white is-family-secondary " >Canada</p>
                <button class="button is-radiusless is-dark is-family-secondary ">Let's take you on a trip!</button>
            </div>
        </div>
    </section>
    <section class="section is-small has-background-primary">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2 has-text-centered">
                    <h1 class="title is-2 underlined">Feel the beauty of Canada</h1>
                    <p class="content">We at Inside Canada have fallen hopelessly for the uncut nature experiences Canada can offer visitiors and local alike. We exist with the single purpose of showing you why, and because we live here we know how to guide you to the most beautiful turquiose lakes and untouched snowpeaks in the mountains. Scroll down to see why we are so passionate about our second home!</p>
                    <button class="button is-radiusless">Let's take you here</button>
                </div>
            </div>
        </div>
    </section>
    <section class="section is-medium has-background-primary">
        <div class="container">
            <h2 class="title is-2 has-text-centered" style="margin-top:6rem;">The process</h2>
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="columns">
                        <div class="column steps" >
                            <p class="title is-2 has-text-grey">01</p>
                            <p class="subtitle is-2 underlined" style=" margin-bottom: 0.5rem;">Get Inspired</p>
                            <p class="content">Scroll down and imagine a trip to Canada with us. We have carefully chosen a the best route based on our own experiences, but you are free to follow it, or do your own thing</p>
                        </div>
                        <div class="column steps" id="process2">
                            <p class="title is-2 has-text-grey">02</p>
                            <p class="subtitle is-2 underlined" style=" margin-bottom: 0.5rem;">Customize</p>
                            <p class="content">Always dreamt of trying outdoors rock-climbing? You can add it as an activity to your trip right here on the site and we will take care of the details for you.</p>
                        </div>
                        <div class="column steps" id="process3">
                            <p class="title is-2 has-text-grey">03</p>
                            <p class="subtitle is-2 underlined" style=" margin-bottom: 0.5rem;">Live it!</p>
                            <p class="content">Book the trip of your dreams right here, or if you have any questions or want to add your own destination you can contact us. We promise you will not regret it!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="app">
        <!-- cart-slider -->
        <div id="quickviewDefault" class="quickview">
            <header class="quickview-header">
                <p class="title has-text-primary">Quickview your Cart</p>
                <span class="delete" data-dismiss="quickview"></span>
            </header>
            <div class="quickview-body">
                <div class="quickview-block" id="quickviewContent">
                    <Cart />
                </div>
            </div>
            <footer class="quickview-footer"><a href="/cart">Go to Cart</a></footer>
        </div>
        {{-- virtual trip component start --}}
        <Root/>
    </div>
    @include('layout.footer')
@endsection


