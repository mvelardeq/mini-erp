@extends('theme/sb/layout')

@section('title', 'Ascensores Industriales')

@section('contenido')
    <!-- Masthead-->
    <header class="masthead">
        @include('theme/sb/presentacion')
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        @include('estatica/servicios/servicios')
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        @include('estatica/obras/obras')
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        @include('estatica/nosotros/nosotros')
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        @include('estatica/equipo/equipo')
    </section>
    <!-- Clients-->
    <div class="py-5">
        @include('estatica/clientes/clientes')
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        @include('estatica/contactanos/contactanos')
    </section>
@endsection
