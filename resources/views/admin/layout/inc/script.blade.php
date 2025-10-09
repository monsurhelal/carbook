    <script src="{{ asset('admin') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('admin') }}/js/quixnav-init.js"></script>
    <script src="{{ asset('admin') }}/js/custom.min.js"></script>

    <script src="{{ asset('admin') }}/vendor/chartist/js/chartist.min.js"></script>

    <script src="{{ asset('admin') }}/vendor/moment/moment.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/pg-calendar/js/pignose.calendar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('admin') }}/js/dashboard/dashboard-2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.25.0/dist/sweetalert2.all.min.js"></script>
        // toastr massage
    	<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

     @stack('admin_script')