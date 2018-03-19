@extends('layouts.app')

@section('content')
    <div class="welcome">
        <div class="section">
            <div class="title-wrapper">
                <div class="title">Failed</div>
            </div>
            <div class="description">
                {{$reason}} Redirecting to home page...
                <script>
                    var timer = setTimeout(function() {
                        window.location='{{ url('/home') }}'
                    }, 5000);
                </script>
            </div>
        </div>
    </div>
@endsection