@extends('layout.app')

@section('content')
    <div>
        <section id="heroWrapper" class="hero is-primary is-fullheight has-carousel">
            <div id="welcomeCarousel" class="hero-carousel">
                <div class="carousel has-background">
                    <img class="carouselImg" src="images/Norquay-lookout.JPG" alt="">
                </div>
                <div class="carousel has-background">
                    <img class="carouselImg" src="images/DSC00170.JPG" alt="">
                </div>
                <div class="carousel has-background">
                    <img class="carouselImg" src="images/DSC00046.JPG" alt="">
                </div>
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
                                <a class="navbar-item" href="#virtualTrip">Virtual trip</a>
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
        <section class="section is-medium has-background-primary">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third">
                        <figure class="image is-3by4">
                            <img src="images/DSC00170.JPG" alt="The route through the canadian rockies">
                        </figure>
                    </div>
                    <div class="column is-two-thirds">
                        <h1 class="title is-2">Feel the beauty of Canada</h1>
                        <p class="content">We at Inside Canada have fallen hopelessly for the uncut nature experiences Canada can offer visitiors and local alike. We exist with the single purpose of showing you why, and because we live here we know how to guide you to the most beautiful turquiose lakes and untouched snowpeaks in the mountains. Scroll down to see why we are so passionate about our second home!</p>
                        <button class="button is-radiusless">Let's take you here</button>
                    </div>
                </div>
                <h2 class="title is-2 has-text-centered">The process</h2>
                <div class="columns">
                    <div class="column is-half is-offset-one-quarter">
                        <div class="column">
                            <p class="title is-2 has-text-grey">01</p>
                            <p class="subtitle is-2">Get Inspiration</p>
                            <p class="content">Imagine a trip to Canada with us. We have carefully chosen a route based on our own experiences, so you are free to follow it, or do your own thing. See it below.</p>
                        </div>
                        <div class="column">
                            <p class="title is-2 has-text-grey">02</p>
                            <p class="subtitle is-2">Contact us</p>
                            <p class="content">Promise we don't bite. If you have any questions, or would like to implement your own destination but don't now how, you are always free to contect us!</p>
                        </div>
                        <div class="column">
                            <p class="title is-2 has-text-grey">03</p>
                            <p class="subtitle is-2">Book the trip of your dreams!</p>
                            <p class="content">You canbook it right here on the website, or you can contact us. We promise you will not regret it!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section is-medium has-background-primary">
            <div class="container">
                <div class="columns">
                    <div class="column is-two-thirds">
                        <div class="columns has-text-centered">
                            <p id="virtualTrip" class="title is-2"><span class="title is-1 has-text-grey">01</span>   The Virtual Trip</p>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <figure class="image is-square">
                                    <img src="images/DSC00170.JPG" alt="">
                                </figure>
                            </div>
                            <div class="column">
                                <p class="content">You probably already know a bit about the Rocky Mountains, which means that the names Lake Louise and Banff most likely ring a bell. That is also true for the thousands if tourists that visit these destinations every day in the high-season. Lucky for you, we have seen it all, and we know the unknown destinations that will take your breath away. The following virtual trip is our best guideline to the Canada trip we want you to experience. If course it is all flexible, and in reality completely up to you whether you want to follow our advice or not.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <figure class="image is-2by3">
                            <img src="images/DSC00170.JPG" alt="The route through the canadian rockies">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <div id="app">
        <Root/>
        </div>
@endsection


