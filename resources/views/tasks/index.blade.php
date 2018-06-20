@extends('layouts.app')


@section('content')
    @if(session('massege'))
        <div class="alert alert-success">
            {{session('massege')}}
        </div>
    @elseif(session('erorr'))
        <div class="alert alert-danger">
            {{session('erorr')}}
        </div>
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('task/create') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_token"value="{{csrf_token()}}">
        <input type="hidden" name="id"value="{{isset ($task->id)? $task->id :''}}">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Задание</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Описание</label>

            <div class="col-md-6">
                <textarea id="desc" type="text" class="form-control" name="desc" value="" required autofocus></textarea>

                @if ($errors->has('desc'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Дата выполнения</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="date" value="" required autofocus>

                @if ($errors->has('date'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                @endif
            </div>
        </div>



        <br>

            <div class="col-md-7 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                    Create
                </button>
            </div>
    </form>




    @foreach($tasks as $task)

            <p class ="col-md-6 col-md-offset-5">{{$task->title}}</p>
            <p class ="col-md-6 col-md-offset-5">{{$task->desc}}</p>
            <h5 class ="col-md-6 col-md-offset-5">{{$task->date}}</h5>

            <div class ="col-md-6 col-md-offset-5 "style="margin-bottom: 25px">
        <span><a href="{{ route('task/edit',['id'=>$task->id]) }}"
                 class="btn btn-success">
             Редактировать</a></span>
                <span><a href="{{ route('task/delete',['id'=>$task->id]) }}"
                         class=" btn btn-danger">
                удалить</a></span>
            </div>

    @endforeach




@endsection