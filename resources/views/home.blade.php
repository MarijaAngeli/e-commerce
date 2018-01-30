@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="jumbotron">
          <h1 class="display-3">Visit Our Store</h1>
          <p class="lead"> All our casual games are made by <a href="http://www.studiodragoneye.com">MONMAX LIMITED Studio DragonsEye.</a>We are creating great casual games that are fun and also entertaining for everyone everywhere.</p>
          <p><a class="btn btn-lg btn-success" href="{{ url('/')}}" role="button">Casual Game Store</a></p>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
