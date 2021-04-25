<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tests;
use App\Models\tests_ques;
use App\Models\tests_ques_ans;
use Illuminate\Support\Facades\Validator;
use App\Models;
use Illuminate\Support\Facades\File;


class test extends Controller
{
    //
    public function addtests(Request $request)
    {
       
          $data = $request->all();
        #create or update your data here
        // $idd =$data['id'];
        $name =$data['name'];
        $sel = $data['year'];
        $degree = $data['degree'];
        $timee = $data['timee'];

        $max_id = tests::max('test_id') +1;
        $iddd = $max_id;
    //  $id= store::max("Store_ID")+1;
        
         $new_hole = new tests;
         $new_hole->test_id = $iddd;
         $new_hole->test_name =$name;
         $new_hole->year_id =$sel;
         $new_hole->degre =$degree;
         $new_hole->timee =$timee;

         $new_hole->save();

         return redirect('/exam');
    }
    public function  addques_choice(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'test_id' => 'required',
            'ques_type' => 'required',
            'ques_text' => 'required',
            'points_c' => 'required',
            'ques_asnw_c' => 'required',
            'choice_1' => 'required',
            'choice_2' => 'required',

        ]);
        if ($validator->passes()) {
            $data = $request->all();
            $img_name = "";//$data['file-input'];
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();
    
                $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
            }
            $test_id =$data['test_id'];
            $ques_type = $data['ques_type'];
            $ques_text = $data['ques_text'];
            $points_c = $data['points_c'];
            $choice_1 = $data['choice_1'];
            $choice_2 = $data['choice_2'];
            $choice_s = $data['choices'];
            $len = count($choice_s);
            $ques_asnw_c = $data['ques_asnw_c'];
        //     //////////////////////////
                $max_id_ = tests_ques::max('ques_id') +1;
               $ques_id = $max_id_;
            $new_ = new tests_ques;
            $new_->ques_id = $ques_id;
            $new_->test_id = $test_id;
            $new_->true_answer = $ques_asnw_c;
            $new_->points = $points_c;
            $new_->ques_dis = $ques_text;
            $new_->type_id = $ques_type;
            $new_->save();
            //////////////////////////
            $max_id_ans_id = tests_ques_ans::max('ans_id');
            $ans_id_1 = $max_id_ans_id + 1 ; 
            $new_ans = new tests_ques_ans;
            $new_ans->ans_id = $ans_id_1;//
            $new_ans->ans_id_num = 1;//
            $new_ans->ques_id = $ques_id;
            $new_ans->ans_dis = $choice_1;
            $new_ans->save();

            $ans_id_2 = $max_id_ans_id + 2 ; 
            $new_ans_1 = new tests_ques_ans;
            $new_ans_1->ans_id = $ans_id_2;//
            $new_ans_1->ans_id_num = 2;//
            $new_ans_1->ques_id = $ques_id;
            $new_ans_1->ans_dis = $choice_2;
            $new_ans_1->save();
            for($x = 3; $x < $len; $x++)
            {
                    $choice_ = $data['choices'][$x];
                    if($choice_ != null){
                        $ans_id_ = $max_id_ans_id + $x ; 
                        $new_ans_1 = new tests_ques_ans;
                        $new_ans_1->ans_id = $ans_id_;//
                        $new_ans_1->ans_id_num = $x;//
                        $new_ans_1->ques_id = $ques_id;
                        $new_ans_1->ans_dis = $choice_;
                        $new_ans_1->save();
                    }
                  
            }
           
            return response()->json(['success'=>'Added new records.','img_id'=>$ques_id, 'data'=>$data]);

            
        }
        return response()->json(['error'=>$validator->errors()]);

       
        // return $data ;

     }

     
     public function  addques_choice_tf(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'test_id' => 'required',
            'ques_type' => 'required',
            'ques_text' => 'required',
            'points_c' => 'required',
            'ques_asnw_c' => 'required',
        ]);
        if ($validator->passes()) {
            $data = $request->all();
            $img_name = "";//$data['file-input'];
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
            }

            $test_id =$data['test_id'];
            $ques_type = $data['ques_type'];
            $ques_text = $data['ques_text'];
            $points_c = $data['points_c'];
            $choice_1 = $data['choice_1'];
            $choice_2 = $data['choice_2'];
            $ques_asnw_c = $data['ques_asnw_c'];
            //////////////////////////
            $max_id_ = tests_ques::max('ques_id') +1;
            $ques_id = $max_id_;
            $new_ = new tests_ques;
            $new_->ques_id = $ques_id;
            $new_->test_id = $test_id;
            $new_->true_answer = $ques_asnw_c;
            $new_->points = $points_c;
            $new_->ques_dis = $ques_text;
            $new_->type_id = $ques_type;
            $new_->save();
            //////////////////////////
            $max_id_ans_id = tests_ques_ans::max('ans_id');
            $ans_id_1 = $max_id_ans_id + 1 ; 
            $new_ans = new tests_ques_ans;
            $new_ans->ans_id = $ans_id_1;//
            $new_ans->ans_id_num = 1;//
            $new_ans->ques_id = $ques_id;
            $new_ans->ans_dis = $choice_1;
            $new_ans->save();

            $ans_id_2 = $max_id_ans_id + 2 ; 
            $new_ans_1 = new tests_ques_ans;
            $new_ans_1->ans_id = $ans_id_2;//
            $new_ans_1->ans_id_num = 2;//
            $new_ans_1->ques_id = $ques_id;
            $new_ans_1->ans_dis = $choice_2;
            $new_ans_1->save();

            return response()->json(['success'=>'Added new records.','img_id'=>$ques_id, 'data'=>$data]);

            
        }
        return response()->json(['error'=>$validator->errors()]);

       
        // return $data ;

     }
     public function  addques_choice_texted(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'test_id' => 'required',
            'ques_type' => 'required',
            'ques_text' => 'required',
            'points_c' => 'required',
            'ques_asnw_c' => 'required',
        ]);
        if ($validator->passes()) {
            $data = $request->all();
            $img_name = "";//$data['file-input'];
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
            }

            $test_id =$data['test_id'];
            $ques_type = $data['ques_type'];
            $ques_text = $data['ques_text'];
            $points_c = $data['points_c'];
            $ques_asnw_c = $data['ques_asnw_c'];
            //////////////////////////
            $max_id_ = tests_ques::max('ques_id') +1;
            $ques_id = $max_id_;
            $new_ = new tests_ques;
            $new_->ques_id = $ques_id;
            $new_->test_id = $test_id;
            $new_->true_answer = 0;
            $new_->true_answer_text = $ques_asnw_c;
            $new_->points = $points_c;
            $new_->ques_dis = $ques_text;
            $new_->type_id = $ques_type;
            $new_->save();
            //////////////////////////
            return response()->json(['success'=>'Added new records.','img_id'=>$ques_id, 'data'=>$data]);

            
        }
        return response()->json(['error'=>$validator->errors()]);

       
        // return $data ;

     }
     
    public function upload_img(Request $request){
        File::link(
            storage_path('app/public'), public_path('storage')
        );
        // $data = $request->all();
        // $ss = $data[$_FILES['file_input']['name']];
        // return "dd" ;
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $id = $queries['id'];
      
        if($id == null ){
            $max_id_ = tests_ques::max('ques_id') +1;
            $ques_id = $max_id_;
            $id = $ques_id ; 
        }
        
        tests_ques::where('ques_id',$id)->update(['image'=>$imageName ]);

        return response()->json(['success'=>'Added new records.', 'data'=>$imageName ]);

    }
    public function upload_img_new(Request $request){
        File::link(
            storage_path('app/public'), public_path('storage')
        );
        // $data = $request->all();
        // $ss = $data[$_FILES['file_input']['name']];
        // return "dd" ;
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $quesid = $queries['id'];
        $test = $queries['test'];
        tests_ques::where([['ques_id',$quesid],['test_id',$test]])->update(['image'=>$imageName ]);

        return response()->json(['success'=>'Added new records.', 'data'=>$test ]);

    }
    public function del_img_up(Request $request){
       $quesid = $request->ques;
       $test = $request->test;

        tests_ques::where([['ques_id',$quesid],['test_id',$test]])->update(['image'=>'' ]);

        return response()->json(['success'=>'Added new records.' ]);

    }
    public function gettestnames(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $testss = tests::select(['test_id', 'test_name'])->where('year_id',$id)->get();
        $tests = '<option selected disabled> اختر الاختبار</option>';// array();

        foreach ($testss as $ind){
            //$tests [$ind->test_id ] = $ind->test_name;
            $tests .='<option value="'.$ind->test_id.'">'. $ind->test_name.'</option>'; 
        }
            return $tests;

    }
    public function display_exam(Request $request){

        // $test_id = $request->id;
        // $name = $request->name;

        // return view('admin.dis_exam')->with(['test_id'=> $test_id , 'name'=>$name]);
        $test_id = $request->id;
        $name = $request->name;
        $year = $request->year;
        
        return view('admin.dis_exam')->with(['test_id'=> $test_id , 'name'=>$name, 'year'=>$year] );


    }
    public function puplish(Request $request){

        $data = $request->all();
        $test_id = $data['test_id'];
        $year = $data['year'];
        tests::where([['year_id',$year]])->update(['puplish'=>0]);

        tests::where([['test_id',$test_id],['year_id',$year]])->update(['puplish'=>1]);
    //    return redirect('/viewexam');
 
    }
    public function delete_ques(Request $request){

        $data = $request->all();
        $test_id = $data['test'];
        $ques_id = $data['ques'];
        tests_ques::where([['test_id',$test_id],['ques_id',$ques_id]])->delete();
        tests_ques_ans::where([['ques_id',$ques_id]])->delete();

    //    return redirect('/viewexam');
 
    }
    public function del_ch(Request $request){

        $data = $request->all();
        $nid = $data['nid'];
        $ques_id = $data['ques'];
        tests_ques_ans::where([['ans_id_num',$nid],['ques_id',$ques_id]])->delete();
   

    //    return redirect('/viewexam');
 
    }
    
    public function update_ques(Request $request){
        $data = $request->all();
        $test_id = $data['test_id'];
        $ques_anser = $data['ques_anser'];
        $ques_id = $data['ques_id'];
        $ques_text = $data['ques_text'];
        $ques_point = $data['ques_point'];

        
        $ques_ans = $data['ques_anss'];
        $len = count($ques_ans);
        for($x = 1; $x < $len; $x++)
        {
              $choice_ = $data['ques_anss'][$x];
             if($choice_ != null){
                $num_id = tests_ques_ans::where([['ans_id_num',$x],['ques_id',$ques_id]])->first();
                if($num_id == null)
                {
                    $ans_id_2 = tests_ques_ans::max('ans_id') + 1;
                    $new_ans_1 = new tests_ques_ans;
                    $new_ans_1->ans_id = $ans_id_2;//
                    $new_ans_1->ans_id_num = $x;//
                    $new_ans_1->ques_id = $ques_id;
                    $new_ans_1->ans_dis = $choice_;
                    $new_ans_1->save();
                }
                else{
                    tests_ques_ans::where([['ans_id_num',$x] , ['ques_id',$ques_id]])->update(['ans_dis'=>$choice_]);
                }

            }
              
        }  
        //////// update db
        tests_ques::where([['test_id',$test_id] , ['ques_id',$ques_id]])->update(['ques_dis'=>$ques_text ,'true_answer'=>$ques_anser ,'points'=>$ques_point]);
        return $request ; 
    }
    public function update_ques_tf(Request $request){
        $data = $request->all();
        $test_id = $data['test_id'];
        $ques_anser = $data['ques_anser'];
        $ques_id = $data['ques_id'];
        $ques_text = $data['ques_text'];
        $ques_point = $data['ques_point'];
        
        //////// update db
        tests_ques::where([['test_id',$test_id] , ['ques_id',$ques_id]])->update(['ques_dis'=>$ques_text ,'true_answer'=>$ques_anser ,'points'=>$ques_point]);
        return $request ; 
    }
    public function update_ques_text(Request $request){
        $data = $request->all();
        $test_id = $data['test_id'];
        $ques_anser = $data['ques_anser'];
        $ques_id = $data['ques_id'];
        $ques_text = $data['ques_text'];
        $ques_point = $data['ques_point'];
        
        //////// update db
        tests_ques::where([['test_id',$test_id] , ['ques_id',$ques_id]])->update(['ques_dis'=>$ques_text ,'true_answer_text'=>$ques_anser ,'points'=>$ques_point]);
        return $request ; 
    }
    public function  update_test(Request $request)
    {
         $test_id = $request->testid;
         $years = $request->years;
         $name = $request->name;
         $degree = $request->degree;
         $timee = $request->timee;

         tests::where('test_id',$test_id)->update(['year_id'=>$years ,'test_name'=>$name ,'degre'=>$degree,'timee'=>$timee]);

    }
    
}
