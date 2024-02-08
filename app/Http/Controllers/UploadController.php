<?php

namespace App\Http\Controllers;

use App\Contracts\CvUploadInterface;
use App\Contracts\UploadInterface;
use App\Http\Requests\UploadRequest;
use App\Models\Upload;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    use UploadTrait;
    private $profile_genre;
    private $cv_genre;
    private $uploadInterface;
    private $cvuploadInterface;
    public function __construct(UploadInterface $uploadInterface, CvUploadInterface $cvuploadInterface)
    {
        $this->uploadInterface = $uploadInterface;
        $this->cvuploadInterface = $cvuploadInterface;
        $this->profile_genre = 1;
        $this->cv_genre = 3;
    }

    public function index()
    {
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('upload_url')) {
            $this->storeImage($request, auth()->user()->id, $this->profile_genre, $this->uploadInterface);
            return redirect()->route('jobseekers.index')->with('success', 'Image is successfully uploaded!');
        } elseif ($request->hasFile('upload_cv')) {
            $this->storeCV($request, auth()->user()->id, $this->cv_genre, $this->cvuploadInterface);
            return redirect()->route('jobseekers.index')->with('success', 'CV is successfully uploaded!');
        }


        return redirect()->route('jobseekers.index')->with('error', 'No file uploaded!');
    }



    public function edit($id)
    {
        $upload = Upload::findOrFail($id);

        // return response()->download()

        return view('uploads.edit', compact('upload'));
    }

    public function cvdownload($cv_id)
    {
        $profile_cv = Upload::where('link_id', $cv_id)->where('genre', '=', '3')->latest()->first();

        if (!$profile_cv) {
            return redirect()->back()->with('error', 'CV not found.');
        }

        $filePath = storage_path("app/{$profile_cv->upload_url}");

        if (file_exists($filePath)) {
            return response()->download($filePath, $profile_cv->original_filename);
        }

        return redirect()->back()->with('error', 'CV file not found.');
    }

    public function updateCvFile($cv_id, Request $request)
    {

        $request->validate([
            'upload_cv' => 'required|mimes:pdf|max:10240', //  10MB
        ]);


        $profile_cv = Upload::where('link_id', $cv_id)->where('genre', '=', '3')->latest()->first();

        // dd($profile_cv->id);
        if (!$profile_cv) {
            return redirect()->back()->with('error', 'CV not found.');
        }


        $filePath = storage_path("app/{$profile_cv->upload_url}");
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if ($request->hasFile('upload_cv')) {
            $this->uploadCV($request, auth()->user()->id, $this->cv_genre, $this->cvuploadInterface, $profile_cv->id);
            return redirect()->route('jobseekers.index')->with('success', 'CV Updating is successfully updated!');
        }

        return redirect()->route('jobseekers.index')->with('error', 'No file uploaded!');
    }



    public function update(Request $request, $id)
    {
        // $upload = Upload::findOrFail($id);

        // // Validate the incoming request
        // $request->validate([
        //     // 'link_id' => 'required|integer',
        //     // 'genre' => 'required|string',
        //     'upload_url' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        // ]);

        // // Update record
        // $upload->update([
        //     // 'link_id' => $request->link_id,
        //     // 'genre' => $request->genre,
        //     'upload_url' => $request->hasFile('upload_url') ? $request->file('upload_url')->store('uploads', 'public') : $upload->upload_url,
        // ]);

        // // Redirect or return a response as needed
        // return redirect()->route('uploads.index')->with('success', 'Upload updated successfully!');
    }

    public function destroy($id)
    {
        $upload = $this->uploadInterface->findByID('Upload', $id);
        if (!$upload) {
            return redirect()->route('employers.index')
                ->with('error', 'Employer not found.');
        }
        $this->uploadInterface->delete('Upload', $id);
        return redirect()->route('employers.index')
            ->with('success', 'Images deleted successfully.');
    }
}
