<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::where('name','like','%'.$request->search.'%')->orWhere('country_code','like','%'.$request->search.'%')->paginate(10)->withQueryString();
        return view('countries.list',compact('countries'));
    }

    public function store(Request $request)
    {
        Country::create($request->post());
        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('countries.edit',compact('country'));
    }

    public function update(Request $request,$id)
    {
        Country::find($id)->update($request->post());
        return redirect()->route('countries.index');
    }

    public function destroy($id)
    {
        Country::find($id)->delete();
        return redirect()->route('countries.index');
    }
}
