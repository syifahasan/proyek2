@extends('admin.mainadmin')
@section('title', $title)
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Add new Mahasiswa</h1>
  </div>

    <div class="col-lg-8">
      <form method="post" action="/admin/mhs/">
        @csrf
        <div class="mb-3">
          <label for="nim" class="form-label"><h5>Nim</h5></label>
          <input type="text" class="form-control @error('nim')
              is-invalid
          @enderror" id="nim" name="nim" required autofocus value="{{ old('nim') }}">
          @error('nim')
              {{ $message }}
          @enderror
        </div>
        <div class="mb-3">
          <label for="name" class="form-label"><h5>Nama</h5></label>
          <input type="text" class="form-control @error('name')
              is-invalid
          @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
          @error('name')
              {{ $message }}
          @enderror
        </div>
        <div class="mb-3">
          <label for="kelas_id" class="form-label"><h5>Kelas</h5></label>
          <select class="form-select" name="kelas_id">
            @foreach ($kelases as $kelas)
              <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label"><h5>Username</h5></label>
          <input type="text" class="form-control @error('username')
          is-invalid
      @enderror" id="username" name="username" required value="{{ old('username') }}">
      @error('username')
        {{ $message }}
      @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><h5>Password</h5></label>
            <input type="text" class="form-control @error('password')
            is-invalid
        @enderror" id="password" name="password" required value="{{ old('password') }}">
        @error('password')
          {{ $message }}
        @enderror
          </div>
        <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
      </form>
    </div>
@endsection
