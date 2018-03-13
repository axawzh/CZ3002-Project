@extends('layouts.app')

@section('content')
<style>
    .card-title {
        margin-left: 20px;
    }
</style>
<div class="content-container">
    <div class="header">
        <div class="title-wrapper">
            <div class="title">My Groups</div>
            <div class="subtitle">{{sizeof($academicGroups) + sizeof($nonAcademicGroups)}} Groups</div>
            <a href="{{url('/creategroup')}}">Create a Group</a>
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
        @foreach($academicGroups as $acaGroup)
        <div class="card">
            <div class="card-title">
                <h2><b>{{$acaGroup['groupName']}}</b></h2>
            </div>
            <div class="card-description">
                <p>{{$acaGroup['description']}}</p>
            </div>
            <div class="card-groupsize">
                <p>Group size: {{$acaGroup['groupSize']}}</p>
            </div>
            <a href="{{url('/grouppage', ['groupId'=>$acaGroup['groupId']])}}">Enter</a>

        </div>
        @endforeach
        @foreach($nonAcademicGroups as $nonAcaGroup)
            <div class="card">
                <div class="card-title">
                    <h2><b>{{$nonAcaGroup['groupName']}}</b></h2>
                </div>
                <div class="card-category">
                    <p>Category: {{$nonAcaGroup['category']}}</p>
                </div>
                <div class="card-description">
                    <p>{{$nonAcaGroup['description']}}</p>
                </div>
                <div class="card-groupsize">
                    <p>Group size: {{$nonAcaGroup['groupSize']}}</p>
                </div>
                <a href="{{url('/grouppage/'.$nonAcaGroup['groupId'])}}">Enter</a>
            </div>
        @endforeach
    </div>
</div>
@endsection