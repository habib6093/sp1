<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class fileController extends Controller
{


    public function upload()
    {
       // echo phpinfo();
    	return view('file.upload');
    }






    public function save(request $request)
    {


     $rules=[
          'file'=>'max:1000000',
     ];
     $validator = Validator::make($request->all(),$rules);

 
     if(!($validator->fails()))
    	{


            $type=$request->file('file')->getMimeType(); //return file type 


 
            if(strpos($type, 'video') !== false)
            {
            	$m=Storage::putFile('public',$request->file('file')); //$m contains orginal location of file

	            $n=Storage::url($m);  // $n contains path to use data

                $name=$request->file('file')->getClientOriginalName(); //return orginal filename  
                return view('file.showVideoFile',compact('n'));
            }
            else
	    	    echo "It's not a video file";
        }
        else
        {
        	echo "no file selected";
        }

    }
}
