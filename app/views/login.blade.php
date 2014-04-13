@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Giriş</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin">
                <input type="text" class="form-control" placeholder="Email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">Beni hatırla
                </label>
                <a href="#" class="pull-right need-help">Yardım</a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Hesap oluştur</a>
        </div>
    </div>
</div>

@stop




