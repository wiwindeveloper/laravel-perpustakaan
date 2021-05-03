@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/members') }}">Member</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail {{ $member->name }}</li>
                    </ol>   
                </nav>

                <div class="card">
                    <div class="card-header">
                        <h2>Detail {{ $member->name }}</h2>
                    </div>
                    <div class="card-body">
                        <p>Buku yang sedang dipinjam:</p>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <td>Judul</td>
                                    <td>Tanggal Peminjaman</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($member->borrowLlogs()->borrowed()->get() as $log)
                                    <tr>
                                        <td>{{ $log->book->title }}</td>
                                        <td>{{ $log->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <p>Buku yang telah dikembalikan:</p>
                        <table>
                            <thead>
                                <tr>
                                    <td>Judul</td>
                                    <td>Tanggal Kembali</td>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($member->borrowLlogs()->returned()->get() as $log)
                                    <tr>
                                        <td>{{ $log->book->title }}</td>
                                        <td>{{ $log->update_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection