<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
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
  public function show(Profile $profile): View
  {
    return view('web/profile/show',[
      'profile' => $profile
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    //
  }
}
