@extends('master.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/user.css')}}">
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="main-body p-lg-5 p-3">
                <div class="user-info p-xxl-5 p-4">
                    <div class="row">
                        <div class="user-avater col-lg-3 col">
                            <div class="m-1">
                                <img class="img-fluid" src="{{ asset($user->member_image) }}" alt="image_notfound" />
                                <p class="text-center">{{$user->member_name}}</p>
                            </div>
                            <div class="m-1">
                                <img class="img-fluid" src="{{ asset($user->member_image) }}" alt="image_notfound" />
                                <p class="text-center">{{$user->member_name}}</p>
                            </div>  
                        </div>
                        <div class="col-lg-9">
                            <div class="users-name pt-5">
                                <h3>{{$user->member_name}}</h3>
                            </div>
                            <div class="contacts">
                                <p class="mb-1"><i class="fas fa-envelope"></i>{{$user->email}}</p>
                                <p class="mb-1"><i class="fas fa-map-signs"></i>{{$user->mailing_address}}</p>
                            </div>
                            <div class="row">
                                <div class="card user-name col-xl-4 col-lg-6 mb-2">
                                    <div class="usera-im px-4 py-3 d-flex align-items-top total-amount">
                                        <div class="me-1">
                                            <i class="fas fa-book mt-1"></i>
                                        </div>
                                        <div>
                                            <h4 class="number">{{optional($user->totalAmount)->total_amount}}</h4>
                                            <p class="user-para mb-0">Total Amount</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card user-name col-xl-4 col-lg-6 mb-2">
                                    <div class="usera-im px-4 py-3 d-flex align-items-top total-paid">
                                        <div class="me-1">
                                            <i class="fas fa-calendar-week mt-1"></i>
                                        </div>
                                        <div>
                                            <h4 class="number">{{$total_paid}}</h4>
                                            <p class="user-para mb-0">Total Paid</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card user-name col-xl-4 col-lg-6 mb-2">
                                    <div class="usera-im px-4 py-3 d-flex align-items-top total-due">
                                        <div class="me-1">
                                            <i class="fas fa-money-check-alt mt-1"></i>
                                        </div>
                                        <div>
                                            <h4 class="number">{{$total_due}}</h4>
                                            <p class="user-para mb-0">Total Due</p>
                                        </div>  
                                    </div>
                                </div>                              
                            </div>
                        </div>
                    </div>
        <!-- ==================================================================== -->                  
                </div>


                <div class="submenu-nav-cont mt-5 mb-3">
                    <div class="submenu" role="tablist" >
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <a href="#!" class="active"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"  role="tab" aria-controls="pills-home" aria-selected="true">Personal Information</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a href="#!"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Basic Information</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a href="#!"  id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"  role="tab" aria-controls="pills-contact" aria-selected="false">Installment Information</a>
                            </li>
                        </ul>
                    </div>
                </div>
                

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <section id="BasicInfo">
                            <div class="user-detail mt-4 p-lg-5 p-3">
                                <div class="user-detail-info pb-3">
                                    <h3>Personal Information</h3>
                                </div>
                                <div class="pt-lg-5 pt-3" style="overflow-x:auto;">
                                    <table class="table personal-information-table">
                                        <tbody>
                                            <tr>
                                                <td>File No:</td>
                                                <td>{{$user->file_no}}</td>
                                            </tr>                                            
                                            <tr>
                                                <td>Applicant Name:</td>
                                                <td>{{$user->member_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Father/Husband Name:</td>
                                                <td>{{$user->father_name}}/{{$user->husband_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mother Name:</td>
                                                <td>{{$user->mother_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Milling Address:</td>
                                                <td>{{$user->mailing_address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Permanent Address:</td>
                                                <td>{{$user->permanent_address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile No 1:</td>
                                                <td>{{$user->phone_no_1}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile No 2:</td>
                                                <td>{{$user->phone_no_2}}</td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth:</td>
                                                <td>{{$user->date_of_birth}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>National ID No:</td>
                                                <td>{{$user->national_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Profession/Occupation:</td>
                                                <td>{{$user->profession}}</td> 
                                            </tr>
                                            <tr>
                                                <td>Office Address:</td>
                                                <td>{{$user->office_address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Designation:</td>
                                                <td>{{$user->designation}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nominee:</td>
                                                <td>{{$user->nominee_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Relation With Applicant:</td>
                                                <td>{{$user->relation_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Building No:</td>
                                                <td>{{$user->building_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount:</td>
                                                <td>{{optional($user->totalAmount)->total_amount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Paid Amount</td>
                                                <td>{{$total_paid}}</td>
                                            </tr>
                                            <tr>
                                                <td>Current Date Due</td>
                                                <td>{{$dueTillToday}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Due</td>
                                                <td>{{$total_due}}</td>
                                            </tr>
                                            <tr>
                                                <td>No of Installment:</td>
                                                <td>{{optional($user->totalNoOfInstallment)->number_of_installment}}</td>
                                            </tr>
                                            <tr>
                                                <td>Installment Start Form:</td>
                                                <td>{{optional($user->totalNoOfInstallment)->installment_starting_date}}</td>
                                            </tr>                                           
                                        </tbody>
                                    </table>                                 
                                   
                                    

                                    {{-- <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>File No:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->file_no}}</p>
                                        </div>
                                    </div>

                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Applicant Name:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->member_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Father/Husband Name:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->father_name}}/{{$user->husband_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Mother Name:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->mother_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Milling Address:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->mailing_address}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Parment Address:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->permanent_address}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Mobile No 1:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->phone_no_1}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Mobile No 2:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->phone_no_2}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Date of Birth:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->date_of_birth}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Email:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>National ID No:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->national_id}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Profession/Occupation:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->profession}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Office Address:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->office_address}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Designation:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->designation}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Nominee:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->nominee_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Relation With Applicant:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->relation_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Building No:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->building_no}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Total Amount:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{optional($user->totalAmount)->total_amount}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Total Paid Amount </p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$total_paid}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Current Date Due </p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$dueTillToday}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Total Due </p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$total_due}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>No of Installment:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{optional($user->totalNoOfInstallment)->number_of_installment}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Installment Start Form:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{optional($user->totalNoOfInstallment)->installment_starting_date}}</p>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <section id="BasicAmount">
                            <div class="user-detail mt-4 p-lg-5 p-3">
                                <div class="user-detail-info pb-3">
                                    <h3>Basic Amount</h3>
                                </div>
                                <div style="overflow-x:auto;">
                                    <table class="mt-lg-5 mt-3 table table-bordered table-striped user-basic-information-table">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>Basic Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Paid Amount Date</th>
                                                <th>Due Amount Date</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Booking Money</td>
                                                <td>{{optional($user->bookingStatus)->booking_money}}</td>
                                                <td>@if(optional($user->bookingStatus)->booking_money_paid_date != null){{\Carbon\Carbon::parse(optional($user->bookingStatus)->booking_money_paid_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>@if(optional($user->landFilling2)->booking_money_due_date != null){{\Carbon\Carbon::parse(optional($user->bookingStatus)->booking_money_due_date)->format('d-M-Y')}}  @else @endif</td>
                                                <td>{{optional($user->bookingStatus)->booking_money_note}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Booking Money')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Booking Money')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'booking-money','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'booking-money','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Down Payment</td>
                                                <td>{{optional($user->downPayment)->downpayment_money}}</td>
                                                <td>@if(optional($user->downPayment)->downpayment_money_paid_date != null){{\Carbon\Carbon::parse(optional($user->downPayment)->downpayment_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                                                <td> @if(optional($user->downPayment)->downpayment_money_paid_date != null){{\Carbon\Carbon::parse(optional($user->downPayment)->downpayment_money_due_date)->format('d-M-Y')}}  @else @endif</td>
                                                <td>{{optional($user->downPayment)->downpayment_money_note}}</td>
                                                <td>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Down Payment')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Down Payment')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'down-payment','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'down-payment','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Car Parking</td>
                                                <td>{{optional($user->carParking)->car_parking_money}}</td>
                                                <td>@if(optional($user->landFilling2)->land_filling_money_paid_date != null) {{\Carbon\Carbon::parse(optional($user->carParking)->car_parking_money_paid_date)->format('d-M-Y') }} @else  @endif</td>
                                                <td>@if(optional($user->landFilling2)->car_parking_money_due_date != null){{\Carbon\Carbon::parse(optional($user->carParking)->car_parking_money_due_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->carParking)->car_parking_money_note}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Car Parking')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Car Parking')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'car-parking','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'car-parking','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Land Filling 1</td>
                                                <td>{{optional($user->landFilling1)->land_filling_money}}</td>
                                                <td>@if(optional($user->landFilling1)->land_filling_money_paid_date != null){{\Carbon\Carbon::parse(optional($user->landFilling1)->land_filling_money_paid_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>@if(optional($user->landFilling1)->land_filling_money_due_date != null){{\Carbon\Carbon::parse(optional($user->landFilling1)->land_filling_money_due_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->landFilling1)->land_filling_money_note}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('First Land Filling')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('First Land Filling')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'land-filling1','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'land-filling1','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Land Filling 2</td>
                                                <td>{{optional($user->landFilling2)->land_filling_money}}</td>
                                                <td> @if(optional($user->landFilling2)->land_filling_money_paid_date != null) {{\Carbon\Carbon::parse(optional($user->landFilling2)->land_filling_money_paid_date)->format('d-M-Y')}} @else @endif</td>
                                                <td> @if(optional($user->landFilling2)->land_filling_money_due_date != null) {{\Carbon\Carbon::parse(optional($user->landFilling2)->land_filling_money_due_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->landFilling2)->land_filling_money_note}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Secound Land Filling')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Secound Land Filling')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'land-filling2','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'land-filling2','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Building Pilling</td>
                                                <td>{{optional($user->buildingPilling)->building_pilling_money}}</td>
                                                <td> @if(optional($user->buildingPilling)->building_pilling_money_paid_date != null) {{\Carbon\Carbon::parse(optional($user->buildingPilling)->building_pilling_money_paid_date)->format('d-M-Y')}} @else @endif</td>
                                                <td> @if(optional($user->buildingPilling)->building_pilling_money_due_date != null) {{\Carbon\Carbon::parse(optional($user->buildingPilling)->building_pilling_money_due_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->buildingPilling)->building_pilling_money_note}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Building Pilling')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Building Pilling')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'building-pilling','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'building-pilling','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
    
                                            </tr>
                                            <tr>
                                                <td>1st floor Roof Casting:</td>
                                                <td>{{optional($user->floorRoof)->floor_roof_casting_money_1st}}</td>
                                                <td> @if(optional($user->floorRoof)->floor_roof_casting_money_paid_date_1st != null) {{\Carbon\Carbon::parse(optional($user->floorRoof)->floor_roof_casting_money_paid_date_1st)->format('d-M-Y')}} @else @endif</td>
                                                <td> @if(optional($user->floorRoof)->floor_roof_casting_money_due_date_1st != null) {{\Carbon\Carbon::parse(optional($user->floorRoof)->floor_roof_casting_money_due_date_1st)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->floorRoof)->floor_roof_casting_money_note_1st}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('First Floor Roof Casting')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('First Floor Roof Casting')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'first-floor-roof-casting','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'first-floor-roof-casting','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Finishing Work Amount:</td>
                                                <td>{{optional($user->finishingWork)->finishing_work_money}}</td>
                                                <td> @if(optional($user->finishingWork)->finishing_work_money_paid_date != null) {{\Carbon\Carbon::parse(optional($user->finishingWork)->finishing_work_money_paid_date)->format('d-M-Y')}} @else @endif</td>
                                                <td> @if(optional($user->finishingWork)->finishing_work_money_due_date != null) {{\Carbon\Carbon::parse(optional($user->finishingWork)->finishing_work_money_due_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->finishingWork)->finishing_work_money_note}}</td>
                                                <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Finishing Work')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Finishing Work')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'fisnishing-work','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'finishing-work','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
    
                                            </tr>
                                            <tr>
                                                <td>After Handover Amount:</td>
                                                <td>{{optional($user->afterHandOverMoney)->after_handover_money}}</td>
                                                <td> @if(optional($user->afterHandOverMoney)->after_handover_money_paid_date != null) {{\Carbon\Carbon::parse(optional($user->afterHandOverMoney)->after_handover_money_paid_date)->format('d-M-Y')}} @else @endif</td>
                                                <td> @if(optional($user->afterHandOverMoney)->after_handover_money_due_date != null) {{\Carbon\Carbon::parse(optional($user->afterHandOverMoney)->after_handover_money_due_date)->format('d-M-Y')}} @else @endif</td>
                                                <td>{{optional($user->afterHandOverMoney)->after_handover_money_note}}</td>
                                                <td>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>Str::slug('After Handover')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('After Handover')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a>
                                                    <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.basic-amount.pdf',['basic_amount'=>'after-handover','user'=>$user->id])}}@elseif(Auth::guard('admin')->check()){{route('admin.basic-amount.pdf',['basic_amount'=>'after-handover','user'=>$user->id])}} @endif" class="btn btn-danger "><i class="fas fa-download"></i> Invoice </a>
                                                </td>
    
                                            </tr>
                                        </tbody>    
                                    </table>
                                </div>
                                
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <section id="InstalmentHistory">
                            <div class="user-detail mt-4 p-lg-5 p-3">
                                <div class="user-detail-info pb-3">
                                    <h3>Installment History</h3>
                                </div>

                                @php

                                    $monthCounter = 0;
                                    $yearCounter = 0;
                                    $addMonth = 1;
                                    $paymentCheck=1;

                                @endphp
                                <div style="overflow-x:auto;">
                                    <table class="table mt-lg-5 mt-3 user-installment-history-table">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>Installment Number </th>
                                                <th>Installment Amount</th>
                                                <th>Installment Amount Paid</th>
                                                <th>Installment  Paid Date</th>
                                                <th>Action</th>
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
                                                        <td>Paid: {{$user->Installment[$i]->installment_paid}}</td>
                                                    @else
                                                        <td>Paid: 0</td>
                                                    @endif
    
                                                    @if (isset($user->Installment[$i]))
                                                        <td>{{\Carbon\Carbon::parse($user->Installment[$i]->installment_date)->format('d-M-Y')}}</td>
                                                    @else
                                                        <td>{{$installment_paid_date->startOfMonth()}}</td>
                                                    @endif
    
                                                    @php
                                                        if($monthCounter==12)
                                                        {
                                                            $monthCounter = 0;
                                                            $yearCounter++;
                                                        }
                                                        $installment_paid_date->addMonthsNoOverflow(1)->startOfMonth();
    
                                                    @endphp
                                                    <td>
                                                        @if (isset($user->Installment[$i]))
                                                        <a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.installment.pdf',['user'=>$user->id,'installment'=>$user->Installment[$i]])}}
                                                            @elseif(Auth::guard('admin')->check()){{route('admin.installment.pdf',['user'=>$user->id,'installment'=>$user->Installment[$i]])}} @endif"
                                                             class="btn btn-danger ">
                                                            <i class="fas fa-download"></i> Invoice
                                                         </a>
                                                         @endif
                                                    </td>
    
    
    
                                                </tr>
                                            @endfor
    
    
                                        </tbody>
                                    </table>
                                </div>
                             
                               </div>
                        </section>
                    </div>
                  </div>
            </div>
        </div>
    </div>


</div>
@endsection