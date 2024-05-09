@extends('frontEnd.layout')


@section('conTenPass')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Giỏ hàng </h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class=""><a href='\'>Trang chủ </a>/</li>
                            <li class="">Giỏ hàng </li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->
@php $totalAll = 0; @endphp


<!-- Display cart item details -->

<!-- Display cart item details -->
<!-- Cart Area Start -->
<!--START LUU Ở DATABASE-->
<!-- <div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                foreach($cartItem as $item)
                                <tr class="product_data">
                                    <td class="product-thumbnail">
                                    </td>
                                    <td class="product-name"><a href="">item->products->name</a></td>
                                    <td class="product-price-cart"><span class="amount">
                                             number_format(item->products->price_new, 0, ',', '.')


                                        </span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="item->quantity" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal">  number_format(item->total, 0, ',', '.')</td>
                                    <input type="hidden" class="products_id" value="item->products_id">
                                    <td class="product-remove">
                                        <a href=""><i class="icon-pencil"></i></a>
                                        <button class="delete-to-cart" type="submit">
                                            <i class="icon-close"></i>
                                        </button>
                                    </td>
                                </tr>
                                php totalAll += item->total; endphp
                                endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">

                                <div class="cart-clear">
                                    <a href="#">TIẾP TỤC MUA SẮM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">

                    <div class="col-lg-6 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Phiếu giảm giá</h4>
                            </div>
                            <div class="discount-code">
                                <p>Phiếu giảm giá của bạn </p>
                                <form>
                                    <input type="text" required="" name="name" />
                                    <button class="cart-btn-2" type="submit">Áp dụng phiếu giảm giá</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Tổng giỏ hàng</h4>
                            </div>
                     

                            <h4 class="grand-totall-title mt-4">Tống tất cả

                                <span>
                                    <?php
                                    // echo number_format(totalAll, 0, ',', '.')
                                    ?>
                                </span>

                            </h4>


                            <button class="" type="submit">
                                <a href="{{route('cartCheckout')}}">THANH TOÁN ĐƠN HÀNG</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--END LUU Ở DATABASE-->



<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $productId => $cartItem)
                                @php
                                $product = $products->firstWhere('id', $productId);
        
                                @endphp
                                <tr class="product_data">
                                    <td class="product-thumbnail"><img src="{{asset('admin/images/product')}}/{{$product->image}}" alt="" width="40%" height="70%">
                                    </td>
                                    <td class="product-name"><a href="">{{$product->name}}</a></td>
                                    <td class="product-price-cart price_new"><span class="amount">
                                            {{ number_format($product->price_new, 0, ',', '.')}}

                                        </span>
                                        <input type="hidden" value="{{$product->price_new}}" class="price_news">
                                    </td>
                                    <td class="product-quantity">

                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box quantity" type="text" name="qtybutton" min="1" value="{{$cartItem['quantity']}}" />
                                        </div>
                                        
                                    </td>
                                    <td class="product-subtotal total"> {{ number_format($cartItem['total'], 0, ',', '.')}}</td>
                                    <input type="hidden" class="products_id" value="{{$product->id}}">
                                    <td class="product-remove">
                                        <a href=""><i class="icon-pencil"></i></a>

                                        <button class="delete-to-cart" type="submit">
                                            <i class="icon-close"></i>
                                        </button>

                                    </td>
                                </tr>
                                @php $totalAll += $cartItem['total']; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">

                                <div class="cart-clear">
                                    <a href="#">TIẾP TỤC MUA SẮM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">

                    <div class="col-lg-6 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Phiếu giảm giá</h4>
                            </div>
                            <div class="discount-code">
                                <p>Phiếu giảm giá của bạn </p>
                                <form>
                                    <input type="text" required="" name="name" />
                                    <button class="cart-btn-2" type="submit">Áp dụng phiếu giảm giá</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Tổng giỏ hàng</h4>
                            </div>


                            <h4 class="grand-totall-title mt-4">Tống tất cả

                                <span>
                                    <?php
                                    echo number_format($totalAll, 0, ',', '.')
                                    ?>
                                </span>

                            </h4>


                            <button class="" type="submit">
                                <a href="{{route('cartCheckout')}}">THANH TOÁN ĐƠN HÀNG</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Cart Area End -->
@endsection