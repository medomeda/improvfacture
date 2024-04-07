@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Video Splitter</h1>
            <form action="{{ route('videos.split') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" accept=".mp4, .avi, .mkv, .mp3, .wav" required>
                <br>
                <label for="duration">Duration (seconds):</label>
                <input type="number" name="duration" min="1">
                <br>
                <label for="num_parts">Number of parts:</label>
                <input type="number" name="num_parts" min="1">
                <br>
                <label for="start_time">Start time:</label>
                <input type="text" name="start_time" placeholder="00:00:00">
                <br>
                <label for="end_time">End time:</label>
                <input type="text" name="end_time" placeholder="00:00:00">
                <br>
                <input type="submit" value="Split">
            </form>
        </div>
    </div>
@endsection
</body>

</html>
