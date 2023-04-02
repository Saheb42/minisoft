@extends('Admin.Layout.main')

@section('main_section')

{{-- {{ dd($data) }} --}}

<div class="card m-1">
    <div class="card-body row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <h2 style="text-align: center;">Modify Your Details</h2>
            <form action="{{ route('admin.service_update') }}" method="post" class="row">
                @csrf
                <div class="col-md-12 mb-4">
                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                    <label class="from-label mb-2">Service Name</label>
                    <input type="text" required value="{{ $data[0]->s_name }}" id="ser_name" name="ser_name" placeholder="Enter Service Name" aria-describedby="emailHelp" class="form-control">
                    <div id="ser_name_msg">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="from-label mb-2">Service Price</label>
                    <input type="text" value="{{ $data[0]->s_price }}" id="ser_price" name="ser_price" placeholder="Enter Service Price" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_price_msg"></span>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="from-label mb-2">Expenses</label>
                    <input value="{{ $data[0]->s_expenses }}" type="text" id="ser_expenses" name="ser_expenses" placeholder="Enter Expenses" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_expenses_msg"></span>
                </div>
                <div class="col-md-12 mb-4" id="com_div_1">
                    <label class="from-label mb-2">Commission 1</label>
                    <input value="{{ $data[0]->s_com1 }}" type="text" id="ser_com1" name="ser_com1" placeholder="Enter Commission 1" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_com1_msg"></span>
                </div>
                <div class="col-md-6 mb-4" id="com_div_2">
                    <label class="from-label mb-2">Commission 2</label>
                    <input value="{{ $data[0]->s_com2 }}" type="text" id="ser_com2" name="ser_com2" placeholder="Enter Commission 2" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_com2_msg"></span>
                </div>
                <div class="col-md-6 mb-4" id="com_div_3">
                    <label class="from-label mb-2">Commission 3</label>
                    <input value="{{ $data[0]->s_com3 }}" type="text" id="ser_com3" name="ser_com3" placeholder="Enter Commission 3" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_com3_msg"></span>
                </div>
                <div class="col-md-12">
                    <center><input type="submit" value="Submit" class="btn btn-info btn-sm"></center>
                </div>
            </form>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

@endsection

@section('custom_js')

<script>
    $('#ser_name').change(function (e) {
                e.preventDefault();
                var x = $('#ser_name').val();

                var y = '{{ $data[0]->s_name }}';
                var url = "{{ route('admin.service_chk_single_data') }}";
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        't_n': 'services',
                        'f_n': 's_name',
                        'f_v': x
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if(response.length==0){
                            $('#ser_name_msg').html('<span class="text-success" id="ser_name_msg">Data Not Exist</span>');
                        }
                        else{
                            if(response[0].s_name == y){
                                $('#ser_name').val(y);
                            $('#ser_name_msg').html('<span class="text-success" id="ser_name_msg"></span>');

                            }
                            else{
                            $('#ser_name').val('');
                            $('#ser_name_msg').html('<span class="text-danger" id="ser_name_msg">Data Already Exist</span>');
                            }
                        }
                    }
                });
        });
</script>


@endsection
