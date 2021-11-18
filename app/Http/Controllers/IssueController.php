<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateIssue;
use App\Models\Issue;
use App\Models\BookCopies;
use App\Models\MemberRegistration;
use App\Models\MemberDefaults;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues =  Issue::all();
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $issued = session('issued');
        $acsNo = preg_replace("/[^0-9]/", "", $request->accession_no);
        // $validated = $request->validated();
        // if ($validated) {


        if (!$issued) {

            $issue = new Issue();
            $issue->accession_no = $acsNo;
            $issue->registration_no = $request->registration_no;
            $issue->issue_date = $request->issue_date;
            $issue->due_date = $request->due_date;
            // $issue->is_returned = $request->get('is_returned', null);            /// sends null
            $issue->is_returned = $request->has('is_returned');                    //  --- sends 0
            $issue->save();
            return back()->with('status', 'Insert Successful!');
        } else {
            $issue = Issue::where('accession_no', '=', $acsNo)->where('is_returned', 0)
                ->update(['is_returned' => $request->is_returned, 'return_date' => $request->return_date, 'fine_generated' => $request->fine_generated]);
            return back()->with('status', 'Insert Successful!');
        }
    }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
    public function checkAccessionNo(Request $request)
    {
        $input = $request->q;
        $acsNo = preg_replace("/[^0-9]/", "", $input);

        $acsNoExists = BookCopies::where('accession_no', '=', $acsNo)->exists();
        $acsNoIssued = Issue::where('accession_no', '=', $acsNo)->where('is_returned', 0)->first();
        $issued = false;

        if ($acsNoIssued != null) {
            $getRegNo = Issue::where('accession_no', '=', $acsNo)->where('is_returned', 0)->first(['registration_no', 'issue_date', 'due_date']);
            $getMemberCategoryId = MemberRegistration::where('registration_no', '=', $getRegNo->registration_no)->first('member_category_id');
            $memberDefaults = MemberDefaults::where('id', '=', $getMemberCategoryId->member_category_id)->first(['max_days', 'fine_amount']);
            $issued = true;
            session(['issued' => $issued]);
            return response()->json(['acsNoExists' => $acsNoExists, 'getRegNo' => $getRegNo, 'memberDefaults' => $memberDefaults, 'issued' => $issued]);
        }
        session(['issued' => $issued]);
        return response()->json(['acsNoExists' => $acsNoExists, 'issued' => $issued]);
    }
    public function checkRegistrationNo(Request $request)
    {
        $input = $request->q;

        $regNo = MemberRegistration::where('registration_no', '=', $input)->first('registration_no');
        $regNoExists = true;
        if ($regNo != null) {
            $booksIssued = Issue::where('registration_no', '=', $input)->where('is_returned', 0)->count();

            $memberCategoryId = MemberRegistration::where('registration_no', '=', $input)->first('member_category_id');
            $cat = $memberCategoryId->member_category_id;
            $memberDefaults = MemberDefaults::where('id', '=', $cat)->first(['max_books', 'max_days']);
            return response()->json(['regNoExists' => $regNoExists, 'regNo' => $regNo, 'memberDefaults' => $memberDefaults, 'booksIssued' => $booksIssued]);
        } else {
            $regNoExists = false;
            return response()->json(['regNoExists' => $regNoExists]);
        }
        // return response()->json("Invalid Registration No");
    }
}