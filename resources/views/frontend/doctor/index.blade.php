@extends('frontend.layouts.base')

@section('title', 'Doctor')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Doctor</h2>
    </div>
</div>
<!-- hero section end -->



@endsection

@section('scripts')
<script>
    $('#district').change(function() {
        var id = $(this).val();

        if (id == 0) {
            $('#location').html("All Bangladesh");
            $('#locationModal').modal('hide');
        } else {
            $.ajax({
                url: "/get-city/" + id,
                dataType: "json",
                success: function(data) {
                    $('#city_div').html(data.data);
                }
            })
        }


    })


    $(document).on('click', '.city', function() {
        var name = $(this).attr('data-value');
        var id = $(this).attr('data-id');

        $('#location').html(name);
        $('#city_id').val(id);

        $('#locationModal').modal('hide');
    });
</script>
@endsection