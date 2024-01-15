<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Backend\User;
use App\Http\Requests\Authentication\SignupRequest;
use App\Http\Requests\Authentication\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthenticationController extends Controller
{
    public function signUpForm(){
        return view('backend.auth.register');
    }

    public function signUpStore(SignupRequest $request)
    {
            try{
                $user=new User;
                $user->name_en=$request->FullName;
                $user->contact_en=$request->contact_en;
                $user->email=$request->EmailAddress;
                $user->password=Hash::make($request->password);
                if($user->save()){
                    return redirect('/')->with('success','Successfully Registred');
                }else
                    return redirect('')->with('danger','Please try again');
                    dd($e);
            }catch(Exception $e){
                dd($e);
            }
    }
    public function signInForm(){
        return view('backend.auth.login');
    }
    public function signInCheck(SigninRequest $request){
        try{
            $user=User::where('contact_en',$request->username)
                        ->orWhere('email',$request->username)->first();
            if($user){
                if($user->status==1){
                    if(Hash::check($request->password , $user->password)){
                        $this->setSession($user);
                        $this->notice::success('Successfully login');
                        return redirect()->route('dashboard');
                    }else
                        $this->notice::error('phone number or password is wrong!');
                        return redirect()->route('login');
                }else
                    $this->notice::error('You are not active user. Please contact to authority!');
                    return redirect()->route('login');
        }else
                $this->notice::error('phone number or password is wrong!');
                return redirect()->route('login');
        }catch(Exception $e){
            dd($e);
            $this->notice::error('phone number or password is wrong!');
            return redirect()->route('login');
        }
    }

    public function setSession($user){
        return request()->session()->put([
                'userId'=>encryptor('encrypt',$user->id),
                'userName'=>encryptor('encrypt',$user->name_en),
                'email'=>encryptor('encrypt',$user->email),
                'language'=>encryptor('encrypt',$user->language),
                'Contact'=>encryptor('encrypt',$user->contact_en),
                'image'=>$user->image ?? 'no-image.png',
                'image'=>$user->teacher?->image,
            ]
        );
    }

    public function signOut(){
        request()->session()->flush();
        return redirect('login')->with('danger','Succfully Logged Out');
    }
    public function show(User $data)
    {
        return view('backend.user.profile', compact('data')); 
    }
}