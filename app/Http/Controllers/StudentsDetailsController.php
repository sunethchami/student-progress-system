<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \App\Models\StudentsDetail;
use \App\Traits\StatisticTrait;
use \DB;

class StudentsDetailsController extends Controller
{
    
    use StatisticTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AllDetails = StudentsDetail::all();
        $page = 'all';
        
        return view('studentsDetails.index')->with('results',$AllDetails)
            ->with('page',$page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentsDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
           'reg_no' => 'unique:students_details,reg_no',
           'name' => 'required', 
           'combined_maths' => 'integer|required', 
           'physics' => 'integer|required', 
           'chemistry' => 'integer|required', 
        ]);
        
        $studentsDetails = new StudentsDetail;
        
        $studentsDetails->reg_no = $request->reg_no;
        $studentsDetails->name = $request->name;
        $studentsDetails->combined_maths = $request->combined_maths;
        $studentsDetails->physics = $request->physics;
        $studentsDetails->chemistry = $request->chemistry;
        $studentsDetails->save();
        
        Session::flash('message','1');
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$page)
    {
        
        $studentDetail = StudentsDetail::find($id);
        
        return view('studentsDetails.edit')
                ->with('student',$studentDetail)
                ->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $studentDetail = StudentsDetail::find($id);
        
        if ($request->reg_no == $studentDetail->reg_no) {
            $this->validate($request, [
                'name' => 'required',
                'combined_maths' => 'integer|required',
                'physics' => 'integer|required',
                'chemistry' => 'integer|required',
            ]);
        } else {
            $this->validate($request, [
                'reg_no' => 'unique:students_details,reg_no',
                'name' => 'required',
                'combined_maths' => 'integer|required',
                'physics' => 'integer|required',
                'chemistry' => 'integer|required',
            ]);
        }



        $studentDetail = StudentsDetail::find($id);
        $studentDetail->update($request->all());
        
        Session::flash('message','2');
        
        return redirect('students-details');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentDetail = StudentsDetail::find($id);
        $studentDetail->delete();
        
        Session::flash('message','3');
        
        return redirect('students-details');
    }
    
    public function showSearch() {
        
        return view('search.search');
    }
    
    public function search(Request $request) {
        
        $reg_no = $request->reg_no;
        $name = $request->name;
        
        if ($name == null) {
            $name = 1;
        }
        
        $students = DB::table('students_details')
                    ->where('reg_no', $reg_no)
                    ->orWhere('name','like', "%".$name."%")
                    ->get();
        if(empty(!$students->isEmpty())){
             $inputs = array(
                'reg_no' => $request->reg_no,
                'name' => $request->name
            ); 
            Session::flash('message','4');
            return view('search.search')->with('inputs',$inputs);
        }else{
            $page = 'search'; 
            
            return view('studentsDetails.index')
                    ->with('results',$students)
                    ->with('page',$page);
        }
        
    }
    
    public function moreDetails($id,$page) {
        
        $record = StudentsDetail::find($id);        
        $combinedMaths = $record->combined_maths;
        $physics = $record->physics;
        $chemistry = $record->chemistry; 
        
        $avgMarkOfStudent = ($combinedMaths + $physics + $chemistry) / 3;
        
        $statArray = $this->getStat();
        $avgMarkOfFirstPlace = $statArray['avg_mark_first_place'];
        
        $totalStudents = $statArray['total_student'];
        
        $studentDetailsArray = array(
            "reg_no" => $record->reg_no,
            "name" => $record->name,
            "combined_maths" => $combinedMaths,
            "physics" => $physics,
            "chemistry" => $chemistry,
            "avg_mark_student" => round($avgMarkOfStudent,2),
            "avg_mark_first_place" => $avgMarkOfFirstPlace,
            "total_students" => $totalStudents            
        );       
        
        return view('moreDetails.more')
                    ->with('result',$studentDetailsArray)
                    ->with('page',$page);
    }    
}
