@extends('layouts.backend')
@section('title','Reservation')

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
					
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Reservation Table</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table" id="example">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date & Time</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th> Action </th>
                                </thead>
                                <tbody>
                                	@foreach( $reservations as $key => $data )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->date_and_time }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td>
                                            @if($data->status == true)
                                                <span class="text-success">Confirmed</span>
                                            @else
                                                <span class="text-danger">Not Confirmed</span>
                                            @endif
                                        </td>
                                        <td class="text-primary">{{ $data->created_at }}</td>
                                        
                                        <td>
                                            @if( $data->status == false)
                                                <form id="status-form-{{ $data->id }}" style="display: none;" action="{{ route('reservation.status',$data->id) }}" method="post">
                                                   
                                                 @csrf

                                                </form>

                                                <button type="button" class="btn btn-info btn-sm"  onclick="if(confirm('Are You verify by phone ?')){
                                                    event.preventDefault();
                                                    document.getElementById('status-form-{{ $data->id }}').submit();
                                                } else {
                                                    event.preventDefault();
                                                }">
                                                    <i class="material-icons">done</i>
                                                </button>

                                            @endif

                                        	<form id="delete-form-{{ $data->id }}" style="display: none;" action="{{ route('reservation.destroy',$data->id) }}" method="post">
                                        		@csrf
                                        		

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