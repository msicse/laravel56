@extends('layouts.backend')

@section('title','Sliders')

@push('styles')
	
@endpush

@section('content')
	
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Edit Slider</h4>
                <p class="category">Customize Your Slider</p>
            </div>
            <div class="card-content">
                <form method="post" action="{{ route('slider.update',$data->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Title</label>
                                <input name="title" type="text" value="{{ $data->title }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Sub-Title</label>
                                <input type="text" name="sub-title" value="{{ $data->sub_title }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <label class="">Image</label>
                                <input name="image" type="file" class="">
                            </div>
                        </div>
                    </div>   
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
	
@endpush