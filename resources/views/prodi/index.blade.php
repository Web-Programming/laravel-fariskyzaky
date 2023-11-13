@extends('layout.master')
@section('title', 'Halaman Prodi')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Program Studi</h2>
        Ini halaman Prodi
{{--
        @if (session()->has('info'))
            <div class="alert alert-success">
                {{ session()->get('info') }}
            </div>
        @endif --}}
             <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah</a>
            </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodi as $item)
                    <tr>
                        <td>
                            {{ $item->nama }}
                        </td>
                        <td>
                            {{-- <a href="{{ url('prodi/'.$item->id) }}" class="btn btn-warning">Detail</a>
                            <a href="{{ url('prodi/'.$item->id.'/edit') }}" class="btn btn-info">Ubah</a> --}}
                              <form action="{{ route('prodi.destroy',['prodi' => $item->id]) }}"
                                    method="POST">
                                            <a href="{{ url('/prodi/'.$item->id) }}" class="btn btn-warning">Detail</a>
                                            {{-- <td> {{ $item->nama_mahasiswa }} </td><td> {{ $item->nama_prodi }} --}}
                                            <a href="{{ url('/prodi/'.$item->id.'/edit') }}" class="btn btn-info">Ubah</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger ">Hapus</button>
                                </form>
                        </td>
                    </tr>
                    
                    @endforeach
                    </tbody>
                </table>
{{--
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th><th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($prodis as $item)
                        <tr>
                            <td> {{ $item->nama }} </td>
                            <td>


                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
@endsection
