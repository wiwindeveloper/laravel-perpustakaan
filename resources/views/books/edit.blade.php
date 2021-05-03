@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/authors') }}">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Buku</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Ubah Buku</h2>
                    </div>
                    <div class="card-body">
                        {!! Form::model($book, ['url' => route('books.update', $book->id), 'method'=>'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                            @include('books._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection