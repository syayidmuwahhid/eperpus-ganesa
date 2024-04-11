@if (\Session::has('success'))
<div class="alert alert-success">
    <h4>{!! \Session::get('success') !!}</h4>
</div>
@endif

@if (\Session::has('error'))
<div class="alert alert-danger">
    <h4>{!! \Session::get('error') !!}</h4>
</div>
@endif

@if (\Session::has('warning'))
<div class="alert alert-warning">
    <h4>{!! \Session::get('warning') !!}</h4>
</div>
@endif

@if (\Session::has('info'))
<div class="alert alert-info">
    <h4>{!! \Session::get('info') !!}</h4>
</div>
@endif