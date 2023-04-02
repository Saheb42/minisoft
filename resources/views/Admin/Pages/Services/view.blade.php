@extends('Admin.Layout.main')


@section('title')
<title>Service Entry</title>
@endsection



@section('main_section')

{{-- {{ dd($data) }} --}}

<div class="card m-1">
    <div class="card-body row">
        <div class="col-md-4">
            <form action="{{ route('admin.service_create') }}" method="post" class="row">
                @csrf
                <div class="col-md-12 mb-4">
                    <label class="from-label mb-2">Service Name</label>
                    <input type="text" id="ser_name" name="ser_name" placeholder="Enter Service Name" aria-describedby="emailHelp" class="form-control">
                    <div id="ser_name_msg">

                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="from-label mb-2">Service Price</label>
                    <input type="text" id="ser_price" name="ser_price" placeholder="Enter Service Price" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_price_msg"></span>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="from-label mb-2">Expenses</label>
                    <input type="text" id="ser_expenses" name="ser_expenses" placeholder="Enter Expenses" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_expenses_msg"></span>
                </div>
                <div class="col-md-12 mb-4" id="com_div_1">
                    <label class="from-label mb-2">Commission 1</label>
                    <input type="text" id="ser_com1" name="ser_com1" placeholder="Enter Commission 1" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_com1_msg"></span>
                </div>
                <div class="col-md-6 mb-4" id="com_div_2">
                    <label class="from-label mb-2">Commission 2</label>
                    <input type="text" id="ser_com2" name="ser_com2" placeholder="Enter Commission 2" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_com2_msg"></span>
                </div>
                <div class="col-md-6 mb-4" id="com_div_3">
                    <label class="from-label mb-2">Commission 3</label>
                    <input type="text" readonly id="ser_com3" name="ser_com3" placeholder="Enter Commission 3" aria-describedby="emailHelp" class="form-control">
                    <span class="text-danger" id="ser_com3_msg"></span>
                </div>
                <div class="col-md-12">
                    <center><input type="submit" value="Submit" class="btn btn-info btn-sm"></center>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl. No.</th>
                                    <th class="text-center">S Name</th>
                                    <th class="text-center">SPrice</th>
                                    <th class="text-center">Exp</th>
                                    <th width="20%" class="text-center">Com</th>
                                    <th width="20%" class="text-center">Com Amt</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $item)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ $item->s_name }}</td>
                                        <td>{{ $item->s_price }}</td>
                                        <td>{{ $item->s_expenses }}</td>
                                        <td>
                                            com1 - {{ $item->s_com1 }}%<br>
                                            com2 - {{ $item->s_com2 }}%<br>
                                            com3 - {{ ($item->s_com3== null)?"0":$item->s_com3 }}%
                                        </td>

                                        <td>
                                            @php
                                                $t_amt = $item->s_price - $item->s_expenses;
                                                $com1_amt = (double)($t_amt * $item->s_com1)/100;
                                                $com2_amt = (double)($t_amt * $item->s_com2)/100;
                                                $com3_amt = (double)($t_amt * $item->s_com3)/100;

                                            @endphp
                                            com1 - {{ $com1_amt }}/-<br>
                                            com2 - {{ $com2_amt }}/-<br>
                                            com3 - {{ $com3_amt }}/-


                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary rounded-circle" data-toggle="modal" data-target="#editModal{{ $item->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <a href="{{ route('admin.service_delete',$item->id) }}" onclick="return confirm('Are you sure?')">
                                                <button type="button" class="btn btn-sm btn-danger rounded-circle">
                                                    <span><i class="fa-solid fa-trash-can"></i></span>
                                                </button></a>
                                            @include('Admin.Pages.Services.modal.services_edit_modal')
                                            {{-- <a href="{{ route('admin.service_edit',$item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js-code')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var total = 100;
        var sum = 0;
        var com1=0,com2=0,com3=0;
        $(document).ready(function () {
            $('#com_div_2').hide();
            $('#com_div_3').hide();
        });

        $('#ser_name').change(function (e) {
                e.preventDefault();
                var x = $('#ser_name').val();


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
                            $('#ser_name').val('');
                            $('#ser_name_msg').html('<span class="text-danger" id="ser_name_msg">Data Already Exist</span>');
                        }
                    }
                });

        });

        $('#ser_com1').change(function (e) {
            e.preventDefault();

            var x = $('#ser_com1').val();
            sum = 0;
            com2 = 0;
            com3 = 0;
            $('#com_div_2').hide();
            $('#com_div_3').hide();
            $('#ser_com2').val('');
            $('#ser_com3').val('');

            if(x != '')
            {
                com1 = x;
                if(parseInt(com1)+parseInt(com2)+parseInt(com3) < total){
                    sum = parseInt(com1);
                    $('#com_div_2').show();
                    console.log(com1);
                    console.log(com2);
                    console.log(com3);
                }
                else
                {
                    $('#ser_com1').val('');
                    sum = 0;
                    com1 = 0;
                    com2 = 0;
                    com3 = 0;
                }
            }
            else{
                $('#com_div_2').hide();
            }


        });

        $('#ser_com2').change(function (e) {
            e.preventDefault();

            var x = $('#ser_com2').val();

            if(x != '')
            {
                com2 = x;
                if(parseInt(com1)+parseInt(com2)+parseInt(com3) < total){
                    sum = parseInt(com1)+parseInt(com2);
                    $('#com_div_3').show();
                    com3 = total - sum;
                    $('#ser_com3').val(com3);
                    console.log(com1);
                    console.log(com2);
                    console.log(com3);
                }
                else if(parseInt(com1)+parseInt(com2)+parseInt(com3)==100)
                {
                    sum = parseInt(com1)+parseInt(com2);
                    console.log(com1);
                    console.log(com2);
                    console.log(com3);
                }
                else
                {
                    $('#ser_com2').val('');
                    $('#com_div_3').hide();
                    $('#ser_com3').val('');
                    sum = 0;
                    com2 = 0;
                    com3 = 0;
                }
            }
            else{
                $('#com_div_3').hide();
            }


        });





    </script>



@endsection
