<?php

namespace App\Http\Controllers;

use App\Models\CompanyData;
use Illuminate\Http\Request;

class CompanyDataController extends Controller
{
    public function dashboard()
    {
        return view("admin.engineer.dashboard");
    }

    public function index()
    {
        $company_data = CompanyData::all();
        return view('admin.engineer.company_data', compact('company_data'));
    }

    public function create()
    {
        $company_data = CompanyData::all();

        return view('admin.engineer.tambah_company_data', compact('company_data'));
    }


    public function store(Request $request)
    {
        // Validation logic
        $request->validate([
            'name_company' => 'required|string',
        ]);

        // Create a new CompanyData instance and save it
        CompanyData::create([
            'name_company' => $request->input('name_company'),
        ]);

        return redirect()->route('company_data.index')->with('success', 'Company Data created successfully');
    }

    public function show($id)
    {
        $company_data = CompanyData::findOrFail($id);

        return view('admin.engineer.show', compact('company_data'));
    }

    public function edit($id)
    {
        $company_data = CompanyData::findOrFail($id);

        return view('admin.engineer.edit_company', compact('company_data'));
    }

    public function destroy($id)
    {
        $company_data = CompanyData::findOrFail($id);
        $company_data->delete();

        return redirect()->route('company_data.index')->with('success', 'Company data deleted successfully');
    }
}
