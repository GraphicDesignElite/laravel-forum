<!-- message output -->
@if(session()->has('danger'))
<div class="alert alert-danger">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {{ session()->get('danger') }}
            </div>
        </div>
    </div>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
</div>
@endif
@if(session()->has('info'))
<div class="alert alert-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {{ session()->get('info') }}
            </div>
        </div>
    </div>
</div>
@endif