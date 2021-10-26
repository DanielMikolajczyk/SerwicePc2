<?php

namespace App\Services;

use App\Models\Diagnose;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DiagnoseService
{
  public function create(array $data)
  {
    Diagnose::create($data);
  }

  public function update(array $data, int $id)
  {
    $diagnose = Diagnose::findOrFail($id);
    $diagnose->update($data);
  }
  
  public function destroy(int $id)
  {
    Diagnose::destroy($id);
  }

  /*
  * Filter results to display on index page
  */
  public function filterIndexPage(Request $request): LengthAwarePaginator
  {
    if(empty($request->validated())){
      return Diagnose::orderBy('created_at','desc')->paginate(25);
    }
    
    $diagnoses = Diagnose::when($request->query('name'),function($query,$value){
      return $query->where('name',$value);
    })->when($request->query('type'),function($query,$value){
      return $query->where('type_id',$value);
    })->orderBy('created_at','desc')
      ->paginate(25);

    return $diagnoses;
  }
}