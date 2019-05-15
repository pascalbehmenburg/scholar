@extends('master')
@section('title', 'Substitution Schedule')
@section('include')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/rg-1.1.0/sl-1.3.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/rg-1.1.0/sl-1.3.0/datatables.min.js"></script>
    <script src="{{asset('js/dataTables.altEditor.free.js')}}"></script>
    <script type="text/javascript" class="init">
        $(function () {
            //TO-DO
            //add routine + trigger on update to store each and every editing + its editor
            //always fetch the latest data from database in SubScheduleController and SubSchedule Model
            const table = $('#sub-schedule').dataTable( {
                "aaData": JSON.parse('{!! $sub_schedule_content !!}'),
                dom:"<'row'<'col-sm-12 col-md-6 mt-3'B><'col-sm-12 col-md-6 mt-3'f>>" + "<'row'<'col-lg-12'tr>>" + "<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7 text-right'i>>",
                select: 'single',
                altEditor: true,
                lengthChange: false,
                buttons: [
                    {extend: 'print', className: 'btn-sm btn-primary', text: 'Print', name: 'print', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    {extend: 'csv', className: 'btn-sm btn-primary', text: 'CSV', name: 'csv', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    {extend: 'pdf', className: 'btn-sm btn-primary', text: 'PDF', name: 'pdf', init: function(api, node, config) {$(node).removeClass('btn-secondary')}}
                    @can('substitution-schedule-update')
                    ,{className: 'btn-sm btn-success', text: 'Add', name: 'add'},
                    {className: 'btn-sm btn-warning', text: 'Edit', name: 'edit'},
                    {className: 'btn-sm btn-danger', text: 'Delete', name: 'delete'},
                    {className: 'btn-sm btn-info', text: 'Save', name: 'save', action: function ( e, dt, node, config ) {
                            post('/substitution-schedule/update', {_token: '{{csrf_token()}}', content: JSON.stringify(dt.rows().data().toArray())});
                        }}
                    @endcan
                ],
                "aoColumns": [
                    { "sTitle": "Date", "visible": false },
                    { "sTitle": "Class"},
                    { "sTitle": "Lesson"},
                    { "sTitle": "Room"},
                    { "sTitle": "Teacher"},
                    { "sTitle": "Subject" },
                    { "sTitle": "Reason"}
                ],
                "rowGroup": {dataSrc: 0},
            });
        });

        function post(path, params, method='post') {
            const form = document.createElement('form');
            form.method = method;
            form.action = path;

            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endsection
@section('content')
    <?php $sub_schedule = json_decode($sub_schedule_content, true); ?>
    <div class="container">
        <table role="grid" class="table table-bordered display" id="sub-schedule">
            <thead>
            <tr>
                <th>Date</th>
                <th>Class</th>
                <th>Lesson</th>
                <th>Room</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Reason</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection