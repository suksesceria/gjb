<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gapeksindo Jaya Bersama</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    @yield('style')
    <style>
        .sidebar {
            z-index: 999;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="title">
            {{ __('GJB') }}
            <hr>
        </div>
        <a href="{{ url('/') }}" 
            class="{{ (request()->is('/')) ? 'active' : '' }}"
            >Beranda
        </a>
        <a href="{{ url('/projects') }}" 
            class="{{ (request()->is('projects*')) ? 'active' : '' }} access-role access-projects"
            >Proyek
        </a>
        <!-- <a href="{{ url('/type-proyek') }}"
           class="{{ request()->is('type-proyek*') ? 'active' : '' }} access-role access-type-proyek">Tipe Proyek</a>
        <a href="{{ url('/material-type') }}"
           class="{{ request()->is('material-type*') ? 'active' : '' }} access-role access-material-type">Tipe Material</a>
        <a href="{{ url('/material-unit') }}"
           class="{{ request()->is('material-unit*') ? 'active' : '' }} access-role access-material-unit">Satuan Material</a> -->
           <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn-{{ ((request()->is('type-proyek*') || request()->is('material-type*') || request()->is('material-unit*')) ? 'primary' : 'light' )}}" data-target="#" href="{{ url('/type-proyek') }}" style="text-align: left; color: #000">
                Data Master <span class="caret"></span>
            </a>
    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="font-size:12px">
                <a href="{{ url('/type-proyek') }}"
            class="{{ request()->is('type-proyek*') ? 'active' : '' }} access-role access-type-proyek">Tipe Proyek</a>
                <a href="{{ url('/material-type') }}"
            class="{{ request()->is('material-type*') ? 'active' : '' }} access-role access-material-type">Tipe Material</a>
                <a href="{{ url('/material-unit') }}"
            class="{{ request()->is('material-unit*') ? 'active' : '' }} access-role access-material-unit">Satuan Material</a>
            </ul>
        </div>
        <a href="{{ url('/employees') }}"
            class="{{ (request()->is('employees*')) ? 'active' : '' }} access-role access-employees"
            >Karyawan
        </a>
        <a href="{{ url('/roles') }}"
            class="{{ (request()->is('roles*')) ? 'active' : '' }} access-role access-roles"
            >Akses Role</a>
        <a href="{{ url('/logout') }}">Log out</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="/js/moment.min.js" crossorigin="anonymous"></script>
@yield('script')
<script>
    $('.access-role').hide();
    var menus = <?= json_encode(Auth::user()->role->menus->pluck('menu_code')) ?>;
    console.log(menus);
    if (menus.length < 1)
        window.location.href = '/logout';
    menus.forEach(function(menu) {
        $('.access-' + menu).show();
    });
</script>
</html>
