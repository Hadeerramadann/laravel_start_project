<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tests_results;
use App\Models\tests;
use App\Models\tests_ques;
use Illuminate\Support\Facades\DB;
use App\Models\students;
use App\Models\students_answar;
use App\Models\student_done_test;
use Illuminate\Support\Facades\Auth;
use App\Models;
class side extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       
        $data = array(
        'active1' => '', 
        'active2' => '',
        'active3' => '',
        

    );
        return view('students.studentswelcome')->with($data);
    }

    public function newexam(Request $request){

//         $queries = array();
//         parse_str($_SERVER['QUERY_STRING'], $queries);
      
// if(isset($queries['username']))
// {
//     $username = $queries['username'];
// }
// else {
//     $username = "";
// }
$username = Auth::user()->username;
        $active  ='color: #3f5efb;
        background: #fff;
        outline: none;
        position: relative;
        background-color: #fff;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;';
        $data = array(
            'active1' =>  $active , 
            'active2' => '',
            'active3' =>'',
          
           
           

        );
        $students=students::where('user',$username)->first();
        $year =$students->year;
        $stud_id=$students->id;
        $tests=tests::where([['puplish',  1],['year_id',  $year]])->first();
        $test_id =$tests->test_id;
        
        
        $students=student_done_test::select(['done'])->where([['stud_id',$stud_id],['test_id',$test_id],['year',$year]])->first();
        if($students == null)
         {
            $exitst='';

         }
         else{
            $exitst=$students->done;
         }
//   $request->session()->put('username', $username);
// echo "is" . $request->session()->get('username');

// $request->session()->flush();
       
       if($exitst == 1){
       
        return view('students.test_not')->with($data);
       }
       else{
        return view('students.viewexam')->with($data);
       }
        // return redirect('/newexam')->with($data);
    } 
    public function answars(Request $request){

        $test_idd =$request->input('test_idd');
        $stud_idd =$request->input('stud_idd');
        $ques_idd =$request->input('ques_idd');
        $type_id =$request->input('type_id');
        $stud_ans =$request->input('stud_ans');


       

        $exitst=students_answar::select(['student_ans'])->where([['stud_id',$stud_idd],['test_id',$test_idd],['type_id',$type_id],['ques_id',$ques_idd]])->first();
         if($exitst == null)
         {
            $exitstt='';

         }
         else{
            $exitstt=$exitst->student_ans;
         }
       
        if($exitstt != null)
        
        {
            students_answar::where([['stud_id',$stud_idd],['test_id',$test_idd],['type_id',$type_id],['ques_id',$ques_idd]])->update(['student_ans'=>$stud_ans ]);
     
        }
        else{
           
            $new_hole = new students_answar;
            $new_hole->stud_id = $stud_idd;
            $new_hole->test_id =$test_idd;
            $new_hole->type_id =$type_id;
            $new_hole->ques_id =$ques_idd ;
            $new_hole->student_ans =$stud_ans;
        
            $new_hole->save();
         

          }
        
            


    }
    public function finshtest(Request $request){
      
         $degre =0;
        $test_id =$request->input('test_id');
        $stud_id =$request->input('stud_id');

        $ans=students_answar::select(['student_ans','ques_id','type_id'])->where([['stud_id',$stud_id],['test_id',$test_id]])->get();
        foreach($ans as $ans1)
                {
              $student_ans=$ans1->student_ans;
              $ques_id=$ans1->ques_id;
              $type_id=$ans1->type_id; 
              
        $rightans=tests_ques::select(['true_answer','points'])->where([['ques_id',$ques_id],['test_id',$test_id],['type_id',$type_id]])->first();
     
        $true_answer=$rightans->true_answer;
        $points=$rightans->points;
         if($student_ans ==$true_answer)
            {
                $degre= $degre+$points;
            }
            else{
                $degre= $degre+ 0;
            }
    
                }

            


 $exitst=tests_results::select(['result'])->where([['stud_id',$stud_id],['test_id',$test_id]])->first();
 if($exitst == null)
         {
            $exitstt='';

         }
         else{
            $exitstt=$exitst->result;
         }

 
 if($exitstt == '')
        
      {
          $new_hole = new tests_results;
        $new_hole->stud_id = $stud_id;
        $new_hole->test_id =$test_id;
        $new_hole->result =$degre;
          
        $new_hole->save();
    }
      else{
        tests_results::where([['stud_id',$stud_id],['test_id',$test_id]])->update(['result'=>$degre ]);

      }
        
       
        $year =students::select(['year'])->where('id',$stud_id)->first();
         $yy=$year->year;

               $final_grad =tests::select(['degre'])->where([['year_id',$yy],['test_id',$test_id]])->first();
        $degre1=$final_grad->degre;
        // ********
        $new_done = new   student_done_test;
        $new_done->stud_id = $stud_id;
        $new_done->test_id =$test_id;
        $new_done->year =$yy;
        $new_done->done =1;


        $new_done->save();
        return ['degre'=> $degre ,'test_id'=> $test_id , 'stud_id'=>$stud_id, 'year'=>$yy,'total'=>$degre1 ];
        
  
    }
    public function grads(){

        $active  ='color: #3f5efb;
        background: #fff;
        outline: none;
        position: relative;
        background-color: #fff;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;';
        $data = array(
            'active1' =>  $active , 
            'active2' => '',
            'active3' =>'',
          

           

        );
      
        return view('students.results')->with($data);


    }
    public function lastexam(){
        $active  ='color: #3f5efb;
        background: #fff;
        outline: none;
        position: relative;
        background-color: #fff;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;';
        $data = array(
            'active1' =>  $active , 
            'active2' => '',
            'active3' =>'',
          

           

        );
      
        return view('students.lastetests')->with($data);
        
    }
    
    public function display_exam(Request $request){

        // $test_id = $request->id;
        // $name = $request->name;

        // return view('admin.dis_exam')->with(['test_id'=> $test_id , 'name'=>$name]);
        $test_id = $request->test_id;
        $test_name = $request->test_name;
        $stud_id = $request->stud_id;
        
        return view('students.dis_exam')->with(['test_id'=> $test_id , 'test_name'=>$test_name, 'stud_id'=>$stud_id] );


    }
    // public function try()
    // {
       
    //     $data = array(
    //     'active1' => '', 
    //     'active2' => '',
    //     'active3' => '',
    //     'active4' => '',
    //     'active5' => '',
    //     'active6' => '',
       

    // );
    //     return view('admin.try')->with($data);
    // }
    
    // public function year()
    // {
    //     $active  ='color: #3f5efb;
    //     background: #fff;
    //     outline: none;
    //     position: relative;
    //     background-color: #fff;
    //     border-top-left-radius: 20px;
    //     border-bottom-left-radius: 20px;';
    //     $data = array(
    //         'active1' => $active , 
    //         'active2' => '',
    //         'active3' => '',
    //         'active4' => '',
    //         'active5' => '',
    //         'active6' => '',
           

    //     );
      
    //     return view('admin.year')->with($data);
    // }
    // public function student()
    // {
    //     $active  ='color: #3f5efb;
    //     background: #fff;
    //     outline: none;
    //     position: relative;
    //     background-color: #fff;
    //     border-top-left-radius: 20px;
    //     border-bottom-left-radius: 20px;';
    //     $data = array(
    //         'active1' => '' , 
    //         'active2' => $active,
    //         'active3' => '',
    //         'active4' => '',
    //         'active5' => '',
    //         'active6' => '',
           

    //     );
      
    //     return view('admin.student')->with($data);
    // }
    // public function exam()
    // {
    //     $active  ='color: #3f5efb;
    //     background: #fff;
    //     outline: none;
    //     position: relative;
    //     background-color: #fff;
    //     border-top-left-radius: 20px;
    //     border-bottom-left-radius: 20px;';
    //     $data = array(
    //         'active1' => '' , 
    //         'active2' => '',
    //         'active3' =>$active,
    //         'active4' => '',
    //         'active5' => '',
    //         'active6' => '',

    //     );
      
    //     return view('admin.exam')->with($data);
    // }
    // public function viewexam()
    // {
    //     $active  ='color: #3f5efb;
    //     background: #fff;
    //     outline: none;
    //     position: relative;
    //     background-color: #fff;
    //     border-top-left-radius: 20px;
    //     border-bottom-left-radius: 20px;';
    //     $data = array(
    //         'active1' => '' , 
    //         'active2' => '',
    //         'active3' =>'',
    //         'active4' => '',
    //         'active5' => '',
    //         'active6' => $active,

           

    //     );
      
    //     return view('admin.viewexam')->with($data);
    // }
    
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // // public function create()
    // // {
    // //     //
    // // }

    // // /**
    // //  * Store a newly created resource in storage.
    // //  *
    // //  * @param  \Illuminate\Http\Request  $request
    // //  * @return \Illuminate\Http\Response
    // //  */
    // // public function store(Request $request)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Display the specified resource.
    // //  *
    // //  * @param  int  $id
    // //  * @return \Illuminate\Http\Response
    // //  */
    // // public function show($id)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Show the form for editing the specified resource.
    // //  *
    // //  * @param  int  $id
    // //  * @return \Illuminate\Http\Response
    // //  */
    // // public function edit($id)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Update the specified resource in storage.
    // //  *
    // //  * @param  \Illuminate\Http\Request  $request
    // //  * @param  int  $id
    // //  * @return \Illuminate\Http\Response
    // //  */
    // // public function update(Request $request, $id)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Remove the specified resource from storage.
    // //  *
    // //  * @param  int  $id
    // //  * @return \Illuminate\Http\Response
    // //  */
    // // public function destroy($id)
    // // {
    // //     //
    // // }
}
