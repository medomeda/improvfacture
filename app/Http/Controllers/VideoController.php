<?php

namespace App\Http\Controllers;

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        return view('videos.index');
    }

    public function split(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mp4,avi,mkv,mp3,wav',
            'duration' => 'required_if:num_parts,null|integer|min:1',
            'num_parts' => 'required_if:duration,null|integer|min:1',
            'start_time' => 'required_if:duration,null|date_format:H:i:s',
            'end_time' => 'required_if:duration,null|date_format:H:i:s|after:start_time',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $inputFilePath = $file->storeAs('uploads', $filename);

        $outputPrefix = 'output_segment';

        try {
            $ffmpeg = FFMpeg::create();
            $video = $ffmpeg->open(Storage::path($inputFilePath));

            if ($request->has('duration')) {
                $duration = $request->input('duration');
                $video->filters()
                    ->clip(TimeCode::fromSeconds(0), TimeCode::fromSeconds($duration))
                    ->synchronize();
            } elseif ($request->has('num_parts')) {
                $duration = $video->getDurationInSeconds();
                $segmentDuration = $duration / $request->input('num_parts');
                $video->clip(TimeCode::fromSeconds(0), TimeCode::fromSeconds($segmentDuration * $request->input('num_parts')));
            } elseif ($request->has('start_time') && $request->has('end_time')) {
                $start = $request->input('start_time');
                $end = $request->input('end_time');
                $video->filters()
                    ->clip(TimeCode::fromString($start), TimeCode::fromString($end))
                    ->synchronize();
            } else {
                return redirect()->route('videos.index')->with('error', 'Invalid options provided.');
            }

            $video->save(new \FFMpeg\Format\Video\X264(), Storage::path("uploads/{$outputPrefix}%03d.mp4"));

            return view('videos.result')->with('success', true)->with('input_file', $filename);
        } catch (\Exception $e) {
            return view('videos.result')->with('success', false)->with('error_message', $e->getMessage());
        }
    }
}
