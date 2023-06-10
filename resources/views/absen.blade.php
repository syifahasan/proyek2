@extends('layout.main')
@section('title', $title)
@section('content')
    <h3>Silahkan absen dengan scan kode QR dibawah</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview"></video>
            </div>
            <div class="col-md-6">
                <input type="text" name="text" id="text" class="form-control" disabled readonly>
            </div>

            @can('admin')
            <div class="col-md-6">
                <form action="/absen" method="POST">
                    @csrf
                    <input type="text" name="value" id="value" class="form-control" required>
                    <button type="submit" onclick="confirm('Apakah Anda yakin ingin menambahkan QR?')">Generate QR</button>
                </form>
            </div>
            <div class="d-inline mt-3">{{ isset($value) ? $value : '' }}</div>
            @endcan
        </div>

    </div>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
      });

      scanner.addListener('scan', function (content) {
        console.log(content);
        document.getElementById('text').value = content;
      });

      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
      </script>
@endsection
