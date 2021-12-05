@extends('backend.masterBackend')
@section('title', 'Admin | Dashboard Admin')


@section('backend')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="row">
            <div class="col-lg-2 text-center">
                <img src="{{ asset('assets/img/logo-mts.jpeg') }}" width="300px" alt="">
            </div>
            <div class="col-lg-10">
                <div class="jumbotron jumbotron-fluid" style="background: rgb(4, 78, 10); border: 5px solid yellow">
                    <div class="container">
                        <h1 class="display-4" style="color: yellow">Selamat Datang di halaman dashboard</h1>
                        <p class="lead" style="color: yellow">MTs. MATHLA'UL ANWAR, <span class="lead"
                                style="color: yellow">KABUPATEN TANGERANG</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-lg-3 col-md-6">
            <div class="social-box facebook">
                <i class="fa fa-book"></i>
                <ul>
                    <li>
                        <span class="count">Total =</span>
                        <span style="color: red; font-weight:bold">{{ $mapel->count() }}</span>
                    </li>
                    <li>
                        <span>Mata Pelajaran</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="social-box twitter">
                <i class="fa fa-twitter"></i>
                <ul>
                    <li>
                        <span class="count">30</span> k
                        <span>friends</span>
                    </li>
                    <li>
                        <span class="count">450</span>
                        <span>tweets</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="social-box linkedin">
                <i class="fa fa-linkedin"></i>
                <ul>
                    <li>
                        <span class="count">40</span> +
                        <span>contacts</span>
                    </li>
                    <li>
                        <span class="count">250</span>
                        <span>feeds</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="social-box google-plus">
                <i class="fa fa-google-plus"></i>
                <ul>
                    <li>
                        <span class="count">94</span> k
                        <span>followers</span>
                    </li>
                    <li>
                        <span class="count">92</span>
                        <span>circles</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->

    @endsection
