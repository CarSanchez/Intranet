@extends('consumers.app.layout')

@section('title', 'Intranet SA')

@section('content-sas')
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade active show mt-5 ml-5" id="nav-sa-index" role="tabpanel" aria-labelledby="nav-sa-index-tab">

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
                            <a href="#">
                                <div class="col">
                                    <div class="card" style="width: 10rem; height: 10rem;">
                                        <h2 class="mt-auto"><i class="fas fa-user"></i> {{ $visits->count() }}</h2>
                                        <h4 class="mb-auto">Visitantes</h4>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col">
                                    <div class="card" style="width: 10rem; height: 10rem;">
                                        <h2 class="mt-auto"><i class="far fa-chart-bar"></i> {{ $hits }}</h2>
                                        <h4 class="mb-auto">Entradas</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade show mt-5 ml-5" id="nav-sa-visits" role="tabpanel" aria-labelledby="nav-sa-visits-tab">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card panel-default">
                            <div class="panel-heading main-color-bg">
                                <h3 class="panel-title ml-3">Visitas: {{ $visits->count() }}</h3>
                            </div>
                            <div class="card-body d-flex justify-content-center align-items-center text-center">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Id</th>
                                        <th></th>
                                        <th></th>
                                        <th>Ip</th>
                                        <th></th>
                                        <th></th>
                                        <th>Hits</th>
                                        <th></th>
                                        <th></th>
                                        <th>Tiempo de visita</th>
                                        <th></th>
                                        <th></th>
                                        <th>Cliente</th>
                                    </tr>
                                    @forelse($visits as $visit)
                                        <tr>
                                            <td>{{ $visit->id }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $visit->ip }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $visit->hits }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ date('l, m F Y', strtotime($visit->visit_date)) }}</td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
