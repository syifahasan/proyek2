@extends('admin.mainadmin')
@section('title', $title)
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Create new Matkul</h1>
  </div>

    <div class="col-lg-8">
      <form method="post" action="/admin/matkul">
        @csrf
        <div class="mb-3">
          <label for="kodematkul" class="form-label"><h5>Kode Matkul</h5></label>
          <input type="text" class="form-control @error('kodematkul')
              is-invalid
          @enderror" id="kodematkul" name="kodematkul" required autofocus value="{{ old('kodematkul') }}">
          @error('kodematkul')
              {{ $message }}
          @enderror
        </div>
        <div class="mb-3">
          <label for="dosen_id" class="form-label"><h5>Dosen Pembimbing</h5></label>
          <select class="form-select" name="dosen_id">
            @foreach ($dosens as $dosen)
              <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="semester_id" class="form-label"><h5>Semester</h5></label>
          <select class="form-select" name="semester_id">
            @foreach ($semesters as $semester)
              <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label"><h5>Nama Matkul</h5></label>
          <input type="text" class="form-control @error('nama')
          is-invalid
      @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
      @error('kode')
        {{ $message }}
      @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Matkul</button>
      </form>
    </div>
@endsection
