@extends('master.master')
{{-- 

@php

   dd(session()->get('status')); 
  
@endphp --}}


@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="page-title">
                        <h1>Dashboard</h1>
                    </h1>
                    <!--<ol class="breadcrumb m-0">-->
                    <!--    <li class="breadcrumb-item active">Welcome to Shapla City Super Admin Dashboard</li>-->
                    <!--</ol>-->
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">

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
        @foreach ($crms as $crm)
            <div class="row">
                <div class="col-12">
                    <h3>{{ $crm->name }}</h3>
                </div>
            </div>
            <div class="row mb-4">
                @php
                    $usersCount = App\Models\User::where('crm_id', $crm->id)->count();
                    //booking
                    $total_initial_bookng = App\Models\BookingStatus::where('crm_id', $crm->id)->sum('initial_booking_money');
                    $total_due_booking = App\Models\BookingStatus::where('crm_id', $crm->id)->sum('booking_money_due');
                    $total_booking = $total_initial_bookng - $total_due_booking;
                    //after hand over
                    $total_initial_afterhand = App\Models\AfterHandoverMoney::where('crm_id', $crm->id)->sum('initial_after_handover_money');
                    $total_due_afterhand = App\Models\AfterHandoverMoney::where('crm_id', $crm->id)->sum('after_handover_money_money_due');
                    $total_afterhand = $total_initial_afterhand - $total_due_afterhand;
                    //building pilling
                    $total_initial_buildingpilling = App\Models\BuildingPillingStatus::where('crm_id', $crm->id)->sum('initial_building_pilling_money');
                    $total_due_buildingpilling = App\Models\BuildingPillingStatus::where('crm_id', $crm->id)->sum('building_pilling_money_due');
                    $total_buildingpilling = $total_initial_buildingpilling - $total_due_buildingpilling;
                    //down payment
                    $total_initial_downpay = App\Models\DownpaymentStatus::where('crm_id', $crm->id)->sum('initial_downpayment_money');
                    $total_due_downpay = App\Models\DownpaymentStatus::where('crm_id', $crm->id)->sum('downpayment_money_due');
                    $total_downpay = $total_initial_downpay - $total_due_downpay;
                    //finishing status
                    $total_initial_finishstatus = App\Models\FinishingWorkStatus::where('crm_id', $crm->id)->sum('initial_finishing_work_money');
                    $total_due_finishstatus = App\Models\FinishingWorkStatus::where('crm_id', $crm->id)->sum('finishing_work_money_due');
                    $total_finishstatus = $total_initial_finishstatus - $total_due_finishstatus;
                    //firstfloor status
                    $total_initial_firstfloor = App\Models\FloorRoofCasting1st::where('crm_id', $crm->id)->sum('initial_floor_roof_casting_money_1st');
                    $total_due_firstfloor = App\Models\FloorRoofCasting1st::where('crm_id', $crm->id)->sum('floor_roof_casting_money_due_1st');
                    $total_firstfloor = $total_initial_firstfloor - $total_due_firstfloor;
                    //landfilling1
                    $total_initial_landfilling1 = App\Models\LandFillingStatus1st::where('crm_id', $crm->id)->sum('initial_land_filling_money');
                    $total_due_landfilling1 = App\Models\LandFillingStatus1st::where('crm_id', $crm->id)->sum('land_filling_money_due');
                    $total_landfilling1 = $total_initial_landfilling1 - $total_due_landfilling1;
                    //landfilling2
                    $total_initial_landfilling2 = App\Models\LandFillingStatus2nd::where('crm_id', $crm->id)->sum('initial_land_filling_money');
                    $total_due_landfilling2 = App\Models\LandFillingStatus2nd::where('crm_id', $crm->id)->sum('land_filling_money_due');
                    $total_landfilling2 = $total_initial_landfilling2 - $total_due_landfilling2;
                    $installment = App\Models\Installment::where('crm_id', $crm->id)->sum('installment_paid');
                    $totalPaid = $total_booking + $total_afterhand + $total_buildingpilling + $total_downpay + $total_finishstatus + $total_firstfloor + $total_landfilling1 + $total_landfilling2 + $installment;

                    $afterHandOverMoney = App\Models\AfterHandoverMoney::where('crm_id', $crm->id)->sum('after_handover_money_money_due');
                    $bookingStatus = App\Models\BookingStatus::where('crm_id', $crm->id)->sum('booking_money_due');
                    $buildingPillingStatus = App\Models\BuildingPillingStatus::where('crm_id', $crm->id)->sum('building_pilling_money_due');
                    //$carParkingMoneyDue = App\Models\CarParkingStatus::where('crm_id',$crm->id)->sum('car_parking_money_due');
                    $downPaymentStatus = App\Models\DownpaymentStatus::where('crm_id', $crm->id)->sum('downpayment_money_due');
                    $finishingWorkStatus = App\Models\FinishingWorkStatus::where('crm_id', $crm->id)->sum('finishing_work_money_due');
                    $firstRoofCasting = App\Models\FloorRoofCasting1st::where('crm_id', $crm->id)->sum('floor_roof_casting_money_due_1st');
                    $landFillingStatus1st = App\Models\LandFillingStatus1st::where('crm_id', $crm->id)->sum('land_filling_money_due');
                    $landFillingStatus2nd = App\Models\LandFillingStatus2nd::where('crm_id', $crm->id)->sum('land_filling_money_due');
                    $installment = App\Models\Installment::where('crm_id', $crm->id)->sum('installment_due');
                    $totalDueAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;

                    $till_today_due = 0;
                    $todayDate = Carbon\Carbon::now();
                    $end = $todayDate->startOfDay();
                    $booking_status = App\Models\BookingStatus::where('crm_id', $crm->id)
                        ->where('booking_money_due_date', '<', $end)
                        ->sum('booking_money_due');
                    $after_handover_money = App\Models\AfterHandoverMoney::where('crm_id', $crm->id)
                        ->where('after_handover_money_due_date', '<', $end)
                        ->sum('after_handover_money_money_due');
                    $building_pilling = App\Models\BuildingPillingStatus::where('crm_id', $crm->id)
                        ->where('building_pilling_money_due_date', '<', $end)
                        ->sum('building_pilling_money_due');
                    // $car_parking =  App\Models\CarParkingStatus::whereBetween('car_parking_money_due_date',[$start,$end])->sum('car_parking_money_due');
                    $down_payment = App\Models\DownpaymentStatus::where('crm_id', $crm->id)
                        ->where('downpayment_money_due_date', '<', $end)
                        ->sum('downpayment_money_due');
                    $finishing_money = App\Models\FinishingWorkStatus::where('crm_id', $crm->id)
                        ->where('finishing_work_money_due_date', '<', $end)
                        ->sum('finishing_work_money_due');
                    $first_floor = App\Models\FloorRoofCasting1st::where('crm_id', $crm->id)
                        ->where('floor_roof_casting_money_due_date_1st', '<', $end)
                        ->sum('floor_roof_casting_money_due_1st');
                    $land_filling_1st = App\Models\LandFillingStatus1st::where('crm_id', $crm->id)
                        ->where('land_filling_money_due_date', '<', $end)
                        ->sum('land_filling_money_due');
                    $land_filling_2nd = App\Models\LandFillingStatus2nd::where('crm_id', $crm->id)
                        ->where('land_filling_money_due_date', '<', $end)
                        ->sum('land_filling_money_due');
                    $installment = App\Models\Installment::where('crm_id', $crm->id)
                        ->where('installment_due_date', '<', $end)
                        ->sum('installment_due');
                    $till_today_due = $booking_status + $after_handover_money + $building_pilling + $down_payment + $finishing_money + $first_floor + $land_filling_1st + $land_filling_2nd + $installment;

                @endphp
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card mini-stat bg-success text-white h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex">
                                <div class="mini-stat-img me-4">
                                    <i class="fas fa-users" style="width:380; height:380;"></i>
                                </div>
                                <div>
                                    <h5 class="font-size-16 text-uppercase">Users</h5>
                                    <h4 class="fw-medium font-size-24">{{ $usersCount }} </h4>
                                    <div class="mini-stat-label bg-success">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card mini-stat bg-success text-white h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="{{ asset('assets') }}/images/services-icon/02.png" alt="">
                                </div>
                                <div>
                                    <h5 class="font-size-16 text-uppercase ">Total Paid Amount</h5>
                                    <h4 class="fw-medium font-size-24"> {{ $totalPaid }}</h4>
                                    <div class="mini-stat-label bg-success">
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card mini-stat bg-success text-white h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="{{ asset('assets') }}/images/services-icon/03.png" alt="">
                                </div>
                                <div>
                                    <h5 class="font-size-16 text-uppercase ">Total Due Amount</h5>
                                    <h4 class="fw-medium font-size-24"> {{ $totalDueAmount }}</h4>
                                    <div class="mini-stat-label bg-success">
                                    </div>
                                </div>                                
                            </div>                           
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card mini-stat bg-success text-white h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="{{ asset('assets') }}/images/services-icon/04.png" alt="">
                                </div>
                                <div>
                                    <h5 class="font-size-16 text-uppercase ">Current Date Due</h5>
                                    <h4 class="fw-medium font-size-24">{{ $till_today_due }} </h4>
                                    <div class="mini-stat-label bg-success">
                                    </div>                                
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
        
        <div class="row d-flex justify-content-center">            
            <div class="row my-4">
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="super-admin-chart" id="main5" style="width:100%;height:400px"></div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="super-admin-chart" id="main4" style="width:100%;height:400px;"></div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="super-admin-chart" id="main3" style="width:100%;height:400px;"></div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="super-admin-chart" id="main6" style="width:100%;height:400px"></div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="super-admin-chart" id="main2" style="width:100%;height:400px"></div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="super-admin-chart" id="main" style="width:100%;height:400px"></div>
                </div>
            </div>
        </div>
        <!-- end row -->





    </div> <!-- container-fluid -->
