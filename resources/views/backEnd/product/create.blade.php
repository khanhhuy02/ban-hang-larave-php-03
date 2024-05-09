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
                    <div class="white_card_header">
                        <div class="bulder_tab_wrapper">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="iphone-tab" data-bs-toggle="tab" href="#iphone" role="tab" aria-controls="iphone" aria-selected="true">Điện thoại</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Lablet-tab" data-bs-toggle="tab" href="#Lablet" role="tab" aria-controls="Lablet" aria-selected="false">Lablet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="PC-tab" data-bs-toggle="tab" href="#PC" role="tab" aria-controls="PC" aria-selected="false">PC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Laptop-tab" data-bs-toggle="tab" href="#Laptop" role="tab" aria-controls="Laptop" aria-selected="false">Laptop</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="aside-tab" data-bs-toggle="tab" href="#aside" role="tab" aria-controls="aside" aria-selected="false">aside</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="footer_tb-tab" data-bs-toggle="tab" href="#footer_tb" role="tab" aria-controls="aside" aria-selected="true">footer</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- nut chọn đăng sản phẩm end -->


                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">

            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="tab-pane fade row" id="iphone" role="tabpanel" aria-labelledby="iphone-tab">
                @csrf
                <!-- ĐIỆN THOẠI START -->
                <div class="row ">
                    <div class="col-12">
                        <div class="white_card position-relative mb_20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center"><img src="" alt="" class="mx-auto d-block" height="50%" width="50%">

                                        <input type="file" name="image" class="mt-5">
                                        <input type="file" name="sub_image[]"  class="mt-2" multiple>

                                    </div>

                                    <div class="col-lg-6 align-self-center">
                                        <div class="single-pro-detail">
                                            <p class="mb-1">Điện thoại</p>
                                            <div class="custom-border mb-3"></div>

                                            <input type="text" name="name" id="" class="p-2 col-10" placeholder="Tên sản phẩm....">
                                            <div class="mb-3"></div>

                                            <div class="row">
                                                <div class="col-4 ml-2">
                                                    <label for="">Giá cả</label>
                                                    <input type="number" name="price_old">
                                                </div>


                                                <div class="col-4">
                                                    <label for="">Giá giảm</label>
                                                    <input type="number" name="price_new">
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

                                            <!-- <h6 class="text-muted font_s_13 mt-2 mb-1">Features :</h6>
                                    <ul class="list-unstyled pro-features border-0">
                                        <li>It is a long established fact that a reader will be distracted.</li>
                                        <li>Contrary to popular belief, Lorem Ipsum is not text.</li>
                                    </ul> -->
                                            <!-- <h6 class="text-muted font_s_13 d-inline-block align-middle me-2">Biến thể </h6>
                                    <div class="radio2 radio-info2 form-check-inline ms-2">
                                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                        <label class="form-label" for="inlineRadio1"></label>
                                    </div>
                                    <div class="radio2 radio-dark2 form-check-inline">
                                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                        <label class="form-label" for="inlineRadio2"></label>
                                    </div> -->
                                            <div class=" mt-3 col-10 ">
                                                <label for="">Số lượng trong kho </label>

                                                <input class="form-control form-control-sm" name="quantity" type="number" min="0" value="0" id="example-number-input">
                                                <!-- <a href="" class="btn theme_bg_6 text-white px-4 d-inline-block "><i class="fa fa-cart-plus me-2"></i>Add to Cart</a> -->
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
                                                    <td colspan='3'><input type="text" name="screen" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Hệ điều hành</th>
                                                    <td colspan='3'><input type="text" name="operating_system" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Camera Trước</th>
                                                    <td colspan='3'><input type="text" name="camera_before" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Camera sau</th>
                                                    <td colspan='3'><input type="text" name="camera_after" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Vi xử lý (chip)</th>
                                                    <td colspan='3'><input type="text" name="chip" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                <tr>
                                                    <th scope="row">Ram</th>
                                                    <td colspan='3'><input type="text" name="ram" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                    <th scope="row">bộ lưu trữ</th>
                                                    <td colspan='3'><input type="text" name="capacity" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Sim</th>
                                                    <td colspan='3'><input type="text" name="sim" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Dung lượng pin</th>
                                                    <td colspan='3'><input type="text" name="pin" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ngày ra mắt sản phẩm</th>
                                                    <td colspan='3'><input type="date" name="meeting_day" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">

                                            <textarea name="description" id="editor1" rows="100" cols="100"></textarea>

                                        </div>

                                        <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="submit" class="white_btn3" value="Thêm sản phẩm ">
                    </div>
                </div>
                <!-- ĐIỆN THOẠI END -->




                <!-- MÁY TÍNH BÀN END -->
            </form>





            <!-- LAPTOP START -->

            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="tab-pane fade row" id="Laptop" role="tabpanel" aria-labelledby="Laptop-tab">
                @csrf
                <div class="row ">
                    <div class="col-12">
                        <div class="white_card position-relative mb_20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center"><img src="" alt="" class="mx-auto d-block" height="50%" width="50%">
                                        <input type="file" name="image" value="" class="mt-5">
                                        <input type="file" name="sub_image[]" value="" class="mt-2" multiple>

                                    </div>

                                    <div class="col-lg-6 align-self-center">
                                        <div class="single-pro-detail">
                                            <p class="mb-1">Laptop</p>
                                            <div class="custom-border mb-3"></div>
                                            <input type="text" name="name" id="" class="p-2 col-8" placeholder="Tên sản phẩm....">
                                            <div class="mb-3"></div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="">Giá cả</label>
                                                    <input type="number" name="price_old">
                                                </div>
                                                <div class="col-4">
                                                    <label for="">Giá giảm</label>
                                                    <input type="number" name="price_new">
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

                                                <input class="form-control form-control-sm" name="quantity" type="number" min="0" value="0" id="example-number-input">
                                                <!-- <a href="" class="btn theme_bg_6 text-white px-4 d-inline-block "><i class="fa fa-cart-plus me-2"></i>Add to Cart</a> -->
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
                                                    <td colspan='3'><input type="text" name="screen" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Hệ điều hành</th>
                                                    <td colspan='3'><input type="text" name="operating_system" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Camera Trước</th>
                                                    <td colspan='3'><input type="text" name="camera_before" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Vi xử lý (CPU)</th>
                                                    <td colspan='3'><input type="text" name="chip" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                <tr>
                                                    <th scope="row">Ram</th>
                                                    <td colspan='3'><input type="text" name="ram" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                    <th scope="row">bộ lưu trữ(ổ cứng)</th>
                                                    <td colspan='3'><input type="text" name="capacity" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Dung lượng pin</th>
                                                    <td colspan='3'><input type="text" name="pin" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ngày ra mắt sản phẩm</th>
                                                    <td colspan='3'><input type="date" name="meeting_day" class="col-12 p-1"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">

                                            <textarea name="description" id="editor2" rows="50" cols="50"></textarea>

                                        </div>

                                        <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
                                        <script>
                                            CKEDITOR.replace('editor2');
                                        </script>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="submit" class="white_btn3" value="Thêm sản phẩm ">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>







