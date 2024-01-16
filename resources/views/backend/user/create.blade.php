@extends('backend.layouts.app')
@section('title','User Add')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Forms</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">User Add</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<!--start stepper two--> 
<hr>
<div id="stepper2" class="bs-stepper">
    <div class="card">
        <div class="card-body">
            <div class="bs-stepper-content">
                <form class="form needs-validation" method="post" enctype="multipart/form-data" action="{{route('user.store')}}">
                    @csrf
                    <div id="test-nl-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger1">
                        <div class="row g-3">
                            
                            <div class="col-12 col-lg-6">
                                <label for="userName_en"><strong>Name (English)</strong><i class="text-danger">*</i> </label>
                                <input type="text" id="userName_en" class="form-control shadow-lg" value="{{ old('userName_en')}}" name="userName_en">
                                @if($errors->has('userName_en'))
                                    <span class="text-danger"> {{ $errors->first('userName_en') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="contact_en"><strong>Contact Number (English)</strong> <i class="text-danger">*</i></label>
                                <input type="text" id="contact_en" class="form-control shadow-lg" value="{{ old('contact_en')}}" name="contact_en">
                                @if($errors->has('contact_en'))
                                    <span class="text-danger"> {{ $errors->first('contact_en') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="EmailAddress"><strong>Email</strong> <i class="text-danger">*</i></label>
                                <input type="text" id="EmailAddress" class="form-control  shadow-lg" value="{{ old('EmailAddress')}}" name="EmailAddress" placeholder="example@gmail.com">
                                @if($errors->has('EmailAddress'))
                                    <span class="text-danger"> {{ $errors->first('EmailAddress') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="status"><strong>Status</strong></label>
                                <select id="status" class="form-control shadow-lg" name="status">
                                    <option value="1" @if(old('status',1)==1) selected @endif>Active</option>
                                    <option value="0" @if(old('status',1)==0) selected @endif>Inactive</option>
                                </select>
                                    @if($errors->has('status'))
                                        <span class="text-danger"> {{ $errors->first('status') }}</span>
                                    @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="userName_bn"><strong>Name (Bangla)</strong></label>
                                <input type="text" id="userName_bn" class="form-control shadow-lg" value="{{ old('userName_bn')}}" name="userName_bn">
                                @if($errors->has('userName_bn'))
                                    <span class="text-danger"> {{ $errors->first('userName_bn') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="contact_bn"><strong>Contact Number (Bangla)</strong></label>
                                <input type="text" id="contact_bn" class="form-control shadow-lg" value="{{ old('contact_bn')}}" name="contact_bn">
                                @if($errors->has('contact_bn'))
                                    <span class="text-danger"> {{ $errors->first('contact_bn') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="password"><strong>Password</strong> <i class="text-danger">*</i></label>
                                <input type="password" id="password" class="form-control shadow-lg" name="password"placeholder="Choose a safe one.." >
                                    @if($errors->has('password'))
                                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                                    @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                    <label for="image"><strong>Image</strong></label>
                                    <input type="file" id="image" class="form-control shadow-lg" placeholder="Image" name="image">
                            </div>
                            <div class="col-12 col-lg-6">
                                <button class="btn btn-success px-4" type="submit">Submit</button>
                            </div>
                        </div><!---end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end stepper two--> 
@endsection