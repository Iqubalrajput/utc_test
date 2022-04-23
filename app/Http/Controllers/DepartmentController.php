<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use App\Models\employe;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{   
            $httpClient = new \GuzzleHttp\Client();
            $request =
                $httpClient
                    ->get("http://restapi.adequateshop.com/api/Tourist?page=2");
    
            $department_data = json_decode($request->getBody()->getContents());
            return view ('department')->with('department_data', $department_data->data);
         }catch(\Exception $e) {
            return $this->getExceptionResponse($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employe  = employe::get();
        return view('create')->with(compact('employe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'employe_id' => 'required',
        'designation' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'mobile' => 'required|digits:10|numeric',
        'gender' => 'required',
        'hobbies' => 'required',
        'file'=>'required',
        'file.*' => 'image|mimes:jpeg,jpg,png|max:20480',
        ]);
        try{
            $newPostImageName = uniqid() . '-' . $request->file('file')->getClientOriginalName();

        $request->file('file')->move(public_path('storage/images'), $newPostImageName);
        $input = $request->all();
        department::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'employe_id'=>$request->employe_id,
            'designation'=>$request->designation,
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'image'=>$newPostImageName,
        ]);
        return redirect('/')->with('flash_message', 'department Addedd!');  
    
        }catch(\Exception $e) {
            return $this->getExceptionResponse($e);
        }
        
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }
    public function get_csv(){

        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
                ->get("http://restapi.adequateshop.com/api/Tourist?page=2");

        $department_data = json_decode($request->getBody()->getContents());

        // these are the headers for the csv file.
        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=download.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );


        //I am storing the csv file in public >> files folder. So that why I am creating files folder
        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        //creating the download file
        $filename =  public_path("files/download.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            "Name",
            "Email",
            "image",
        ]);

        //adding the data from the array
        foreach ($department_data as $data) {
            fputcsv($handle, [
                $data->data->tourist_name,
                $data->data->tourist_email,
                $data->data->tourist_profilepicture,
            ]);

        }
        fclose($handle);

        //download command
        return Response::download($filename, "download.csv", $headers);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $department = department::find($id);
            $employe  = employe::get();
            return view('edit',compact('department','employe'));
        }catch(\Exception $e) {
            return $this->getExceptionResponse($e);
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = department::find($id);
        $input = $request->all();
        $department->update($input);
        return redirect('/')->with('flash_message', 'details Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            department::destroy($id);
            return redirect('/')->with('flash_message', 'Contact deleted!');
        }catch(\Exception $e) {
            return $this->getExceptionResponse($e);
        } 
    }
}
