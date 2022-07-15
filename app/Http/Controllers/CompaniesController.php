<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CompaniesController extends Controller

{
    public function create()
    {
        Company::create([
            'name' => request('name'),
            'first_line_address' => request('first_line_address'),
            'city' => request('city'),
            'country' => request('country'),
            'postcode' => request('postcode'),
        ]);

        return redirect('/companies')->with('flash_message', ["type" => "success", "message" => "Company was created successfully!"]);
    }

    public function index()
    {
        $companies = Company::all();

        return view('companies.index', [
            'companies' => $companies
        ]);
    }

    public function new()
    {
        $company = new Company;

        return view('companies.new', ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Company $company)
    {
        // model validation?
        request()->validate([
            'name' => 'required',
            'hourly_rate' => 'required',
        ]);

        $company->update([
            'name' => request('name'),
            'first_line_address' => request('first_line_address'),
            'city' => request('city'),
            'country' => request('country'),
            'postcode' => request('postcode'),
        ]);

        return redirect('/companies')->with('flash_message', ["type" => "success", "message" => "Company was updated successfully!"]);;
    }
}
