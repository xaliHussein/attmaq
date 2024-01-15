@extends('teacher.layouts.layout')

@section('main-content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحلقات الفردية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  الحلقات الفردية</span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">قائمه الحلقات الفردية</h4>
                    </div>
                    <br>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> اسم الطالب </th>
                                <th>  نسبة التقدم </th>
                                <th> عمليات </th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            ?>

                            @foreach ($activeSingleSessions as $sessionItem )
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>{{ $sessionItem->student['name']}}</td>
                                    <td>{{ $sessionItem->progress }} %</td>


                                    <td>
                                        {{-- <ion-icon name="trash-outline"></ion-icon> --}}
                                        <div class="row">
                                            <a href="{{ route('single-sessions.edit', $sessionItem->id) }}" class="btn btn-transparent btn-icon"> 	<li class="icons-list-item"><i class="icon ion-md-settings"></i></li> </a>
                                            <a href="{{ route('single-sessions.course-list', $sessionItem->id) }}" class="btn btn-transparent btn-icon"> 	<li class="icons-list-item"><i class="icon ion-md-eye"></i></li> </a>
                                            <a href="{{ route('single-sessions.send-notifications', $sessionItem->id) }}" class="btn btn-transparent btn-icon"> 	<li class="icons-list-item"><i class="icon ion-md-notifications"></i></li> </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->


        <!--/div-->
    </div>
@endsection
