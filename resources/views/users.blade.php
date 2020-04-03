@extends('master')
@section('title', 'Users')
@section('include')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/rg-1.1.0/sl-1.3.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/rg-1.1.0/sl-1.3.0/datatables.min.js"></script>
    <!-- TO-DO: fix datatables editor <script type="text/javascript" src="../js/dataTables.altEditor.free.js"></script> -->
    <script type="text/javascript" class="init">
        $(function () {
            const table = $('#users').dataTable( {
                serverSide: true,
                ajax: '/users/data',
                dom:"<'row'<'col-sm-12 col-md-6 mt-3'B><'col-sm-12 col-md-6 mt-3'f>>" + "<'row'<'col-lg-12'tr>>" + "<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7 text-right'i>>",
                select: 'single',
                altEditor: true,
                lengthChange: false,
                buttons: [
                    {extend: 'print', className: 'btn-sm btn-primary', text: 'Print', name: 'print', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    {extend: 'csv', className: 'btn-sm btn-primary', text: 'CSV', name: 'csv', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    {extend: 'pdf', className: 'btn-sm btn-primary', text: 'PDF', name: 'pdf', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    //{className: 'btn-sm btn-success', text: 'Add', name: 'add'},
                    //{className: 'btn-sm btn-warning', text: 'Edit', name: 'edit'},
                    //{className: 'btn-sm btn-danger', text: 'Delete', name: 'delete'}
                ],
                columns: [
                    { data: "id", name: "id", id: "DT_RowId"},
                    { data: "email", name: "email"},
                    { data: "forename", name: "forename"},
                    { data: "surname", name: "surname" },
                    { data: "birthdate", name: "birthdate" },
                    { data: "city", name: "city"},
                    { data: "street", name: "street"},
                    { data: "phone_number", name: "phone_number"},
                    { data: "updated_at", name: "updated_at"},
                    { data: "created_at", name: "created_at"},
                ],
                "rowGroup": {dataSrc: 0},
            });
        });
    </script>
@endsection
@section('content')
    <div class="container">
        <table role="grid" class="table table-bordered display" id="users">
            <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Forename</th>
                <th>Surname</th>
                <th>Birth Date</th>
                <th>City</th>
                <th>Street</th>
                <th>Phone Number</th>
                <th>Last Update</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection