@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                @foreach ($permisos as $permiso) 
                    <div class="panel-body">
                        <a href="/{{$permiso->name}}">{{$permiso->name}}</a>
                    </div>    
                @endforeach
                    
                
            </div>
        </div>
    </div>
</div>
@endsection
