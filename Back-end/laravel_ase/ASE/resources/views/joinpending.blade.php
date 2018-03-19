@extends('layouts.app')

@section('content')
    <div class="welcome">
        <div class="section">
            <div class="title-wrapper">
                <div class="title">Pending</div>
            </div>
            <div class="description">
                Your join request has been sent, waiting for group leader's approval. Redirecting to group page...
                <script>
                    var timer = setTimeout(function() {
                        window.location='{{ url('/home') }}'
                    }, 5000);
                </script>
            </div>
        </div>
    </div>
@endsection
