@extends('layouts.app')

@section('content')
<div class="welcome">
    <div class="section">
        <div class="title-wrapper">
            <div class="title">NTU Connection</div>
        </div>
        <div class="description">
            NTU Connection is a platform for students creating and joining groups more easily. Integrated with NTU courses system.
        </div>
    </div>
    <div class="login-container">
        <a href="/login"><div class="login-button button">Login</div></a>
        <a href="/register"><div class="signup-button button">Signup</div></a>
    </div>
</div>
@endsection