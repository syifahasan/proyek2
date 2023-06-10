@extends('layout.main')
@section('title', $title)
@section('content')
<div class="container mt-5 mb-3">
    <div class="row">
        @foreach ($matkuls as $matkul)
        <div class="col-md-4">
            <a href="/rekap/{{ $matkul->nama }}" style="text-decoration: none; color:black;">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">{{ $matkul->semester->semester }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 class="heading">{{ $matkul->nama }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3"> <span class="text1">32 Applied <span class="text2">of 50 capacity</span></span> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
