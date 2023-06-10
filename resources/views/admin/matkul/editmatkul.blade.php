@extends('admin.mainadmin')
@section('title', $title)
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit Matkul</h1>
  </div>

    <div class="col-lg-8">
      <form method="post" action="/admin/matkul/{{ $matkul->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="kodematkul" class="form-label"><h5>Kode Matkul</h5></label>
          <input type="text" class="form-control @error('kodematkul')
              is-invalid
          @enderror" id="kodematkul" name="kodematkul" required autofocus value="{{ old('kodematkul', $matkul->kodematkul) }}">
          @error('kodematkul')
              {{ $message }}
          @enderror
        </div>
        <div class="mb-3">
          <label for="dosen_id" class="form-label"><h5>Dosen Pembimbing</h5></label>
          <select class="form-select" name="dosen_id">
            @foreach ($dosens as $dosen)
              @if (old('dosen_id', $matkul->dosen_id) == $dosen->id)
                <option value="{{ $dosen->id }}" selected>{{ $dosen->nama }}</option>
              @else
                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="semester_id" class="form-label"><h5>Semester</h5></label>
          <select class="form-select" name="semester_id">
            @foreach ($semesters as $semester)
              @if(old('semester_id', $matkul->semester_id) == $semester->id)
                <option value="{{ $semester->id }}" selected>{{ $semester->semester }}</option>
              @else
                <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label"><h5>Nama Matkul</h5></label>
          <input type="text" class="form-control @error('nama')
          is-invalid
      @enderror" id="nama" name="nama" required value="{{ old('nama', $matkul->nama) }}">
      @error('kode')
        {{ $message }}
      @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Matkul</button>
      </form>
    </div>
@endsection
