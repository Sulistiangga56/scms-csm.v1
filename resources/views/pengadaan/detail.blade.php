@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="card-header">{{ __('Daftar Pengajuan Pengadaan Barang/Jasa') }}</div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Nama Pekerjaan: {{ $pengadaan->Judul_Pengadaan }}</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Dokumen</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Tambahkan foreach untuk setiap dokumen --}}
                            @foreach(['Rencana Anggaran Biaya', 'Justifikasi Penunjukan Langsung','Nota Dinas Permintaan Pengadaan','Nota Dinas Permintaan Pelaksanaan Pengadaan'] as $dokumen)
                            {{-- {{ dd($dokumen_checked) }} --}}
                                {{-- Tambahkan kondisi untuk menentukan apakah bagian ini perlu ditampilkan --}}
                                @if ($dokumen_checked[$dokumen])
                                    <tr>
                                        <td>{{ $dokumen }}</td>
                                        {{-- Tambahkan tanggal_pengajuan berdasarkan masing-masing dokumen --}}
                                        {{-- <td>Tanggal Pengajuan: {{ optional($pengadaan->{'tanggal_' . strtolower(str_replace(' ', '_', $dokumen))})->tanggal_pengajuan }}</td> --}}
                                        <td>
                                            @if ($dokumen == 'Rencana Anggaran Biaya')
                                                @if ($rab)
                                                    {{ $rab->created_at }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            {{-- @elseif ($dokumen == 'Justifikasi Penunjukan Langsung')
                                                @if ($statusJustifikasi)
                                                    {{ $statusJustifikasi->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            @elseif ($dokumen == 'Nota Dinas Permintaan Pengadaan')
                                                @if ($statusNotaDinasPermintaan)
                                                    {{ $statusNotaDinasPermintaan->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            @elseif ($dokumen == 'Nota Dinas Permintaan Pelaksanaan Pengadaan')
                                                @if ($statusNotaDinasPelaksanaan)
                                                    {{ $statusNotaDinasPelaksanaan->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif --}}
                                            @endif
                                        </td>
                                        <td class="badge badge-pill badge-dark">
                                            @if ($dokumen == 'Rencana Anggaran Biaya')
                                                @if ($statusRab)
                                                    {{ $statusRab->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            @elseif ($dokumen == 'Justifikasi Penunjukan Langsung')
                                                @if ($statusJustifikasi)
                                                    {{ $statusJustifikasi->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            @elseif ($dokumen == 'Nota Dinas Permintaan Pengadaan')
                                                @if ($statusNotaDinasPermintaan)
                                                    {{ $statusNotaDinasPermintaan->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            @elseif ($dokumen == 'Nota Dinas Permintaan Pelaksanaan Pengadaan')
                                                @if ($statusNotaDinasPelaksanaan)
                                                    {{ $statusNotaDinasPelaksanaan->keterangan_status }}
                                                @else
                                                    Status Tidak Ditemukan
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                        @if ($dokumen == 'Rencana Anggaran Biaya')
                                            @if ($pengadaan->id_status_rab == 6 )
                                                <a href="{{ route('rab.index', ['ID_Pengadaan' => $pengadaan->ID_Pengadaan]) }}" class="btn btn-info">Detail</a>
                                            @else
                                                <a href="{{ route('rab.preview', ['ID_Pengadaan' => $pengadaan->ID_Pengadaan, 'ID_RAB' => $rab->ID_RAB]) }}" class="btn btn-info">Detail</a>
                                            @endif
                                        @elseif ($dokumen == 'Justifikasi Penunjukan Langsung')
                                            <a href="{{ route('justifikasi.index', ['ID_Pengadaan' => $pengadaan->ID_Pengadaan]) }}" class="btn btn-info">Detail</a>
                                        @elseif ($dokumen == 'Nota Dinas Permintaan Pengadaan')
                                            <a href="{{ route('nota_dinas_permintaan.index') }}" class="btn btn-info">Detail</a>
                                        @elseif ($dokumen == 'Nota Dinas Permintaan Pelaksanaan Pengadaan')
                                            <a href="{{ route('nota_dinas_pelaksanaan.index') }}" class="btn btn-info">Detail</a>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
