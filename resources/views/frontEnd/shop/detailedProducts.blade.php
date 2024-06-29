@extends('frontEnd.layout')


@section('conTenPass')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Sản phẩm</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class=""><a href='{{route("home")}}'>Trang chủ</a>/</li>
                            <li class="active">Sản phẩm</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Product Details Area Start -->
<div class="product-details-area pt-100px pb-100px product_data">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        @php
                        $subimage = $listProduct->sub_image;
                        @endphp
                        @foreach(explode(',', $subimage) as $itemImage)
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" src="{{asset('admin/images/product')}}/{{$itemImage}}" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="swiper-container zoom-thumbs slider-nav-style-1 small-nav mt-15px mb-15px">
                    <div class="swiper-wrapper">
                        @php
                        $subimage = $listProduct->sub_image;
                        @endphp
                        @foreach(explode(',', $subimage) as $itemImage)
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" src="{{asset('admin/images/product')}}/{{$itemImage}}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content">
                    <h2>{{$listProduct->name}}</h2>
                    <p class="reference">{{$listProduct->categories->names}}</p>
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <!-- <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span> -->
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">{{$listProduct->price_new}}
                                <input type="hidden" value="{{$listProduct->price_new}}" class="price_new">
                            </li>
                        </ul>
                    </div>
                    <!-- <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p> -->
                    <div class="pro-details-size-color d-flex">
                        <div class="pro-details-color-wrap">
                            <span>Color</span>
                            <div class="pro-details-color-content">
                                <ul>
                                    <li class="blue"></li>
                                    <li class="maroon active"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-size">
                            <span>Size</span>
                            <select>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                                <option value="4">XL</option>
                            </select>
                        </div>
                    </div>
                    <div class="pro-details-quality">


                        <input class="products_id" type="hidden" value="{{$listProduct->id}}" />
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box quantity" type="text" name="qtybutton" value="1" />
                        </div>
                        <a class="pro-details-cart" href="/gio-hang">

                            <button class="add-cart btn btn-primary btn-hover-primary ml-4 ">Mua Ngay</button>
                        </a>
                        <button class="btn add-to-cart btn btn-primary mx-2" type="submit">
                            Thêm Vào Giỏ
                        </button>
                    </div>
                    <div class="pro-details-wish-com">
                        <div class="pro-details-wishlist">
                            <a href='wishlist.html'><i class="ion-android-favorite-outline"></i>Add to
                                wishlist</a>
                        </div>
                        <div class="pro-details-compare">
                            <a href='compare.html'><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                        </div>
                    </div>
                    <div class="pro-details-social-info">
                        <span>Share</span>
                        <div class="social-info">
                            <ul class="d-flex">
                                <li>
                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro-details-policy">
                        <ul>
                            <li><img src="{{asset('assets/images/icons/policy.png')}}" alt="" /><span>Security Policy (Edit With
                                    Customer Reassurance Module)</span></li>
                            <li><img src="{{asset('assets/images/icons/policy-2.png')}}" alt="" /><span>Delivery Policy (Edit
                                    With Customer Reassurance Module)</span></li>
                            <li><img src="{{asset('assets/images/icons/policy-3.png')}}" alt="" /><span>Return Policy (Edit With
                                    Customer Reassurance Module)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details1">Thông tin chi tiết </a>
                <a class="active" data-bs-toggle="tab" href="#des-details2">Sản phẩm chi tiết</a>
                <a data-bs-toggle="tab" href="#des-details3">Đánh giá <span>(2)</span></a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span><b>Màng hình</b></span> {{$listProduct->screen}}</li>
                            <li><span><b>Hệ điều hành</b></span>{{$listProduct->operating_system}} </li>
                            <li><span><b>Camera trước</b></span>{{$listProduct->camera_before}} </li>
                            @if($listProduct->categories->names == "Điện thoại")
                            <li><span><b>Camera sau</b></span>{{$listProduct->camera_after}} </li>
                            <li><span><b>Sim</b></span>{{$listProduct->sim}} </li>
                            @endif
                            <li><span><b>Vi sử lý</b></span>{{$listProduct->chip}} </li>
                            <li><span><b>Ram</b></span>{{$listProduct->ram}} </li>
                            <li><span><b>Dung lượng</b></span>{{$listProduct->capacity}} </li>
                            <li><span><b>Pin</b></span>{{$listProduct->pin}} </li>
                            <li><span><b>Ra mắt</b></span>{{$listProduct->meeting_day}} </li>
                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane">
                    <div class="product-description-wrapper">

                        <p>
                            {!!$listProduct->description!!}
                        </p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="{{asset('assets/images/review-image/1.png')}}" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="{{asset('assets/images/review-image/2.png')}}" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <button class="btn btn-primary btn-hover-color-primary " type="submit" value="Submit">Submit</button>
                                                </div>
                                            </div>
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
<!-- product details description area end -->

<!-- New Product Start -->
<div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-start mb-11">
                    <h2 class="title">You Might Also Like</h2>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <div class="new-product-wrapper swiper-wrapper">
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/1.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/2.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
                                <span class="sale">-10%</span>
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Simple minimal Chair </a></h5>
                            <span class="price">
                                <span class="new">$18.50</span>
                                <span class="old">$28.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/3.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/4.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
                                <span class="sale">-7%</span>
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Wooden decorations</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                                <span class="old">$43.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/5.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/6.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges d-none">
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>High quality vase bottle</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/7.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/8.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Living & Bedroom Chair</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/9.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/10.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
                                <span class="sale">-5%</span>
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Living & Bedroom Table</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                                <span class="old">$40.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>

<!-- New Product End -->

<!-- New Product Start -->
<div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-start mb-11">
                    <h2 class="title">12 Other Products In The Same Category:</h2>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <div class="new-product-wrapper swiper-wrapper">
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/1.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/2.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
                                <span class="sale">-10%</span>
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Simple minimal Chair </a></h5>
                            <span class="price">
                                <span class="new">$18.50</span>
                                <span class="old">$28.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/3.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/4.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
                                <span class="sale">-7%</span>
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Wooden decorations</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                                <span class="old">$43.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/5.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/6.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges d-none">
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>High quality vase bottle</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/7.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/8.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Living & Bedroom Chair</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a class='image' href='shop-left-sidebar.html'>
                                <img src="{{asset('assets/images/product-image/9.jpg')}}" alt="Product" />
                                <!-- <img class="hover-image" src="images/product-image/10.jpg" alt="Product" /> -->
                            </a>
                            <span class="badges">
                                <span class="sale">-5%</span>
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
                            <h5 class="title"><a href='shop-left-sidebar.html'>Living & Bedroom Table</a></h5>
                            <span class="price">
                                <span class="new">$38.50</span>
                                <span class="old">$40.50</span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>

<!-- New Product End -->





@endsection