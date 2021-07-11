@extends('layout.html')

@section('content')
    <style>
        .sub_button {
            font-family: 'Kanit', sans-serif;
            background-color: rgb(25, 25, 25);
        }

    </style>
    <div class="register_and_signin d-flex justify-content-center align-items-start p-3">
        <div class="signin-con col-4 border bg-light shadow m-2 p-4">
            <div class="sign_in container text-start fw-bolder h4 m-0 p-3">會員登入</div>
            <form action="" method="post">
                <div class="form_con container-fluid d-flex flex-wrap justify-content-center align-item-center p-3">
                    <div class="email container mb-4 p-0">
                        <label class="h6 m-0" for="signin_email">Email</label>
                        <input class="form-control border-secondary rounded-0" type="email" name="signin_email"
                            id="signin_email" placeholder="請填寫您的信箱帳號">
                    </div>
                    <div class="password container mb-4 p-0">
                        <label class="h6 m-0" for="signin_password">Password</label>
                        <input class="form-control border-secondary rounded-0" type="password" name="signin_password"
                            id="signin_password" placeholder="請填寫您的密碼">
                    </div>
                    <div class="submit container mt-4 p-0">
                        <input class="sub_button w-50 btn btn-lg rounded float-end text-light fw-bolder" type="submit"
                            value="立即登入">
                    </div>
                </div>
            </form>
        </div>

        <div class="register-con col-4 border bg-light shadow m-2 p-4">
                <div class="register container text-start fw-bolder h4 m-0 p-3">會員註冊</div>
                <form action="" method="post">
                    <div class="form_con container-fluid d-flex flex-wrap justify-content-center align-item-center p-3">
                        <div class="name container mb-4 p-0">
                            <label class="h6 m-0" for="register_name">name</label>
                            <input class="form-control border-secondary rounded-0" type="text" name="register_name"
                                id="register_name" placeholder="請填寫您的姓名">
                        </div>
                        <div class="email container mb-4 p-0">
                            <label class="h6 m-0" for="register_email">Email</label>
                            <input class="form-control border-secondary rounded-0" type="email" name="register_email"
                                id="register_email" placeholder="請填寫您的信箱帳號">
                        </div>
                        <div class="password container mb-4 p-0">
                            <label class="h6 m-0" for="register_password">Password</label>
                            <input class="form-control border-secondary rounded-0" type="password" name="register_password"
                                id="register_password" placeholder="請填寫您的密碼">
                        </div>
                        <div class="password container mb-4 p-0">
                            <label class="h6 m-0" for="register_password">Password Confirm</label>
                            <input class="form-control border-secondary rounded-0" type="password" name="register_password"
                                id="register_password" placeholder="請再次填寫您的密碼">
                        </div>
                        <div class="submit container mt-4 p-0">
                            <input class="sub_button w-50 btn btn-lg rounded float-end text-light fw-bolder" type="submit"
                                value="註冊">
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
