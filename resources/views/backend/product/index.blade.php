@extends('backend.layouts.app')
@section('title','Product')
@section('content')
 <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <div>
        <a href="{{ route('product.create') }}" class="float-end text-decoration-none"><i class="fa fa-plus"></i></a>
    </div>
    <!--end breadcrumb-->
    
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>{{__('#SL')}}</th>
                            <th>{{__('Oem No')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Model')}}</th>
                            <th>{{__('Image')}}</th>
                            <th>{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($product as $d)
                        <tr role="row" class="odd">
                            <td>{{++$loop->index}}</td>
                            <td>{{$d->oem_no}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->model}}</td>
                            <td class="sorting_1">
                                <img class="rounded-circle" width="50px" src="{{asset('public/uploads/product/'.$d->image)}}" alt="">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('product.edit',encryptor('encrypt',$d->id))}}" class=""><i class="fas fa-edit"></i>
                                    </a>
                                    


                                    <form id=""
                                        action="{{ route('product.destroy', encryptor('encrypt', $d->id)) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="border:none">
                                            <span class=""><i class="fa fa-trash text-danger"></i></span>
                                            
                                        </button>
                                    </form>
                                </div>                                            
                            </td>												
                        </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection