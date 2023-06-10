@extends('layout.main')
@section('content')

<table class="table table-bordered">
    <tr>
        @foreach ($matkuls as $matkul)
        <td><h3>MATA KULIAH : {{ $matkul->nama }}</h3></td>
    </tr>
    <tr>
    <td><h3>NAMA DOSEN : {{ $matkul->dosen->nama }}</h3></td>
    @endforeach
    </tr>
</table>


<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Pertemuan Ke- :</th>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
        <td>13</td>
        <td>14</td>
        <td>15</td>
    </tr>
    <tr>
        <th scope="col">Tanggal :</th>
    </tr>
    <tr>
        <th scope="col">Jam Mulai :</th>
    </tr>
    <tr>
        <th scope="col">Jam Selesai :</th>
    </tr>
    <tr>
        <th scope="col">Paraf Ketua Kelas :</th>
    </tr>
    </thead>
</table>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nim</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Keterangan</th>
      </tr>
    </thead>


    @foreach ($mahasiswas as $mhs)
    <tbody>
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->kelas }}</td>
            <td>{{ $mhs->status }}</td>
          </tr>

    </tbody>
    @endforeach

</table>
@endsection
