@extends('backend.layouts.app')
@section('title','Product Add')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Forms</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
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
                <form class="form needs-validation" method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
                    @csrf
                   
                    <div id="test-nl-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger1">
                        <div class="row g-3">
                            
                            <div class="col-12 col-lg-6">
                                <label for="oem_no"><strong>Oem No</strong><i class="text-danger">*</i> </label>
                                <input type="text" id="oem_no" class="form-control shadow-lg" value="{{ old('oem_no')}}" name="oem_no">
                                @if($errors->has('oem_no'))
                                    <span class="text-danger"> {{ $errors->first('oem_no') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="name"><strong>Product Name</strong><i class="text-danger">*</i> </label>
                                <input type="text" id="name" class="form-control shadow-lg" value="{{ old('name')}}" name="name">
                                @if($errors->has('name'))
                                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="model"><strong>Model No</strong><i class="text-danger">*</i> </label>
                                <input type="text" id="model" class="form-control shadow-lg" value="{{ old('model')}}" name="model">
                                @if($errors->has('model'))
                                    <span class="text-danger"> {{ $errors->first('model') }}</span>
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