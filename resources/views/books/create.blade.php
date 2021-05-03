@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/authors') }}">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Buku</h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="form-tab" data-bs-toggle="tab" data-bs-target="#form" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    <i class="fa fa-edit"></i>&nbsp; Isi Form
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="fas fa-cloud-upload-alt"></i>&nbsp; Upload Excel
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
                                {!! Form::open(['url' => route('books.store'), 'method' => 'post', 'files'=>'true', 'class' => 'form-horizontal']) !!}
                                    @include('books._form')
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                                {!! Form::open(['url' => route('import.books'), 'method' => 'post', 'files'=>'true', 'class' => 'form-horizontal']) !!}
                                    @include('books._import')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection