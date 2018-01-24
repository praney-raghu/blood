<?php

namespace SaveLife\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SaveLife\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('search');
    }

    /**
     * Show the application dashboard for Donor.
     *
     * @return \Illuminate\Http\Response
     */
    public function donor_index()
    {
    	$donor = DB::table('users')->join('donors','users.id','=','donors.user_id')->where('users.id',Auth::user()->id)->get();
    	return view('donor.home', compact('donor'));
    }

    /**
     * Show the application dashboard for Blood Bank.
     *
     * @return \Illuminate\Http\Response
     */
    public function bank_index()
    {
    	$bank = DB::table('users')->join('banks','users.id','=','banks.user_id')->where('users.id',Auth::user()->id)->get();
        return view('bank.home', compact('bank'));
    }

    public function search(Request $request)
    {
    	return view('welcome');
    }
}
