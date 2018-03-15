@extends('layouts.app')

@section('content')
<div class="welcome">
    <div class="section">
        <div class="title-wrapper">
            <div class="title">NTU</div>
            <div class="subtitle">Connection</div>
        </div>
        <div class="description">
            Shallow rendering is useful to constrain yourself to testing a component as a unit, and to ensure that your tests aren't indirectly asserting on behavior of child components. As of Enzyme v3, the shallow API does call React lifecycle methods such as componentDidMount and componentDidUpdate. You can read more about this in the version 3 migration guide.
        </div>
    </div>
    <div class="login-container">
        <a href="/login"><div class="login-button button">Login</div></a>
        <a href="/register"><div class="signup-button button">Signup</div></a>
    </div>
</div>
@endsection