<style>
    .dataTables_paginate {
        display: none;

    }

    .modal-backdrop {
        display: none;
    }
</style>

<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">DANH SÁCH SẢN PHẨM</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">



                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                            <li class="nav-item">
                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem"><i class="ti-files"></i> Sản Phẩm</button>
                                            </li>

                                            <li class="nav-item dropdown" style="margin-left: 10px;">
                                                <!-- <a class="nav-link " href="#"> -->
                                                <button type="submit" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sắp xếp
                                                </button>
                                                <!-- </a> -->
                                                <ul class="dropdown-menu text-center">
                                                    <li><a class="dropdown-item" href="#">Số Lượng</a></li>
                                                    <li><a class="dropdown-item" href="#">Giảm Giá</a></li>
                                                </ul>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </nav>



                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">TÌM KIẾM</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1142px;">
                                    <thead>
                                        <tr role="row">
                                            <!-- <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-sort="ascending" >STT</th> -->
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 173px;" aria-label="Category: activate to sort column ascending">TÊN</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 88px;" aria-label="Price: activate to sort column ascending">HÌNH ẢNH</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 165px;" aria-label="Teacher: activate to sort column ascending">GIÁ MỚI</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">GIÁ CŨ</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 161px;" aria-label="Lesson: activate to sort column ascending">Loại</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 102px;" aria-label="Enrolled: activate to sort column ascending">KHO HÀNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <?php
                                        foreach ($products as $product) :
                                        ?>
                                            <tr role="row" class="odd">
                                                <!-- <th scope="row" tabindex="0" class="sorting_1"> <a href="#" class="question_content"><?= $product ?></a></th> -->
                                                <td><?= $product['name'] ?></a></td>
                                                <td><img src="<?= $product['images'] ?>" alt="" style="width: 100%;"></td>
                                                <td><?= $product['price_new'] ?></td>
                                                <td><?= $product['price_old'] ?></td>
                                                <td><?php
                                                    if ($product['category_products'] == 1) {
                                                        echo 'điện thoại';
                                                    } else {
                                                        echo 'máy tính';
                                                    }

                                                    ?></td>

                                                <td><?php if ($product['quantity'] <= 0) {
                                                        echo "<p style ='color: red';>" . "Hết Hàng" . "</p>";
                                                    } else if ($product['quantity'] <= 5) {
                                                        echo "<p style ='color: #ffcd00';>" . "Sắp hết hàng" . "</p>";
                                                    } else {
                                                        echo $product['quantity'];
                                                    } ?></td>

                                                <td><a href="?id=<?= $product['id'] ?>">xóa</a></td>
                                                <td>

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sua<?php echo $product['id'] ?>">
                                                        <!-- <a href="?sua=<?= $product['id'] ?>">

                                                            sửa

                                                        </a> -->
                                                    </button>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
        </div>
    </div>
</div>

<!-- sửa sản phẩm  -->

    <!-- danh sach thêm sản thẩm -->


<div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Danh sách thêm sản Phẩm </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">

                        <?php
                        foreach ($listCategory as $item) :
                        ?>
                            <div class="col">
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $item['alias'] ?>">
                                    <?php echo $item['names'] ?>
                                </button>

                            </div>

                        <?php endforeach  ?>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- form thêm sản phẩm -->
<?php
foreach ($listCategory as $item) :
?>
    <div class=" modal fade " id="<?php echo $item['alias'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#ffdcdc;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $item['names'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 col-12">
                            <label class="form-label">Tên Sản Phẩm</label>
                            <input name="name" type="text" class="form-control">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Giá tiền</label>
                            <input name="price_new" type="text" class="form-control">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Giảm giá</label>
                            <input name="price_old" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <hr>

                        <h4 class="mb-3">thông tin </h4>

                        <div class="mb-3 col-12">
                            <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                            <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                                <?php foreach ($listCategoryPhone as $items) : ?>

                                    <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>

                        <div class="mb-3 col-12">
                            <label for="exampleInputPassword1" class="form-label">Hình Ảnh</label>
                            <input type="text" name="images" class="form-control" id="exampleInputPassword1">
                        </div>



                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Mành hình</label>
                            <input name="screen" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Hệ điều hành</label>
                            <input name="operating_system" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <?php if ("laptop" === $item['alias']) { ?>

                            <div class="mb-3 col-12">
                                <label for="exampleInputPassword1" class="form-label">Loại điện thoại</label>
                                <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                                    <?php foreach ($listCategoryLaptop as $items) : ?>

                                        <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Card Màng Hình</label>
                                <input name="" type="text" class="form-control" id="exampleInputPassword1">
                            </div>


                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Kích thước, khối lượng</label>
                                <input name="" type="text" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Camera trước</label>
                                <input name="camera_before" type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        <?php } else if ("dien-thoai" == $item['alias'] || "tablet" == $item['alias']) { ?>

                            <div class="mb-3 col-12">
                                <label for="exampleInputPassword1" class="form-label">Loại điện thoại</label>
                                <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                                    <?php foreach ($listCategory as $items) : ?>

                                        <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>



                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Camera sau</label>
                                <input name="camera_after" type="text" class="form-control" id="exampleInputPassword1">
                            </div>


                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Camera trước</label>
                                <input name="camera_before" type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Khay sim</label>
                                <input name="sim" type="text" class="form-control" id="exampleInputPassword1">
                            </div>

                        <?php
                        } else if ("dong-ho" == $item['alias']) { ?>

                            <div class="mb-3 col-12">
                                <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                                <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                                    <?php foreach ($listCategoryClock as $items) : ?>

                                        <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>


                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Tiện ích hỗ trợ</label>
                                <input name="" type="text" class="form-control" id="exampleInputPassword1">
                            </div>

                        <?php
                        } ?>







                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Chip vi xử lý</label>
                            <input name="chip" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Ram</label>
                            <input name="ram" type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Dung Lượng</label>
                            <input type="capacity" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Pin</label>
                            <input name="pin" type="text" class="form-control" id="exampleInputPassword1">
                        </div>


                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Số Lượng</label>
                            <input name="quantity" type="text" class="form-control" id="exampleInputPassword1">
                        </div>



                        <div class="mb-3 col-12">
                            <label for="exampleInputPassword1" class="form-label">Ngày ra mắt</label>
                            <input name="meeting_day" type="date" class="form-control" id="exampleInputPassword1">
                        </div>





                        <button type="submit" name="luu">Tạo danh mục</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php endforeach  ?>
</div>

<!-- điện thoại -->
<div class=" modal fade " id="dienthoai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#ffdcdc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Điện Thoại</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-12">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label">Giá tiền</label>
                        <input name="price_new" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Giảm giá</label>
                        <input name="price_old" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <hr>

                    <h4 class="mb-3">thông tin </h4>

                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hình Ảnh</label>
                        <input type="text" name="images" class="form-control" id="exampleInputPassword1">
                    </div>




                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                        <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                            <?php foreach ($listCategoryPhone as $items) : ?>
                                <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Mành hình</label>
                        <input name="screen" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Hệ điều hành</label>
                        <input name="operating_system" type="text" class="form-control" id="exampleInputPassword1">
                    </div>




                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Camera trước</label>
                        <input name="camera_before" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Camera sau</label>
                        <input name="camera_after" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Chip vi xử lý</label>
                        <input name="chip" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ram</label>
                        <input name="ram" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Dung Lượng</label>
                        <input type="capacity" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Khay sim</label>
                        <input name="sim" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Pin</label>
                        <input name="pin" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                        <input name="quantity" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ngày ra mắt</label>
                        <input name="meeting_day" type="date" class="form-control" id="exampleInputPassword1">
                    </div>


                    <button type="submit" name="luu">Tạo danh mục</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- máy tính -->
