@extends('layouts.master')
@section('heading', 'Paramètres')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="row form-horizontal">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informations de base</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">Identité du
                                    producteur</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                    role="tab" aria-controls="v-pills-profile" aria-selected="false">Ménage du
                                    producteur</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                    role="tab" aria-controls="v-pills-messages" aria-selected="false">Production de
                                    mangue</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                                    role="tab" aria-controls="v-pills-settings" aria-selected="false">Photos</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Identité du producteur</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Ménage du producteur</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">



                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Production de mangues</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Photos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col -->
            </div>

        </div>
    </div>
@endsection
