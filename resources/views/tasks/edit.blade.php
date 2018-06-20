@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">eit task</div>
                    <div class="panel-body">
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
                            <input type="hidden" name="id"value="{{$task->id}}">

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Задание</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $task->title}}" required autofocus>

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
                                    <input id="desc" type="text" class="form-control" name="desc" value="{{ $task->desc}}" required autofocus></input>

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
                                    <input id="title" type="text" class="form-control" name="date" value="{{ $task->date}}" required autofocus>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>






                            <br>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-9">
                                    <button type="submit" class="btn btn-success">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection