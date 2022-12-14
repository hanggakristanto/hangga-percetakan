<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ Storage::url('public/logo/'.$setting->logo) }}" type="image/x-icon"/>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <livewire:styles />
    <livewire:scripts />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body style="background-color: #e2e8f0;">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="background-color: #171d26!important">
        <a class="navbar-brand font-weight-bold" href="{{ route('console.dashboard.index') }}"><i
                class="fa fa-carrot"></i> Sofiduta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto text-uppercase">
                <li class="nav-item {{ setActive('console/dashboard') }}">
                    <a class="nav-link" href="{{ route('console.dashboard.index') }}"><i class="fa fa-chart-line"></i>
                        Analytic</a>
                </li>
                <li class="nav-item dropdown {{ setActive('console/tags'). setActive('console/categories'). setActive('console/products'). setActive('console/vouchers') }}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-bag"></i> Products</a>
                    <div class="dropdown-menu shadow border-0" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{ route('console.tags.index') }}"><i class="fa fa-tags"></i> Tags</a>
                        <a class="dropdown-item" href="{{ route('console.categories.index') }}"><i class="fa fa-folder"></i> Categories</a>
                        <a class="dropdown-item" href="{{ route('console.products.index') }}"><i class="fa fa-shopping-bag"></i> Data Products</a>
                        <a class="dropdown-item" href="{{ route('console.vouchers.index') }}"><i class="fa fa-award"></i> Voucher</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ setActive('console/orders'). setActive('console/payment') }}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Orders</a>
                    <div class="dropdown-menu shadow border-0" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{ route('console.orders.index') }}"><i class="fa fa-shopping-cart"></i> Data Orders</a>
                        <a class="dropdown-item" href="{{ route('console.payment.index') }}"><i class="fa fa-credit-card"></i> Payment Confirmation</a>
                    </div>
                </li>
                <li class="nav-item {{ setActive('console/pages') }}">
                    <a class="nav-link" href="{{ route('console.pages.index') }}"><i class="fa fa-dice-d6"></i> Pages</a>
                </li>
                <li class="nav-item {{ setActive('console/sliders') }}">
                    <a class="nav-link" href="{{ route('console.sliders.index') }}"><i class="fa fa-laptop"></i> Sliders</a>
                </li>
                <li class="nav-item {{ setActive('console/users') }}">
                    <a class="nav-link" href="{{ route('console.users.index') }}"><i class="fa fa-users"></i> Users</a>
                </li>
                <li class="nav-item {{ setActive('console/settings') }}">
                    <a class="nav-link" href="{{ route('console.settings.index') }}"><i class="fa fa-cog"></i> Settings</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0px">
                <li class="dropdown">
                    <a class="dropdown-toggle text-white"
                        style="padding-top: 13px;line-height: 30px;padding-bottom:9px;text-decoration: none;"
                        data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> {{ auth()->user()->name }}
                        <span class="caret"></span></a>
                    <div class="dropdown-menu shadow border-0" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/') }}" target="_blank"><i class="fa fa-external-link-alt"></i> View Site</a>
                        <a class="dropdown-item" href="{{ route('console.dashboard.index') }}"><i class="fa fa-chart-line"></i> Analytic</a>
                        <a class="dropdown-item" href="{{ route('console.settings.index') }}"><i class="fa fa-cog"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <livewire:console.logout />
                    </div>
                    </livewire:console.logout>
            </ul>
        </div>
    </nav>

    <div class="jumbotron rounded-0" style="background-color: #566479;padding-bottom:8rem">
        <div class="container">
        </div>
    </div>

    <div class="container-fluid mb-5" style="margin-top: -120px">

        @yield('content')

    </div>

    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
</body>

</html>