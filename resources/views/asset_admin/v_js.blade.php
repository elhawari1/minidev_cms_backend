 <!-- jQuery -->
 <script src="{{ asset('template_admin') }}/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('template_admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
 </script>
 <!-- ChartJS -->
 <script src="{{ asset('template_admin') }}/plugins/chart.js/Chart.min.js"></script>
 <!-- JQVMap -->
 <script src="{{ asset('template_admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('template_admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('template_admin') }}/plugins/moment/moment.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('template_admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
 </script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('template_admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('template_admin') }}/dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('template_admin') }}/dist/js/demo.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="{{ asset('template_admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/jszip/jszip.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- Page specific script -->
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         });
     });
 </script>
 <!-- Summernote -->
 <script src="{{ asset('template_admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
 <script>
     $(function() {
         // Summernote
         $('#summernote').summernote({
             placeholder: 'Description Product',
             tabsize: 2,
             height: 255
         });
     })
 </script>
 {{-- Sweet Alert2 --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- For Input Image --}}
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/fa/theme.min.js"></script>
 <script>
     $("#input-fa").fileinput({
         theme: "fa",
         uploadUrl: "/file-upload-batch/2"
     });
 </script>

 {{-- Date Time Left Navbar --}}
 <script>
     var tw = new Date();
     if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
     else(a = tw.getTime());
     tw.setTime(a);
     var year = tw.getFullYear();
     var day = tw.getDay();
     var month = tw.getMonth();
     var date = tw.getDate();
     var dayarray = new Array("Sunday,", "Monday,", "Tuesday,", "Wednesday,", "Thursday,", "Friday,", "Saturday,");
     var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September",
         "October", "November", "December");
     document.getElementById("datetime").innerHTML = dayarray[day] + " " + date + " " + montharray[month] +
         " " + year;
 </script>
 @yield('js')
