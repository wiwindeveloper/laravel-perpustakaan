@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Buku</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Buku</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            <a href="{{ route('books.create') }}" class="btn btn-primary">
                                Tambah
                            </a>
                            <a class="btn btn-primary" href="{{ route('export.books') }}">
                                Export
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