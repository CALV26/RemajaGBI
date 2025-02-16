<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .badge-custom {
            font-size: 0.85rem;
            font-weight: bold;
        }
        .modal-body img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <x-card>
        <x-slot name="header">
            Peserta Kegiatan: {{ $activity->title }}
        </x-slot>

        {{-- **Tampilkan Tabel Peserta Gratis Jika Kegiatan Tidak Berbayar** --}}
        @if(!$activity->is_paid)
            <h5>Peserta Gratis</h5>
            <table class="table table-responsive-md mb-3 text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($freeParticipants as $participant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $participant->member->firstname }} {{ $participant->member->lastname }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">
                                <div class="alert alert-danger">Belum ada peserta gratis.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endif

        {{-- **Tampilkan Tabel Peserta Berbayar Jika Kegiatan Berbayar** --}}
        @if($activity->is_paid)
            <h5>Peserta Berbayar</h5>
            <table class="table table-responsive-md mb-3 text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paidParticipants as $participant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $participant->member->firstname }} {{ $participant->member->lastname }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal{{ $participant->payment->id }}">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                @if ($participant->payment->payment_status === 'Diproses')
                                    <span class="badge badge-custom bg-warning text-dark">Diproses</span>
                                @elseif ($participant->payment->payment_status === 'Berhasil')
                                    <span class="badge badge-custom bg-success">Disetujui</span>
                                @else
                                    <span class="badge badge-custom bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if ($participant->payment->payment_status === 'Diproses')
                                    <form action="{{ route('memberactivities.verify', $participant->payment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="Berhasil">
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin?')">Terima</button>
                                    </form>

                                    <form action="{{ route('memberactivities.verify', $participant->payment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="Ditolak">
                                        <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Apakah Anda yakin?')">Tolak</button>
                                    </form>
                                @else
                                    <span class="text-muted">Sudah diverifikasi</span>
                                @endif
                            </td>
                        </tr>

                        {{-- Modal Bukti Pembayaran --}}
                        <div class="modal fade" id="paymentModal{{ $participant->payment->id }}" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Bukti Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times</button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $participant->payment->payment_proof) }}" alt="Bukti Pembayaran">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-danger">Belum ada peserta berbayar.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endif

        {{-- Tombol Kembali --}}
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('listactivitiesmember.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </x-card>
</x-app-layout>