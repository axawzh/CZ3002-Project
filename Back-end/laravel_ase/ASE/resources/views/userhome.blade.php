@extends('layouts.app')

@section('content')
<div class="content-container">
    <div class="header">
        <div class="title-wrapper">
            <div class="title">My Groups</div>
            <div class="subtitle">{{sizeof($academicGroups) + sizeof($nonAcademicGroups)}} Groups</div>
            <a href="{{url('/creategroup')}}" class="manage-group-button">Create a Group</a>
            <a href="{{url('/search')}}" class="manage-group-button">Find a Group</a>
        </div>
        <div class="options">
            <div class="label">Sort by</div>
            <select class="select dark">
                <option selected>Last update</option>
                <option>Name</option>
                <option>Group size</option>
            </select>
        </div>
    </div>
    <div class="cards-container">
        @if (sizeof($academicGroups) + sizeof($nonAcademicGroups))
            @foreach($academicGroups as $acaGroup)
            <div class="card">
                <div class="title-and-description">
                    <div class="card-title-wrapper">
                        <div class="card-title">{{$acaGroup['groupName']}}</div>
                    </div>
                    <div class="card-description">{{$acaGroup['description']}}</div>
                </div>
                <div class="actions">
                    <div class="card-groupsize">Group size: {{$acaGroup['groupSize']}}</div>
                    <a href="{{url('/grouppage', ['groupId'=>$acaGroup['groupId']])}}" class="link">Enter ></a>
                </div>
            </div>
            @endforeach
            
            @foreach($nonAcademicGroups as $nonAcaGroup)
            <div class="card">
                <div class="title-and-description">
                    <div class="card-title-wrapper">
                        <div class="card-title">{{$nonAcaGroup['groupName']}}</div>
                        <div class="card-subtitle">Category: {{$nonAcaGroup['category']}}</div>
                    </div>
                    <div class="card-description">{{$nonAcaGroup['description']}}</div>
                </div>
                <div class="actions">
                    <div class="card-groupsize">Group size: {{$nonAcaGroup['groupSize']}}</div>
                    <a href="{{url('/grouppage/'.$nonAcaGroup['groupId'])}}" class="link">Enter ></a>
                </div>
            </div>
            @endforeach
        @else
            <div>You have no group</div>
        @endif
    </div>
</div>
@endsection