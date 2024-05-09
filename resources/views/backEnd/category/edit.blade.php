@extends('backEnd.layout')

@section('conTenPass')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <form action="{{ route('updateCat', ['id' => $cat->id]) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 dark_text">Loại sản phẩm</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">admin</a></li>
                                <li class="breadcrumb-item active">Loại</li>
                            </ol>
                        </div>
                        <input type="submit" class="white_btn3" value="Update">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card position-relative mb_20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                    <img src="{{asset('admin/images/icon')}}/{{$cat->icon}}" alt="" class="mx-auto d-block" height="50%" width="50%">
                                    <input type="file" name="icon" value="{{asset('admin/images/icon')}}/{{$cat->icon}}" class="mt-5">
                                </div>

                                <div class="col-lg-6 align-self-center">
                                    <div class="single-pro-detail">
                                        <p class="mb-1">Loại</p>
                                        <div class="custom-border mb-3"></div>
                                        <input type="text" name="names" id="" class="pro-title col-8 p-2" value="{{$cat->names}}">
                                        <input type="hidden" name="alias" id="" class="col-5 text-muted" value="{{$cat->alias}}">


                                        <div class="radio2 radio-dark2 form-check-inline mt-2">
                                            <h6 class="text-muted font_s_13 d-inline-block align-middle">Vị trí :</h6>
                                            <input type="number" id="inlineRadio2" name="location" value="{{$cat->location}}" name="radioInline">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Phân quyền</label>
                                            <input type="number" id="inlineRadio2" name="classify" value="{{$cat->classify}}" name="radioInline">
                                        </div>

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
</div>
@endsection('conTenPass')