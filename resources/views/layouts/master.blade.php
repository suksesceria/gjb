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
            class="{{ (request()->is('projects*')) ? 'active' : '' }}"
            >Proyek
        </a>
        <a href="">{{ __('Project Types') }}</a>
        <a href="{{ url('/employees') }}"
            class="{{ (request()->is('employees*')) ? 'active' : '' }}"
            >Karyawan
        </a>
    <a href="{{ url('/roles') }}">Akses Role</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@yield('script')
</html>