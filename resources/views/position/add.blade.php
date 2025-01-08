<x-app-layout>
    <form action="{{ route('position.store') }}" class="form-horizontal form-bordered" method="POST">
        @csrf
        <section class="card">
            <header class="card-header">   
                <h2 class="card-title">Tambah Posisi</h2>
            </header>
            <div class="card-body">

                    <x-input-text name="name" id="inputnama" label="Nama" placeholder="Masukan nama posisi" :required="true"/>

                    <x-input-area name="description" id="inputdeskripsi" label="Deskripsi" placeholder="Masukan deskripsi" :required="true"/>

            </div>

            <footer class="card-footer text-right">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route ('position.index') }}" class="btn btn-primary">Kembali</a>
            </footer>

        </section>
    </form>
</x-app-layout>