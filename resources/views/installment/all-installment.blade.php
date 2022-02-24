
@extends('master.master')

@section('content')



<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}

<div class="container-fluid">

    <form method="POST" action="@if (Auth::guard('super_admin')->check()) {{ route('super_admin.multi.installments.create.store',$user->id) }}
        @elseif(Auth::guard('admin')->check()) {{ route('admin.multi.installments.create.store',$user->id)}} @elseif(Auth::guard('employee')->check()) {{ route('employee.multi.installments.create.store',$user->id)}} @endif">
        @csrf


        <!-- Button trigger modal -->

    <div class="row">
        <div class="col-lg-6">
            <h4>All Installment</h4>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade @error('multiPayment')show @enderror"   @error('multiPayment')style="display: block;" @enderror id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Multi Installment Amount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <input type="number" name="multiPayment" placeholder="৳..." class="form-control @error('multiPayment') is-invalid @enderror">
            @error('multiPayment')
                <span class="text-danger">{{$message}}</span>
            @enderror
            
            <h5 class="mb-0 mt-3">Paid Date</h5>
            <input type="date" class="form-control mt-3"  name="paid_date" id="">
            
            <select class="form-select mt-3" name="payment_type"  id="validationCustom04" required>
                    <option selected disabled value="">Payment Type</option>
                    <option value="cash" >Cash</option>
                    <option value="bank">Bank</option>
                    <option value="check">Check</option>
                </select>
            <input type="text" class="form-control mt-3" name="note" placeholder="Note....." id="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="close" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-success" type="submit">Multiple Payment</button>
        </div>

      </div>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-6">

            <div class="card ">
            <div class=" card-body">
            <h4 class="card-title">All Installment</h4>
            <hr>
            {{-- <form method="POST" action="{{route('super_admin.multi.installments.create.store',$user->id)}}"> --}}
                {{-- @csrf --}}
                <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Multiple Payment</button>
            {{-- </form> --}}
        </div>
        </div>
    </div>

   </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">



                    @php
                        $monthCounter = 0;
                        $yearCounter = 0;
                        $addMonth = 1;
                        $paymentCheck=1;
                    @endphp

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead>
                                <tr>
                                    <th>Installment Information</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Paid Date</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                    <th style="width: 250px">Note</th>
                                    <th>Check Box</th>
                                </tr>
                            </thead>
                            <tbody>

                                @for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)

                                    @php
                                        $monthCounter++;
                                    @endphp

                                    <tr>
                                        <th>Installment {{$i+1}}</th>

                                        @if (isset($user->Installment[$i]))
                                            <td>{{$user->Installment[$i]->installment_amount}}</td>
                                        @else
                                            <td>{{$user->installment_year->installment_years_amount[$yearCounter]}}</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>{{$user->Installment[$i]->payment_installment_type}}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>Paid: {{$user->Installment[$i]->installment_paid}}</td>
                                        @else
                                            <td>Paid: 0</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>Due: {{$user->Installment[$i]->installment_due}}</td>
                                        @else
                                            <td>Due: 0</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            @if ($user->Installment[$i]->installment_amount == $user->Installment[$i]->installment_due)

                                                <td>Not Paid Yet</td>

                                            @else

                                                <td>{{\Carbon\Carbon::parse($user->Installment[$i]->installment_date)->format('d-M-Y')}}</td>

                                            @endif
                                        @else
                                            <td>Not Paid Yet</td>
                                            {{-- <td>{{\Carbon\Carbon::parse($paid_date->startOfMonth())->format('d-M-Y')}}</td> --}}
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            @if ($user->Installment[$i]->installment_due_date == null)

                                                <td>{{$user->Installment[$i]->installment_due_date}}</td>

                                            @else

                                                <td>{{\Carbon\Carbon::parse($user->Installment[$i]->installment_due_date)->format('d-M-Y')}}</td>

                                            @endif
                                        @else
                                            <td>{{\Carbon\Carbon::parse($paid_date->startOfMonth())->format('d-M-Y')}}</td>
                                        @endif


                                        @if (isset($user->Installment[$i]))



                                            <td><a href="@if(Auth::guard('admin')->check()){{route('admin.installments.edit',$user->Installment[$i]->id)}} @elseif(Auth::guard('super_admin')->check()){{route('super_admin.installments.edit',$user->Installment[$i]->id)}} @elseif(Auth::guard('employee')->check()){{route('employee.installments.edit',$user->Installment[$i]->id)}} @endif" class="btn @if ($user->Installment[$i]->installment_due==0)
                                                btn-success
                                            @else
                                                btn-warning
                                            @endif ">Edit</a></td>

                                        @else

                                            @if ($paymentCheck == 1)

                                                <td><a href="@if(Auth::guard('admin')->check()) {{route('admin.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}}@elseif(Auth::guard('super_admin')->check()){{route('super_admin.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}} @elseif(Auth::guard('employee')->check()){{route('employee.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}} @endif" class="btn btn-primary">Payment</a></td>
                                                @php
                                                    $paymentCheck=0;
                                                @endphp

                                                @php


                                                    $date = $paid_date->startOfMonth();



                                                    $check_date=Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->isPast();



                                                    if($check_date){
                                                        // dd($date);
                                                        $createInstallment = new App\Models\Installment;
                                                        $createInstallment->user_id = $user->id;
                                                        $createInstallment->crm_id = $user->crm_id;
                                                        $createInstallment->installment_no = $i+1;


                                                        $createInstallment->installment_amount =$user->installment_year->installment_years_amount[$yearCounter];
                                                        $createInstallment->installment_paid =0;
                                                        $createInstallment->installment_due = $user->installment_year->installment_years_amount[$yearCounter];
                                                        $createInstallment->installment_date = $date;

                                                        $endDate = $createInstallment->installment_date;
                                                        $finalEndDate=Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $endDate)->endOfMonth();

                                                        $createInstallment->installment_due_date = $finalEndDate;
                                                        $createInstallment->payment_installment_type = 'cash';
                                                        $createInstallment->installment_note = '';
                                                        $createInstallment->save();
                                                        // dd($createInstallment->installment_date);



                                                        header("Refresh:0");
                                                    }

                                                @endphp

                                            @else

                                                <td><a href="javascript:void(0)" class="btn btn-dark" >Payment</a></td>

                                            @endif

                                        @endif


                                        @if (isset($user->Installment[$i]))
                                            <td>{{$user->Installment[$i]->installment_note}}</td>
                                        @else
                                            <td></td>
                                        @endif


                                        @if (isset($user->Installment[$i]))
                                            @if($user->Installment[$i]->installment_due!=0)

                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="check[{{$user->Installment[$i]->id}}]" value="{{$user->Installment[$i]->id}}" id="flexCheckDefault">


                                                    </div>
                                                </td>
                                            @else
                                            <td></td>
                                            @endif
                                        @else
                                            <td></td>
                                        @endif




                                        @php
                                            if($monthCounter==12)
                                            {
                                                $monthCounter = 0;
                                                $yearCounter++;
                                            }
                                            $paid_date->addMonthsNoOverflow(1)->startOfMonth();
                                        @endphp


                                    </tr>
                                @endfor


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



        </form>


</div>
@endsection

@section('script')

<script>
    $('#close').on('click',function()
    {
        console.log('work');
        $('#exampleModal').hide();
    });

</script>

@endsection















