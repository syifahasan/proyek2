@extends('admin.mainadmin')
@section('title', $title)
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit data Dosen</h1>
  </div>

    <div class="col-lg-8">
      <form method="post" action="/admin/dosen/{{ $dosen->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nip" class="form-label"><h5>Nomor Induk Pegawai (NIP)</h5></label>
          <input type="text" class="form-control @error('nip')
              is-invalid
          @enderror" id="nip" name="nip" required autofocus value="{{ old('nip', $dosen->nip) }}">
          @error('nip')
              {{ $message }}
          @enderror
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label"><h5>Nama Dosen</h5></label>
          <input type="text" class="form-control @error('nama')
          is-invalid
      @enderror" id="nama" name="nama" required value="{{ old('nama', $dosen->nama) }}">
      @error('nama')
        {{ $message }}
      @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Data Dosen</button>
      </form>
    </div>
@endsection
