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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" >
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-notification.css') }}"> -->
    @yield('style')
    <style>
        .sidebar {
            z-index: 999;
        }

        .notification 
        {
            color: black;
            text-decoration: none;
            padding: 15px 26px;
            position: relative;
            border-radius: 2px;
        }
        /* .notification:hover {
            color: black;
        } */
        .notification .badge 
        {
            position: relative;
            top: -15px;
            left: -6px;
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
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

        #nav {
    list-style:none;
    margin: 0px;
    padding: 0px;
}
#nav > li {
    float: left;
    margin-right: 20px;
    font-size: 14px;
    font-weight:bold;
}
#nav li a {
    color:#333333;
    text-decoration:none
}
#nav li a:hover {
    color:#006699;
    text-decoration:none
}
#notification_li {
    position:relative
}
#notificationContainer {
    background-color: #fff;
    border: 1px solid rgba(100, 100, 100, .4);
    -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
    overflow: visible;
    position: absolute;
    top: 30px;
    margin-left: -170px;
    width: 400px;
    z-index: -1;
    display: none;
}
#notificationContainer:before {
    content:'';
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    color: transparent;
    border: 10px solid black;
    border-color: transparent transparent white;
    margin-top: -20px;
    margin-left: 188px;
}
#notificationTitle {
    font-weight: bold;
    padding: 8px;
    font-size: 13px;
    background-color: #ffffff;
    position: absolute;
    z-index: 1000;
    width: 384px;
    border-bottom: 1px solid #dddddd;
}
#notificationsBody {
    padding: 33px 0px 0px 0px !important;
}
#notificationFooter {
    background-color: #e9eaed;
    text-align: center;
    font-weight: bold;
    padding: 8px;
    font-size: 12px;
    border-top: 1px solid #dddddd;
}
#notification_count {
    padding: 3px 7px 3px 7px;
    background: #cc0000;
    color: #ffffff;
    font-weight: bold;
    margin-left: 7px;
    border-radius: 9px;
    -moz-border-radius: 9px;
    -webkit-border-radius: 9px;
    position: absolute;
    margin-top: -11px;
    font-size: 11px;
}
.notifications ul {
    list-style-type: none;
    display: inline-block;
}
.notifications ul li {
    display: block;
    padding: 4px;
}
.dataTables_wrapper {
    margin: 2%;
}
.dropdown-menu{
    background-color:#e6e1e1;
}

        /* .count {
        display: none;
        } */
            
        /* .notif:hover + .count {
            display: block;
            color: #000;
        } */
    </style>
</head>
<body>

    <div class="sidebar" style="background-image: url('{{ asset('69.jpg') }}');background-size:cover;font-weight: 700;">
        
        <div class="title" style="color:#020608">
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
           <div class="dropdown {{ request()->is('type-proyek*') ? 'active' : '' }} access-role access-type-proyek">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn-{{ ((request()->is('type-proyek*') || request()->is('material-type*') || request()->is('material-unit*')) ? 'primary' : '' )}}" data-target="#" href="{{ url('/type-proyek') }}" style="text-align: left; color: #000">
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
    <div class="content" style="z-index:1;">
    <div style="float:right; margin:1%;z-index:2;">
        <!-- <i style='font-size:24px' class='fas'>&#xf0f3;</i> -->
            <!-- <span style = "font-weight: 500;color: #e62540;" class="count" id="count"></span>
            <span style = "font-weight: 500;" class="notif" id="notif"></span> -->
            <ul id="nav" style="z-index:3;">
            
            <li id="notification_li" style="z-index:4;">
                <span id="notification_count"></span>

                <a href="#" id="notificationLink"><i class="fa fa-bell"></i></a>
                        <div id="notificationContainer" style="z-index:5;margin-left: -360px;">
                            <div id="notificationTitle">Notifikasi Terbaru</div>
                            <div id="notificationsBody" class="notifications" style="z-index:5;margin:1%">
                                <ul>
                                    <li>Message 1</li>
                                    <li>Message 2</li>
                                    <li>Message 3</li>
                                    <li>Message 4</li>
                                    <li>Message 5</li>
                                </ul>
                            </div>
                            <div id="notificationFooter"><a href="#" id='AddNew'>See All</a></div>
                    </div>
            </li>
        </ul>
    </div>
        @yield('content')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="/js/moment.min.js" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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

<script>
	$(document).ready(function(){
        $(document).ready(function() {
            $('.table').DataTable({
                "order": []
            });
        } );
		$.ajax({
				type:'GET',
                url:'{{ route('home.getNotif')}}',
                    data:{
                        "_token": "{{ csrf_token() }}"
                },
                success: function( msg ) {
					// alert(msg);
					// $("#testNotif").html("dededed");
                    $('#notificationsBody').html(msg)
                    // alert(msg);
					// $('.modal-body-detail').html("");
                }
            });

			$.ajax({
				type:'GET',
                url:'{{ route('home.count')}}',
                    data:{
                        "_token": "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    // alert(msg);
					// $("#testNotif").html("dededed");
					if(msg != 0)
                    	$('#notification_count').html(msg)
					// $('.modal-body-detail').html("");
                }
            });
	})
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    // var pusher = new Pusher('77ffd9d6df2f6f4e6e4c', {
    //   cluster: 'ap1',
    //   forceTLS: true
    // });
    var pusher = new Pusher('479b7b3710dfe9bce9cb', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    //   alert(JSON.stringify(data));
	$.ajax({
            type:'GET',
            url:'{{ route('home.getNotif')}}',
                data:{
                    "_token": "{{ csrf_token() }}"
            },
            success: function( msg ) {
                // $("#testNotif").html("dededed");
                $('#notificationsBody').html(msg)
                // alert(msg);
                // $('.modal-body-detail').html("");
            }
        });

        $.ajax({
            type:'GET',
            url:'{{ route('home.count')}}',
                data:{
                    "_token": "{{ csrf_token() }}"
            },
            success: function( msg ) {
                // $("#testNotif").html("dededed");
                // alert(msg);
                $('#notification_count').html(msg)
                // $('.modal-body-detail').html("");
            }
        });
    });

    $(document).ready(function () {
    $("#notificationLink").click(function () {
        $("#notificationContainer").fadeToggle(300);
        $("#notification_count").fadeOut("slow");
        $('#notificationLink > i.fa-bell').addClass('fa-bell-o');
        // $('#notificationLink > i.fa-bell').removeClass('fa-bell');
        return false;
    });

    //Document Click hiding the popup 
    // $(document).click(function () {
    //     $("#notificationContainer").hide();
    // });

    //Popup on click
    // $("#notificationContainer").click(function () {
    //     return false;
    // });
    
    $('#AddNew').on('click', function(){
        $('#notificationsBody ul').append('<li>New Message</li>');
    });

});
  </script>

  
</html>
