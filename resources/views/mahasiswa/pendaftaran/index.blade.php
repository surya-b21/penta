<x-app-layout>
    <x-slot name="header">Pendaftaran</x-slot>

    @if ($pesan = Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($pesaan = Session::get('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($daftar_sidang)
        @include('mahasiswa.pendaftaran.edit')
    @else
        @include('mahasiswa.pendaftaran.create')
    @endif
</x-app-layout>
