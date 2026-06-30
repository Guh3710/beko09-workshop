<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- AdminLTE CSS -->
<link rel="stylesheet" href="{{ asset('adminlte3/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<style>
    .main-sidebar {
        background: linear-gradient(140deg, #0f2027, #203a43, #2c5364) !important;
    }

    .main-header.navbar {
        background: linear-gradient(90deg, #0f2027, #203a43, #2c5364) !important;
        border-bottom: none;
    }

    .main-sidebar .nav-link,
    .main-sidebar .brand-link {
        color: #fff !important;
    }

    .main-sidebar .nav-link.active,
    .main-sidebar .nav-link:hover {
        background: #007bff !important;
        color: #fff !important;
    }

    .content-wrapper,
    .main-footer {
        background: linear-gradient(90deg, #0f2027, #203a43, #2c5364) !important;
        color: #ffffff;
    }

    .main-footer {
        border-top: none;
        text-align: center;
        font-weight: 500;
    }

    .card {
        background: #ffffff;
        color: #333;
        border-radius: 8px;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
    }

    table.dataTable thead th {
        background: #ff3c00;
        color: #fff;
        text-align: center;
    }

    .small-box {
        border-radius: 8px;
        color: #fff !important;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
    }

    .search-box {
        background: #2c2c2c;
        border: 1px solid #3a3a3a;
        color: #fff;
        border-radius: 6px;
        padding: 6px 10px;
    }

    .search-box::placeholder {
        color: #aaa;
    }

    .search-box:focus {
        background: #2c2c2c;
        border: 1px solid #ffffff;
        color: #fff;
        outline: none;
        box-shadow: none;
    }

    .paginate-select {
        background: #2c2c2c;
        border: 1px solid #3a3a3a;
        color: #fff;
        border-radius: 6px;
        padding: 6px 10px;
    }

    .paginate-select:focus {
        background: #2c2c2c;
        border: 1px solid #fff;
        color: #fff;
        outline: none;
        box-shadow: none;
    }

    .pagination {
        justify-content: center;
    }

    .pagination .page-item .page-link {
        background: #2c2c2c;
        border: 1px solid #3a3a3a;
        color: #fff;
    }

    .pagination .page-item .page-link:hover {
        background: #3a3a3a;
        color: #fff;
    }

    .pagination .page-item.active .page-link {
        background: #007bff;
        border-color: #007bff;
    }

    .table.table-bordered {
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
    }

    .table.table-bordered th,
    .table.table-bordered td {
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
    }
</style>
