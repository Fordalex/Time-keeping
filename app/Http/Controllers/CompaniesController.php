<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CompaniesController extends Controller

{
    protected function create()
    {
        Company::create([
            'name' => request('name'),
            'first_line_address' => request('first_line_address'),
            'city' => request('city'),
            'country' => request('country'),
            'postcode' => request('postcode'),
        ]);

        return redirect('/clients')->with('flash_message', ["type" => "success", "message" => "Company was created successfully!"]);
    }

    protected function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }


    protected function index()
    {
        $companies = Company::all()->where('user_id', Auth::id());

        return view('companies.index', compact('companies'));
    }

    protected function new()
    {
        $company = new Company;

        return view('companies.new', compact('company'));
    }

    protected function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    protected function update(Company $company)
    {
        // model validation?
        request()->validate([
            'name' => 'required',
            'first_line_address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'initial_invoice_no' => 'required',
        ]);

        $company->update([
            'name' => request('name'),
            'first_line_address' => request('first_line_address'),
            'city' => request('city'),
            'country' => request('country'),
            'postcode' => request('postcode'),
            'initial_invoice_no' => request('initial_invoice_no'),
        ]);

        return redirect('/clients')->with('flash_message', ["type" => "success", "message" => "Company was updated successfully!"]);;
    }
}
