@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/members') }}">Member</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Member</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Member</h2>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => route('members.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal']) !!}
                            @include('members._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection