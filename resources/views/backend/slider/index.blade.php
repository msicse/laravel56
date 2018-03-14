@extends('layouts.backend')
@section('title','Sliders')

@push('styles')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <style type="text/css">
        .card img {
            width: 82px;
            height: 70px;
        }
    </style>
@endpush
@section('content')
	<div class="content">
        <div class="container-fluid">
            <div class="row">
				
            	
                <div class="col-md-12">
					<div class="col-md-2">
						<a href="{{ route('slider.create') }}" class="btn btn-primary btn-block">Add Slider<div class="ripple-container"></div></a>
					</div>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Slider Table</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table" id="example">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Sub-Title</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th> Action </th>
                                </thead>
                                <tbody>
                                	@foreach( $sliders as $key => $data )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->sub_title }}</td>
                                        <td> <img class="img-responsive" src="{{ asset('uploads/slider')}}/{{$data->image}}"/> </td>
                                        <td class="text-primary">{{ $data->created_at }}</td>
                                        <td class="text-primary">{{ $data->updated_at }}</td>
                                        <td>
                                        	<a href="{{ route('slider.edit',$data->id) }}" class="btn btn-primary btn-sm" "><i class="material-icons">mode_edit</i></a>
                                        	

                                        	<form id="delete-form-{{ $data->id }}" style="display: none;" action="{{  route('slider.destroy',$data->id) }}" method="post">
                                        		@csrf
                                        		@method('DELETE')

                                        	</form>

                                        	<button type="button" class="btn btn-danger btn-sm"  onclick="if(confirm('Are You sure want Delete ?')){
                                        		event.preventDefault();
                                        		document.getElementById('delete-form-{{ $data->id }}').submit();
                                        	} else {
                                        		event.preventDefault();
                                        	}">
                                        		<i class="material-icons">delete</i>
                                        	</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('scripts')
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
@endpush