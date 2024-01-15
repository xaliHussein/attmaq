@extends('admin.layouts.layout')

@section('main-content')
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto"> الخدمات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الخدمات</span>
							</div>
						</div>
					</div>
					<!-- row opened -->
					<div class="row row-sm">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">قائمه الخدمات</h4>
									</div>
                                    <br>
                                    <a style="font-family: 'IBM Plex Sans Arabic' " href="{{ route('admin.service.create') }}" class="btn btn-dark text-white">اضافة خدمة </a>


								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table mg-b-0 text-md-nowrap">
											<thead>
												<tr>
													<th>#</th>
													<th>صوره الخدمة</th>
													<th>عنوان الخدمة</th>
													<th> عمليات </th>
												</tr>
											</thead>
											<tbody>
                                            <?php
                                            $count = 1;
                                            ?>
                                            @foreach ($services as $item )
                                                <tr>
                                                    <th scope="row">{{ $count++ }}</th>
                                                    <td>
                                                        <img src="{{ asset('storage/' .$item->image) }}" width="100px" alt="">
                                                    </td>
                                                    <td>{{ $item->title }}</td>


                                                    <td>
                                                         <ion-icon name="trash-outline"></ion-icon>
                                                        <div class="row">
                                                            <a href="{{ route('admin.service.edit', $item->id) }}" class="btn btn-transparent btn-icon"> 	<li class="icons-list-item"><i class="icon ion-md-build"></i></li> </a>
                                                            <form action="{{ route('admin.service.destroy', $item->id) }}" method="POST">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button type="submit" class="btn btn-transparent btn-icon"> <li class="icons-list-item"><i class="icon ion-md-trash"></i></li> </button>


                                                            </form>



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
