<!doctype html>
<html class="fixed">
	<head>
        <title>{{ config('app.name', 'Laravel') }}</title>
		{{-- <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script> --}}
        @include('admin.css')        
        <style>

            html,
            body{
                background: rgb(35, 35, 35);
            }

            /* ==================== HEADER ==================== */
            .header {
                background: rgb(30 30 30);
                border-bottom: 0.5px solid rgb(231, 237, 237);
                border-top: 3px solid rgba(231, 237, 237,0);                
            }
            .header .logo img {
                border-radius: 50%;
            }
            .header .separator {
                background-image: none;
            }
            .userbox .name {
                color: #5d5d5d;
            }
            .userbox .custom-caret {
                color: #c3c3c3;
            }
            .dropdown-menu {
                background-color: #252a2c;
            }
            /* ==================== ENDHEADER ==================== */

            /* ==================== SIDE BAR ==================== */
            #sidebar-left{
                background: linear-gradient(190deg, rgb(30,30,30), rgb(18,18,18),rgb(33, 66, 94), rgb(101, 146, 125));
            }
            .sidebar-left .sidebar-header .sidebar-title  {
                background: linear-gradient(to right,rgb(27,27,27),rgb(29,29,29));
            }
            #sidebar-left .nano{
                background: rgba(0,0,0,0);
            }
            #sidebar-left .nano .nano-content {
                background: linear-gradient(190deg, rgb(30,30,30), rgb(18,18,18),rgb(33, 66, 94), rgb(101, 146, 125));
            }
            #sidebar-left .nav-main ul li a {
                color: white !important;
            }
            #sidebar-left .nav-main ul li a:hover {
                background-color:rgba(255, 255, 255, 0.05) !important; /* Hover dengan biru lebih gelap */
                color: white !important;
            }

            li.nav-parent,
            a.nav-link,
            li.nav-expanded,
            ul.nav.nav-children,
            ul.nav.nav-children li {
                background: rgba(0, 0, 0, 0);
            }
            /* ==================== END SIDE BAR ==================== */

            /* ==================== PAGE HEADER ==================== */
            .page-header {
                background: rgb(30,30,30);
                border-left: none;
                box-shadow: 1px 0.5px 0 0.5px rgb(204, 204, 204);
            }
            /* ==================== END PAGE HEADER ==================== */


            /* ==================== WIDGET DASHBOARD ==================== */
            html .card-featured-quaternary {
                border-color: rgb(231, 237, 237);
            }
            html .card-featured-quaternary .card-body{
                background: rgb(65, 65, 65);
            }
            .widget-summary .summary .title{
                color: rgb(240, 240, 240);
            }
            /* ==================== END WIDGET DASHBOARD ==================== */

            /* ==================== CARD TABLE ==================== */
            section.card header.card-header {
                background: #000;
            }
            section.card header.card-header .card-title {
                color: #c4c4c4;
                font-weight: 500;
            }
            section.card .card-body {
                background: rgb(60 60 60);
                color: white;
            }
            section.card .card-body table {
                color: #f1f1f1;
            }

            .btn {
                border: none;
                font-weight: 200;                
                color: #ffffff;
            }
            .btn-success {
                background: #517651;
            }
            .btn.btn-primary {
                background-color: #286a8b;
            }
            .btn.btn-secondary {
                background-color: #935a56;
            }
            .card-footer {
                background:rgba(0, 0, 0, 0);
            }
            /* ==================== END CARD TABLE ==================== */



        </style>
	</head>
	<body>
        <section class="body">

			@include('admin.header')

			<div class="inner-wrapper">

                <x-sidebar>

                    <li>			
                        <a class="nav-link" href="{{url ('dashboard')}}">
                            <i class="bx bx-church" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>                        
                    </li>

                    <!-- ================= ADMIN ================= -->
                    @if(auth()->user()->hasRole('Admin'))
                        <x-side-link href="#" :active="request()->is('seminars*') || request()->is('attendance-seminars*') || request()->is('generate-seminar*')" class="nav-parent" :items="[
                                ['url' => url('seminars'), 'label' => 'List Seminar'],
                                ['url' => url('attendance-seminars'), 'label' => 'List Peserta Seminar'],
                                ['url' => url('generate-seminar'), 'label' => 'List Setifikat Seminar'],
                            ]">
                            <i class="bx bx-bible" aria-hidden="true"></i>
                            <span>Seminar</span>
                        </x-side-link>
                        
                        <x-side-link href="#" :active="request()->is('baptist*') || request()->is('generate-pembaptisan*')" class="nav-parent" :items="[
                                ['url' => url('baptist'), 'label' => 'List Jadwal Pembaptisan'],
                                ['url' => url('generate-pembaptisan'), 'label' => 'List Setifikat Pembaptisan'],
                            ]">
                            <i class="bx bx-droplet" aria-hidden="true"></i>
                            <span>Pembaptisan</span>
                        </x-side-link>

                        <x-side-link href="#" :active="request()->is('activities*')" class="nav-parent" :items="[
                            ['url' => url('activities'), 'label' => 'List Pengajuan'],
                            ['url' => route('listactivities.index'), 'label' => 'List Kegiatan'],
                        ]">
                            <i class="bx bx-calendar-event" aria-hidden="true"></i>
                            <span>Kegiatan</span>
                        </x-side-link>

                        <x-side-link href="{{url ('/member-checklist')}}" :active="request()->is('member-checklist*') || request()->is('attendance-members*')">
                            <i class="bx bx-task" aria-hidden="true"></i>
                            <span>Absensi</span>
                        </x-side-link>

                    @endif
                    <!-- ================= END ADMIN ================= -->

                    <!-- ================= SUPER ADMIN ================= -->
                    @if(auth()->user()->hasRole('SuperAdmin'))

                        <x-side-link1 href="#" :active="request()->is('master-data*')" icon="bx bx-data" class="nav-parent" :items="[
                            ['url' => url('master-data/branch'), 'label' => 'Cabang',],
                            ['url' => url('master-data/position'), 'label' => 'Posisi',],
                            ['url' => url('#'), 'label' => 'Keanggotaan', 'items' => [
                                    ['url' => url('master-data/member'), 'label' => 'Anggota',],
                                    ['url' => url('master-data/certifications'), 'label' => 'Verifikasi Keanggotaan',],
                                ],
                            ],
                            ['url' => url('#'), 'label' => 'Jadwal', 'items' => [
                                    ['url' => url('master-data/type'), 'label' => 'Tipe Jadwal',],
                                    ['url' => url('master-data/category'), 'label' => 'Kategori Jadwal',],
                                    ['url' => url('master-data/schedule-member'), 'label' => 'List Jadwal',],
                                ],
                            ],
                        ]">
                            <span>Master Data</span>
                        </x-side-link1>                     
                       
                        <x-side-link href="#" :active="request()->is('seminars*') || request()->is('attendance-seminars*') || request()->is('generate-seminar*')" class="nav-parent" :items="[
                                ['url' => url('seminars'), 'label' => 'List Seminar'],
                                ['url' => url('attendance-seminars'), 'label' => 'List Peserta Seminar'],
                                ['url' => url('generate-seminar'), 'label' => 'List Setifikat Seminar'],
                            ]">
                            <i class="bx bx-bible" aria-hidden="true"></i>
                            <span>Seminar</span>
                        </x-side-link>
                        
                        <x-side-link href="#" :active="request()->is('baptist*') || request()->is('generate-pembaptisan*')" class="nav-parent" :items="[
                                ['url' => url('baptist'), 'label' => 'List Jadwal Pembaptisan'],
                                ['url' => url('generate-pembaptisan'), 'label' => 'List Setifikat Pembaptisan'],
                            ]">
                            <i class="bx bx-droplet" aria-hidden="true"></i>
                            <span>Pembaptisan</span>
                        </x-side-link>

                        <x-side-link href="#" :active="request()->is('activities*') || request()->is('activity*')" class="nav-parent" :items="[
                            ['url' => url('activities'), 'label' => 'List Pengajuan'],
                            ['url' => route('listactivitiesmember.index'), 'label' => 'List Kegiatan'],
                        ]">
                            <i class="bx bxs-calendar-event" aria-hidden="true"></i>
                            <span>Kegiatan</span>
                        </x-side-link>

                        <x-side-link href="{{url ('/member-checklist')}}" :active="request()->is('member-checklist*') || request()->is('attendance-members*')">
                            <i class="bx bx-task" aria-hidden="true"></i>
                            <span>Absensi</span>
                        </x-side-link>

                        <!-- <x-side-link href="{{ url ('scheduling')}}" :active="request()->is('scheduling*')">
                            <i class="bx bx-calendar" aria-hidden="true"></i>
                            <span>Penjadwalan</span>
                            </x-side-link>
                            <x-side-link1 href="#" :active="request()->is('sunday-school*')" icon="bx bx-home-smile" class="nav-parent" :items="[
                            ['url' => url('sunday-school/sunday-classes'), 'label' => 'List Kelas',],
                            ['url' => url('sunday-school/qr-code/children'), 'label' => 'List Anak',],
                            ['url' => url('#'), 'label' => 'Absensi', 'items' => [
                                    ['url' => url('sunday-school/attendance/class'), 'label' => 'Scan',],
                                    ['url' => url('sunday-school/attendance/history'), 'label' => 'Riwayat Absensi Sekolah Minggu',],
                                    ['url' => url('sunday-school/reports'), 'label' => 'Laporan Sekolah Minggu',],
                                ],
                            ],
                            ]">
                            <span>Sekolah Minggu</span>
                            </x-side-link1>  
                        -->

                    @endif
                    <!-- ================= END SUPER ADMIN ================= -->

                </x-sidebar>

				<section role="main" class="content-body">
					<header class="page-header">
						<!-- <h2 style="border-bottom: none">GBI Sungai Yordan</h2> -->
                        <!-- <h2 style="border-bottom: none">
                            {{ Str::title(str_replace('-', ' ', count(request()->segments()) > 1 ? request()->segment(2) : request()->segment(1))) }}
                        </h2> -->
						<div class="right-wrapper text-right" style="padding-right: 20px">
							<ol class="breadcrumbs">
								<li>
									<a href="{{url ('dashboard')}}">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
							</ol>
						</div>
					</header>
                    {{ $slot }}
				</section>
			</div>
		</section>
		@include('admin.script')
	</body>
</html>