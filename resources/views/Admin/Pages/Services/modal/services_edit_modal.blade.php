<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modify {{ $item->s_name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.service_update') }}" method="post" class="row">
          @csrf
        <div class="modal-body row ms-3 me-3">

              <div class="col-md-12 mb-4">
                  <input type="hidden" name="update_id" value="{{ $item->id }}">
                  <label class="from-label mb-2">Service Name</label>
                  <input value="{{ $item->s_name }}" type="text" id="update_ser_name" name="update_ser_name" placeholder="Enter Service Name" aria-describedby="emailHelp" class="form-control">
                  <div id="update_ser_name_msg">

                  </div>
              </div>
              <div class="col-md-6 mb-4">
                  <label class="from-label mb-2">Service Price</label>
                  <input value="{{ $item->s_price }}" required type="text" id="update_ser_price"  name="update_ser_price" placeholder="Enter Service Price" aria-describedby="emailHelp" class="form-control">
                  <span class="text-danger" id="update_ser_price_msg"></span>
              </div>
              <div class="col-md-6 mb-4">
                  <label class="from-label mb-2">Expenses</label>
                  <input value="{{ $item->s_expenses }}" type="text" id="update_ser_expenses" name="update_ser_expenses" placeholder="Enter Expenses" aria-describedby="emailHelp" class="form-control">
                  <span class="text-danger" id="update_ser_expenses_msg"></span>
              </div>
              <div class="col-md-12 mb-4" id="com_div_1">
                  <label class="from-label mb-2">Commission 1</label>
                  <input value="{{ $item->s_com1 }}" type="text" id="update_ser_com1" name="update_ser_com1" placeholder="Enter Commission 1" aria-describedby="emailHelp" class="form-control">
                  <span class="text-danger" id="update_ser_com1_msg"></span>
              </div>
              <div class="col-md-6 mb-4" id="com_div_2">
                  <label class="from-label mb-2">Commission 2</label>
                  <input value="{{ $item->s_com2 }}" type="text" id="update_ser_com2" name="update_ser_com2" placeholder="Enter Commission 2" aria-describedby="emailHelp" class="form-control">
                  <span class="text-danger" id="update_ser_com2_msg"></span>
              </div>
              <div class="col-md-6 mb-4" id="com_div_3">
                  <label class="from-label mb-2">Commission 3</label>
                  <input value="{{ $item->s_com3 }}" type="text" id="update_ser_com3" name="update_ser_com3" placeholder="Enter Commission 3" aria-describedby="emailHelp" class="form-control">
                  <span class="text-danger" id="update_ser_com3_msg"></span>
              </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  style="margin-right: 10%;">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>


