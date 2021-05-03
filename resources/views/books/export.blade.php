@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/books') }}">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Export Buku</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Export Buku</h2>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['url' => route('export.books.post'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                    <div class="form-group {!! $errors->has('author_id') ? 'has-error' : '' !!}">
                        {!! Form::label('author_id', 'Penulis', ['class'=>'col-md-2 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::select('author_id[]', [''=>'']+App\Author::pluck('name','id')->all(), null, array('id' => 'select-state', 'multiple', 'placeholder' => 'Pilih Penulis...')) !!}
                            {!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{!! $errors->has('type') ? 'has-error' : '' !!}}">
                        {!! Form::label('type', 'Pilih Output', ['class'=>'col-md-2 control-label']) !!}
                        <div class="col-md-4 checkbox">
                            {{ Form::radio('type', 'xls', true) }} Excel
                            {{ Form::radio('type', 'pdf') }} PDF
                            {!!  $errors->first('type', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection