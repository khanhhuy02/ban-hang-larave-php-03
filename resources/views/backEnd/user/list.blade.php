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
                                            <!-- <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending">Hình ảnh</th> -->
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Email</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 165px;" aria-label="Teacher: activate to sort column ascending">Vai trò</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach ($listUser as $item)

                                        <tr role="row" class="odd">
                                            <td>{{$item->name}}</a></td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                @if($item->role == 1)
                                                Quản trị viên

                                                @else
                                                Khách hàng

                                                @endif
                                            </td>

                                            <td></td>
                                            <td>

                                                <form action="{{ route('deleteAccount.list',['id' => $item->id]) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="Xóa" class="status_btn bg-danger" style="border: 0px solid">
                                                </form>

                                                <!-- <a href="{{route('deleteAccount.list',['id' => $item->id] )}}" class="status_btn" style="color: black;">
                                                    sửa
                                                </a> -->
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


<!-- form add sản phẩm Start-->

<div class=" modal fade " id="addItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#ffdcdc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Sản Phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row" action="{{route('createAcount')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 col-12">
                        <label class="form-label">Họ và tên</label>
                        <input name="name" type="text" class="form-control">
                    </div>


                    <div class="mb-3 col-12">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control">
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label">Mật khẩu</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Vai trò</label>
                        <select name="role" class="form-select form-select-sm col-6" aria-label="Small select example">
                            <option value="0">Khách hàng</option>
                            <option value="1">Quản trị viên</option>
                        </select>
                    </div>
                    <button type="submit" name="luu" class="btn btn-secondary mb-3">Tạo danh mục</button>
                </form>
            </div>


        </div>
    </div>
</div>


<!-- form add sản phẩm End-->


<!-- form Update sản phẩm Start-->


<!-- form Update sản phẩm End-->


</div>
@endsection