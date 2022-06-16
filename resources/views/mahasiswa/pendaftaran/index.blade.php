<x-app-layout>
    <x-slot name="header">Pendaftaran</x-slot>

    @if (Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> Melakukan pendaftaran
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::get('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal</strong> Melakukan pendaftaran
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