<div class=" modal fade " id="maytinh" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#b8b8fc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Máy Tính</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-12">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label">Giá tiền</label>
                        <input name="price_new" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Giảm giá</label>
                        <input name="price_old" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <hr>

                    <h4 class="mb-3">thông tin </h4>

                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hình Ảnh</label>
                        <input type="text" name="images" class="form-control" id="exampleInputPassword1">
                    </div>



                    <!-- <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                        <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                            <?php foreach ($listBrand as $items) : ?>

                                <option value="<?= $items['id'] ?>"><?= $items['name'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div> -->


                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                        <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                            <?php foreach ($listCategoryLaptop as $items) : ?>
                                <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Mành hình</label>
                        <input name="screen" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Hệ điều hành</label>
                        <input name="operating_system" type="text" class="form-control" id="exampleInputPassword1">
                    </div>



                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Card Màng Hình</label>
                        <input name="" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Kích thước, khối lượng</label>
                        <input name="" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Chip vi xử lý</label>
                        <input name="chip" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ram</label>
                        <input name="ram" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Dung Lượng</label>
                        <input type="capacity" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Pin</label>
                        <input name="pin" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ngày ra mắt</label>
                        <input name="meeting_day" type="date" class="form-control" id="exampleInputPassword1">
                    </div>





                    <button type="submit" name="luu">Tạo danh mục</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- máy Tính Bảng -->
<div class=" modal fade " id="tablet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#f0ffdc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Máy Tính bảng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-12">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label">Giá tiền</label>
                        <input name="price_new" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Giảm giá</label>
                        <input name="price_old" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <hr>

                    <h4 class="mb-3">thông tin </h4>

                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hình Ảnh</label>
                        <input type="text" name="images" class="form-control" id="exampleInputPassword1">
                    </div>



                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                        <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                            <?php foreach ($listBrand as $items) : ?>

                                <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Mành hình</label>
                        <input name="screen" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Hệ điều hành</label>
                        <input name="operating_system" type="text" class="form-control" id="exampleInputPassword1">
                    </div>




                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Camera trước</label>
                        <input name="camera_before" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Camera sau</label>
                        <input name="camera_after" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Chip vi xử lý</label>
                        <input name="chip" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ram</label>
                        <input name="ram" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Dung Lượng</label>
                        <input type="capacity" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Khay sim</label>
                        <input name="sim" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Pin</label>
                        <input name="pin" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ngày ra mắt</label>
                        <input name="meeting_day" type="date" class="form-control" id="exampleInputPassword1">
                    </div>





                    <button type="submit" name="luu">Tạo danh mục</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Đồng hồ -->
<div class=" modal fade " id="dong-ho" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#f0ffdc;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Đồng Hồ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-12">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label">Giá tiền</label>
                        <input name="price_new" type="text" class="form-control">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Giảm giá</label>
                        <input name="price_old" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <hr>

                    <h4 class="mb-3">thông tin </h4>

                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hình Ảnh</label>
                        <input type="text" name="images" class="form-control" id="exampleInputPassword1">
                    </div>



                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Hãnh điện thoại</label>
                        <select name="category_brand" class="form-select form-select-sm" aria-label="Small select example">
                            <?php foreach ($listCategoryClock as $items) : ?>

                                <option value="<?= $items['id'] ?>"><?= $items['names'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Mành hình</label>
                        <input name="screen" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Hệ điều hành</label>
                        <input name="operating_system" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Tiện ích hỗ trợ</label>
                        <input name="" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Chip vi xử lý</label>
                        <input name="chip" type="text" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Dung Lượng</label>
                        <input type="capacity" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Khay sim</label>
                        <input name="sim" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Pin</label>
                        <input name="pin" type="text" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="exampleInputPassword1" class="form-label">Ngày ra mắt</label>
                        <input name="meeting_day" type="date" class="form-control" id="exampleInputPassword1">
                    </div>





                    <button type="submit" name="luu">Tạo danh mục</button>
            </div>
            </form>
        </div>
    </div>
</div>