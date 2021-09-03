<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />

    <title>Expenses Management Tool</title>

    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">
                Expenses Management
            </a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </nav>
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                              Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>                    
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                        <span>User Management</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="/user-management/role">
                                Role
                            </a>
                        </li>          
                        <li class="nav-item">
                            <a class="nav-link" href="/user-management/user">
                                User
                            </a>
                        </li> 
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                        <span>Expense Management</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="/expense-management/category">
                                Categories
                            </a>
                        </li>          
                        <li class="nav-item">
                            <a class="nav-link" href="/expense-management/expenses">
                                Expenses
                            </a>
                        </li> 
                    </ul>
                </div>
            </nav>
        
            <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
                <div id="app"></div>
            </main>

        </div>
    </div>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    
</body>

</html>