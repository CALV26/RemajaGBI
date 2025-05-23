<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
    <form action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Tambah Laporan Kegiatan Kelas</h2>
            </header>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-lg-6">
                        <x-select-box label="Pilih Kelas" name="class_id" :options="$classes" placeholder="Pilih Kelas" :required="true"/>
                    </div>
                    <div class="col-lg-6">
                        <x-select-box label="Pilih Minggu" name="week_of" placeholder="Pilih Minggu" :required="true"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6">
                        <x-input-text name="title" label="Judul Laporan" placeholder="Masukkan judul" :required="true"/>
                    </div>
                    <div class="col-lg-6">
                        <x-input-area name="description" label="Deskripsi Laporan" placeholder="Masukkan deskripsi kegiatan (opsional)"/>
                    </div>
                </div>
                <x-input-file name="file" label="Upload File Laporan (Max: 2 MB)" accept=".pdf,.doc,.docx,.jpg,.png" required />
            </div>
            <footer class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-default">Reset</button>
            
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-success">Kembali</a>
                @elseif (Auth::user()->hasRole('Admin'))
                    <a href="{{ route('mentor.reports.index') }}" class="btn btn-success">Kembali</a>
                @endif
            </footer>            
        </section>
    </form>
    <script>
        document.querySelector('select[name="class_id"]').addEventListener('change', function () {
        const classId = this.value;

        // Gunakan endpoint dinamis
        fetch(`{{ $weeksEndpoint }}/${classId}`)
            .then(response => response.json())
            .then(data => {
                const weekSelect = document.querySelector('select[name="week_of"]');
                weekSelect.innerHTML = ''; // Kosongkan dropdown minggu

                if (data.weeks.length > 0) {
                    // Tambahkan opsi minggu berdasarkan hasil dari server
                    data.weeks.forEach(week => {
                        const option = document.createElement('option');
                        option.value = week;
                        option.textContent = week;
                        weekSelect.appendChild(option);
                    });
                } else {
                    // Jika tidak ada minggu valid
                    const option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Tidak ada minggu tersedia';
                    weekSelect.appendChild(option);
                }
            })
            .catch(error => console.error('Terjadi kesalahan:', error));
    });
    </script>
</x-app-layout>