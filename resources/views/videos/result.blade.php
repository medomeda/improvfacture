@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($success)
                <h2>Success!</h2>
                <p>The file {{ $input_file }} has been successfully split.</p>
            @else
                <h2>Error</h2>
                <p>An error occurred while splitting the file.</p>
                @isset($error_message)
                    <p>Error message: {{ $error_message }}</p>
                @endisset
            @endif
            <br>
            <a href="{{ route('index') }}">Back to Home</a>
        </div>
    </div>
@endsection
