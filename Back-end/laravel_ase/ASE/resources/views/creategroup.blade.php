@extends('layouts.app')

@section('content')
        <h1>
            Please choose the type of group to create:
        </h1>


    <form name="creategroup" action="/creategroup" method="post">
        {{ csrf_field() }}
        <input type="radio" name="type" value="academic">Academic
        <input type="radio" name="type" value="nonacademic">Non-academic<br>


        Group Name: <input type="text" name="groupName"> <br>
        Description: <input type="text" name="description"><br>
        Index: <input type="text" name="indexNo"><br>
        Permission: <input type="radio" name="permission" value="Free" checked>Free <input type="radio" name="permission" value="ask">Ask<br>
        <input type="submit" name="submit" value="Submit">
    </form>
@endsection