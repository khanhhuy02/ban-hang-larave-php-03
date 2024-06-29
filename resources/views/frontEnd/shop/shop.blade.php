@extends('frontEnd.layout')


@section('conTenPass')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Cửa hàng</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class=""><a href='/'>Trang chủ</a>/</li>
                            <li class="">cửa hàng</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Shop Category pages -->
<div class="shop-category-area pb-100px pt-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <!-- Left Side start -->
                    <p>Tổng {{$totalProduct}} sản phẩm.</p>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Bộ lọc:</p>
                        </div>
                        <div class="shop-select">
                            <select class="shop-sort">
                                <option data-display="Tất cả sản phẩm">Tất cả sản phẩm</option>
                                <!-- <option value="1"> Name, A to Z</option>
                                <option value="2"> Name, Z to A</option> -->
                                <option value="?gia=desc" class="price_high_to_low">Giá cao đến thấp</option>
                                <option value="?gia=asc" class="price_low_to_high"> Giá thấp đến cao </option>
                            </select>

                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">

                    <div class="row">

                        @foreach($list as $item)
                        <div class="col-lg-4  col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="600">
                            <!-- Single Prodect -->
                            <div class="product mb-25px">
                                <div class="thumb">
                                    <a class='image' href='shop-left-sidebar.html'>
                                        <img src="{{$item->image}}" alt="Product" />
                                        <!-- <img class="hover-image" src="images/product-image/6.jpg" alt="Product" /> -->
                                    </a>
                                    <span class="badges">
                                        <span class="sale">-5%</span>
                                        <span class="new">New</span>
                                    </span>
                                    <div class="actions">
                                        <a class='action wishlist' href='wishlist.html' title='Wishlist'><i class="icon-heart"></i></a>
                                        <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                        <a class='action compare' href='compare.html' title='Compare'><i class="icon-refresh"></i></a>
                                    </div>
                                    <button title="Add To Cart" class=" add-to-cart">Add
                                        To Cart</button>
                                </div>
                                <div class="content">
                                    <h5 class="title">
                                        <h5 class="title"><a href="{{route('detailed.products',['alias'=> $item->categories->alias_sp,'alias_sp'=> $item->alias_sp ]) ?? null}}">{{$item->name}} </a></h5>
                                        <span class="price">
                                            <span class="new">{{ number_format($item['price_new'], 0, ',', '.')}}</span>
                                            <span class="old">{{ number_format($item['price_old'], 0, ',', '.')}}</span>
                                        </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-30px" data-aos="fade-up">
                        <ul>
                            <li>
                                <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                            </li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>
                                <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <div class="main-heading">
                            <h3 class="sidebar-title">Danh mục</h3>
                        </div>
                        <div class="sidebar-widget-category">
                            <ul>
                                @foreach($brand as $key => $item)
                                <li>

                                    <a href="{{route('shop-cate-brand',['alias'=> $item->categories->alias_sp,'barnd_alias'=> $item->alias])}}" class="selected"><img src="{{asset('admin/images/icon')}}/{{$item->icon}}" alt="" width="100"> </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.shop-sort').on('change', function(e) {
            e.preventDefault()
            var selectedOption = $(this).find(':selected');
            var selectedText = selectedOption.val();
            console.log(window.location);
            if(selectedText !=0){
                var url = selectedText 
                window.location.replace(url)
            }
           


        });
    });
</script>
@endsection