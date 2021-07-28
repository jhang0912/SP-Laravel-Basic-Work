<nav class="navbar navbar-expand-lg navbar-dark mb-3">
    <div class="container-fluid d-flex justify-content-between align-items-center ms-1 me-1 p-2">
        <div class="text-decoration-none h3 text-white">Ragnarok Online Card Store
        </div>
        <div class="">
            <div class="d-flex justify-content-center">
                <div class="">
                    <a class="nav-link" href="{{ route('home') }}" title="商店首頁" dusk="home-link"><i
                            class="fas fa-store h4 text-white m-0"></i></a>
                </div>
                <div class="">
                    <a class="nav-link" href="{{ route('shareShortUrl') }}" title="分享連結" dusk="share-short-url-link"><i
                            class="fas fa-share h4 text-white m-0"></i></a>
                </div>
                <div class="">
                    <a class="nav-link" href="{{ route('notification') }}" title="通知" dusk="notification-link"><i
                            class="fas fa-bell h4 text-white m-0"></i></a>
                </div>
                <div class="">
                    <a class="nav-link" href="{{ route('admin') }}" title="後台管理" dusk="admin-link"><i
                            class="fas fa-toolbox h4 text-white m-0"></i></a>
                </div>
                <div class="">
                    <a class="nav-link" href="{{ route('order') }}" title="訂單管理" dusk="order-link"><i
                            class="fas fa-list h4 text-white m-0"></i></a>
                </div>
            </div>
        </div>
    </div>
</nav>
