@extends('layouts.base')

    {{-- @if(in_array(request()->route()->getName(), ['dashboard', 'profile', 'profile-example', 'users', 'bootstrap-tables', 'transactions',
    'buttons',
    'forms', 'modals', 'notifications', 'typography', 'upgrade-to-pro']))
     --}}
    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        {{-- Footer --}}
        @yield('content')
        @include('layouts.footer')
    </main>
    
    {{-- @elseif(in_array(request()->route()->getName(), ['register', 'register-example', 'login', 'login-example',
    'forgot-password', 'forgot-password-example', 'reset-password','reset-password-example']))
     --}}
    {{-- Footer --}}
    @include('layouts.footer2')
    
    
    {{-- @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock'])) --}}
    
    
    {{-- @endif --}}



