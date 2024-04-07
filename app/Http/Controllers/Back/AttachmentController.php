<?php

namespace App\Http\Controllers\Back;

use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = Attachment::all();
    
        return view('back.attachments.index', compact('attachments'));
    }

    public function list() {

        $attachments = Attachment::all();
        
        $html =  view('back.attachments.list', compact('attachments'))->render();

        return response()->json([
            'html' => $html
        ]);

    

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5000|mimes:' . $this->getAllowedFileTypes(),
        ]);
        // save the file
        if ($fileUid = $request->file->store('/upload', 'public')) {
            return Attachment::create([
                'filename' => $request->file->getClientOriginalName(),
                'uid' => $fileUid,
                'size' => $request->file->getClientSize(),
                'mime' => $request->file->getMimeType(),
                //'attachable_id' => $request->get('attachable_id'),
                //'attachable_type' => $request->get('attachable_type'),
            ]);
        }
        return response(['msg' => 'Unable to upload your file.'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\  $attachement
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachement)
    {
        //
    }

      

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attachment  $attachement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        if (Storage::disk('public')->exists($attachment->uid)) {
            Storage::disk('public')->delete($attachment->uid);
        }
         return $attachment->delete();
    }
    /**
     * Remove . prefix so laravel validator can use allowed files
     *
     * @return string
     */
    private function getAllowedFileTypes()
    {
        return str_replace('.', '', config('parametres.medias.allowed', ''));
    }

    

}
