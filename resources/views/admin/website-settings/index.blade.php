@extends('admin.layouts.layout')

@section('main-content')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اعدادات الموقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  اعدادات الموقع </span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">الاعدادات </h4>
                    </div>
                    <br>
                    <a style="font-family: 'IBM Plex Sans Arabic' " href="{{ route('admin.website-settings.create') }}" class="btn btn-dark text-white">اضافة الاعدادات </a>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>

                                <th>
                                    المتغير
                                </th>
                                <th>
                                    القيمة
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($settings as $item)
                                <tr>

                                    <td>
                                        {{ $item->key ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->value ?? '' }}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('admin.website-settings.edit', $item->id) }}" class="btn btn-icon"> 	<li class="icons-list-item"><i class="icon ion-md-build"></i></li> </a>
                                            <form action="{{ route('admin.website-settings.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-transparent btn-icon"> <li class="icons-list-item"><i class="icon ion-md-trash"></i></li> </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>

                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
