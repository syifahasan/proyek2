@extends('admin.mainadmin')
@section('title', $title)
@section('content')

<div class="container-md mt-5">
    <table class="table table-bordered">
        <tr>
          <td><h3>Data Mahasiwa D3 TI 2A</h3></td>
        </tr>
      </table>
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nim</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->nim }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->password }}</td>
                <td style="max-width:100px">
                    <a href="/admin/mhs/d3tib/{{ $user->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a>
                  <form action="/admin/mhs/d3tib/{{ $user->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')"><i class="bi bi-x-circle"></i> Hapus</button>
                  </form>
                  </td>
            </tr>
            @endforeach
          </tbody>


          </tbody>
      </table><a href="/admin/mhs/create" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah</a>
</div>

@endsection