@endsection

@section('script')


    <script type="text/javascript">
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('main'));
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);        

        // Specify the configuration items and data for the chart
        var option = {
            title: [{
                    text: 'daily due'
                }

            ],
            color: {
                0: "#FF0000",
                1: "#91cc75",
                2: "#fac858",
                3: "#ee6666",
                4: "#73c0de",
                5: "#3ba272",
                6: "#fc8452",
                7: "#9a60b4",
                8: "#ea7ccc",
            },

            tooltip: {},
            legend: {
                data: ['sales']
            },
            xAxis: {
                data: ['booking', 'building', 'downPay', 'floor', 'land', 'land2', 'finishing']
            },
            yAxis: {},
            series: [{
                name: 'sales',
                type: 'bar',
                data: [cData.booking_status_daily, cData.building_pilling_daily, cData.down_payment_daily, cData
                    .first_floor_daily, cData.land_filling_1st_daily, cData.land_filling_2nd_daily, cData
                    .finishing_money_daily
                ]
            }]
        };

        // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);
    </script>



    <script type="text/javascript">
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('main3'));
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);        

        // Specify the configuration items and data for the chart
        var option = {
            title: [{
                text: 'yearly due'
            }],

            tooltip: {},
            legend: {
                data: ['sales']
            },
            xAxis: {
                data: ['booking', 'pilling', 'downPay', 'floor', 'land1', 'land2', 'finishing']
            },
            color: {
                1: "#91cc75",
                2: "#fac858",
                3: "#ee6666",
                4: "#73c0de",
                5: "#3ba272",
                6: "#fc8452",
                7: "#9a60b4",
                8: "#ea7ccc",
            },
            yAxis: {},
            series: [{
                name: 'sales',
                type: 'bar',
                data: [cData.booking_status_yearly, cData.building_pilling_yearly, cData.down_payment_yearly,
                    cData.first_floor_yearly, cData.land_filling_1st_yearly, cData.land_filling_2nd_yearly,
                    cData.finishing_money_yearly
                ]
            }]
        };

        // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);
    </script>




    <script>
        var chartDom = document.getElementById('main2');
        var myChart = echarts.init(chartDom);
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
        var option;

        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '40',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [{
                        value: cData.paid_data,
                        name: 'PAID'
                    },
                    {
                        value: cData.due_data,
                        name: 'DUE'
                    },
                ]
            }]
        };

        option && myChart.setOption(option);
    </script>


    <script>
        var chartDom = document.getElementById('main5');
        var myChart = echarts.init(chartDom);
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
        var option;

        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '40',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [{
                        value: cData.monthlyTotalDue,
                        name: 'Monthly Due'
                    },
                    {
                        value: cData.monthlyTotalPaid,
                        name: 'Monthly Paid'
                    },
                ]
            }]
        };

        option && myChart.setOption(option);
    </script>



    <script>
        var chartDom = document.getElementById('main6');
        var myChart = echarts.init(chartDom);
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
        var option;

        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '40',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [{
                        value: cData.yearlyTotalDue,
                        name: 'Yearly Due'
                    },
                    {
                        value: cData.yearlyTotalPaid,
                        name: 'Yearly Paid'
                    },
                ]
            }]
        };

        option && myChart.setOption(option);
    </script>






    <script>
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('main4'));
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);     

        // Specify the configuration items and data for the chart
        var option = {
            title: [{
                text: 'Monthly due',
                color: "red",
                borderColor: "red"
            }],
            tooltip: {},
            legend: {
                data: ['sales']
            },
            xAxis: {
                data: ['booking', 'pilling', 'downPay', 'floor', 'land1', 'land2', 'finishing']
            },
            yAxis: {},
            color: {

                1: "#91cc75",
                2: "#fac858",
                3: "#ee6666",
                4: "#73c0de",
                5: "#3ba272",
                6: "#fc8452",
                7: "#9a60b4",
                8: "#ea7ccc",
            },

            series: [{
                name: 'sales',
                type: 'bar',
                data: [cData.booking_status_monthly, cData.building_pilling_monthly, cData.down_payment_monthly,
                    cData.first_floor_monthly, cData.land_filling_1st_monthly, cData
                    .land_filling_2nd_monthly, cData.land_filling_2nd_monthly
                ]
            }]
        };

        // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);

        option && myChart.setOption(option);
    </script>

@endsection
