@switch($titlePass)
@case('Trang chủ')
    @include('frontEnd.inc.header')
    @include('frontEnd.inc.bander.slider-home')
    @yield("conTenPass")
@break

@case('Giới thiệu')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break

@case('Tin tức')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break

@case('Cửa hàng')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break

@case('Giỏ hàng')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break

@case('Sản phẩm chi tiết')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break

@case('Liên hệ')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break

@case('Đang nhập')
    @include('frontEnd.inc.header')
    @yield("conTenPass")
@break


@default
{{-- Xử lý mặc định (nếu cần) --}}
@endswitch

@include('frontEnd.inc.footer')