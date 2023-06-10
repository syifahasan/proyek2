@extends('admin.mainadmin')
@section('title', $title)
@section('content')

<div class="container-md mt-5">
    <table class="table table-bordered">
        <tr>
          <td><h3>Data Mahasiwa D4 RPL 2A</h3></td>
        </tr>
      </table>
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nim</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row">1</th>
                <td>2103070</td>
                <td>Teddy Ronaldo</td>
                <td><button type="button" class="btn btn-danger">Hapus</button></td>
                <td><button type="button" class="btn btn-warning">Ubah</button></td>
              </tr>
              <tr>
                  <th scope="row">2</th>
                  <td>2103071</td>
                  <td>Mamay</td>
                  <td><button type="button" class="btn btn-danger">Hapus</button></td>
                  <td><button type="button" class="btn btn-warning">Ubah</button></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>2103072</td>
                  <td>Gibran</td>
                  <td><button type="button" class="btn btn-danger">Hapus</button></td>
                  <td><button type="button" class="btn btn-warning">Ubah</button></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>2103072</td>
                    <td>Ariyanah</td>
                    <td><button type="button" class="btn btn-danger">Hapus</button></td>
                    <td><button type="button" class="btn btn-warning">Ubah</button></td>
                  </tr>
      </table>
      <button type="button" class="btn btn-success">Tambah</button>
</div>

@endsection
