    <!doctype html>
    <html class="fixed">
        <head>
            <title>{{ config('app.name', 'Laravel') }}</title>
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
                            <a class="nav-link" href="{{url ('/portal')}}">
                                <i class="bx bx-home-alt" aria-hidden="true"></i>
                                <span>Home</span>
                            </a>                        
                        </li>

                        <x-side-link href="#" :active="request()->is('member-seminar*')" class="nav-parent" :items="[
                            ['url' => route('seminars.indexmember'), 'label' => 'Daftar Seminar'],
                            ['url' => route('seminars.certificate'), 'label' => 'Sertifikat Seminar'],
                        ]">
                            <i class="bx bx-bible" aria-hidden="true"></i>
                            <span>Seminar</span>
                        </x-side-link>
                        
                        <x-side-link href="#" :active="request()->is('member-baptist*')" class="nav-parent" :items="[
                            ['url' => route('memberbaptist.index'), 'label' => 'Daftar Pembaptisan'],
                            ['url' => route('memberbaptist.details'), 'label' => 'Kelas Pembaptisan'],
                            ['url' => route('baptist.certificate'), 'label' => 'Sertifikat Pembaptisan'],
                        ]">
                            <i class="bx bx-droplet" aria-hidden="true"></i>
                            <span>Pembaptisan</span>
                        </x-side-link>

                        <x-side-link href="{{route ('activities.member.index')}}" :active="request()->is('activities-member*')">
                            <i class="bx bx-calendar-event" aria-hidden="true"></i>
                            <span>Kegiatan</span>
                        </x-side-link>

                        <x-side-link href="#" :active="request()->is('member-scan*')" class="nav-parent" :items="[
                            ['url' => route('attendance.member.scan'), 'label' => 'Scan'],
                            ['url' => route('attendance.memberView'), 'label' => 'Riwayat'],
                        ]">
                            <i class="bx bx-camera" aria-hidden="true"></i>
                            <span>Absensi</span>
                        </x-side-link>

                        <x-side-link href="{{url ('certifications/upload')}}" :active="request()->is('certifications/upload')">
                            <i class="bx bx-user-plus" aria-hidden="true"></i>
                            <span>Pengajuan Keanggotaan</span>
                        </x-side-link>

                    </x-sidebar>

                    <section role="main" class="content-body">
                        <header class="page-header">
                            <!-- <h2 style="border-bottom: none">GBI Sungai Yordan</h2>                                                 -->
                            <div class="right-wrapper text-right" style="padding-right: 20px">
                                <ol class="breadcrumbs">
                                    <li>
                                        <a href="{{url ('/portal')}}">
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