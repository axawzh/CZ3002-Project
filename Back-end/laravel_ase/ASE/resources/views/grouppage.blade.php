@extends('layouts.app')

@section('content')
<div class="content-container" id="app">
  <div class="header">
    <div class="title-wrapper">
      <div class="title">{{$groups['name']}}</div>
      <a href="{{url('/managegroup', ['groupId'=>$groups['id']])}}" class="manage-group-button">Manage</a>
    </div>
  </div>
  <div class="group-page">
    <div class="announcements-container cards-container">
      <div class="form-container">
        <form action="/announcement" method="post" class="form create-announcement">
        {{ csrf_field() }}
          <div class="title">Create Announcement</div>
          <hr>
          <div class="input-wrapper">
            <div class="label">Title</div>
            <input type="text" id="lgFormGroupInput" placeholder="Title" name="title" class="text-field">
          </div>
          <div class="input-wrapper">
            <div class="label">Description</div>
            <textarea name="post" rows="8" class="text-field" maxlength="190"></textarea>
          </div>
          <hr>
          <div class="input-wrapper right-aligned no-padding">
            <input type="hidden" name="id" value={{$id}} >
            <input type="submit" class="submit-button">
          </div>
        </form>
      </div>
      @foreach($cruds as $post)
      <div class="card">
        <div class="card-title">{{$post['title']}}</div>
        <div class="card-description">{{$post['post']}}</div>
      </div>
      @endforeach
    </div>
    <div class="chat-box">
      <groups :initial-groups="{{ $groups }}" :user="{{ $user }}"></groups>
    </div>
  </div>
</div>
@endsection
