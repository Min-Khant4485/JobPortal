<?php

namespace App\Http\Controllers;

use App\Contracts\EmployerInterface;
use App\Contracts\IndustryInterface;
use App\Contracts\UploadInterface;
use App\Http\Requests\EmployerRequest;
use App\Models\Common;
use App\Models\Employer;
use App\Models\Industry;
use App\Traits\UploadTrait;
use App\Models\JobPost;
use App\Models\Upload;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    use UploadTrait;

    private $album_genre;
    private $employer_image;
    protected $employerInterface;
    protected $industryInterface;
    protected $uploadInterface;
    public function __construct(EmployerInterface $employerInterface, IndustryInterface $industryInterface, UploadInterface $uploadInterface)
    {
        $this->employerInterface = $employerInterface;
        $this->industryInterface = $industryInterface;
        $this->uploadInterface = $uploadInterface;
        $this->employer_image = 4;
        $this->album_genre = 2;
    }
    public function index()
    {
        $employer_id = Employer::where('user_id', auth()->user()->id)->first();

        // dd($employer_id);
        $jobposts = JobPost::where('employer_id', $employer_id->id)->latest()->take(3)->get();
        // dd($jobposts);
        $albums = Upload::where('link_id', auth()->user()->id)->where('genre', '2')->latest()->take(4)->get();
        $employer_image = Upload::where('link_id', auth()->user()->id)->where('genre', '4')->latest()->first();

        return view('employers.index', [
            'jobposts' => $jobposts,
            'employer' => $employer_id,
            'upload' => Upload::select('upload_url')->where('genre', auth()->user()->role)->get(),
            'employer_image' => $employer_image,
            'albums' => $albums
        ]);
    }

    public function create()
    {
        $user = auth()->user();

        return view('employers.create', [
            'user' => $user,
            'industries' => Industry::all()
        ]);
    }
    public function edit(Employer $employer)
    {
        $employer_id = Employer::find($employer->id);

        return view('employers.edit', [
            'employer' => $employer_id,
            'industry' => $employer_id->industry_id,
            'industries' => Industry::all()
        ]);
    }

    public function store(EmployerRequest $request)
    {
        $validatedData = $request->validated();

        if (!isset(auth()->user()->role)) {

            return redirect()->route('/login')->with('error', 'You have no permission');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $this->employerInterface->store('Employer', $validatedData);

        return redirect()->route('jobposts.index')
            ->with('success', 'Your employer account was created!');
    }

    public function update(EmployerRequest $request, $id)
    {
        $employer_id = Employer::find($id);

        if (!$employer_id) {
            return redirect()->route('employers.index')->with('error', 'Invalid Credentials!');
        }

        $validatedData = $request->validated();
        $validatedData['user_id'] = $employer_id->user_id;
        $this->employerInterface->update('Employer', $validatedData, $id);

        if ($request->hasFile('upload_url')) {
            $this->storeAlbums($request, auth()->user()->id, $this->album_genre, $this->uploadInterface);
            return redirect()->route('employers.index')->with('success', 'Image is successfully uploaded!');
        }

        return redirect()->route('employers.index')->with('success', 'Image is successfully uploaded!');
    }
}
