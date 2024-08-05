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


                </div>
            </div>
        </div>
        <div class="tab-content">

            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- ĐIỆN THOẠI START -->
                <div class="row ">
                    <div class="col-12">
                        <div class="white_card position-relative mb_20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center">
                                        <input type="file" name="image" class="mt-5">
                                        <input type="file" name="sub_image[]" class="mt-2"  multiple="multiple">

                                    </div>

                                    <div class="col-lg-6 align-self-center">
                                        <div class="single-pro-detail">
                                            <p class="mb-1">Thêm sản phẩm</p>
                                            <div class="custom-border mb-3"></div>
                                            <input type="text" name="name" id="title-product" class="p-2 col-10" placeholder="Tên sản phẩm...." onkeyup="ChangeToSlug();">
                                            <div class="mb-3"></div>
                                            <p class="mb-1">Đường dẫn(Slug)</p>
                                            <input type="text" name="alias_sp" class="p-2 col-10" id="slug-product">

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

                                                                <textarea name="information_engineering" id="editor2" rows="100" cols="100">
                                                                <table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:none; font-size:13px; text-align:justify">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:114px">
                                                                            <p>M&agrave;n h&igrave;nh:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                                              </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>Hệ điều h&agrave;nh:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>Camera sau:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>Camera trước:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>Chip:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>RAM:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>Dung lượng lưu trữ:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>SIM:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>Pin, Sạc:</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                                                            <p>H&atilde;ng</p>
                                                                            </td>
                                                                            <td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
                                                                            <p>&nbsp;</p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                </textarea>

                                                            </div>

                                                            <script src="https://cdn.ckeditor.com/4.22.0/full/ckeditor.js"></script>
                                                            <script>
                                                                CKEDITOR.replace('editor2', {


                                                                });
                                                            </script>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <h2>
                                        Thông tin sản phẩm
                                    </h2>
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

            </form>

        </div>
    </div>
</div>








@endsection