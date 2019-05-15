@extends('master')
@section('title', 'Schedule')
@section('include')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/rg-1.1.0/sl-1.3.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/b-print-1.5.6/r-2.2.2/rg-1.1.0/sl-1.3.0/datatables.min.js"></script>
    <script src="{{asset('js/dataTables.altEditor.free.js')}}"></script>
    <script type="text/javascript" class="init">
        $(function () {
            const table = $('#schedule').dataTable( {
                "aaData": JSON.parse('{!! $schedule_content !!}'),
                dom:"<'row'<'col-sm-12 col-md-6 mt-3'B><'col-sm-12 col-md-6 mt-3'f>>" + "<'row'<'col-lg-12'tr>>" + "<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7 text-right'i>>",
                select: 'single',
                altEditor: true,
                lengthChange: false,
                buttons: [
                    {extend: 'print', className: 'btn-sm btn-primary', text: 'Print', name: 'print', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    {extend: 'csv', className: 'btn-sm btn-primary', text: 'CSV', name: 'csv', init: function(api, node, config) {$(node).removeClass('btn-secondary')}},
                    {extend: 'pdf', className: 'btn-sm btn-primary', text: 'PDF', name: 'pdf', init: function(api, node, config) {$(node).removeClass('btn-secondary')}}
                    @can('schedule-update')
                    ,{className: 'btn-sm btn-success', text: 'Add', name: 'add'},
                    {className: 'btn-sm btn-warning', text: 'Edit', name: 'edit'},
                    {className: 'btn-sm btn-danger', text: 'Delete', name: 'delete'},
                    {className: 'btn-sm btn-info', text: 'Save', name: 'save', action: function ( e, dt, node, config ) {
                            post('/schedule/update', {_token: '{{csrf_token()}}',id: '{!! $id !!}', content: JSON.stringify(dt.rows().data().toArray())});
                        }}
                    @endcan
                ],
                "aoColumns": [
                    { "sTitle": "Weekday", "visible": false  },
                    { "sTitle": "#"},
                    { "sTitle": "Subject" },
                    { "sTitle": "Teacher" },
                    { "sTitle": "Room" },
                    { "sTitle": "Week"}
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
    <?php $schedule = json_decode($schedule_content, true); ?>
    <div class="container">
        <table role="grid" class="table table-bordered display" id="schedule">
            <thead>
                <tr>
                    <th>Weekday</th>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Room</th>
                    <th>Week</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection