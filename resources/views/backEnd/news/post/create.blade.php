@extends('backEnd.layout')

@section('conTenPass')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_30 f_w_700 dark_text">Thêm bài viết tin tức</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Thêm bài viết tin tức</li>
                        </ol>
                    </div>


                </div>
            </div>
        </div>
        <div class="tab-content">

            <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="white_card position-relative mb_20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mt-5 mb-5 d-none ">
                                        <label for="">Ảnh đại điện</label><br>
                                        <input type="text" name="users_id" class="mt-5" value="{{Auth::user()->id}}">
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <label for="">Ảnh đại điện</label><br>
                                        <input type="file" name="image" class="mt-5">
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <p class="mb-1">Tiêu đề bài viết</p>
                                        <div class="custom-border mb-3"></div>
                                        <input type="text" name="title" class="p-2 col-12" id="title-product" onkeyup="ChangeToSlug();" placeholder="Tiêu đề bài viết....">
                                        <div class="mb-3"></div>
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <p class="mb-1">Đường dẫn</p>
                                        <div class="custom-border mb-3"></div>
                                        <input type="text" name="alias" class="p-2 col-12" id="slug-product" placeholder="Tiêu đề bài viết....">
                                        <div class="mb-3"></div>
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <p class="mb-1">Tiêu đề SEO</p>
                                        <div class="custom-border mb-3"></div>
                                        <input type="text" name="seo_title" class="p-2 col-12" placeholder="Tiêu đề SEO....">
                                        <div class="mb-3"></div>
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <label for="" class="mb-2">Ẩn hiện</label><br>
                                        <label for="">Ẩn</label>
                                        <input type="radio" name="status" value="0">
                                        <label for="" style="margin-left: 20px;">Hiện</label>
                                        <input type="radio" name="status" value="1" checked>
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <p class="mb-1">Nôi dung SEO</p>
                                        <div class="custom-border mb-3"></div>
                                        <input type="text" name="seo_description" class="p-2 col-12" placeholder="Tiêu đề SEO....">
                                        <div class="mb-3"></div>
                                    </div>
                                    <div class="col-lg-6 mt-5 mb-5">
                                        <label for="">Loại</label>
                                        <select name="categoty_post_id" class="form-select form-select-sm" aria-label="Small select example">
                                            @foreach($ListCategotyPost as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h2>Nội dung bài viết</h2>
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="description" id="editor1" rows="100" cols="100"></textarea>
                                        <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="white_btn3" value="Khởi tạo">
            </form>



        </div>
    </div>
</div>








@endsection