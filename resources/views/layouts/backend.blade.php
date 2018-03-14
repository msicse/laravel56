<!doctype html>
<html lang="en">
@include('partials._head')
<body>
    <div class="wrapper">
        @include('partials._sidebar')
        <div class="main-panel">
            @include('partials._nav')

           	<div class="content">
		        <div class="container-fluid">
		            <div class="row">
		            	<div class="col-md-12">
		            		@if(session('success'))
		            		<div class="alert alert-success">
				                <button type="button" onclick="this.parentElement.style.display='none'" aria-hidden="true" class="close">×</button>
				                <span>
				                    <b> Success - </b> {{session('success')}}</span>
				            </div> 
				            @endif
		            		@if ($errors->any())
		            		@foreach ($errors->all() as $error)
				            <div class="alert alert-danger">
				            	
				                <button type="button" onclick="this.parentElement.style.display='none'" aria-hidden="true" class="close">×</button>
				                <span>
				                    <b> Error - </b>{{ $error }}</span>
				                
				            </div>
				            @endforeach
				           @endif
		            	</div>		
            			@yield('content')
            		</div>
            	</div>
            </div>
            @include('partials._footer')
        </div>
    </div>
</body>
@include('partials._scripts')

</html>