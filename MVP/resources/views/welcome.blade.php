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
                                <a class="navbar-item" href="/cart">Cart</a>
                                <a class="navbar-item" href="#whoAreWe">Who are we</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 id="canadaTitle" class="title has-text-white is-family-secondary " >Canada</h1>
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
                        <p class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ILorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem I</p>
                        <button class="button is-radiusless">Let's take you here</button>
                    </div>
                </div>
                <h2 class="title is-2 has-text-centered">The process</h2>
                <div class="columns">
                    <div class="column is-half is-offset-one-quarter">
                        <div class="column">
                            <h2 class="title is-2 has-text-grey">01</h2>
                            <h3 class="subtitle is-2">Get Inspiration</h3>
                            <p class="content">Imagine a trip to Canada with us. We have carefully chosen a route based on our own experiences. See it below.</p>
                        </div>
                        <div class="column">
                            <h2 class="title is-2 has-text-grey">01</h2>
                            <h3 class="subtitle is-2">Get Inspiration</h3>
                            <p class="content">Imagine a trip to Canada with us. We have carefully chosen a route based on our own experiences. See it below.</p>
                        </div>
                        <div class="column">
                            <h2 class="title is-2 has-text-grey">01</h2>
                            <h3 class="subtitle is-2">Get Inspiration</h3>
                            <p class="content">Imagine a trip to Canada with us. We have carefully chosen a route based on our own experiences. See it below.</p>
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
                            <h1 id="virtualTrip" class="title is-2"><span class="title is-1 has-text-grey">01</span>   The Virtual Trip</h1>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <figure class="image is-square">
                                    <img src="images/DSC00170.JPG" alt="">
                                </figure>
                            </div>
                            <div class="column">
                                <p class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently w</p>
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


