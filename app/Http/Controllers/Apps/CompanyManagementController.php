<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\CompaniesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Http\Request;

class CompanyManagementController extends Controller
{
    public $industries;

    public function __construct()
    {
        $this->middleware(['role:super admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CompaniesDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.company-management.companies.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industries = Industry::all();
        $entries = scandir(public_path('assets/media/flags'));

        $flags = [];
        $i = 0;
       foreach($entries as $entry) {
           if ($entry !== '.' && $entry !== '..') {
               $path = public_path('assets/media/flags') . '/' . $entry;
               if (is_file($path)) {
                   $flags[$i]['file'] = $entry;
                   $flags[$i]['name'] = ucwords(str_replace('-', ' ', str_replace('.svg', '', $entry)));
                   $i++;
               }
           }
       }

        return view('pages/apps.company-management.companies.create', compact('industries', 'flags'));
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
    public function show(Company $company)
    {
        return view('pages/apps.company-management.companies.show', compact('company',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
