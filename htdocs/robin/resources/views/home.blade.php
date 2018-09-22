@extends('admin.layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
     <h1>Hi , You are logged in succesfully . Thanku.</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
