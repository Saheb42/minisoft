@extends('Admin.Layout.main')

@section('title')
<title>Staff Entry</title>
@endsection


@section('main_section')

<div class="card m-1">
    <div class="card-body row">
        <div class="col-md-12">
            <form action="{{ route('admin.staffs_create') }}" method="post" class="row">
                @csrf
                <div class="col-md-4 mb-4">
                    <label class="from-label mb-2">Aadhaar Card</label>
                    <input type="text" onkeypress="limitKeypress(event,this.value,12)" id="addhar_card" name="addhar_card" placeholder="Enter Service Name" aria-describedby="emailHelp" class="form-control">
                    <div id="addhar_card_msg">

                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="from-label mb-2">Staff ID</label>
                    <input type="text" id="staff_id" name="staff_id" readonly value="{{ $final }}" aria-describedby="emailHelp" class="form-control">
                    <div id="staff_id_msg">

                    </div>
                </div>
                <div style="display: none;" id="other_section" class="row">
                    <div class="col-md-4 mb-4">
                        <label class="from-label mb-2">Name</label>
                        <input type="text" id="user_name" name="user_name" placeholder="Enter Your Name" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="from-label mb-2">Address</label>
                        <textarea type="text" id="user_add" name="user_add" placeholder="Enter Address" aria-describedby="emailHelp" class="form-control"></textarea>
                        <span class="text-danger" id="user_add_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4" id="com_div_1">
                        <label class="from-label mb-2">Pincode</label>
                        <input type="number" id="user_pin" name="user_pin" placeholder="Enter Pincode" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_pin_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4" id="com_div_2">
                        <label class="from-label mb-2">Photo</label>
                        <input type="text" id="user_photo" name="user_photo" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_photo_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4" id="com_div_3">
                        <label class="from-label mb-2">Phone No....</label>
                        <input type="number" id="user_phn_num" name="user_phn_num" placeholder="Enter Phone Number" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_phn_num_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4" id="com_div_3">
                        <label class="from-label mb-2">Document</label>
                        <input type="text" id="user_docs" name="user_docs" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_docs_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4" id="com_div_3">
                        <label class="from-label mb-2">Email Address</label>
                        <input type="email" id="user_email_add" name="user_email_add" placeholder="Enter Email Address" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_email_add_msg"></span>
                    </div>
                    <div class="col-md-4 mb-4" id="com_div_3">
                        <label class="from-label mb-2">Password</label>
                        <input type="password" id="user_pass" name="user_pass" placeholder="Enter Password" aria-describedby="emailHelp" class="form-control">
                        <span class="text-danger" id="user_pass_msg"></span>
                    </div>
                    <div class="col-md-12">
                        <center><input type="submit" value="Submit" class="btn btn-info btn-sm"></center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('custom_js')
<script>
            $('#addhar_card').change(function (e) {
                e.preventDefault();
                var x = $('#addhar_card').val();

                if(x.length == 12)
                {
                    var url = "{{ route('admin.service_chk_single_data') }}";
                    $.ajax({
                        type: "get",
                        url: url,
                        data: {
                            't_n': 'staffs',
                            'f_n': 'aadhaar_card',
                            'f_v': x
                        },
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            if(response.length==0){
                                $('#other_section').show();
                                $('#addhar_card_msg').html('');

                            }
                            else{
                                $('#other_section').hide();
                                $('#addhar_card_msg').html('<span class="text-danger" id="addhar_card_msg">Data Already Exist</span>');
                            }
                        }
                    });
                }
                else
                {
                    $('#addhar_card').val('');
                    $('#other_section').hide();
                    $('#addhar_card_msg').html('<span class="text-danger" id="addhar_card_msg">Please Enter Valid ID</span>');
                }




            });
</script>
@endsection
