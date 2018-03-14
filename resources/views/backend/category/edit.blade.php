@extends('layouts.backend')

@section('title','Sliders')

@push('styles')
	
@endpush

@section('content')
	
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Edit Category</h4>
                <p class="category">Customize Your Category</p>
            </div>
            <div class="card-content">
                <form method="post" action="{{ route('categories.update',$data->id) }}">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Name</label>
                                <input name="name" type="text" value="{{ $data->name }}" class="form-control">
                            </div>
                        </div>
                        
                    </div>
                     
                    <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="material-icons font-weight-bold">keyboard_return</i></a>
                    <button type="submit" class="btn btn-success ">Submit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
	
@endpush