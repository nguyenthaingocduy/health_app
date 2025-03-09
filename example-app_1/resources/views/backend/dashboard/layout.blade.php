<!DOCTYPE html>
<html>

@include('backend.dashboard.component.head')

<body>
    <div id="wrapper">
        @include('backend.dashboard.component.sidebar')

        <div id="page-wrapper" class="gray-bg">
            @include('backend.dashboard.component.nav')
            @include($template)
            @include('backend.dashboard.component.footer')
        </div>

   
    </div>

    <!-- Mainly scripts -->
    @include('backend.dashboard.component.script')
</body>
</html>
