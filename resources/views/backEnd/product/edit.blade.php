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

            @foreach($category_products as $itemss)
            @if($itemss->classify == 1 && $itemss->id == $dataList->categories_id )
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
                                            <input type="text" name="name" id="" class="p-2 col-8" value="{{$dataList->name}}">
                                            <div class="mb-3"></div>

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
                                                <input type="radio" name="hidden" value="0">

                                                <label for="" style="margin-left: 20px;">hiện</label>
                                                <input type="radio" name="hidden" value="1" checked>
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

                                            <div class=" mt-3">
                                                <label for="">Số lượng trong kho </label>

                                                <input class="form-control form-control-sm" name="quantity" type="number" min="0" value="{{$dataList->quantity}}" id="example-number-input">
                                            </div>
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
                                                    <th scope="row">Màng Hình</th>
                                                    <td colspan='3'><input type="text" name="screen" class="col-12 p-1" value="{{$dataList->screen}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Hệ điều hành</th>
                                                    <td colspan='3'><input type="text" name="operating_system" class="col-12 p-1" value="{{$dataList->operating_system}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Camera Trước</th>
                                                    <td colspan='3'><input type="text" name="camera_before" class="col-12 p-1" value="{{$dataList->camera_before}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Camera sau</th>
                                                    <td colspan='3'><input type="text" name="camera_after" class="col-12 p-1" value="{{$dataList->camera_after}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Vi xử lý (chip)</th>
                                                    <td colspan='3'><input type="text" name="chip" class="col-12 p-1" value="{{$dataList->chip}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                <tr>
                                                    <th scope="row">Ram</th>
                                                    <td colspan='3'><input type="text" name="ram" class="col-12 p-1" value="{{$dataList->ram}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                    <th scope="row">bộ lưu trữ</th>
                                                    <td colspan='3'><input type="text" name="capacity" class="col-12 p-1" value="{{$dataList->capacity}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Sim</th>
                                                    <td colspan='3'><input type="text" name="sim" class="col-12 p-1" value="{{$dataList->sim}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Dung lượng pin</th>
                                                    <td colspan='3'><input type="text" name="pin" class="col-12 p-1" value="{{$dataList->pin}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ngày ra mắt sản phẩm</th>
                                                    <td colspan='3'><input type="date" name="meeting_day" class="col-12 p-1"> {{$dataList->meeting_day}}</td>
                                                    <td></td>
                                                    <td></td>
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
            @elseif ($itemss->classify == 2 && $itemss->id == $dataList->categories_id )
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
                                            <p class="mb-1">Laptop</p>
                                            <div class="custom-border mb-3"></div>
                                            <input type="text" name="name" id="" class="p-2 col-8" value="{{$dataList->name}}">
                                            <div class="mb-3"></div>

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
                                                <input type="radio" name="hidden" value="0">

                                                <label for="" style="margin-left: 20px;">hiện</label>
                                                <input type="radio" name="hidden" value="1" checked>
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

                                            <div class=" mt-3">
                                                <label for="">Số lượng trong kho </label>

                                                <input class="form-control form-control-sm col-8" name="quantity" type="number" min="0" value="0" id="example-number-input" value="{{$dataList->quantity}}">
                                            </div>
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
                                                    <th scope="row">Màng Hình</th>
                                                    <td colspan='3'><input type="text" name="screen" class="col-12 p-1" value="{{$dataList->screen}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Hệ điều hành</th>
                                                    <td colspan='3'><input type="text" name="operating_system" class="col-12 p-1" value="{{$dataList->operating_system}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Camera Trước</th>
                                                    <td colspan='3'><input type="text" name="camera_before" class="col-12 p-1" value="{{$dataList->camera_before}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Vi xử lý (CPU)</th>
                                                    <td colspan='3'><input type="text" name="chip" class="col-12 p-1" value="{{$dataList->chip}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                <tr>
                                                    <th scope="row">Ram</th>
                                                    <td colspan='3'><input type="text" name="ram" class="col-12 p-1" value="{{$dataList->ram}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                    <th scope="row">bộ lưu trữ </th>
                                                    <td colspan='3'><input type="text" name="capacity" class="col-12 p-1" value="{{$dataList->capacity}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Dung lượng pin</th>
                                                    <td colspan='3'><input type="text" name="pin" class="col-12 p-1" value="{{$dataList->pin}}"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ngày ra mắt sản phẩm</th>
                                                    <td colspan='3'><input type="date" name="meeting_day" class="col-12 p-1" value="{{$dataList->meeting_day}}"></td>
                                                    <td></td>
                                                    <td></td>
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

                    </div>
                </div>
                <!-- ĐIỆN THOẠI END -->
                <input type="submit" class="white_btn3 m-5" value="Thêm sản phẩm">




                <!-- MÁY TÍNH BÀN END -->
            </form>
            @endif
            <!-- LAPTOP START -- -->
            @endforeach
            @endsection