<!-- <div class="row ">
    <div class="col-12">
        <div class="white_card mb_30 ">
            <div class="white_card_header">
                <div class="bulder_tab_wrapper">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="Themes-tab" data-bs-toggle="tab" href="#Themes" role="tab" aria-controls="Themes" aria-selected="false">Themes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="page-tab" data-bs-toggle="tab" href="#page" role="tab" aria-controls="profile" aria-selected="false">page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Header-tab" data-bs-toggle="tab" href="#Header" role="tab" aria-controls="Header" aria-selected="false">Header</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="content-tab" data-bs-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="false">content</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aside-tab" data-bs-toggle="tab" href="#aside" role="tab" aria-controls="aside" aria-selected="false">aside</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="footer_tb-tab" data-bs-toggle="tab" href="#footer_tb" role="tab" aria-controls="aside" aria-selected="true">footer</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="white_card_body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="Themes" role="tabpanel" aria-labelledby="Themes-tab">
                        <div class="builder_select">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Header Theme:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Dark</option>
                                            <option value="">Lite</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Dark</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Dark</li>
                                                <li data-value="" class="option">Lite</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Header Menu Theme:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Dark</option>
                                            <option value="">Lite</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Dark</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Dark</li>
                                                <li data-value="" class="option">Lite</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Logo Bar Theme:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Dark</option>
                                            <option value="">Lite</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Dark</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Dark</li>
                                                <li data-value="" class="option">Lite</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
                        <div class="builder_select">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Page Loader:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Disabled</option>
                                            <option value="">Spiners</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Disabled</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Disabled</li>
                                                <li data-value="" class="option">Spiners</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Header" role="tabpanel" aria-labelledby="Header-tab">
                        <div class="builder_select">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Desktop Fixed Header:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Fixed</option>
                                            <option value="">absolute</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Fixed</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Fixed</li>
                                                <li data-value="" class="option">absolute</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Header Width:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Fluid</option>
                                            <option value="">Fixed</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Fluid</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Fluid</li>
                                                <li data-value="" class="option">Fixed</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Menu Arrows:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Yes</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Yes</li>
                                                <li data-value="" class="option">No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="builder_select">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Width: </label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Fixed</option>
                                            <option value="">Fluid</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Fixed</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Fixed</li>
                                                <li data-value="" class="option">Fluid</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aside" role="tabpanel" aria-labelledby="aside-tab">
                        <div class="builder_select">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Width</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Mini</option>
                                            <option value="">full</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Mini</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Mini</li>
                                                <li data-value="" class="option">full</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Hoverable:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Yes</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Yes</li>
                                                <li data-value="" class="option">No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Submenu Toggle:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Accordions</option>
                                            <option value="">Dropdown</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Accordions</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Accordions</li>
                                                <li data-value="" class="option">Dropdown</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="footer_tb" role="tabpanel" aria-labelledby="footer_tb-tab">
                        <div class="builder_select">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Width:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Fluid</option>
                                            <option value="">Fixed</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Fluid</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Fluid</li>
                                                <li data-value="" class="option">Fixed</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 ">
                                    <label class="form-label" for="#">Fixed Footer:</label>
                                    <div class="common_select">
                                        <select class="nice_Select wide mb_30" style="display: none;">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                        <div class="nice-select nice_Select wide mb_30" tabindex="0"><span class="current">Yes</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="" class="option selected">Yes</li>
                                                <li data-value="" class="option">No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="devices_btn justify-content-start">
                    <a class="color_button color_button2" href="#">Preview</a>
                    <a class="color_button" href="#">Export</a>
                    <a class="color_button color_button3" href="#">Reset</a>
                </div>
            </div>
        </div>
    </div>
</div> -->


@endsection