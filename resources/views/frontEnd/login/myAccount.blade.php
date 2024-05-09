@extends('frontEnd.layout')

@section('conTenPass')
<div class="offcanvas-overlay"></div>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Tài khoản</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class=""><a href='/'>Trang Chủ</a>/</li>
                            <li class=" active">Tài Khoản</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- account area start -->
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>1 .</span>
                                    <a data-bs-toggle="collapse" class="collapsed" aria-expanded="true" href="#my-account-1">
                                        Thông tin </a>
                                </h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <form action="{{route('UpdateMyAccount.login')}}" method="post">
                                    @csrf
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Thông tin cá nhân</h4>
                                                <!-- <h5>Your Personal Details</h5> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Họ và tên</label>
                                                        <input type="text" name="name" value="{{$account->name}}" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email</label>
                                                        <input type="email" name='email' value="{{$account->email}}" hidden />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Địa chỉ</label>
                                                        <input type="address" name='address' value="{{$account->user_informations->address}}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Điện thoại</label>
                                                        <input type="text" name="phone" value="{{$account->user_informations->phone}}" />
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Fax</label>
                                                        <input type="text" />
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Cập nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="400">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>2 .</span>
                                    <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false" href="#my-account-2">
                                        Cập nhật lại mật khẩu
                                    </a>
                                </h3>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Password</label>
                                                    <input type="password" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Password Confirm</label>
                                                    <input type="password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="600">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title">
                                    <span>3 .</span>
                                    <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false" href="#my-account-4">
                                        ĐƠN HÀNG CỦA TÔI
                                    </a>
                                </h3>
                            </div>

                            <div id="my-account-4" class="panel-collapse collapse" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Danh sách đơn hàng</h4>
                                        </div>
                                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="1000">

                                            <div class="panel-heading my-account-title">
                                                @php $stt = 1 @endphp
                                                @foreach($showProduct as $item)
                                                <h3 class="panel-title">
                                                    <span>{{$stt++}}</span>
                                                    <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false" href="#donhangcuatoi{{$item->id}}">
                                                        <div class="row">
                                                            <p class="col-4"> đơn hàng đặt ngày </p>
                                                            <p class="col-4"> @php
                                                                $formattedDate = date('d/m/Y H:i', strtotime($item->date));
                                                                @endphp

                                                                {{ $formattedDate}}
                                                            </p>
                                                            <p class="col-4"> Đang Đang vận chuyển </p>
                                                        </div>
                                                    </a>
                                                </h3>
                                                <!-- endforeach -->
                                            </div>
                                            <div id="donhangcuatoi{{$item->id}}" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="myaccount-info-wrapper">
                                                        <div class="account-info-wrapper">
                                                            <h4>THÔNG TIN ĐẶT HÀNG</h4>
                                                        </div>
                                                        <!-- <div class="entries-wrapper">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                                    <div class="entries-info text-center">
                                                                        <p>Jone Deo</p>
                                                                        <p>hastech</p>
                                                                        <p>28 Green Tower,</p>
                                                                        <p>Street Name.</p>
                                                                        <p>New York City,</p>
                                                                        <p>USA</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                                    <div class="entries-edit-delete text-center">
                                                                        <a href="#">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <!--SẢN PHẨM ĐẶT HÀNG CHI TIẾT STRAT -->
                                                        <div class="main_content_iner ">
                                                            <div class="container-fluid p-0">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-12">
                                                                        <div class="white_card card_height_100 mb_30">
                                                                            <div class="white_card_body">
                                                                                <div class="QA_section">
                                                                                    <!-- <div class="white_box_tittle list_header">
                                                                                        <h4>Table</h4>
                                                                                    </div> -->
                                                                                    <div class="QA_table mb_30">

                                                                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                                                                            <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                                                                                                <thead>
                                                                                                    <tr role="row">
                                                                                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-sort="ascending" aria-label="title: activate to sort column descending">Hình</th>
                                                                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 173px;" aria-label="Category: activate to sort column ascending">Tên</th>
                                                                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 173px;" aria-label="Category: activate to sort column ascending">Loại</th>
                                                                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 165px;" aria-label="Teacher: activate to sort column ascending">Giá</th>
                                                                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Số lượng</th>
                                                                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102px;" aria-label="Enrolled: activate to sort column ascending">Tổng Giá</th>
                                                                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102px;" aria-label="Enrolled: activate to sort column ascending">Đơn hàng</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    @foreach($order_items as $items)
                                                                                                    @if($items->orders_id === $item->id)
                                                                                                    <tr>
                                                                                                        <td scope="row" tabindex="0" class="sorting_1">
                                                                                                            <img src="{{asset('admin/images/product')}}/{{$items->products->image}}" alt="{{$items->products->name}}" width="90%" height="90%">
                                                                                                        </td>
                                                                                                        <td>{{$items->products->name}}</td>
                                                                                                        <td>{{$items->products->categories->names}}</td>
                                                                                                        <td>{{$items->products->price_new}}</td>
                                                                                                        <td>{{$items->quantity}}</td>
                                                                                                        <td>{{$items->orders->total_order}} </td>
                                                                                                        <td>{{$items->date}}</td>
                                                                                                    </tr>
                                                                                                    @endif
                                                                                                    @endforeach

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--SẢN PHẨM ĐẶT HÀNG CHI TIẾT END -->

                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- account area end -->
@endsection