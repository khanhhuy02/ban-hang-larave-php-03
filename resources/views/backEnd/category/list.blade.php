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
<!-- DANH SACH SẢN PHẨM -->
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

                                            <li class="nav-item">
                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem"><i class="ti-files"></i> Sản Phẩm</button>
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
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending">Thứ tự</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending">Phân quyền</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending"></th>


                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($cat as $key => $item)
                                        <tr role="row" class="odd">
                                            <td>{{ $item->names }}</td>
                                            <td><img src="{{asset('admin/images/icon')}}/{{$item->icon}}" alt=""></td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->classify }}</td>
                                            <td>
                                                <a href="{{ route('editCat',['id' => $item->id]) }}" class="status_btn">sửa</a>
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


<!-- form thêm sản phẩm -->

<div class=" modal fade " id="addItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#ffdcdc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Sản Phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="{{ route('createCat') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 col-12">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input name="names" type="text" class="form-control">
                    </div>



                    <div class="mb-3 col-12">
                        <label class="form-label">hình ảnh</label>
                        <input name="icon" type="file" class="form-control">
                    </div>


                    <div class="mb-3 col-12">
                        <label class="form-label">Ẩn hiện</label> <br>
                        <label for="">Ẩn</label>
                        <input name="status" type="radio" value="0">
                        <label for="">Hiện</label>
                        <input name="status" type="radio" value="1" checked>
                    </div>


                    <div class="mb-3 col-6">
                        <label class="form-label">Thứ tự</label>
                        <input name="location" type="number" class="form-control">
                    </div>


                    <div class="mb-3 col-6">
                        <label class="form-label">Phân quyền</label>
                        <input name="classify" type="number" class="form-control">
                    </div>


                    <button type="submit" name="luu" class="btn btn-secondary mb-3">Tạo danh mục</button>
                </form>
            </div>
        </div>
    </div>
</div>



</div>


@endsection