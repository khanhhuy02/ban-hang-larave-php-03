@extends('frontEnd.layout')


@section('conTenPass')

<style>
    .text-long {
        width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;

    }
</style>
<div class="offcanvas-overlay"></div>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Thanh toán</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class=""><a href='{{route("home")}}'>Trang chủ</a>/</li>
                            <li class="">Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- checkout area start -->
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row ">
            <form action="{{route('cartSuccess')}}" method="post" class="row ">
                @csrf
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Chi tiết thanh toán</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20px">
                                    <label>Tên Người Nhận</label>
                                    <input type="text" name="name" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Số Điện Thoại</label>
                                    <input type="number" name="phone" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Địa Chỉ </label>
                                    <input class="billing-address" name="addess" type="text" />
                                    <!-- <input placeholder="Apartment, suite, unit etc." type="text" /> -->
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20px">
                                    <label>Email</label>
                                    <input type="text" name="email" />
                                </div>
                            </div>
                        </div>

                        <div class="additional-info-wrap">
                            <h4>Thông tin</h4>
                            <div class="additional-info">
                                <label>Ghi Chú Đặt Hàng</label>
                                <textarea name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>Đơn hàng của bạn </h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
                                        <li>Số lượng</li>
                                        <li>Tổng đơn hàng</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @php $totalOrder = 0; $totaCoupon = 0;@endphp
                                        @foreach($cartItem['cart'] as $productId => $itemCart)

                                        @php
                                        $product = $cartItem['product_id_all']->firstWhere('id', $productId);
                                        @endphp

                                        <li>
                                            <span class="order-middle-left text-long">{{$product->name}}</span>
                                            <span>{{$itemCart['quantity']}}</span>
                                            <span class="order-price">{{ number_format($itemCart['total'], 0, ',', '.')}}</span>
                                        </li>

                                        <div class="product_data">
                                            <div class="row ">
                                                <label for="">Mã Giảm Giá</label><br>
                                                <input type="text" class="coupons col-7" style="margin-right:12px;">
                                                <button type="submit" class="  col-4 button btn-primary btn clickcoupons"> Áp dụng </button>

                                            </div>


                                        </div>
                                      
                                        @php 
                                            $totalOrder += $itemCart['total'];
                                            $date = date('Y-m-d H:i:s');
                                            
                                        @endphp


                                        @if(Session::has('Coupons'))
                                        
                                            @foreach(Session::get('Coupons') as $cou)

                                           
                                                 @if($cou['date_end'] >= $date) 
                                                     @php
                                                        $totaCoupon = ($totalOrder * $cou['reduce'])/100;
                                                    @endphp
                                                         <p>
                                                            <?php
                                                                echo number_format($totaCoupon, 0, ',', '.')
                                                              ?>
                                                                <del>{{ $cou['reduce'] }}%</del>
                                                        </p>
                                                @endif
                                             @endforeach
                                        @endif
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Vận chuyển </li>
                                        <li>Vận chuyển miễn phí</li>
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">Tổng đơn hàng</li>
                                        <li>
                                            <?php
                                            echo number_format($totalOrder - $totaCoupon, 0, ',', '.')

                                            ?>
                                            <input type="hidden" value="{{$totalOrder - $totaCoupon}}" class="total_order"  name="total_order">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <button class="button btn-primary btn" type="submit" style="width: 100%;">
                                ĐẶT HÀNG
                            </button>
                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
<!-- checkout area end -->
@endsection