<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Online Dissertation Advisors</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #000B20;
            --on-primary: #FFFFFF;
            --secondary: #785900;
            --secondary-container: #FDC003;
            --tertiary: #220001;
            --surface: #F8F9FA;
            --surface-container-low: #F1F3F5;
            --surface-container-lowest: #FFFFFF;
            --outline-variant: rgba(0, 11, 32, 0.15);
            --radius-lg: 0.5rem;
            --radius-xl: 0.75rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Manrope', sans-serif;
        }

        body {
            background-color: var(--surface);
            color: var(--primary);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--primary);
            color: var(--on-primary);
            padding: 2rem 1rem;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 2.5rem;
            padding: 0 1rem;
            color: var(--secondary-container);
        }

        .nav-list {
            list-style: none;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: block;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: var(--radius-lg);
            transition: all 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--on-primary);
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1rem;
        }

        /* Main Content */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        header {
            background-color: var(--surface-container-lowest);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--outline-variant);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        main {
            padding: 2rem;
            flex-grow: 1;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
        }

        /* UI Components */
        .card {
            background-color: var(--surface-container-lowest);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-xl);
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: transform 0.1s;
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--on-primary);
        }

        .btn-secondary {
            background-color: var(--secondary-container);
            color: var(--primary);
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-success { background: #dcfce7; color: #166534; }
        .badge-warning { background: #fef9c3; color: #854d0e; }
        .badge-info { background: #dbeafe; color: #1e40af; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 1rem;
            border-bottom: 2px solid var(--surface-container-low);
            font-weight: 700;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--surface-container-low);
        }

        /* Forms */
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
        input, select, textarea {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.25rem;
            border: 1px solid var(--outline-variant);
            font-size: 1rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-brand">ODA CMS</div>
        <nav class="nav-list">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">Pages</a></li>
            <li class="nav-item"><a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a></li>
            <li class="nav-item"><a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">Blog</a></li>
            <li class="nav-item"><a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">Inquiries</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">Orders</a></li>
            <li class="nav-item"><a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">Testimonials</a></li>
            <li class="nav-item"><a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">FAQs</a></li>
            <li class="nav-item"><a href="{{ route('admin.menus.index') }}" class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">Navigation</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Settings</a></li>
        </nav>
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link" style="background:none; border:none; width:100%; text-align:left; cursor:pointer;">Logout</button>
            </form>
        </div>
    </aside>

    <div class="main-wrapper">
        <header>
            <div class="breadcrumb">Admin / {{ ucfirst(request()->segment(2)) }}</div>
            <div class="user-menu">
                <span>Welcome, {{ auth()->user()->name }}</span>
            </div>
        </header>

        <main>
            @if(session('success'))
                <div class="card" style="background: #dcfce7; color: #166534; margin-bottom: 2rem; border: none;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="card" style="background: #fee2e2; color: #991b1b; margin-bottom: 2rem; border: none;">
                    <strong style="display: block; margin-bottom: 0.5rem;">There were errors with your submission:</strong>
                    <ul style="margin-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
