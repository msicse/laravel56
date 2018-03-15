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