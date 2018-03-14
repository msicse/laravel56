@extends('layouts.backend')

@section('title','Items')

@push('styles')
    
@endpush

@section('content')
    
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Edit Item</h4>
                <p class="Item">Customized Your Item </p>
            </div>
            <div class="card-content">
                <form method="post" action="{{ route('items.update',$item->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Name</label>
                                <input name="name" type="text" class="form-control" value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <textarea name="description" type="text" class="form-control">{{ $item->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Price</label>
                                <input name="price" type="text" class="form-control" value="{{ $item->price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="" class="control-label">Category</label>
                                <select name="category" class="form-control">
                                    <option>Select Category</option>
                                    @foreach( $categories as $data)
                                    <option {{ $data->id == $item->category->id ? 'selected' : '' }} value="{{$data->id}}">{{ $data->name }}</option>
                                    @endforeach

                                </select>
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
                    <a href="{{ route('items.index') }}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    
@endpush