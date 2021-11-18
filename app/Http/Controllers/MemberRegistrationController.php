<?php

namespace App\Http\Controllers;

use App\Models\MemberRegistration;
use App\Models\MemberDefaults;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateMemberRegistration;


class MemberRegistrationController extends Controller
{
    
    public function index()
    {
        $members = MemberRegistration::with('memberDefaults')->get();
        // return $members;
        $memberCategory = MemberDefaults::all();
        return view('memberRegistrations.index', compact('members', 'memberCategory'));
    }

    public function create()
    {
        $memberCategory = MemberDefaults::all();
        return view('memberRegistrations.create', compact('memberCategory'));
    }

    public function store(ValidateMemberRegistration $request)
    {
        MemberRegistration::create($request->all());
        // $validated = $request->validated();

        return back()->with('status', 'Insert Successful!');
    }

    public function show(MemberRegistration $memberRegistration)
    {
        //
    }

    public function edit(MemberRegistration $memberRegistration)
    {
        //
    }

    public function update(Request $request, MemberRegistration $memberRegistration)
    {
        //
    }

    public function destroy(MemberRegistration $memberRegistration)
    {
        //
    }
    
}