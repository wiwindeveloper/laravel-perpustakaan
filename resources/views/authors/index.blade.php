@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Penulis</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Penulis</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            <a href="{{ route('authors.create') }}" class="btn btn-primary">
                                Tambah
                            </a>
                        </p>
                        {!! $html->table(['class'=>'table table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection