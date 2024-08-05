@switch($titlePass)
    @case('Loại')
        @include('backEnd.inc.header')
        @include('backEnd.inc.navbar.menuHome')
            <section class='main_content dashboard_part large_header_bg'>
            @yield("conTenPass")
        @include('backEnd.inc.footer')
 @break
    @case('Hãng')
        @include('backEnd.inc.header')
         @include('backEnd.inc.navbar.menuHome')
            <section class='main_content dashboard_part large_header_bg'>
            @yield("conTenPass")
         @include('backEnd.inc.footer')
 @break

    @case('Sản phẩm')
        @include('backEnd.inc.header')
         @include('backEnd.inc.navbar.menuHome')
            <section class='main_content dashboard_part large_header_bg'>
            @yield("conTenPass")
         @include('backEnd.inc.footer')
@break

@case('Đăng nhập admin')
        @include('backEnd.inc.header')
            <section class='main_content dashboard_part large_header_bg'>
            @yield("conTenPass")
        
@break

@case('Danh sách tài khoản')
        @include('backEnd.inc.header')
        @include('backEnd.inc.navbar.menuHome')
            <section class='main_content dashboard_part large_header_bg'>
            @yield("conTenPass")

@case('Tin tức')
        @include('backEnd.inc.header')
        @include('backEnd.inc.navbar.menuHome')
            <section class='main_content dashboard_part large_header_bg'>
            @yield("conTenPass")
            @include('backEnd.inc.footer')
@break
    @default

    @include('backEnd.inc.header')
    @include('backEnd.inc.navbar.menuHome')
    <section class='main_content dashboard_part large_header_bg'>

        @yield("conTenPass")
        @include('backEnd.inc.footer')
        @break

        @endswitch