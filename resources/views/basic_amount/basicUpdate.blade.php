@extends('master.master')

@section('content')



<div class="container-fluid">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"><center>Update Basic Amount</center></h6>
                <!--<ol class="breadcrumb m-0">-->
                <!--    <li class="breadcrumb-item"><a href="#">Veltrix</a></li>-->
                <!--    <li class="breadcrumb-item"><a href="#">Forms</a></li>-->
                <!--    <li class="breadcrumb-item active" aria-current="page">Form Validation</li>-->
                <!--</ol>-->
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <!--<button class="btn btn-primary  dropdown-toggle" style="background: #333547" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">-->
                        <!--    <i class="mdi mdi-cog me-2"></i> Settings-->
                        <!--</button>-->
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <form method="POST" class="needs-validation"  action="@if(Auth::guard('admin')->check()){{ url('admin/basic/update/'.$user->id)}} @elseif(Auth::guard('super_admin')->check()){{ url('super-admin/basic/update/'.$user->id) }} @elseif(Auth::guard('employee')->check()){{ url('employee/basic/update/' . $user->id) }} @endif" enctype="multipart/form-data" >
        @csrf
            <div class="row">

                @if(!$installmentAmount && !$installmentYear)

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-12">
                                            <h5 class="text-center pt-3 pb-3 text-bold"> Installment Information</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label for="installamount">Installment Amount <label class="text-danger"> (required**)</label></label>
                                                <input  type="text" name="installment_amount" id="installamount" class="form-control @error('installment_amount')is-invalid @enderror" >
                                                @error('installment_amount')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label for="installstartt">Ins Starting Date <label class="text-danger"> (required**)</label></label>
                                                <input  type="date" name="installment_start_date" id="installstartt" class="form-control @error('installment_start_date')is-invalid @enderror" >
                                                @error('installment_start_date')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">

                                            <div class="form-group mb-3">
                                                <label> No of Installment <label class="text-danger"> (required**)</label></label>
                                                <input type="text" name="installment_number" id="installmentnumber" class="form-control  @error('installment_number')is-invalid @enderror @error('installment_years_amount')is-invalid @enderror" value="{{old('installment_number')}}" >
                                                @error('installment_number')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                                @error('installment_years_amount')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row" id="fieldList">

                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Installment Note <label class="text-danger"> (required**)</label></label>
                                                <textarea rows="3" cols="50" type="text" name="installment_amount_note" class="form-control"> </textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">
                                <div class="row " >
                                                <div class="col-12">
                                                    <div class="row ">
                                                        <div class="col-12">
                                                            <h5 class="text-center pt-3 pb-3 text-bold">Booking Status</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-3">
                                                                <label> Booking Money Total</label>
                                                                <input  type="number" name="initial_booking_money"
                                                                    value="{{old('initial_booking_money',$booking_status->initial_booking_money)}}" id="initial_booking_money"
                                                                    class="form-control @error('initial_booking_money')is-invalid @enderror" {{!$booking_status->initial_booking_money ? : 'readonly'}}>
                                                                    @error('initial_booking_money')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-3">
                                                                <label>Booking Money Due</label>
                                                                <input  type="number" name="booking_money"
                                                                    value="{{old('booking_money',$booking_status->booking_money_due)}}" id="booking-money"
                                                                    class="form-control @error('booking_money')is-invalid @enderror" {{!$booking_status->booking_money_due ? : 'readonly'}}>
                                                                    @error('booking_money')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                    @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-3">
                                                                <label>Booking Money Last Paid :
                                                                </label>

                                                                <input type="text" name="booking_money_paid"
                                                                   
                                                                    id="booking_money_paid" class="form-control" >
                                                            </div>
                                                        </div>



                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-3">
                                                                <label>Booking Money Paid Date</label>
                                                                    @php
                                                                        if(isset($booking_status->booking_money_paid_date))
                                                                        {

                                                                            $date = $booking_status->booking_money_paid_date;
                                                                            $old_date_timestamp = strtotime($date);
                                                                            $new_date = date('Y-m-d', $old_date_timestamp);
                                                                        }
                                                                        else {
                                                                            $new_date ="";
                                                                        }

                                                                    @endphp
                                                                <input type="date" name="booking_money_paid_date" value="{{$new_date}}" id="booking-money-paid-date" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-3">
                                                                <label>Booking Money Due Date</label>
                                                                <input type="date" name="booking_money_due_date"
                                                                @php
                                                                        if(isset($booking_status->booking_money_due_date))
                                                                        {

                                                                            $date = $booking_status->booking_money_due_date;
                                                                            $old_date_timestamp = strtotime($date);
                                                                            $new_date = date('Y-m-d', $old_date_timestamp);

                                                                        }
                                                                        else {
                                                                            $new_date ="";
                                                                        }
                                                                    @endphp
                                                                    value="{{ $new_date}}"

                                                                    id="booking-money-due-date" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-3">
                                                                <label>Booking Money Payment Type </label>
                                                                <select name="booking_money_payment_type" id="" class="form-control">
                                                                    <option value="" disabled <?php if ($booking_status->booking_money_payment_type == '') {
                                                                            echo 'selected="selected"';
                                                                        } ?>>Select Payment type
                                                                    </option>
                                                                    <option value="Check" <?php if ($booking_status->booking_money_payment_type == 'Check') {
                                                                                echo 'selected="selected"';
                                                                            } ?>>Check</option>
                                                                    <option value="Bank" <?php if ($booking_status->booking_money_payment_type == 'Bank') {
                                                                            echo 'selected="selected"';
                                                                        } ?>>Bank</option>
                                                                    <option value="Cash" <?php if ($booking_status->booking_money_payment_type == 'Cash') {
                                                                            echo 'selected="selected"';
                                                                        } ?>>Cash</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label>Booking Money Note</label>
                                                                <textarea rows="3" cols="50" type="text" name="booking_money_note"
                                                                    class="form-control"> {{ $booking_status->booking_money_note }}</textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2 pt-2">


                            <div class="row ">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center text-bold pt-3 pb-3">Down Payment Status</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Payment Total</label>
                                                <input
                                                 type="number" name="initial_downpayment_money"
                                                    value="{{old('initial_downpayment_money',$down_payment->initial_downpayment_money)}}" id="initial_downpayment_money"
                                                    class="form-control " {{!$down_payment->initial_downpayment_money ? : 'readonly'}}>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Down Payment Due</label>
                                                <input
                                                 type="number" name="downpayment_money"
                                                    value="{{old('downpayment_money',$down_payment->downpayment_money_due) }}" id="down-payment"
                                                    class="form-control @error('downpayment_money')is-invalid @enderror" {{!$down_payment->downpayment_money_due ? : 'readonly'}}>
                                                    @error('downpayment_money')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Down Payment Last Paid : </label>
                                                <input type="text" name="downpayment_money_paid"
                                                   
                                                    id="down-payment-paid" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Down Payment Paid Date</label>
                                                {{-- {{date('Y-m-d',strtotime($booking_status->booking_money_due_date))}} --}}
                                                <input type="date" name="downpayment_money_paid_date"
                                                @php
                                                if(isset($down_payment->downpayment_money_paid_date))
                                                {

                                                    $date = $down_payment->downpayment_money_paid_date;
                                                    $old_date_timestamp = strtotime($date);
                                                    $new_date = date('Y-m-d', $old_date_timestamp);

                                                }
                                                else {
                                                    $new_date ="";
                                                }
                                            @endphp
                                                    value="{{ $new_date }}"
                                                    id="down-payment-paid-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Down Payment Due Date</label>
                                                <input type="date" name="downpayment_money_due_date"
                                                @php
                                                if(isset($down_payment->downpayment_money_due_date))
                                                {

                                                    $date = $down_payment->downpayment_money_due_date;
                                                    $old_date_timestamp = strtotime($date);
                                                    $new_date = date('Y-m-d', $old_date_timestamp);


                                                }
                                                else {

                                                    $new_date ="";
                                                }
                                            @endphp

                                                    value="{{$new_date}}"
                                                    id="down-payment-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Down Payment Payment Type </label>
                                                <select name="downpayment_money_payment_type" id="" class="form-control">
                                                    <option value="" disabled <?php if ($down_payment->downpayment_money_payment_type == '') {
                                                                echo 'selected="selected"';
                                                            } ?>>Select Payment type
                                                    </option>
                                                    <option value="Check" <?php if ($down_payment->downpayment_money_payment_type == 'Check') {
                                                            echo 'selected="selected"';
                                                        } ?>>Check</option>
                                                    <option value="Bank" <?php if ($down_payment->downpayment_money_payment_type == 'Bank') {
                                                            echo 'selected="selected"';
                                                        } ?>>Bank</option>
                                                                <option value="Cash" <?php if ($down_payment->downpayment_money_payment_type == 'Cash') {
                                                        echo 'selected="selected"';
                                                    } ?>>Cash</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Down Payment Note</label>
                                                <textarea rows="3" cols="50" type="text" name="downpayment_money_note"
                                                    class="form-control">{{ $down_payment->downpayment_money_note }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">

                            <div class="row ">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center pt-3 pb-3 text-bold ">Land Filling (1st) Status</h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label> Land Filling(1st) Total</label>
                                                    <input
                                                     type="text" name="initial_land_filling_money"
                                                        value="{{ old('initial_land_filling_money',$land_filing_1st->initial_land_filling_money) }}"
                                                        id="land-filling-1" class="form-control"  {{!$land_filing_1st->initial_land_filling_money ? : 'readonly'}}>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(1st) Due</label>
                                                    <input
                                                     type="text" name="land_filling_money"
                                                        value="{{ old('land_filling_money',$land_filing_1st->land_filling_money_due) }}"
                                                        id="land-filling-1" class="form-control @error('land_filling_money')is-invalid @enderror"  {{!$land_filing_1st->land_filling_money_due ? : 'readonly'}}>
                                                        @error('land_filling_money')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(1st) Last Paid : </label>
                                                    <input type="text" name="land_filling_money_paid"
                                                      
                                                        id="land-filling-1-paid" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(1st) Paid Date</label>
                                                    <input type="date" name="land_filling_money_paid_date"

                                                    @php
                                                    if(isset($land_filing_1st->land_filling_money_paid_date))
                                                    {

                                                        $date = $land_filing_1st->land_filling_money_paid_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp


                                                        value="{{$new_date}}"
                                                        id="land-filling-1-paid-date" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(1st) Due Date</label>
                                                    <input type="date" name="land_filling_money_due_date"
                                                    @php
                                                    if(isset($land_filing_1st->land_filling_money_due_date))
                                                    {

                                                        $date = $land_filing_1st->land_filling_money_due_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);


                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp


                                                        value="{{$new_date}}"
                                                        id="land-filling-1-due-date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(1st) Payment Type </label>

                                                    <select name="land_filling_money_payment_type" id=""
                                                        class="form-control">
                                                        <option value="" disabled <?php if ($land_filing_1st->land_filling_money_payment_type== '') {
                                                            echo 'selected="selected"';
                                                        } ?>>Select Payment type
                                                        </option>
                                                        <option value="Check" <?php if ($land_filing_1st->land_filling_money_payment_type == 'Check') {
                                                                echo 'selected="selected"';
                                                            } ?>>Check</option>
                                                        <option value="Bank" <?php if ($land_filing_1st->land_filling_money_payment_type == 'Bank') {
                                                            echo 'selected="selected"';
                                                        } ?>>Bank</option>
                                                        <option value="Cash" <?php if ($land_filing_1st->land_filling_money_payment_type == 'Cash') {
                                                            echo 'selected="selected"';
                                                        } ?>>Cash</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(1st) Note</label>
                                                    <textarea rows="3" cols="50" type="text" name="land_filling_money_note"
                                                        class="form-control">{{ $land_filing_1st->land_filling_money_note }}</textarea>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center pt-3 pb-3 text-bold ">Land Filling (2nd) Status</h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label> Land Filling(2nd) Total</label>
                                                    <input
                                                     type="text" name="initial_land_filling_money2"
                                                        value="{{ old('initial_land_filling_money2',$land_filing_2nd->initial_land_filling_money) }}"
                                                        id="initial_land_filling_money2" class="form-control" {{!$land_filing_2nd->initial_land_filling_money ? : 'readonly'}}>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(2nd) Due</label>
                                                    <input
                                                     type="text" name="land_filling_money2"
                                                        value="{{ old('land_filling_money2',$land_filing_2nd->land_filling_money_due) }}"
                                                        id="land-filling-2" class="form-control @error('land_filling_money2')is-invalid @enderror" {{!$land_filing_2nd->land_filling_money_due ? : 'readonly'}}>
                                                        @error('land_filling_money2')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(2nd) Last Paid: </label>
                                                    <input type="text" name="land_filling_money_paid2"
                                                  
                                                    id="land-filling-1-paid" class="form-control">

                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(2nd) Due Date</label>
                                                    <input type="date" name="land_filling_money_paid_date2"
                                                    @php
                                                    if(isset($land_filing_2nd->land_filling_money_paid_date))
                                                    {

                                                        $date = $land_filing_2nd->land_filling_money_paid_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        id="land-filling-2-due-date" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(2nd) Paid Date</label>
                                                    <input type="date" name="land_filling_money_due_date2"
                                                    @php
                                                    if(isset($land_filing_2nd->land_filling_money_due_date))
                                                    {

                                                        $date = $land_filing_2nd->land_filling_money_due_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp


                                                        value="{{$new_date}}"
                                                        id="land-filling-2-paid-date" class="form-control">
                                                </div>
                                            </div>



                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(2nd) Payment Type </label>

                                                    <select id="" name="land_filling_money_payment_type2"
                                                        class="form-control">
                                                        <option value="" disabled <?php if ($land_filing_2nd->land_filling_money_payment_type == '') {
                                                            echo 'selected="selected"';
                                                        } ?>>Select Payment type
                                                        </option>
                                                        <option value="Check" <?php if ($land_filing_2nd->land_filling_money_payment_type == 'Check') {
                                                            echo 'selected="selected"';
                                                        } ?>>Check</option>
                                                        <option value="Bank" <?php if ($land_filing_2nd->land_filling_money_payment_type == 'Bank') {
                                                            echo 'selected="selected"';
                                                        } ?>>Bank</option>
                                                        <option value="Cash" <?php if ($land_filing_2nd->land_filling_money_payment_type == 'Cash') {
                                                            echo 'selected="selected"';
                                                        } ?>>Cash</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label>Land Filling(2nd) Note</label>
                                                    <textarea rows="3" cols="50" type="text" name="land_filling_money_note2"
                                                        class="form-control">{{ $land_filing_2nd->land_filling_money_note }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">

                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center pt-3 pb-3 text-bold ">Building Pilling Status</h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label> Building Pilling Total</label>
                                                    <input type="text" name="initial_building_pilling_money"
                                                        value="{{ old('initial_building_pilling_money',$building_pilling_status->initial_building_pilling_money) }}"
                                                        id="initial_building_pilling_money" class="form-control " {{!$building_pilling_status->initial_building_pilling_money ? : 'readonly'}}>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Building Pilling Due</label>
                                                    <input type="text" name="building_pilling_money"
                                                        value="{{ old('building_pilling_money',$building_pilling_status->building_pilling_money_due) }}"
                                                        id="building-pilling" class="form-control @error('building_pilling_money')is-invalid @enderror" {{!$building_pilling_status->building_pilling_money_due ? : 'readonly'}}>
                                                        @error('building_pilling_money')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Building Pilling Last Paid :</label>
                                                    <input type="text" name="building_pilling_money_paid"
                                                       
                                                        id="building-pilling-paid" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Building Pilling Paid Date</label>
                                                    <input type="date" name="building_pilling_money_paid_date"
                                                    @php
                                                    if(isset($building_pilling_status->building_pilling_money_paid_date))
                                                    {

                                                        $date = $building_pilling_status->building_pilling_money_paid_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        id="building-pilling-paid-date" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Building Pilling Due Date</label>
                                                    <input type="date" name="building_pilling_money_due_date"
                                                    @php
                                                    if(isset($building_pilling_status->building_pilling_money_due_date))
                                                    {

                                                        $date = $building_pilling_status->building_pilling_money_due_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        id="building-pilling-due-date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>Building Pilling Payment Type </label>
                                                    <select name="building_pilling_money_payment_type" id=""
                                                        class="form-control">
                                                        <option value="" disabled <?php if($building_pilling_status->building_pilling_money_payment_type == '') {
                                                            echo 'selected="selected"';
                                                        } ?>>Select Payment type
                                                        </option>
                                                        <option value="Check" <?php if ($building_pilling_status->building_pilling_money_payment_type == 'Check') {
                                                            echo 'selected="selected"';
                                                        } ?>>Check</option>
                                                        <option value="Bank" <?php if ($building_pilling_status->building_pilling_money_payment_type == 'Bank') {
                                                                echo 'selected="selected"';
                                                            } ?>>Bank</option>
                                                        <option value="Cash" <?php if ($building_pilling_status->building_pilling_money_payment_type == 'Cash') {
                                                            echo 'selected="selected"';
                                                        } ?>>Cash</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label>Building Pilling Note</label>
                                                    <textarea rows="3" cols="50" type="text"
                                                        name="building_pilling_money_note"
                                                        class="form-control">{{ $building_pilling_status->building_pilling_money_note }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>








                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">

                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center pt-3 pb-3 text-bold ">1st Floor Roof Casting Status</h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label> 1st floor Roof Casting Total</label>
                                                    <input
                                                    type="text"
                                                        value="{{ old('initial_floor_roof_casting_money_1st',$roof_casting_1st->initial_floor_roof_casting_money_1st) }}"
                                                        name="initial_floor_roof_casting_money_1st" id="initial_floor_roof_casting_money_1st"
                                                        class="form-control" {{!$roof_casting_1st->initial_floor_roof_casting_money_1st ? : 'readonly'}}>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>1st floor Roof Casting Due</label>
                                                    <input
                                                    type="text"
                                                        value="{{ old('floor_roof_casting_money_1st',$roof_casting_1st->floor_roof_casting_money_due_1st) }}"
                                                        name="floor_roof_casting_money_1st" id="roof-casting"
                                                        class="form-control @error('floor_roof_casting_money_1st')is-invalid @enderror" {{!$roof_casting_1st->floor_roof_casting_money_due_1st ? : 'readonly'}}>
                                                        @error('floor_roof_casting_money_1st')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>1st floor Roof Casting Last Paid :</label>
                                                    <input type="text"
                                                      
                                                        name="floor_roof_casting_money_paid_1st" id="roof-casting-paid"
                                                        class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>1st floor Roof Casting Paid Date</label>
                                                    <input type="date" name="floor_roof_casting_money_paid_date_1st"
                                                    @php
                                                    if(isset($roof_casting_1st->floor_roof_casting_money_paid_date_1st))
                                                    {

                                                        $date = $roof_casting_1st->floor_roof_casting_money_paid_date_1st;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        id="roof-casting-paid-date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>1st floor Roof Casting Due Date</label>
                                                    <input type="date" name="floor_roof_casting_money_due_date_1st"
                                                    @php
                                                    if(isset($roof_casting_1st->floor_roof_casting_money_due_date_1st))
                                                    {

                                                        $date = $roof_casting_1st->floor_roof_casting_money_due_date_1st;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        id="roof-casting-due-date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>1st floor Roof Casting Payment Type </label>

                                                    <select name="floor_roof_casting_money_payment_type_1st" id=""
                                                        class="form-control">
                                                        <option value="" disabled <?php if ($roof_casting_1st->floor_roof_casting_money_payment_type_1st == '') {
                                                            echo 'selected="selected"';
                                                        } ?>>Select Payment type
                                                        </option>
                                                        <option value="Check" <?php if ($roof_casting_1st->floor_roof_casting_money_payment_type_1st == 'Check') {
                                                            echo 'selected="selected"';
                                                        } ?>>Check</option>
                                                        <option value="Bank" <?php if ($roof_casting_1st->floor_roof_casting_money_payment_type_1st == 'Bank') {
                                                            echo 'selected="selected"';
                                                        } ?>>Bank</option>
                                                        <option value="Cash" <?php if ($roof_casting_1st->floor_roof_casting_money_payment_type_1st == 'Cash') {
                                                            echo 'selected="selected"';
                                                        } ?>>Cash</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label>1st floor Roof Casting Note</label>
                                                        <textarea rows="3" cols="50" type="text"
                                                            name="floor_roof_casting_money_note_1st"
                                                            class="form-control">{{ $roof_casting_1st->floor_roof_casting_money_note_1st }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center text-bold pt-3 pb-3">Finishing Work Status</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Finishing Work Total</label>
                                                <input
                                                 type="text" name="initial_finishing_work_money"
                                                    value="{{ old('initial_finishing_work_money',$finishing_work->initial_finishing_work_money) }}"
                                                    id="initial_finishing_work_money" class="form-control" {{!$finishing_work->initial_finishing_work_money ? : 'readonly'}}>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Finishing Work Due</label>
                                                <input
                                                 type="text" name="finishing_work_money"
                                                    value="{{ old('finishing_work_money',$finishing_work->finishing_work_money_due) }}"
                                                    id="finishing-work " class="form-control @error('finishing_work_money')is-invalid @enderror" {{!$finishing_work->finishing_work_money_due ? : 'readonly'}}>
                                                    @error('finishing_work_money')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Finishing Work Last Paid : </label>
                                                <input type="text" name="finishing_work_money_paid"
                                                   
                                                    class="form-control">
                                            </div>
                                        </div>


                                    </div>


                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Finishing Work Paid Date</label>
                                                <input type="date" name="finishing_work_money_paid_date"
                                                @php
                                                if(isset($finishing_work->finishing_work_money_paid_date))
                                                {

                                                    $date = $finishing_work->finishing_work_money_paid_date;
                                                    $old_date_timestamp = strtotime($date);
                                                    $new_date = date('Y-m-d', $old_date_timestamp);

                                                }
                                                else {
                                                    $new_date ="";
                                                }
                                            @endphp

                                                    value="{{$new_date}}"
                                                    id="finishing-work-paid-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Finishing Work Due Date</label>
                                                <input type="date" name="finishing_work_money_due_date"
                                                @php
                                                if(isset($finishing_work->finishing_work_money_due_date))
                                                {

                                                    $date = $finishing_work->finishing_work_money_due_date;
                                                    $old_date_timestamp = strtotime($date);
                                                    $new_date = date('Y-m-d', $old_date_timestamp);

                                                }
                                                else {
                                                    $new_date ="";
                                                }
                                            @endphp

                                                    value="{{$new_date}}"
                                                    id="finishing-work-paid-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Finishing Work Payment Type </label>
                                                <select name="finishing_work_money_payment_type" id=""
                                                    class="form-control">
                                                    <option value="" disabled <?php if ($finishing_work->finishing_work_money_payment_type == '') {
                                                        echo 'selected="selected"';
                                                    } ?>>Select Payment type
                                                    </option>
                                                    <option value="Check" <?php if ($finishing_work->finishing_work_money_payment_type == 'Check') {
                                                        echo 'selected="selected"';
                                                    } ?>>Check</option>
                                                    <option value="Bank" <?php if ($finishing_work->finishing_work_money_payment_type == 'Bank') {
                                                        echo 'selected="selected"';
                                                    } ?>>Bank</option>
                                                    <option value="Cash" <?php if ($finishing_work->finishing_work_money_payment_type == 'Cash') {
                                                    echo 'selected="selected"';
                                                } ?>>Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Finishing Work Note</label>
                                                <textarea rows="3" cols="50" type="text" name="finishing_work_money_note"
                                                    class="form-control">{{ $finishing_work->finishing_work_money_note }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>








                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-center text-bold pt-3 pb-3">After Handover Money</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>After Handover Money Total </label>
                                                <input
                                                 type="text" name="initial_after_handover_money"
                                                    value="{{old('initial_after_handover_money',$after_hand_over_money->initial_after_handover_money)}}"
                                                    id="initial_after_handover_money" class="form-control" {{!$after_hand_over_money->initial_after_handover_money ? : 'readonly'}}>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>After Handover Money Due</label>
                                                <input
                                                 type="text" name="after_handover_money"
                                                    value="{{old('after_handover_money',$after_hand_over_money->after_handover_money_money_due)}}"
                                                    id="after-handover-money" class="form-control @error('after_handover_money')is-invalid @enderror" {{!$after_hand_over_money->after_handover_money_money_due ? : 'readonly'}}>
                                                    @error('after_handover_money')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>After Handover Money Last Paid :</label>
                                                <input type="text" name="after_handover_money_money_paid"
                                                   
                                                    id="after_handover_money_paid_amount" class="form-control">
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>After Handover Money Paid Date</label>
                                                    <input type="date" name="after_handover_money_paid_date"
                                                    @php
                                                    if(isset($after_hand_over_money->after_handover_money_paid_date))
                                                    {

                                                        $date = $after_hand_over_money->after_handover_money_paid_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        id="after-handover-money-paid-date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>After Handover Money Due Date</label>
                                                    <input type="date" name="after_handover_money_due_date"
                                                    @php
                                                    if(isset($after_hand_over_money->after_handover_money_due_date))
                                                    {

                                                        $date = $after_hand_over_money->after_handover_money_due_date;
                                                        $old_date_timestamp = strtotime($date);
                                                        $new_date = date('Y-m-d', $old_date_timestamp);

                                                    }
                                                    else {
                                                        $new_date ="";
                                                    }
                                                @endphp

                                                        value="{{$new_date}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label>After Handover Money Payment Type </label>

                                                    <select name="after_handover_money_payment_type" id="" class="form-control">
                                                        <option value="" disabled <?php if ($after_hand_over_money->after_handover_money_payment_type == '') {
                                                            echo 'selected="selected"';
                                                        } ?>>Select Payment type </option>
                                                        <option value="Check" <?php if ($after_hand_over_money->after_handover_money_payment_type == 'Check') {
                                                            echo 'selected="selected"';
                                                        } ?>>Check</option>
                                                        <option value="Bank" <?php if ($after_hand_over_money->after_handover_money_payment_type == 'Bank') {
                                                            echo 'selected="selected"';
                                                        } ?>>Bank</option>
                                                        <option value="Cash" <?php if ($after_hand_over_money->after_handover_money_payment_type == 'Cash') {
                                                            echo 'selected="selected"';
                                                        } ?>>Cash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label>After Handover Money Note</label>
                                                    <textarea rows="3" cols="50" type="text" name="after_handover_money_note"
                                                        class="form-control">{{$after_hand_over_money->after_handover_money_note}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="row text-center"></div>


                        <div class="col-lg-6 offset-lg-6">
                            <button type="submit" class="btn btn-lg mb-3 text-white btn-block text-bold"
                                style="background-color:#333547;">Submit</button>
                        </div>


            </form>
        </div>
    </div>

            <!-- /.content -->

    <!-- /.container fluid ends -->

    <script>
        function addInstallment(i){

             $("#fieldList").append(`
             <div class="col-lg-4">
                <div class="form-group mb-3">
                    <label> ${i} year Intallment Amount <label class="text-danger"> (required**)</label></label>
                    <input class="form-control" type='text' name='installment_years_amount[]' placeholder=' Intallment Amount' required />
                </div>
             </div>
             `);
        }
        $(document).ready(function(){

            let installmentNumber =document.querySelector('#installmentnumber');

            installmentNumber.addEventListener('keyup',function(event){
                $('#fieldList').empty();
                let installMentValue = event.target.value;
                // if(insta)
                let totalYear    = Math.ceil(installMentValue/12);

                for(var i=1; i<=totalYear;i++){
                    addInstallment(i);
                }

            })
        })

    </script>



@endsection
@section('script')
<script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>
@endsection
