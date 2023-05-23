@extends('layouts.main',['title' => 'Home'])

@section('container')
@section('rumah','active')
    <section id="hero">

        <div class="hero-content d-flex" data-aos="fade-up">
            <div>
                <h2>Making <span>your report</span><br>useful!</h2>
                <a href="{{ route('timelines.index') }}" class="btn-get-started scrollto">Timeline</a>
                @auth
                    <a href="{{ route('report.create') }}" class="btn-projects scrollto">Make a Report</a>
                @else
                    <a href="{{ route('login.index') }}" class="btn-projects scrollto">Register</a>
                @endauth
            </div>
        </div>

        <div class="hero-slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/1.jpg');"></div>
            </div>
        </div>

    </section><!-- End Hero Section -->

    <section id="about">
        <div class="container " data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 about-img ">
                    <img src="/img/home-img.jpeg" alt="" >
                </div>

                <div class="col-lg-6 align-self-center content">
                    <h2>What is Silam?</h2>
                    <h3>Silam adalah sebuah aplikasi web yang bertujuan untuk mengumpulkan informasi terkait bencana alam
                        yang terjadi di suatu wilayah. Aplikasi ini dapat digunakan oleh masyarakat, para relawan, dan
                        petugas penanggulangan bencana untuk memberikan informasi terkait bencana yang terjadi, seperti
                        jenis bencana, lokasi, waktu kejadian, tingkat kerusakan, dan keparahan bencana.</h3>
                </div>
            </div>

        </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Advantages and Benefits</h2>
                <p>Sebuah aplikasi web pelaporan bencana dapat memberikan beberapa manfaat dalam hal persiapan, respons, dan
                    upaya pemulihan. Berikut adalah beberapa manfaat potensialnya:</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a>Pelaporan dan Respons Cepat</a></h4>
                        <p class="description">Aplikasi web ini memungkinkan pelaporan cepat dan efisien terkait insiden
                            terkait bencana, seperti banjir, gempa bumi, kebakaran, atau badai. Pelaporan yang tepat waktu
                            ini dapat membantu layanan darurat dan organisasi bantuan untuk merespons dengan lebih cepat dan
                            mengalokasikan sumber daya dengan efektif, yang potensial dapat menyelamatkan nyawa dan
                            mengurangi kerusakan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a>Koordinasi dan Kolaborasi</a></h4>
                        <p class="description"> Aplikasi web ini memfasilitasi koordinasi dan kolaborasi antara berbagai
                            pemangku kepentingan yang terlibat dalam manajemen bencana. Aplikasi ini dapat berfungsi sebagai
                            platform sentral untuk berbagi informasi, mengkoordinasikan operasi penyelamatan dan bantuan,
                            serta menggerakkan sumber daya dari berbagai organisasi, relawan, dan masyarakat yang terkena
                            dampak.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a>Keterlibatan dan Pemberdayaan Masyarakat</a></h4>
                        <p class="description">Aplikasi web ini mendorong partisipasi masyarakat dengan memungkinkan
                            individu melaporkan insiden, berbagi informasi, dan berkontribusi pada upaya respons secara
                            keseluruhan. Hal ini memberdayakan masyarakat untuk secara aktif terlibat dalam manajemen
                            bencana, membentuk rasa ketangguhan dan tanggung jawab kolektif.</p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a>Peringatan Dini dan Kesiapsiagaan</a></h4>
                        <p class="description">Aplikasi web pelaporan bencana dapat berfungsi sebagai sistem peringatan
                            dini, yang memungkinkan pengguna untuk melaporkan dan berbagi informasi tentang bencana yang
                            potensial atau sedang terjadi. Hal ini membantu otoritas dan masyarakat menjadi lebih siap dan
                            mengambil langkah-langkah pencegahan yang diperlukan untuk mengurangi dampak bencana.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
    </div>
    </div>
    </div>
@endsection
