<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;
use App\Notifications\NewCompanyNotification;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);


        return view('user.company.index', compact(['companies']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {


        $user = User::find(Auth::user()->id);

        $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();

        $path = $request->logo->storeAs('/logos', $imageName, 'public');


       $company =  Company::create([
            'name' => $request->company_name,
            'email' => $request->email,
            'logo' =>  asset('/storage/' . $path),
            'website' => $request->website
        ]);


        $message = [
            'header' => 'New Company Added',
            'content' => "Company Name: {$company->name} "
        ];




        $user->notify(new NewCompanyNotification($message));


        return back()->with(['message' => 'Company Added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);


        return view('user.company.show', compact(['company']));
    }

    /**
     * Show the form for editing the specified resou
     *

     rce.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);


        return view('user.company.edit', compact(['company']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {

        $company = Company::find($id);



        $company->update([
            'name' => $request->company_name,
            'email' => $request->email,
            'website' => $request->website
        ]);


        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();

            $path = $request->logo->storeAs('/logos', $imageName, 'public');
            $company->update([
                'logo' =>  asset('/storage/' . $path),
            ]);
        }


        return back()->with(['message' => 'Company Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);


        $company->delete();



        return back()->with(['message' => 'Company Deleted']);

    }
}
