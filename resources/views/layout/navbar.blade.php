<style>
    .navbar {
        background-color: rgb(25, 25, 25);
    }

</style>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid d-flex justify-content-between align-items-center ms-1 me-1">
        <div><a class="nav-link text-decoration-none h3 text-white" href="{{ route('home') }}">Ragnarok Online Card
                Store</a>
        </div>
        <div class="">
            <div class="d-flex justify-content-center">
                <div class="">
                    <a class="nav-link" href="#" title="購物車"><i class="fas fa-shopping-cart h4 text-white m-0"></i></a>
                </div>
                <div class="">
                    <a class="nav-link" href="{{ route('signin_and_register') }}" title="會員登入"><i
                            class="fas fa-sign-in-alt h4 text-white m-0"></i></a>
                </div>
            </div>
        </div>
    </div>
</nav>
