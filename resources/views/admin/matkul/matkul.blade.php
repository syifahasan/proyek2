@extends('admin.mainadmin')
@section('title', $title)
@section('content')

<h3 style="margin-top: 50px">Data Mata Kuliah</h3>
<hr>
<div class="table-responsive col-lg-9">
      <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Matkul</th>
              <th scope="col">Nama Matkul</th>
              <th scope="col">Semester</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

        <tbody>
          @foreach ($matkuls as $matkul)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $matkul->kodematkul }}</td>
                <td>{{ $matkul->nama }}</td>
                <td>{{ $matkul->semester_id }}</td>
                <td style="max-width:120px">
                  <a href="/admin/matkul/{{ $matkul->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a>
                <form action="/admin/matkul/{{ $matkul->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')"><i class="bi bi-x-circle"></i> Hapus</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

      </table>
      <a href="/admin/matkul/create" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah</a>
      @if (session()->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          <b>{{ session('success') }}</b>
        </div>
      @endif
</div>

@endsection
