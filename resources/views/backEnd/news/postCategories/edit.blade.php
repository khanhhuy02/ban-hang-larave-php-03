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

            <form action="{{ route('postCate.upEditcate', ['id' => $list->id]) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 dark_text">Thể loại tin tức</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">admin</a></li>
                                    <li class="breadcrumb-item active">Thể loại tin tức</li>
                                </ol>
                            </div>
                            <input type="submit" class="white_btn3" value="Cập nhật">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="white_card position-relative mb_20">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6 align-self-center">
                                        <img src="{{asset('admin/images/icon')}}/{{$list->icon}}" alt="" class="mx-auto d-block" height="50%" width="50%">
                                        <input type="file" name="icon" value="{{asset('admin/images/icon')}}/{{$list->icon}}" class="mt-5">
                                    </div>

                                    <div class="col-lg-6 align-self-center">
                                        <div class="col-lg-6 align-self-center mb-5">
                                            <input type="text" name="name" value="{{$list->name}}" class="mt-5">
                                        </div>
                                        <div class="single-pro-detail">
                                            <div class="mb-3 col-12">
                                                <label class="form-label">Ẩn hiện</label> <br>
                                                <label for="">Ẩn</label>
                                                <input name="status" type="radio" value="0">
                                                <label for="">Hiện</label>
                                                <input name="status" type="radio" value="1" checked>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
        @endsection