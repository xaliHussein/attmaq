@extends('admin.layouts.layout')

@section('main-content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">  الكتب  </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{  $quran->name }}</span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1"> الكتاب </h4>
                    <p class="mb-2">يرجى ادخال معلومات الكتاب</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('books.update',$quran->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" name="name" value="{{ $quran->name }}" class="form-control" id="inputName" placeholder="عنوان الحلقة الجماعية"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>  صورة الغلاف </label>
                                    <input type="file" name="image" class="form-control" id="inputName" placeholder="صورة الغلاف"
                                           >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> ملف الكتاب </label>
                                    <input type="file" name="content" class="form-control" id="inputName" placeholder="ملف الكتاب"
                                           >
                                </div>
                            </div>
                        </div>





                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="gender" class="form-control select2-no-search">
                                        <option label="الجنس">
                                        </option>
                                        <option value="male" <?php if ($teacher->gender == 'male') echo 'selected' ?>>
                                            ذكر
                                        </option>
                                        <option value="female" <?php if ($teacher->gender == 'female') echo 'selected' ?>>
                                            انثى
                                        </option>
                                    </select>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ $teacher->email }}" class="form-control" id="inputName"
                                        placeholder="البريد الالكتروني" required>
                                </div>
                            </div>

                        </div> --}}



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
