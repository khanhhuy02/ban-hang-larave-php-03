@extends('backEnd.layout')

@section('conTenPass')

<style>
    .dataTables_paginate {
        display: none;

    }

    .modal-backdrop {
        display: none;
    }
</style>

<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">DANH SÁCH SẢN PHẨM</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">



                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                            <li class="nav-item btn btn-primary">
                                                <i class="ti-files "></i> <a href="{{route('list.create')}}" class="" style="color:blanchedalmond">Sản phẩm</a>
                                            </li>

                                            <li class="nav-item dropdown" style="margin-left: 10px;">
                                                <!-- <a class="nav-link " href="#"> -->
                                                <button type="submit" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sắp xếp
                                                </button>
                                                <!-- </a> -->
                                                <ul class="dropdown-menu text-center">
                                                    <li><a class="dropdown-item" href="#">Số Lượng</a></li>
                                                    <li><a class="dropdown-item" href="#">Giảm Giá</a></li>
                                                </ul>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </nav>



                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">TÌM KIẾM</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1142px;">
                                    <thead>
                                        <tr role="row">
                                            <!-- <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-sort="ascending" >STT</th> -->
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 173px;" aria-label="Category: activate to sort column ascending">Tên</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending">Hình ảnh</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Giá cũ</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 165px;" aria-label="Teacher: activate to sort column ascending">Giá mới</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Loại</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102px;" aria-label="Enrolled: activate to sort column ascending">Kho hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach ($dataList as $item)

                                        <tr role="row" class="odd">
                                            <td>{{$item->name}}</a></td>
                                            <td><img src="{{asset('admin/images/product')}}/{{$item->image}}" alt="" style="width: 100%;"></td>
                                            <td>{{$item->price_new}}</td>
                                            <td>{{$item->price_old}}</td>

                                     
                                            <td>{{$item->categories->names}}</td>
                                      

                                            <td></td>
                                            <td>còn hàng</td>
                                            <td>

                                                <form action="{{ route('product.destroy',['list' => $item->id]) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="Xóa" class="status_btn bg-danger" style="border: 0px solid">
                                                </form>

                                                <a href="{{route('product.show',['list' => $item->id] )}}" class="status_btn" style="color: black;">
                                                    sửa
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
        </div>
    </div>
</div>


@endsection