<?php

namespace App\Http\Controllers;

use App\Models\MemberDefaults;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateMemberDefaults;

class MemberDefaultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = MemberDefaults::all();
        return view('memberDefaults.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberDefaults.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateMemberDefaults $request)
    {
        MemberDefaults::create($request->all());
        return back()->with('status', 'Insert Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberDefaults  $memberDefaults
     * @return \Illuminate\Http\Response
     */
    public function show(MemberDefaults $memberDefaults)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberDefaults  $memberDefaults
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberDefaults $memberDefaults)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberDefaults  $memberDefaults
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberDefaults $memberDefaults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberDefaults  $memberDefaults
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberDefaults $memberDefaults)
    {
        //
    }
}