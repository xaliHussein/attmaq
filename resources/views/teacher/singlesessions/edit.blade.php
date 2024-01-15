@extends('teacher.layouts.layout')

@section('main-content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحلقات الفردية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الحلقات الفردية</span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1"> حلقات فردية</h4>
                    <p class="mb-2">يرجى تعديل معلومات الحلقة الفردية</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('single-sessions.update',$single_session->id) }}" method="POST">
                        @method('PUT')
                        @csrf


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="progress" value="{{ $single_session->progress }}" class="form-control" id="inputName" placeholder="نسبة التقدم"
                                           required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="status" class="form-control select2-no-search">
                                            <option label="الحالة">
                                            </option>
                                            <option value="accept"  {{ $single_session->status == "accept"? 'selected' : '' }}  >
                                                تم القبول
                                            </option>

                                            <option value="in progress" {{ $single_session->status == "in progress"? 'selected' : '' }} >
                                                قيد التنفيذ
                                            </option>

                                            <option value="completed" {{ $single_session->status == "completed"? 'selected' : '' }} >
                                                تم الانتهاء
                                            </option>

                                        </select>
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
