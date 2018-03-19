@extends('layouts.app')

@section('content')
<div class="container">
  <form action="http://localhost:8000/announcement" method="post">
    <div class="form-group row">
      {{ csrf_field() }}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
      <div class="col-sm-10">
        <textarea name="post" rows="8" cols="80"></textarea>
      </div>
    </div>
	
    <div class="form-group row">
      <div class="col-md-2"></div>
	  <input type="hidden" name="id" value={{$id}} >
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
     <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Post</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['post']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <div class="row">
      <div class="col-sm-6">
          <groups :initial-groups="{{ $groups }}" :user="{{ $user }}"></groups>
      </div>
    </div>
</div>
@endsection
