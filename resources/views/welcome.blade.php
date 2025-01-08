{{-- resources/views/landing.blade.php --}}
@extends('layouts.main')

@section('content')
  <!-- ========== HERO SECTION ========== -->
  <section class="hero">
    <div class="container text-center">
      <h1>Welcome, youth!</h1>
      <p>GBI Sungai Yordan</p>
    </div>
  </section>

  <!-- ========== VISI DAN MISI ========== -->
  <div class="container my-5 pt-5" id="visi-misi">
    <div class="row text-center">
      <div class="col-12">
        <h2 class="fw-bold" style="color:rgb(240, 240, 240); text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
          Visi dan Misi
        </h2>
        <p class="text">Bertumbuh dalam Kasih, Bersinar dalam Iman</p>
      </div>
    </div>
    <div class="row d-flex align-items-stretch p-5">
      <!-- VISI -->
      <div class="col-md-6 mb-4">
        <div 
          class="card shadow-sm border-0 h-100 px-5 py-3" 
          style="background: linear-gradient(135deg,rgb(165, 106, 113),rgb(33, 66, 94)); color: #fff;"
        >
          <div class="card-body text-center d-flex flex-column">
            <div class="mb-3">
              <!-- <i class="fa-solid fa-eye fa-2x"></i> -->
            </div>
            <h5 class="fw-bold">Visi</h5>
            <p class="mt-2">
              Menjadi komunitas remaja yang berakar kuat dalam iman, bertumbuh bersama dalam kasih Kristus, dan berdampak positif bagi gereja, masyarakat, serta dunia.
            </p>
            <div class="mt-auto"></div>
          </div>
        </div>
      </div>

      <!-- MISI -->
      <div class="col-md-6 mb-4">
        <div 
          class="card shadow-sm border-0 h-100 px-5 py-3" 
          style="background: linear-gradient(135deg,rgb(33, 66, 94),rgb(101, 146, 125)); color: #fff;"
        >
          <div class="card-body text-center d-flex flex-column">
            <div class="mb-3">
              <!-- <i class="fa-solid fa-bullseye fa-2x"></i> -->
            </div>
            <h5 class="fw-bold">Misi</h5>
            <ol class="mt-2 text-start">
              <li>Mendekatkan diri kepada Kristus melalui ibadah, doa, dan pendalaman firman Tuhan.</li>
              <li>Membangun komunitas yang saling mendukung dalam kasih dan persahabatan Kristus</li>
              <li>Mendorong remaja untuk berdampak positif bagi gereja dan masyarakat.</li>
            </ol>
            <div class="mt-auto"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ========== SECTION INFO: 3 Kolom Singkat ========== -->
  <div class="container my-5" id="info">
    <div class="church col-12 d-flex flex-column justify-content-end align-items-start p-5">
      <h3>GBI Sungai Yordan</h3>
      <p>Jl. Ratu Melati Blok D3, RT.7/RW.13, Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11510</p>
    </div>
  </div>

  <!-- ========== SECTION CAROUSEL ========== -->
  <div class="container my-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <!-- Slides -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img 
            src="{{ asset('admintemp/img/landing-slide1.jpg') }}" 
            class="d-block w-100" 
            alt="Slide 1"
            style="object-fit: cover; height: 400px;"
          >
        </div>
        <div class="carousel-item">
          <img 
            src="{{ asset('admintemp/img/landing-slide2.jpg') }}" 
            class="d-block w-100" 
            alt="Slide 2"
            style="object-fit: cover; height: 400px;"
          >
        </div>
        <div class="carousel-item">
          <img 
            src="{{ asset('admintemp/img/landing-slide3.jpg') }}" 
            class="d-block w-100" 
            alt="Slide 3"
            style="object-fit: cover; height: 400px;"
          >
        </div>
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- ========== SECTION TABEL JADWAL ========== -->
  <div id="jadwal" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2 class="mb-4">Jadwal</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="shadow-sm border-0 rounded overflow-hidden">
          <div class="bg-dark text-white text-center py-2">
            <h5 class="mb-0">Jadwal Baptisan</h5>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead class="bg-light text-center">
                  <tr>
                    <th>Tanggal Baptis</th>
                    <th>Tanggal Kelas</th>
                    <th>Hari Kelas</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($baptists) && $baptists->count() > 0)
                    @foreach($baptists as $baptist)
                      @foreach($baptist->details as $detail)
                        <tr>
                          {{-- Tanggal Baptisan --}}
                          <td>{{ $baptist->date }}</td>
                          
                          {{-- Tanggal Kelas --}}
                          <td>{{ $detail->date }}</td>

                          {{-- Hari Kelas --}}
                          <td>{{ \Carbon\Carbon::parse($detail->date)->format('l') }}</td>
                        </tr>
                      @endforeach
                    @endforeach
                  @else
                    <tr>
                      <td colspan="3" class="text-center">
                        Belum ada jadwal.
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div> <!-- end .table-responsive -->
          </div> <!-- end .card-body -->
        </div> <!-- end .card -->
      </div> <!-- end .col -->

      <div class="col-md-10 mt-5">
        <div class="shadow-sm border-0 rounded overflow-hidden">
          <div class="bg-dark text-white text-center py-2">
            <h5 class="mb-0">Jadwal Seminar</h5>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead class="bg-light text-center">
                  <tr>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Jam</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($seminars) && $seminars->count() > 0)
                    @foreach($seminars as $seminar)
                      <tr>
                        {{-- Tanggal --}}
                        <td>{{ $seminar->event_date }}</td>
                        
                        {{-- Hari --}}
                        <td>{{ \Carbon\Carbon::parse($seminar->date)->format('l') }}</td>

                        {{-- Jam --}}
                        <td>{{ \Carbon\Carbon::parse($seminar->start)->format('H:i') }}</td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="3" class="text-center">
                        Belum ada jadwal.
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div> <!-- end .table-responsive -->
          </div> <!-- end .card-body -->
        </div> <!-- end .card -->
      </div> <!-- end .col -->

    </div> <!-- end .row -->
  </div>
@endsection