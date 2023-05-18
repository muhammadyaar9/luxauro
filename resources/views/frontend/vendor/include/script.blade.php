<!-- / Layout wrapper -->



<script src=" {{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src=" {{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src=" {{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

@if (session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Ok",
        });
    </script>
@endif
@if (session('error'))
    <script>
        swal({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            button: "Ok",
        });
    </script>
@endif

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
    // conutry state city
    $('#country-dd').on('change', function() {
        var idCountry = this.value;
        $("#state-dd").html('');
        $.ajax({
            url: "{{ url('api/fetch-states') }}",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $("#state-dd").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $('#city-dd').html('<option value="">Select City</option>');
            }
        });
    });
    $('#state-dd').on('change', function() {
        var idState = this.value;
        $("#city-dd").html('');
        $.ajax({
            url: "{{ url('api/fetch-cities') }}",
            type: "POST",
            data: {
                state_id: idState,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(res) {
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function(key, value) {
                    $("#city-dd").append('<option value="' + value
                        .name + '">' + value.name + '</option>');
                });
            }
        });
    });
</script>
