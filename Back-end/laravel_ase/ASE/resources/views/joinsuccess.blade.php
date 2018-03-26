@extends('layouts.app')

@section('content')
<div class="welcome">
    <div class="section">
        <div class="title-wrapper">
            <div class="title">Success</div>
        </div>
        <div class="description">
            You have successfully joined the group. Redirecting to group page...
            <script>
                var timer = setTimeout(function() {
                    window.location='{{ url('/home') }}'
                }, 5000);
            </script>
        </div>
    </div>
</div>
@endsection