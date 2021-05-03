@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/authors') }}">Penulis</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Penulis</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Penulis</h2>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => route('authors.store'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
                            @include('authors._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection