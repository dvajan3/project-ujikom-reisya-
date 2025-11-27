@extends('layouts.app')

@section('title', 'About - Reisya Majalah')

@section('content')
<!-- About US Start -->
<div class="about-area">
    <div class="container">
        <!-- Hot Aimated News Tittle-->
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-tittle">
                    <strong></strong>
                    <div class="trending-animated">
                        <ul id="js-news" class="js-hidden">
                            <li class="news-item">Welcome to Reisya Majalah - Your trusted news source</li>
                            <li class="news-item">Delivering quality journalism since 2020</li>
                            <li class="news-item">Stay informed with the latest news and updates</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- About Details -->
                <div class="about-right mb-90">
                    <div class="about-img">
                        <img src="{{ asset('assets/img/about/about_1.jpg')}}"width="350" height="380" alt="">
                    </div>
                    <div class="section-tittle mb-30 pt-30">
                        <h3>Tentang Kami</h3>
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25">SMK BAKTI NUSANTARA 666 adalah pusat keunggulan yang terdapat berbagai macam jurusan yang di butuhkan di dunia kerja</p>
                        <p class="about-pera1 mb-25">Terdapat berbagai kegiatan ekstrakurikuler,kegiatan keagamaan dan perlombaan jurusan</p>
                        <p class="about-pera1 mb-25">Di sekolah SMK BAKTI NUSANTARA 666 juga meiliki program khusus untuk menyalurkan minat dan bakat siswa/i dalam berbagai bidang , seperti desain grafis, fotografi, videografi, dan pembuatan aplikasi gim</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About US End -->
@endsection