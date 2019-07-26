<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\SaveCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;


class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $companies = Company::paginate(10);
        $companies = Company::orderBy('created_at', request('sorted', 'ASC'))
                    ->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, SaveCompanyRequest $request)
    {
        $company = (new Company)->fill($request->validated());
        $company->logo = $request->file('logo')->store('public');
        $company->save();
        return redirect()->route('companies.index', $locale);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale,Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale, Company $company, UpdateCompanyRequest $request)
    {
        // dd($locale, $company, $request, $request->validated());
        if ($request->hasFile('logo'))
        {
            $company->logo = $request->file('logo')->store('public');
        }
        $company->update($request->only('name', 'email', 'website'));
        // return redirect()->route('companies.show', $project);
        return back()->with('info', __('Updated company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Company $company)
    {
        // $user = User::findOrFail($id);
        // $this->authorize($user);
        // $user->delete();
        // return back();

        $company->delete();
        return redirect()->route('companies.index', $locale);
    }
}
