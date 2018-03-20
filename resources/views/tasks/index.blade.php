@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
                <div class="alert alert-success">  {{Session::get('message')}}  </div>
            @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Tareas
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre de la tarea</th>
                                <th>Contenido de la tarea</th>
                                <th>Acción</th>
                            </tr>

                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ link_to_route('task.show',$task->titulo,[$task->id]) }} </td>
                            <td>{{ $task->cuerpo }} </td>
                            <td>
                                {!! Form::open(array('route'=>['task.destroy',$task->id],'method'=>'DELETE'))   !!}
                                {{link_to_route('task.edit','Editar',[$task->id],['class'=> 'btn btn-primary'])}}
                                |
                                
                                    {!!Form::button('Borrar',['class'=>'btn btn-danger','type'=>'submit'])!!}

                                {!! Form::close()!!}

                            </td>
                            @endforeach
                        </tr>
                        </table>
                    </div>
                </div>
                {{link_to_route('task.create','Agrega una nueva tarea',null,['class'=> 'btn btn-success'])}}
        </div>
    </div>
</div>
@endsection