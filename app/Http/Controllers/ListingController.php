<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // SHOW ALL LISTING
    public function index()
    {
        return view('listings.index', [
            'listings' =>  Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    //SHOW SINGLE LISTING
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
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
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'dimensions:min_width=100,min_height=100']);
        }

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }



        Listing::create($formFields);
        // TO SHOW FLASH MESSAGE ->with('message' , 'Listing created Successfully')
        return redirect('/')->with('message', 'Listing created Successfully');
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
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
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
}