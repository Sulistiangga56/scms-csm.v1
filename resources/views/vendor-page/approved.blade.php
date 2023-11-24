@extends('dashboard.app')

@section('content')
    <div class="container">
        <h1>Daftar Vendor Menunggu Persetujuan</h1>

        @if(count($vendors) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Email Perusahaan</th>
                        <th>Alamat Perusahaan</th>
                        <th>No. Telepon Perusahaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $vendor)
                        <tr>
                            <td>{{ $vendor->nama_perusahaan }}</td>
                            <td>{{ $vendor->email_perusahaan }}</td>
                            <td>{{ $vendor->alamat_perusahaan }}</td>
                            <td>{{ $vendor->no_telepon_perusahaan }}</td>
                            <td>
                                <form action="{{ route('vendor-page.approved-setuju', ['ID_Vendor' => $vendor->ID_Vendor]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Setujui</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada vendor yang menunggu persetujuan.</p>
        @endif
    </div>
@endsection