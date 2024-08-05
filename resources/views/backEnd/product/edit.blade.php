@extends('backEnd.layout')

@section('conTenPass')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_30 f_w_700 dark_text">Sản Phẩm</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                    <!-- nut chọn đăng sản phẩm start-->

                    <!-- nut chọn đăng sản phẩm end -->


                </div>
            </div>
        </div>

        <div class="tab-content" id="myTabContent">


            <form action="{{ route('product.update', ['list' => $dataList->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- ĐIỆN THOẠI START -->
                <div class="row ">
                    <div class="col-12">
                        <div class="white_card position-relative mb_20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center"><img src="{{asset('admin/images/product')}}/{{$dataList->image}}" alt="" class="mx-auto d-block" height="50%" width="50%">

                                        <input type="file" name="image" value="{{asset('admin/images/product')}}/{{$dataList->image}}" class="mt-5">
                                        <input type="file" name="sub_image[]" value="{{asset('admin/images/product')}}/{{$dataList->sub_image}}" class="mt-2" multiple>
                                    </div>
                                    <div class="col-lg-6 align-self-center">
                                        <div class="single-pro-detail">
                                            <p class="mb-1">Điện thoại</p>
                                            <div class="custom-border mb-3"></div>
                                            <input type="text" name="name"  id="title-product" class="p-2 col-8" value="{{$dataList->name}}">
                                            <div class="mb-3"></div>
                                            <p class="mb-1">Đường dẫn(Slug)</p>
                                            <input type="text" name="alias_sp" class="p-2 col-10" id="slug-product" value="{{$dataList->alias_sp}}">


                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="">Giá cả</label>
                                                    <input type="number" name="price_old" value="{{$dataList->price_old}}">
                                                </div>
                                                <div class="col-4">
                                                    <label for="">Giá giảm</label>
                                                    <input type="number" name="price_new" value="{{$dataList->price_new}}">
                                                </div>
                                            </div>


                                            <div class="mt-2 mb-3">
                                                <label for="" class="mb-2">Ẩn hiện</label> <br>
                                                <label for="">Ẩn </label>
                                                <input type="radio" name="status" value="0">

                                                <label for="" style="margin-left: 20px;">hiện</label>
                                                <input type="radio" name="status" value="1" checked>
                                            </div>


                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="">Loại</label>
                                                    <select name="categories_id" class="form-select form-select-sm" aria-label="Small select example">

                                                        @foreach ($category_products as $item)
                                                        <option value="{{$item->id}}">{{$item->names}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label for="">Hãng</label>
                                                    <select name="brands_id" class="form-select form-select-sm" aria-label="Small select example">

                                                        @foreach ($category_brand as $item)
                                                        <option value="{{$item->id}}">{{$item->names}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class=" mt-3">
                                                <label for="">Số lượng trong kho </label>

                                                <input class="form-control form-control-sm" name="quantity" type="number" min="0" value="{{$dataList->quantity}}" id="example-number-input">
                                            </div> -->
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="custom-border mb-5"></div>

                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th scope="col" colspan='4' style="text-align: center;">
                                                        <h2>Thông tin sản phẩm</h2>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <textarea name="information_engineering" id="editor2" rows="100" cols="100">{{$dataList->information_engineering}}</textarea>

                                                            </div>

                                                            <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
                                                            <script>
                                                                CKEDITOR.replace('editor2');
                                                            </script>

                                                        </div>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">

                                            <textarea name="description" id="editor1" rows="100" cols="100">{{$dataList->description}}</textarea>

                                        </div>

                                        <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="submit" class="white_btn3 m-5" value="Thêm sản phẩm ">
                    </div>
                </div>
                <!-- ĐIỆN THOẠI END -->

                <!-- MÁY TÍNH BÀN END -->
            </form>
            <!-- LAPTOP START-->

            @endsection