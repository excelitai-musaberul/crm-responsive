@extends('master.master')
@section('css')
<link href="{{asset('assets')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('assets')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<style>
    .btn-secondary{
        background-color: #406b97 !important;
    }
</style>
@endsection
@section('content')




<div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body">

                <h2 class="card-title">Registration</h2>
                <!--<p class="card-title-desc">registration info-->
                </p>
                <div class="table-responsive">
                <table id="datatable-buttons" class="table  dt-responsive nowrap  datatable-buttons-class" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>File No.</th>
                        <th>registration money</th>
                        <th>Total Money</th>
                        <th>Type</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Paid date</th>
                        <th>Due date</th>
                        <th>Note</th>
                        <th>Action</th>


                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($others as $other)
                    <tr>
                        {{-- @php dd($other) @endphp --}}
                        <td>{{$other->user->member_name}}</td>
                        <td>{{$other->user->file_no}}</td>



                        <td>{{$other->registrationpayment_money}}</td>
                        <td>{{$other->initial_registrationpayment_money}}</td>
                        <td>{{$other->registrationpayment_money_payment_type}}</td>
                        <td>{{$other->registrationpayment_money_paid}}</td>
                        <td>{{$other->registrationpayment_money_due}}</td>
                        <td>@if($other->registrationpayment_money_paid_date != null){{\Carbon\Carbon::parse($other->registrationpayment_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                        <td>@if($other->registrationpayment_money_due_date != null){{\Carbon\Carbon::parse($other->registrationpayment_money_due_date)->format('d-M-Y')}}  @else @endif</td>
                        <td>{{$other->registrationpayment_money_note}}</td>
                        <td>
                            <a href="{{route('super_admin.car.parking.edit',$other->user_id)}}" class="btn btn-success" title="Edit Data"><i class="fas fa-pen"></i> </a>
                        <a href="{{route('super_admin.car.parking.delete',$other->user_id)}}" class="btn btn-danger" title="Delete Data" id="#">
                          <i class="fa fa-trash"></i>
                       </a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->



<div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body">

                <h2 class="card-title">Car parking</h2>
                <!--<p class="card-title-desc">Car parking -->
                </p>
                <div class="table-responsive">
                <table id="datatable-buttons" class="table dt-responsive nowrap datatable-buttons-class" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>File No.</th>
                        <th>parking Money</th>
                        <th>Total Money</th>
                        <th>Type</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Paid Date</th>
                        <th>Due Date</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($others as $other)
                        <tr>
                            <td>{{$other->user->member_name}}</td>
                            <td>{{$other->user->file_no}}</td>



                            <td>{{$other->car_parking_money}}</td>
                            <td>{{$other->initial_car_parking_money}}</td>
                            <td>{{$other->car_parking_money_payment_type}}</td>
                            <td>{{$other->car_parking_money_paid}}</td>
                            <td>{{$other->car_parking_money_due}}</td>
                            <td>@if($other->car_parking_money_paid_date != null){{\Carbon\Carbon::parse($other->car_parking_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                            <td>@if($other->car_parking_money_due_date != null){{\Carbon\Carbon::parse($other->car_parking_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                            <td>{{$other->car_parking_money_note}}</td>
                            <td>
                                <a href="{{ route('super_admin.car.parking.edit',$other->user_id) }}" class="btn btn-success" title="Edit Data"><i class="fas fa-pen"></i> </a>
                                <a href="{{route('super_admin.car.parking.delete',$other->user_id)}}" class="btn btn-danger" title="Delete Data" id="#">
                                  <i class="fa fa-trash"></i>
                               </a>
                                </td>

                        </tr>
                        @endforeach
                                     </tbody>
                </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body">

                <h2 class="card-title">Khajna</h2>
                <!--<p class="card-title-desc">khajna information-->
                </p>
                <div class="table-responsive">
                <table id="datatable-buttons" class="table  dt-responsive nowrap datatable-buttons-class" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>File No.</th>
                        <th>Khajna Money</th>
                        <th>Total Money</th>
                        <th>Type</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Paid date</th>
                        <th>Due date</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($others as $other)
                        <tr>
                            <td>{{$other->user->member_name}}</td>
                            <td>{{$other->user->file_no}}</td>
                            <td>{{$other->khajna_money}}</td>
                            <td>{{$other->initial_khajna_money}}</td>
                            <td>{{$other->khajna_money_payment_type}}</td>
                            <td>{{$other->khajna_money_paid}}</td>
                            <td>{{$other->khajna_money_due}}</td>
                            <td>@if($other->khajna_money_paid_date != null){{\Carbon\Carbon::parse($other->khajna_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                            <td>@if($other->khajna_money_due_date != null){{\Carbon\Carbon::parse($other->khajna_money_due_date)->format('d-M-Y')}}  @else @endif</td>
                            <td>{{$other->khajna_money_note}}</td>
                            <td>
                                <a href="{{ route('super_admin.car.parking.edit',$other->user_id) }}" class="btn btn-success" title="Edit Data"><i class="fas fa-pen"></i> </a>
                                <a href="{{route('super_admin.car.parking.delete',$other->user_id)}}" class="btn btn-danger" title="Delete Data" id="#">
                                  <i class="fa fa-trash"></i>
                               </a>
                                </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection




@section('script')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/js/pages/datatables.init.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

@endsection
