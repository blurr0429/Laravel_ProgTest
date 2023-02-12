<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // SHOW ALL LISTING
    public function index()
    {
        return view('listings.index', [
            'listings' =>  Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }

    //SHOW SINGLE LISTING
    public function show(Listing $listing, Employee $employee)
    {
        // dd(Employee::paginate(10));
        return view('listings.show', [
            'listing' => $listing,
            'employee' => $employee,
            'employees' =>  Employee::all()
        ]);
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('listings.create');
    }

    // STORE LISTING DATA
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('listings', 'name')],
            'website' => 'required',
            'email' => ['required', 'email']
        ]);

        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'dimensions:min_width=100,min_height=100']);
        }

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }



        Listing::create($formFields);
        // TO SHOW FLASH MESSAGE ->with('message' , 'Listing created Successfully')
        return redirect('/')->with('message', 'Company Added Successfully');
    }

    // SHOW EDIT FORM
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // UPDATE LISTING DATA
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'website' => 'required',
            'email' => ['required', 'email']
        ]);

        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'dimensions:min_width=100,min_height=100']);
        }

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }



        $listing->update($formFields);
        // TO SHOW FLASH MESSAGE ->with('message' , 'Listing created Successfully')
        return back()->with('message', 'Listing updated Successfully');
    }


    // DELETE LISTING
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }



    // // SHOW ALL EMPLOYEES
    // public function indexEmployee()
    // {
    //     return view('listings.show', [
    //         'employees' =>  Employee::all()
    //     ]);
    // }

    // //SHOW SINGLE EMPLOYEE
    // public function showEmployee(Employee $employee)
    // {
    //     return view('listings.show', [
    //         'employee' => $employee
    //     ]);
    // }
}