<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Employee extends Controller
{
    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // max 2MB
        ]);

        // Handle file upload if a photo is provided
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $path;
        }

        // Create a new employee record
        \App\Models\Employee::create($validatedData);

        // Redirect to the employees index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }
}
