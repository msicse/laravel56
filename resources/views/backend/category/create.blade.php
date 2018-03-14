@extends('layouts.backend')

@section('title','Sliders')

@push('styles')
	
@endpush

@section('content')
	
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Add Category</h4>
                <p class="category">Complete Your Category Adding</p>
            </div>
            <div class="card-content">
                <form method="post" action="{{ route('categories.store') }}">

                    @csrf
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
                        
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
	
@endpush