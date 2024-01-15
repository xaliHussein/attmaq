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
                    <form class="form-horizontal" action="{{ route('admin.website-settings.update', $settings->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="key" value="{{$settings->key}}"   class="form-control" id="inputName" placeholder="المتغير"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @if ($settings->type == 'image')
                                        <input type="file" name="value" value="{{$settings->value}}"  class="form-control" id="inputName" placeholder="القيمة"
                                               required>
                                        @else

                                        <input type="text" name="value" value="{{$settings->value}}"  class="form-control" id="inputName" placeholder="القيمة"
                                               required>
                                    @endif

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
