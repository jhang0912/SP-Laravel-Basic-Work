@extends('layout.html')

@section('content')
    <style>
        .sub_button {
            font-family: 'Kanit', sans-serif;
            background-color: rgb(25, 25, 25);
        }

    </style>
    <div class="register_and_signin d-flex flex-wrap justify-content-center align-items-start p-3">
        <div class="login-con border bg-light shadow m-2 p-4">
            <div class="sign_in container text-start fw-bolder h5 m-0 p-3">會員登入</div>
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
                        <input class="sub_button w-50 btn btn-lg rounded-0 float-end text-light fw-bolder" type="submit"
                            value="立即登入">
                    </div>
                </div>
            </form>
        </div>
        <div class="sign_up-con border bg-light shadow m-2 p-4"></div>
    </div>
@endsection
