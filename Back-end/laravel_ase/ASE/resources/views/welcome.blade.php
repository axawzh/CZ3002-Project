@extends('layouts.app')

@section('content')
<div class="content-container">
    <div class="header">
        <div class="title-wrapper">
            <div class="title">My Groups</div>
            <div class="subtitle">14 Groups</div>
        </div>
        <div class="options">
            <div class="label">Sort by</div>
            <select class="select">
                <option selected>Last update</option>
                <option>Name</option>
                <option>Group size</option>
            </select>
        </div>
    </div>
    <div class="cards-container">
        <div class="card">
            <div class="notification-badge">3</div>
        </div>
        <div class="card">
            <div class="notification-badge">3</div>
        </div>
        <div class="card">
            <div class="notification-badge">3</div>
        </div>
    </div>
</div>
@endsection