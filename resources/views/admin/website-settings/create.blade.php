@extends('admin.layouts.layout')

@section('main-content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اعدادات الموقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تحرير الاعدادات
                    </span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1">الاعدادات </h4>

                </div>
                <div class="card-body pt-0">


                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">نص</a></li>
                                    <li><a href="#tab5" class="nav-link" data-toggle="tab">صورة</a></li>
                                    <li><a href="#tab6" class="nav-link" data-toggle="tab">رابط</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <form class="form-horizontal" action="{{ route('admin.website-settings.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="key"   class="form-control" id="inputName" placeholder="المتغير"
                                                           required>
                                                    <input type="hidden" name="type" value="text"   class="form-control" id="inputName" placeholder="المتغير"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="value"  class="form-control" id="inputName" placeholder="القيمة"
                                                           required>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group mb-0 mt-3 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-secondary">حفظ</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane" id="tab5">
                                    <form class="form-horizontal" action="{{ route('admin.website-settings.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="key"   class="form-control" id="inputName" placeholder="المتغير"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="custom-file-input" name="value" id="customFile" type="file"> <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group mb-0 mt-3 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-secondary">حفظ</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane" id="tab6">
                                    <form class="form-horizontal" action="{{ route('admin.website-settings.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="key"   class="form-control" id="inputName" placeholder="المتغير"
                                                           required>
                                                    <input type="hidden" name="type" value="link"   class="form-control" id="inputName" placeholder="المتغير"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="value"  class="form-control" id="inputName" placeholder="القيمة"
                                                           required>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group mb-0 mt-3 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-secondary">حفظ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--/div-->


        <!--/div-->
    </div>
@endsection
