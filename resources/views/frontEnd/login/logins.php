<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../../../newshop/publics/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../newshop/publics/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>


    <div class="container-fluid container_all">

        <form class="row card m-0" method="post">

            <div class="card-header text-center" style="background: rgb(2,0,36);
                    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(4,40,119,1) 26%, rgba(0,212,255,0.8576680672268908) 100%);">
                <span> Đăng nhập </span>
            </div>


            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <label for="text" class="form-label">Tên tài Khoảng</label>
                        <input type="text" class="form-control" id="validationDefault02" name="names" required>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="validationDefault01" name="password" required>
                    </div>
                </div>




                <div class="row">

                    <div class="row ">
                        <div class="col-12 mt-2 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 d-grid gap-2 mb-4">
                        <button class="btn btn-primary" type="submit" name="login">Đăng nhập</button>
                    </div>
                </div>


                <div class="d-grid justify-content-end text-end" style="width: 100%;">
                    <a href="./dangky.html" class="text-decoration-none">Đăng ký</a>
                    <a href="./quenMK.html" class="text-decoration-none">Quên mật khẩu</a>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6  card p-0 border-0 ">
                        <div class="input-group btn_mxh">
                            <div class="input-group-text"><i class="fa-brands fa-google"></i></div>

                            <a href="" class="text-decoration-none btn btn-google">Liên Kết Google</a>
                        </div>

                    </div>

                    <div class="col-md-6 card p-0 border-0 ">
                        <div class=" input-group btn_mxh ">
                            <div class="input-group-text"><i class="fa-brands fa-twitter"></i></div>
                            <a href="" class="text-decoration-none btn btn-twitter">Liên Kết Twitter</a>
                        </div>

                    </div>


                    <div class="col-md-6 card p-0 border-0">
                        <div class=" input-group btn_mxh ">
                            <div class="input-group-text"><i class="fa-brands fa-linkedin"></i></div>
                            <a href="" class="text-decoration-none btn btn-linkedin"> Liên Kết Linkedin</a>
                        </div>

                    </div>

                    <div class="col-md-6 card p-0 border-0">
                        <div class=" input-group btn_mxh">
                            <div class="input-group-text "><i class="fa-brands fa-facebook "></i></div>

                            <a href="" class="text-decoration-none btn btn-facebook"> Liên Kết Facebook</a>
                        </div>

                    </div>
                </div>

            </div>

        </form>


    </div>



    <script src="../../../../../newshop/publics/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>