@extends('layouts.app')
@include ('layouts.errors')

@section('main')
    <main class="registers">
        <section id="sign-page-main-content" class="sign-page-main-content-login">
            <article id="sign-page-content">
                <h1 id="title-text">Sign In</h1>
                <h3 id="subtitle-text">Log In to Community Connect to ask questions, answer people's questions, and connect with others.</h3>
                <a id="go-to-sign-in" href="/register">Don't have an account? Sign Up</a>
            </article>
            @yield('errors')
            <form id="sign-page-form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username_or_email">Username or Email*</label>
                    <input type="text" id="username_or_email" name="username_or_email" required placeholder="Enter username or email here" class="user-details-input">
                </div>
                <div id="password-group" class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required placeholder="Enter password here" class="user-details-input">
                </div>
                <a id="forgot-password" href="{{ route('login') }}">Forgot Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </section>
    </main>
@endsection
