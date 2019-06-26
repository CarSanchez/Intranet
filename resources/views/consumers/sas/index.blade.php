@extends('consumers.app.layout')

@section('title', 'Intranet SA')

@section('content-sas')
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade active show mt-5 ml-5" id="nav-index" role="tabpanel" aria-labelledby="nav-index-tab">

            <div class="container">
                <div class="row">
                    <div class="card panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title ml-3">Vista Rápida</h3>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center text-center">
                            <div class="col">
                                <div class="card" style="width: 10rem; height: 10rem;">
                                    <h2 class="mt-auto"><i class="fas fa-user"></i> 508</h2>
                                    <h4 class="mb-auto">Usuarios</h4>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 10rem; height: 10rem;">
                                    <h2 class="mt-auto"><i class="fas fa-user"></i> 508</h2>
                                    <h4 class="mb-auto">Usuarios</h4>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 10rem; height: 10rem;">
                                    <h2 class="mt-auto"><i class="fas fa-user"></i> 508</h2>
                                    <h4 class="mb-auto">Usuarios</h4>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 10rem; height: 10rem;">
                                    <h2 class="mt-auto"><i class="fas fa-user"></i> 508</h2>
                                    <h4 class="mb-auto">Usuarios</h4>
                                </div>
                            </div>
                            <a href="#">
                                <div class="col">
                                    <div class="card" style="width: 10rem; height: 10rem;">
                                        <h2 class="mt-auto"><i class="far fa-chart-bar"></i> 508</h2>
                                        <h4 class="mb-auto">Visitantes</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <h1>Hola mundo2</h1>
        </div>

    </div>
@endsection
