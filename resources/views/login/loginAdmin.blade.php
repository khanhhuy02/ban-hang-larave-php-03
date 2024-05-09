@extends('backEnd.layout')


@section('conTenPass')


<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            @if ($message = Session::get('error'))

                            <div class="alert alert-success alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                            </div>

                            @endif
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">Đăng nhâp</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('PostloginAdmin.login')}}" method="post">
                                        @csrf
                                        <div class="">
                                            <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                        </div>
                                        <div class="">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <button class="btn_1 full_width text-center" type="submit">

                                            Đăng nhập
                                        </button>
                                        <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="#"> Sign Up</a></p>
                                        <div class="text-center">

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection