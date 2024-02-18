<!DOCTYPE html>
<html>
<head>
    <title>Example App</title>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        .navbar-brand, .nav-link, .my-form, .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .profile-image-container {
            width: 40px; /* Adjust as needed */
            height: 40px; /* Adjust as needed */
            overflow: hidden;
            border-radius: 50%; /* This creates a circular shape */
            border: 1px solid #ccc; /* Optional: Add a border */
            display: flex;
            justify-content: center; /* Aligns content horizontally */
            align-items: center; /* Aligns content vertically */
        }

        .profile-image {
            max-width: 100%;
            max-height: 100%;
        }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        @can('dashboard-menu')
            <a class="navbar-brand"
               href="{{ (request()->route()->uri() == 'dashboard') ? 'javascript:void(0)' : route('dashboard') }}">Example
                App</a>
        @endcan

        @can('roles-menu')
            <a class="navbar-brand" href="{{route('roles.index')}}">Roles</a>
        @endcan
        @can('permissions-menu')
            <a class="navbar-brand" href="{{route('permissions.index')}}">Permissions</a>
        @endcan
        @can('customers-menu')
            <a class="navbar-brand" href="{{route('customers.index')}}">Customers</a>
        @endcan
        @can('suppliers-menu')
            <a class="navbar-brand" href="{{route('suppliers.index')}}">Suppliers</a>
        @endcan
        @can('users-menu')
            <a class="navbar-brand" href="{{route('users.index')}}">Users</a>
        @endcan
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link">{{ auth()->user()->first_name }}</span>
                    </li>
                    @if(isset(auth()->user()->roles()->first()->name))
                        <li class="nav-item">
                            <span class="nav-link">{{ auth()->user()->roles()->first()->name }}</span>
                        </li>
                    @endif
                    @if(isset(auth()->user()->userFiles()->first()->name))
                        <li class="nav-item">
                            <div class="profile-image-container">
                                <img
                                    src="{{ asset('uploads/profile_picture/'. auth()->user()->userFiles()->first()->name) }}"
                                    alt="Profile Picture"
                                    class="profile-image"
                                    style="height: auto; width: auto; max-width: 40px; max-height: 40px;">
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link logout" id="logout" href="javascript:void(0)"
                           onclick="callLogoutAjaxRequest()">
                            Logout
                        </a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

@stack('scripts')
<script>
    function callLogoutAjaxRequest() {
        $.ajax({
            url: "{{ route('logout') }}",
            type: "POST",
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function (data) {
                if (data.code == 200) {
                    localStorage.removeItem('access_token');
                    location.reload()
                }
            }
        });
    }
</script>
</body>
</html>
