<script src="{{ url('/') }}/assets/js/oneui.app.min.js"></script>


@yield('custom-js-code')


<!-- jQuery (required for Select2 + jQuery Validation plugins) -->
<script src="{{ url('/') }}/assets/js/lib/jquery.min.js"></script>
<!-- Page JS Plugins -->
<script src="{{ url('/') }}/assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ url('/') }}/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ url('/') }}/assets/js/plugins/jquery-validation/additional-methods.js"></script>
<!-- Page JS Helpers (Select2 plugin) -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider']);</script>
{{-- <script>One.helpersOnLoad(['jq-select2']);</script> --}}
<!-- Page JS Code -->

<script src="{{ url('/') }}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- Page JS Code -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/assets/js/pages/be_tables_datatables.min.js"></script>
<script src="{{ url('/') }}/assets/js/pages/be_forms_validation.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> --}}
<script>
      function limitKeypress(event, value, maxLength) {
        if (value != undefined && value.toString().length >= maxLength) {
        event.preventDefault();
        }
        }
</script>



