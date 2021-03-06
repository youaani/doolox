@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Install Doolox <small>Doolox Installation Wizard</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-gears"></i> Install (Step 1)</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">

@if ($conds['mcrypt'])
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>mcrypt</strong> PHP extension is a requirement and it is enabled.
        </div>
@else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>mcrypt</strong> PHP extension is a requirement, please enable it.
        </div>
@endif

@if ($conds['curl'])
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>curl</strong> PHP extension is a requirement and it is enabled.
        </div>
@else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>curl</strong> PHP extension is a requirement, please enable it.
        </div>
@endif

@if ($conds['storage'])
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/storage/</strong> directory exists and it is writable.
        </div>
@else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/storage/</strong> directory doesn't exist or it is not writable recursively.
        </div>
@endif

@if ($conds['database'])
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/config/database.php</strong> file exists and it is writable.
        </div>
@else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/config/database.php</strong> file doesn't exist or it is not writable.
        </div>
@endif

@if ($conds['doolox'])
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/config/doolox.php</strong> file exists and it is writable.
        </div>
@else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/config/doolox.php</strong> file doesn't exist or it is not writable.
        </div>
@endif

@if ($conds['app'])
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/config/app.php</strong> file exists and it is writable.
        </div>
@else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>app/config/app.php</strong> file doesn't exist or it is not writable.
        </div>
@endif

        <a class="btn btn-danger btn-lg" href="./">Check Again</a>
    </div>
</div>
@stop