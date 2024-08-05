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
                            <h3 class="m-0">DANH SÁCH LOẠI TIN TỨC</h3>
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

                                            <li >
                                                <button type="submit" class="nav-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem" ><i class="ti-files"></i> Loại tin tức</button>

                                            </li>

                                            <li class="nav-item dropdown" style="margin-left: 10px;">
                                                <!-- <a class="nav-link " href="#"> -->
                                                <button type="submit" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sắp xếp
                                                </button>
                                                <!-- </a> -->
                                                <!-- <ul class="dropdown-menu text-center">
                                                    <li><a class="dropdown-item" href="#">Số Lượng</a></li>
                                                    <li><a class="dropdown-item" href="#">Giảm Giá</a></li>
                                                </ul> -->
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
                                <table class="table lms_table_active dataTable no-footer dtr-inline table-all-product" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1142px;">
                                    <thead>
                                        <tr role="row">
                                            <!-- <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-sort="ascending" >STT</th> -->
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102px;" aria-label="Category: activate to sort column ascending"></th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 173px;" aria-label="Category: activate to sort column ascending">Thể loại</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending">Hình icon</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Đường dẫn</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $item)

                                        <tr role="row" class="odd" id="delete-product{{$item->id}}" style="width: 20px;">
                                            <td>
                                                <input type="checkbox" value="{{$item->id}}" class="checkbox-delete">
                                            </td>
                                            <td>{{$item->name}}</a></td>
                                            <td><img src="{{asset('admin/images/icon')}}/{{$item->icon}}" alt="" style="width: 100%;"></td>
                                            <td>{{$item->alias}}</td>
                                            <td>{{$item->status}}</td>


                                            <td>còn hàng</td>
                                            <td>

                                                <form action="{{ route('postCate.delete',['id' => $item->id]) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="Xóa" class="status_btn bg-danger" style="border: 0px solid">
                                                </form>

                                                <a href="{{route('postCate.showEdit',['id' => $item->id] )}}" class="status_btn" style="color: black;">
                                                    sửa
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>

                                                <input type="submit" class="btn btn-danger click-delete" value="Xóa" style="width: 200px;">
                                            </td>
                                        </tr>
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

<!-- thêm loại -->

<div class=" modal fade " id="addItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#ffdcdc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Sản Phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="{{ route('postCate.create') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 col-12">
                        <label class="form-label">Tên Loại tin tức</label>
                        <input name="name" type="text" class="form-control" id="title-product" onkeyup="ChangeToSlug();">
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label">Đường dẫn (slugs)</label>
                        <input name="alias" type="text" class="form-control" id="slug-product">
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

                

                    <button type="submit" name="luu" class="btn btn-secondary mb-3">Khởi tạo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.click-delete').click(function() {
            var array_delete = []; // Khởi tạo mảng rỗng

            $('.checkbox-delete:checked').each(function() {
                var delete_product = $(this).val();
                array_delete.push(delete_product);
            });

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                method: "get",
                // type:"delete",
                url: "{{route('product.deteleArray')}}",
                data: {
                    'array_delete': array_delete,
                },

                success: function(responsive) {
                    // window.location.reload();
                    $.each(array_delete, function(key, val) {
                        $('#delete-product' + val).remove();
                    })
                },
                error: function(responsive) {


                }
            })

        });

    })
</script>

@endsection