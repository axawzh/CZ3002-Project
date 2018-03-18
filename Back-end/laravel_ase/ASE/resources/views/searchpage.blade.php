@extends('layouts.app')

@section('content')

<div class="content-container">
    <div class="header">
        <div class="title-wrapper">
            <div class="title">Search Groups</div>
            <form action="{{url('/search')}}" method="post">
                {{ csrf_field() }}
                <input type="text" placeholder="Search.." name="search" class="searchbar">
                <button type="submit" class="search-button">Search</button>
            </form>
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
        @foreach($grouplist as $group)
            <div class="card">
                <div class="card-title">
                    <h2><b>{{$group['groupName']}}</b></h2>
                </div>
                <div class="card-description">
                    <p>{{$group['description']}}</p>
                </div>
                <div class="card-groupsize">
                    <p>Group size: {{$group['groupSize']}}</p>
                </div>
                <a href="{{url('/group/join/'.$group['id'])}}">Join</a>
            </div>
        @endforeach
    </div>
</div>
@endsection