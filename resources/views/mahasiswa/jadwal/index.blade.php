<x-app-layout>
    @if ($pesan = Session::get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! $pesan !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <x-slot name='header'>Jadwal</x-slot>
    <x-slot name="styles">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fullcalendar/main.css') }}">
    </x-slot>

    <div class="row pl-2 pb-3">
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Pilih jadwal</a>
    </div>

    <div class="card card-primary">
        <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <x-slot name="scripts">
        <!-- fullCalendar 2.2.5 -->
        <script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin-lte/plugins/fullcalendar/main.js') }}"></script>
        <!-- Page specific script -->
        <script>
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
            console.log(Date(y, m, d));
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    // headerToolbar: {
                    //     left: 'prev,next today',
                    //     center: 'title',
                    //     right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    // },
                    initialView: 'timeGridWeek',
                    editable: true,
                    themeSystem: 'bootstrap',
                    events: "{{ route('jadwal.get') }}"
                    // [
                    //     {
                    //         title: 'All Day Event',
                    //         start: new Date(y, m, d),
                    //         backgroundColor: '#f56954', //red
                    //         borderColor: '#f56954', //red
                    //         allDay: true
                    //     },
                    // ],
                });
                calendar.render();
            });
        </script>
    </x-slot>
</x-app-layout>