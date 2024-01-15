@extends('teacher.layouts.layout')

@section('main-content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الدورات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  قائمة الدورات </span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1"> الدورات </h4>
                    <p class="mb-2">يرجى ادخال معلومات الدورة </p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="عنوان الدورة"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control" id="inputName" placeholder="تفاصيل الدورة"
                                           required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="date" name="start" class="form-control" id="inputName" placeholder="تاريخ بداية الدورة"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="date" name="end" class="form-control" id="inputName" placeholder="تاريخ نهاية الدورة"
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
        <!--/div-->


        <!--/div-->
    </div>
@endsection
