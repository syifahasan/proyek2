@extends('admin.mainadmin')
@section('title', $title)
@section('content')

<h3 style="margin-top: 50px">Data Dosen</h3>
<hr>
<div class="table-responsive col-lg-8">
      <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIP</th>
              <th scope="col">Nama Dosen</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

        <tbody>
          @foreach ($dosens as $dosen)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $dosen->nip }}</td>
                <td>{{ $dosen->nama }}</td>
                <td style="max-width:100px">
                  <a href="/admin/dosen/{{ $dosen->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a>
                <form action="/admin/dosen/{{ $dosen->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')"><i class="bi bi-x-circle"></i> Hapus</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

      </table>
      <a href="/admin/dosen/create" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah</a>
      @if (session()->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          <b>{{ session('success') }}</b>
        </div>
      @endif
</div>

@endsection
