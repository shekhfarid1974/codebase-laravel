<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >

    <style>
        .form-label{
            font-weight: 600;
            margin-bottom: 0 !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #dee2e6;
        }
        .select2-container .select2-selection--single {
            height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #dee2e6;
        }
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #dee2e6;
        }
        .select2-container .select2-selection--multiple {
            min-height: 38px;
        }
        .nav-pills .nav-link, .nav-pills .show > .nav-link {
            color: #198754;
        }
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: #198754;
        }
        .card-title,.agent-info {
            color: #198754;
        }
        .select2.select2-container.select2-container--default {
            width: 100% !important;
        }
    </style>

    @stack('styles')
</head>
<body>
    <div id="topbar-loader" class="d-none"></div>

    <div class="container">
        @yield('content')
    </div>

    <!-- Common Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    @stack('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>
