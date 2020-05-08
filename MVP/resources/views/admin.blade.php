@extends('layout.app')

@section('content')
    <nav id="myNavbar" class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/images/logo_neg.png" alt="Inside Canada: the familiar travel agency" style="max-height:3.25rem">
                </a>
                <p class="navbar-item title">Admin</p>
            </div>
            <div id="navMenu" class="navbar-menu has-text-white">
                <div class="navbar-end">
                    <a class="navbar-item is-active" href="/logout"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div id="app">
        <AdminRoot/>
    </div>
@endsection
