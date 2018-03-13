<!doctype html>
<html>
    <body>
        <h1>Hello, {{ $name }}</h1>
    </body>

    {{ Form::open(['route' => 'GroupController.testForm'])}}
    {{ Form::text('username') }}
    {{ Form::submit('go') }}
    {{ Form::close() }}
</html>