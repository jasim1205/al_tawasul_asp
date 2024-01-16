<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use Illuminate\Http\Request;
use App\Http\Requests\backend\User\AddNewRequest;
use App\Http\Requests\backend\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('backend.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $user = new User;
            $user->name_en = $request->userName_en;
            $user->name_bn = $request->userName_bn;
            $user->email = $request->EmailAddress;
            $user->contact_en = $request->contact_en;
            $user->contact_bn = $request->contact_bn;
            $user->status = $request->status;
            $user->language='en';
            $user->password = Hash::make($request->password);
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/users'),$imageName);
                $user->image = $imageName;
            }
            if($user->save()){
                $this->notice::success('User Data Successfully Saved');
                return redirect()->route('user.index');
            }else{
                $this->notice::error('Something wrong Please try again');
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail(encryptor('decrypt',$id));
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail(encryptor('decrypt',$id));
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $user = User::findOrFail(encryptor('decrypt',$id));
            $user->name_en = $request->userName_en;
            $user->name_bn = $request->userName_bn;
            $user->email = $request->EmailAddress;
            $user->contact_en = $request->contact_en;
            $user->contact_bn = $request->contact_bn;
            $user->status = $request->status;
            $user->language='en';
            $user->password = Hash::make($request->password);
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/users'),$imageName);
                $user->image = $imageName;
            }
            if($user->save()){
                $this->notice::success('User Data Successfully Updated');
                return redirect()->route('user.index');
            }else{
                $this->notice::error('Something wrong Please try again');
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user= User::findOrFail(encryptor('decrypt',$id));
        $image_path=public_path('uploads/users/').$user->image;
        
        if($user->delete()){
            if(File::exists($image_path)) 
                File::delete($image_path);
            
            Toastr::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}