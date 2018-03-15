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
		            	@include('partials._messages')	
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