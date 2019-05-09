@if($errors->any())
    <div class="col-md-6 alert alert-danger">
        <ul>
    @foreach($errors->all() as $error)
        <li> {{$error}} </li>
    @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="col-md-6 alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
<div class="col-md-6 alert alert-danger">
        {{ session('error') }}
    </div>
@endif
