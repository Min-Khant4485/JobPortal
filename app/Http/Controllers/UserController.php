<?php

namespace App\Http\Controllers;

use App\Contracts\UserInterface;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $validatedData = $request->validated();

        $updateData = [
            'phone_no' => $validatedData['phone_no'],
            'dob' => $validatedData['dob'],
            'email' => $validatedData['email']
        ];

        $this->userInterface->update('User', $updateData, $id);

        return redirect()->route('jobseekers.index')->with('success', 'User Updated Successfully');
    }

    // $user_arr = ['first_name', 'middle_name', 'last_name', 'company_name', 'email'];

    // $user = $this->userInterface->findByID('User', $user->id);

    // if (!$user) {
    //     return redirect()->back()->with('error', 'User Updating is Failed');
    // }
    // $this->userInterface->update('User', $validatedData, $user->id);
    // return redirect()->route('jobseekers.index')->with('success', 'User Updated Successfully');

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID
        $user = $this->userInterface->findByID('User', $id);

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        // Perform the deletion
        $this->userInterface->delete('User', $id);

        // Log the user out if they delete their own account
        if (auth()->user() && auth()->user()->id == $id) {
            auth()->logout();
            return redirect()->route('login')->with('success', 'Your account has been deleted successfully');
        }

        return redirect()->route('login')->with('');
    }
}
