@extends('frontend.layouts.master')
{{ Html::style(elixir('css/frontend.css')) }}
{!! Html::style('css/frontend/login.css') !!}

<center style="margin-top: 50px;"><img src="{{ asset('img/logo.png') }}" class="" alt="logo" align="middle"/></center>

<div class="container">

    @if (Auth::check())
        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="{{ asset('img/avatar_2x.png') }}" />
            <h3 class="panel-title" style="text-align: center;">Current Login: {{ Auth::user()->name }}</h3>

            <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;">
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Administration Panel</button>
            </a>
            <a href="{{ route('auth.logout') }}" style="text-decoration:none;">
                <button class="btn btn-lg btn-danger btn-block btn-logout" type="submit">Logout</button>
            </a>

        </div><!-- /card-container -->
    @else
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="{{ asset('img/avatar_2x.png') }}" />
            <p id="profile-name" class="profile-name-card"></p>
            {{ Form::open(['route' => 'auth.login', 'class' => 'form-horizontal form-signin']) }}
            <span id="reauth-email" class="reauth-email"></span>
            {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
            <div id="remember" class="checkbox">
                <label>
                    {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        {{ Form::close() }}<!-- /form -->
        </div><!-- /card-container -->
    @endif

</div><!-- /container -->