<x-user>
    <style>
        .badge-custom {
            font-size: 0.85rem;
            font-weight: bold;
        }
    </style>

    <x-card>
        <x-slot name="header">
            Pendaftaran Diri untuk Kegiatan: {{ $activity->title }}
        </x-slot>

        <!-- Detail Kegiatan -->
        <div class="mb-4">
            <h5>Detail Kegiatan</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <td>{{ $activity->title }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $activity->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kegiatan</th>
                    <td>{{ $activity->start_date }}</td>
                </tr>
                <tr>
                    <th>Harga Pendaftaran</th>
                    <td>Rp {{ number_format($activity->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Mulai Pendaftaran</th>
                    <td>{{ $activity->registration_open_date }}</td>
                </tr>
                <tr>
                    <th>Tutup Pendaftaran</th>
                    <td>{{ $activity->registration_close_date }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($activity->max_participants && $activity->registrations->count() >= $activity->max_participants)
                            <span class="badge bg-danger text-white badge-custom">Penuh</span>
                        @else
                            <span class="badge bg-success text-white badge-custom">Tersedia</span>
                        @endif
                    </td>
                </tr>
                @if ($activity->poster_file)
                    <tr>
                        <th>Poster</th>
                        <td>
                            <img src="{{ asset('storage/' . $activity->poster_file) }}" alt="Poster Kegiatan" class="img-fluid" style="max-width: 300px;">
                        </td>
                    </tr>
                @endif
            </table>
        </div>

        <!-- Form Pendaftaran -->
        <form method="POST" action="{{ route('activities.selfregisterpaid', $activity->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="payment_proof" class="form-label">Unggah Bukti Pembayaran</label>
                <input type="file" class="form-control @error('payment_proof') is-invalid @enderror" name="payment_proof" id="payment_proof" required>
                @error('payment_proof')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
            <a href="{{ route('activities.member.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </x-card>
</x-user>
