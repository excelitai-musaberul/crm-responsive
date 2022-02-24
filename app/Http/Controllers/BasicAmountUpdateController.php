<?php

namespace App\Http\Controllers;

use App\Models\AfterHandoverMoney;
use Illuminate\Http\Request;
use App\Models\ApproveUpdate;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use App\Models\TotalInstallmentAmount;
use App\Models\InstallmentYear;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BasicAmountUpdateController extends Controller
{

public function basicUpdateRequest(Request $request,$id){
    
    
    if($request->installment_amount){
        $request->validate([
            'installment_amount'=>'required|numeric',
            'installment_start_date'=>'required',
            'installment_number'=>'required|numeric',
        ]);

        if( $request->installment_amount  && $request->installment_number  && $request->installment_start_date ){
            // Total Installment Amount
            TotalInstallmentAmount::create([
                'user_id'=>$id,
                'number_of_installment'=>$request->installment_number,
                'total_installment_amount'=>$request->installment_amount,
                'installment_starting_date'=>$request->installment_start_date,
                'description'=>$request->installment_amount_note,
            ]);

            //Installment Years
            $istallment_Year=ceil($request->installment_number/12);
            $installmentYears=[
                'user_id'=>$id,
                'installment_years'=>$istallment_Year,
                'installment_years_amount'=>$request->installment_years_amount,
            ];
            InstallmentYear::create($installmentYears);
        }

    }
    
    
    // dd($request->booking_money);
    $booking_statusCheck = BookingStatus::where('user_id', $id)->first();
    if(!$booking_statusCheck->booking_money && $request->initial_booking_money && $request->booking_money){

        $request->validate([
            'booking_money'=>"numeric|min:{$request->initial_booking_money}|max:{$request->initial_booking_money}",
        ],[
            'booking_money.min' => 'Initial amount and Booking money must be equal ',
            'booking_money.max' => 'Initial amount and Booking money must be equal ',
        ]);
        // dd($request->initial_booking_money);
    }


    // downpayment initial vale and downpayment check
    $down_paymentCheck= DownpaymentStatus::where('user_id', $id)->first();
    if(!$down_paymentCheck->downpayment_money && $request->initial_downpayment_money && $request->downpayment_money){

        $request->validate([
            'downpayment_money'=>"numeric|min:{$request->initial_downpayment_money}|max:{$request->initial_downpayment_money}",
        ],[
            'downpayment_money.min' => 'Initial amount and Downpayemt must be equal',
            'downpayment_money.max' => 'Initial amount and Downpayemt must be equal',
        ]);
        // dd($request->initial_downpayment_money);
    }

    // land filling 1st initial vale and land filling 1st check
    $land_filing_1stCheck= LandFillingStatus1st::where('user_id', $id)->first();
    if(!$land_filing_1stCheck->land_filling_money && $request->initial_land_filling_money && $request->land_filling_money){

        $request->validate([
            'land_filling_money'=>"numeric|min:{$request->initial_land_filling_money}|max:{$request->initial_land_filling_money}",
        ],[
            'land_filling_money.min' => 'Initial amount and Land filling 1st must be equal',
            'land_filling_money.max' => 'Initial amount and Land filling 1st must be equal',
        ]);
        // dd($request->initial_land_filling_money);
    }


    // land filling 2nd initial vale and land filling 1st check
    $land_filing_2ndCheck= LandFillingStatus2nd::where('user_id', $id)->first();
    if(!$land_filing_2ndCheck->land_filling_money && $request->initial_land_filling_money2 && $request->land_filling_money2){

        $request->validate([
            'land_filling_money2'=>"numeric|min:{$request->initial_land_filling_money2}|max:{$request->initial_land_filling_money2}",
        ],[
            'land_filling_money2.min' => 'Initial amount and Land filling 2nd must be equal',
            'land_filling_money2.max' => 'Initial amount and Land filling 2nd must be equal',
        ]);
        // dd($request->land_filling_money2);
    }

    // buildung pilling initial vale and buildung pilling check
    $building_pilling_statusCheck=BuildingPillingStatus::where('user_id', $id)->first();
    if(!$building_pilling_statusCheck->building_pilling_money && $request->initial_building_pilling_money && $request->building_pilling_money){

        $request->validate([
            'building_pilling_money'=>"numeric|min:{$request->initial_building_pilling_money}|max:{$request->initial_building_pilling_money}",
        ],[
            'building_pilling_money.min' => 'Initial amount and  Building pilling must be equal',
            'building_pilling_money.max' => 'Initial amount and Building pilling must be equal',
        ]);
        // dd($request->building_pilling_money);
    }


    // floor roof casting initial vale and floor roof casting check
    $roof_casting_1stCheck=FloorRoofCasting1st::where('user_id', $id)->first();
    if(!$roof_casting_1stCheck->floor_roof_casting_money_1st && $request->initial_floor_roof_casting_money_1st && $request->floor_roof_casting_money_1st){

        $request->validate([
            'floor_roof_casting_money_1st'=>"numeric|min:{$request->initial_floor_roof_casting_money_1st}|max:{$request->initial_floor_roof_casting_money_1st}",
        ],[
            'floor_roof_casting_money_1st.min' => 'Initial amount and  Floor roof casting must be equal',
            'floor_roof_casting_money_1st.max' => 'Initial amount and Floor roof casting must be equal',
        ]);
        // dd($request->floor_roof_casting_money_1st);
    }

    // finishing work initial vale and finishing work casting check
    $finishing_workCheck=FinishingWorkStatus::where('user_id', $id)->first();
    if(!$finishing_workCheck->finishing_work_money && $request->initial_finishing_work_money && $request->finishing_work_money){

        $request->validate([
            'finishing_work_money'=>"numeric|min:{$request->initial_finishing_work_money}|max:{$request->initial_finishing_work_money}",
        ],[
            'finishing_work_money.min' => 'Initial amount and  Finishing work must be equal',
            'finishing_work_money.max' => 'Initial amount and Finishing work must be equal',
        ]);
        // dd($request->finishing_work_money);
    }

    // after handover initial vale and after handover casting check
    $after_hand_over_moneyCheck=AfterHandoverMoney::where('user_id', $id)->first();
    if(!$after_hand_over_moneyCheck->after_handover_money && $request->initial_after_handover_money && $request->after_handover_money){

        $request->validate([
            'after_handover_money'=>"numeric|min:{$request->initial_after_handover_money}|max:{$request->initial_after_handover_money}",
        ],[
            'after_handover_money.min' => 'Initial amount and  After handover must be equal',
            'after_handover_money.max' => 'Initial amount and After handover must be equal',
        ]);
        // dd($request->after_handover_money);
    }
    
    
    

    $check_request=ApproveUpdate::where('user_id',$id)->get();



    if($check_request->isEmpty()){
        $user= User::where('id',$id)->first();
        // dd($request->after_handover_money_money_paid);
        // dd($request->initial_booking_money);
        $approve_status =new ApproveUpdate;
        $approve_status->user_id= $id;
        $approve_status->admin_id= 1;
        // dd($request);
        //start
        $booking_status = BookingStatus::where('user_id', $id)->first();
        $check_due=$booking_status->booking_money_due-$request->booking_money_paid;
        //if else start
        if($request->booking_money_paid>$request->booking_money){
            Session::flash('error',"Paid is greater than due");
            return redirect()->back();
        }
        elseif($booking_status->booking_money_due==0){
            $request_booking_status_total=$request->booking_money;
            $request_booking_payment_due=$request_booking_status_total-$request->booking_money_paid;
            $approve_status->booking_money_due= $request_booking_payment_due;
            $approve_status->booking_money_paid=$request->booking_money_paid;
            $approve_status-> booking_money_paid_date =$request->booking_money_paid_date;
            $approve_status-> booking_money_due_date =$request->booking_money_due_date;
            //adding booking money field
            $approve_status->booking_money=$request->booking_money;
            $approve_status->booking_money_note=$request->booking_money_note;
            $approve_status->booking_money_payment_type=$request->booking_money_payment_type;
            $approve_status->initial_booking_money=$request->initial_booking_money;
        }
        elseif($check_due<0){
            Session::flash('error',"Check the Due");
            return redirect()->back();
        }
        else{
            $request_booking_status_total=$booking_status->booking_money_due;
            $request_booking_status_due= $request_booking_status_total-$request->booking_money_paid;
            $approve_status->booking_money_due= $request_booking_status_due;
            //end

            $approve_status->booking_money_paid=$request->booking_money_paid;
            $approve_status-> booking_money_paid_date =$request->booking_money_paid_date;
            $approve_status-> booking_money_due_date =$request->booking_money_due_date;
              //adding booking money field
              $approve_status->booking_money=$request->booking_money;
            $approve_status->booking_money_note=$request->booking_money_note;
            $approve_status->booking_money_payment_type=$request->booking_money_payment_type;
            $approve_status->initial_booking_money=$request->initial_booking_money;
        }
        //down payment
        $down_payment = DownpaymentStatus::where('user_id', $id)->first();
        $check_due=$down_payment->downpayment_money_due-$request->downpayment_money_paid;


        if($request->downpayment_money_paid > $request->downpayment_money){

            Session::flash('error',"Paid is greater than due");
            return redirect()->back();
        }
        elseif($down_payment->downpayment_money_due==0 ){
            $request_down_payment_total=$request->downpayment_money;
            $request_down_payment_due=$request_down_payment_total-$request->downpayment_money_paid;
            $approve_status->downpayment_money_due= $request_down_payment_due;
            $approve_status->downpayment_money_paid=$request->downpayment_money_paid;
            $approve_status-> downpayment_money_paid_date =$request->downpayment_money_paid_date;
            $approve_status-> downpayment_money_due_date =$request->downpayment_money_due_date;
             //request due
              //adding booking money field
              $approve_status->downpayment_money=$request->downpayment_money;
            $approve_status->downpayment_money_note=$request->downpayment_money_note;
            $approve_status->downpayment_money_payment_type=$request->downpayment_money_payment_type;
            $approve_status->initial_downpayment_money=$request->initial_downpayment_money;


        }
        elseif($check_due<0){
            Session::flash('error',"Check the Due");
            return redirect()->back();
        }
        else{
        $request_down_payment_total=$down_payment->downpayment_money_due;
       $request_down_payment_due= $request_down_payment_total-$request->downpayment_money_paid;
       $approve_status->downpayment_money_due= $request_down_payment_due;
        // $approve_status->downpayment_money= $request_down_payment_total;
        $approve_status->downpayment_money_paid=$request->downpayment_money_paid;
        $approve_status-> downpayment_money_paid_date =$request->downpayment_money_paid_date;
        $approve_status-> downpayment_money_due_date =$request->downpayment_money_due_date;
         //request due
         //adding booking money field
         $approve_status->downpayment_money=$request->downpayment_money;
        $approve_status->downpayment_money_note=$request->downpayment_money_note;
        $approve_status->downpayment_money_payment_type=$request->downpayment_money_payment_type;
        $approve_status->initial_downpayment_money=$request->initial_downpayment_money;

    }
    // $car_parking = CarParkingStatus::where('user_id', $id)->first();
    // $check_due=$car_parking->car_parking_money_due-$request->car_parking_money_paid;
    // if($request->car_parking_money_paid > $request->car_parking_money){

    //     Session::flash('error',"Paid is greater than due");
    //         return redirect()->back();
    // }
    // elseif($car_parking->car_parking_money_due==0){
    //     $request_car_parking_total=$request->car_parking_money;
    //     $request_car_parking_due=$request_car_parking_total-$request->car_parking_money_paid;
    //     $approve_status->car_parking_money_due= $request_car_parking_due;
    //     // $approve_status->car_parking_money= $request->car_parking_money;
    //     $approve_status->car_parking_money_paid=$request->car_parking_money_paid;
    //     $approve_status-> car_parking_money_paid_date =$request->car_parking_money_paid_date;
    //     $approve_status-> car_parking_money_due_date =$request->car_parking_money_due_date;
    //     $approve_status->car_parking_money_note=$request->car_parking_money_note;
    //     $approve_status->car_parking_money_payment_type=$request->car_parking_money_payment_type;
    //     //adding booking money field
    //     $approve_status->car_parking_money=$request->car_parking_money;
    //     $approve_status->initial_car_parking_money=$request->initial_car_parking_money;
    // }
    // elseif($check_due<0){
    //     Session::flash('error',"Check the Due");
    //     return redirect()->back();
    // }
    // else{
    //     //start
    //     $request_car_parking_total=$car_parking->car_parking_money_due;
    //     $request_car_parking_due= $request_car_parking_total-$request->car_parking_money_paid;
    //     $approve_status->car_parking_money_due= $request_car_parking_due;
    //     //end
    //     $approve_status->car_parking_money_paid=$request->car_parking_money_paid;
    //     $approve_status-> car_parking_money_paid_date =$request->car_parking_money_paid_date;
    //     $approve_status-> car_parking_money_due_date =$request->car_parking_money_due_date;
    //     $approve_status->car_parking_money_note=$request->car_parking_money_note;
    //     $approve_status->car_parking_money_payment_type=$request->car_parking_money_payment_type;

    //     //car parking ends
    //     //adding booking money field
    //     $approve_status->car_parking_money=$request->car_parking_money;
    //     $approve_status->initial_car_parking_money=$request->initial_car_parking_money;
    // }
    $land_filling_1 = LandFillingStatus1st::where('user_id', $id)->first();
    $check_due=$land_filling_1->land_filling_money_due-$request->land_filling_money_paid;

    if($request->land_filling_money_paid>$request->land_filling_money){
        Session::flash('error',"Paid is greater than due");
            return redirect()->back();
    }
    elseif($land_filling_1->land_filling_money_due==0){
        $request_land_filling_1_total=$request->land_filling_money;
        $request_land_filling_due_1=$request_land_filling_1_total-$request->land_filling_money_paid;
        $approve_status->land_filling_money_due_1= $request_land_filling_due_1;

        $approve_status->land_filling_money_paid_1=$request->land_filling_money_paid;
        $approve_status-> land_filling_money_paid_date_1 =$request->land_filling_money_paid_date;
        $approve_status-> land_filling_money_due_date_1 =$request->land_filling_money_due_date;

        $approve_status->land_filling_money_note_1=$request->land_filling_money_note;
        $approve_status->land_filling_money_payment_type_1=$request->land_filling_money_payment_type;
         //adding booking money field
         $approve_status->land_filling_money_1=$request->land_filling_money;
         $approve_status->initial_land_filling_money=$request->initial_land_filling_money;
    }
    elseif($check_due<0){
        Session::flash('error',"Check the Due");
        return redirect()->back();
    }
    else{
          //start

          $request_land_filling_1_total=$land_filling_1->land_filling_money_due;
          $request_land_filling_1_due= $request_land_filling_1_total-$request->land_filling_money_paid;
          $approve_status->land_filling_money_due_1= $request_land_filling_1_due;
        //end
        $approve_status->land_filling_money_paid_1=$request->land_filling_money_paid;
        $approve_status-> land_filling_money_paid_date_1 =$request->land_filling_money_paid_date;
        $approve_status-> land_filling_money_due_date_1 =$request->land_filling_money_due_date;

        $approve_status->land_filling_money_note_1=$request->land_filling_money_note;
        $approve_status->land_filling_money_payment_type_1=$request->land_filling_money_payment_type;
         //adding booking money field
         $approve_status->land_filling_money_1=$request->land_filling_money;
         $approve_status->initial_land_filling_money=$request->initial_land_filling_money;
    }
    $land_filling_2 = LandFillingStatus2nd::where('user_id', $id)->first();
    $check_due=$land_filling_2->land_filling_money_due_2-$request->land_filling_money_paid2;

    if($request->land_filling_money_paid2>$request->land_filling_money2){
        Session::flash('error',"Paid is greater than due");
            return redirect()->back();
    }

    elseif($land_filling_2->land_filling_money_due2==0){
        $request_land_filling_2_total=$request->land_filling_money2;
        $request_land_filling_due_2=$request_land_filling_2_total-$request->land_filling_money_paid2;
        $approve_status->land_filling_money_due_2= $request_land_filling_due_2;
        $approve_status->land_filling_money_paid_2=$request->land_filling_money_paid2;
        $approve_status-> land_filling_money_paid_date_2 =$request->land_filling_money_paid_date2;
        $approve_status-> land_filling_money_due_date_2 =$request->land_filling_money_due_date2;
        $approve_status->land_filling_money_note_2=$request->land_filling_money_note2;
        $approve_status->land_filling_money_payment_type_2=$request->land_filling_money_payment_type2;
         //adding booking money field
         $approve_status->land_filling_money_2=$request->land_filling_money2;
         $approve_status->initial_land_filling_money2=$request->initial_land_filling_money2;

    }
    elseif($check_due<0){
        Session::flash('error',"Check the Due");
        return redirect()->back();
    }
    else{
          $approve_status->land_filling_money_paid_2=$request->land_filling_money_paid2;
          $approve_status-> land_filling_money_paid_date_2 =$request->land_filling_money_paid_date2;
          $approve_status-> land_filling_money_due_date_2 =$request->land_filling_money_due_date2;
           //start
          $request_land_filling_2_total=$land_filling_2->land_filling_money_due;
          $request_land_filling_2_due= $request_land_filling_2_total-$request->land_filling_money_paid2;
          $approve_status->land_filling_money_due_2= $request_land_filling_2_due;
        //end

           $approve_status->land_filling_money_note_2=$request->land_filling_money_note2;
          $approve_status->land_filling_money_payment_type_2=$request->land_filling_money_payment_type2;
          //adding booking money field
          $approve_status->land_filling_money_2=$request->land_filling_money2;
          $approve_status->initial_land_filling_money2=$request->initial_land_filling_money2;


    }
        //building pilling
        $building_pillling = BuildingPillingStatus::where('user_id', $id)->first();
        $check_due=$building_pillling->building_pilling_money_due-$request->building_pilling_money_paid;

        if($request->building_pilling_money_paid>$request->building_pilling_money){
            Session::flash('error',"Paid is greater than due");
            return redirect()->back();
            }

        elseif($building_pillling->building_pilling_money_due==0){
            $request_building_pilling_total=$request->building_pilling_money;
            $request_building_pilling_due=$request_building_pilling_total-$request->building_pilling_money_paid;
            $approve_status->building_pilling_money_due= $request_building_pilling_due;
            $approve_status->building_pilling_money_paid=$request->building_pilling_money_paid;
            $approve_status-> building_pilling_money_paid_date =$request->building_pilling_money_paid_date;
            $approve_status-> building_pilling_money_due_date =$request->building_pilling_money_due_date;

            $approve_status->building_pilling_money_note=$request->building_pilling_money_note;
            $approve_status->building_pilling_money_payment_type=$request->building_pilling_money_payment_type;
             //adding booking money field
          $approve_status->building_pilling_money=$request->building_pilling_money;

          $approve_status->initial_building_pilling_money=$request->initial_building_pilling_money;
        }

        elseif($check_due<0){
            Session::flash('error',"Check the Due");
            return redirect()->back();
        }

        else{
           //start
           $request_building_pilling_total=$building_pillling->building_pilling_money_due;
           $request_building_pilling_due= $request_building_pilling_total-$request->building_pilling_money_paid;
           $approve_status->building_pilling_money_due= $request_building_pilling_due;
           //end
           $approve_status->building_pilling_money_paid=$request->building_pilling_money_paid;
           $approve_status-> building_pilling_money_paid_date =$request->building_pilling_money_paid_date;
           $approve_status-> building_pilling_money_due_date =$request->building_pilling_money_due_date;



             //adding booking money field
          $approve_status->building_pilling_money=$request->building_pilling_money;
          $approve_status->initial_building_pilling_money=$request->initial_building_pilling_money;


        }
     //roof casting
     $floor_roof= FloorRoofCasting1st::where('user_id', $id)->first();
     $check_due=$floor_roof->floor_roof_casting_money_1st-$request->floor_roof_casting_money_paid_1st;
     if($request->floor_roof_casting_money_paid_1st>$request->floor_roof_casting_money_1st){
        Session::flash('error',"Paid is greater than due");
        return redirect()->back();
    }
     elseif($floor_roof->floor_roof_casting_money_due_1st==0 ){
        $request_floor_roof_total=$request->floor_roof_casting_money_1st;
        $request_floor_roof_due=$request_floor_roof_total-$request->floor_roof_casting_money_paid_1st;
        $approve_status->floor_roof_casting_money_due_1st= $request_floor_roof_due;
            $approve_status->floor_roof_casting_money_paid_1st=$request->floor_roof_casting_money_paid_1st;
            $approve_status-> floor_roof_casting_money_paid_date_1st =$request->floor_roof_casting_money_paid_date_1st;
            $approve_status-> floor_roof_casting_money_due_date_1st =$request->floor_roof_casting_money_due_date_1st;
            $approve_status->floor_roof_casting_money_note_1st=$request->floor_roof_casting_money_note_1st;
            $approve_status->floor_roof_casting_money_payment_type_1st=$request->floor_roof_casting_money_payment_type_1st;
              //adding booking money field
          $approve_status->floor_roof_casting_money_1st=$request->floor_roof_casting_money_1st;
          $approve_status->initial_floor_roof_casting_money_1st=$request->initial_floor_roof_casting_money_1st;

     }

     elseif($check_due<0){
        Session::flash('error',"Check the Due");
        return redirect()->back();
     }
     else{
         //start
         $request_floor_roof_total=$floor_roof->floor_roof_casting_money_due_1st;
         $request_floor_roof_due= $request_floor_roof_total-$request->floor_roof_casting_money_paid_1st;
         $approve_status->floor_roof_casting_money_due_1st= $request_floor_roof_due;
         //end
         $approve_status->floor_roof_casting_money_paid_1st=$request->floor_roof_casting_money_paid_1st;
         $approve_status-> floor_roof_casting_money_paid_date_1st =$request->floor_roof_casting_money_paid_date_1st;
         $approve_status-> floor_roof_casting_money_due_date_1st =$request->floor_roof_casting_money_due_date_1st;
         $approve_status->floor_roof_casting_money_note_1st=$request->floor_roof_casting_money_note_1st;
         $approve_status->floor_roof_casting_money_payment_type_1st=$request->floor_roof_casting_money_payment_type_1st;

          //adding booking money field
          $approve_status->floor_roof_casting_money_1st=$request->floor_roof_casting_money_1st;
          $approve_status->initial_floor_roof_casting_money_1st=$request->initial_floor_roof_casting_money_1st;
     }

     $finishing_work = FinishingWorkStatus::where('user_id', $id)->first();
     $check_due=$finishing_work->finishing_work_money_due-$request->finishing_work_money_paid;
     if($request->finishing_work_money_paid>$request->finishing_work_money){
        Session::flash('error',"Paid is greater than duee");
        return redirect()->back();
    }
     elseif($finishing_work->finishing_work_money_due==0){
        $request_finishing_work_total=$request->finishing_work_money;
        $request_finishing_work_due=$request_finishing_work_total-$request->finishing_work_money_paid;
        $approve_status->finishing_work_money_due= $request_finishing_work_due;
        $approve_status->finishing_work_money_paid=$request->finishing_work_money_paid;
        $approve_status-> finishing_work_money_paid_date =$request->finishing_work_money_paid_date;
        $approve_status->finishing_work_money_due_date=$request->finishing_work_money_due_date;
        $approve_status->finishing_work_money_note=$request->finishing_work_money_note;
        $approve_status->finishing_work_money_payment_type=$request->finishing_work_money_payment_type;

          //adding booking money field
          $approve_status->finishing_work_money=$request->finishing_work_money;
          $approve_status->initial_finishing_work_money=$request->initial_finishing_work_money;
     }
     elseif($check_due<0){
        Session::flash('error',"Check the Due");
        return redirect()->back();
     }
     else{
          //start
          $request_finishing_work_total=$finishing_work->finishing_work_money_due;
          $request_finishing_work_due= $request_finishing_work_total-$request->finishing_work_money_paid;
          $approve_status->finishing_work_money_due= $request_finishing_work_due;
          //end

          $approve_status->finishing_work_money_paid=$request->finishing_work_money_paid;
          $approve_status-> finishing_work_money_paid_date =$request->finishing_work_money_paid_date;
          $approve_status->finishing_work_money_due_date=$request->finishing_work_money_due_date;
          $approve_status->finishing_work_money_note=$request->finishing_work_money_note;
          $approve_status->finishing_work_money_payment_type=$request->finishing_work_money_payment_type;
           //adding booking money field
           $approve_status->finishing_work_money=$request->finishing_work_money;
           $approve_status->initial_finishing_work_money=$request->initial_finishing_work_money;
     }
     $after_hand = AfterHandoverMoney::where('user_id', $id)->first();
     $check_due=$after_hand->after_handover_money_money_due-$request->after_handover_money_money_paid;

    if($request->after_handover_money_money_paid>$request->after_handover_money){

        Session::flash('error',"Paid is greater than due");
        return redirect()->back();
}
        elseif($after_hand->after_handover_money_money_due==0){
        $request_afterhand_total=$request->after_handover_money;
        $request_afterhand_due=$request_afterhand_total-$request->after_handover_money_money_paid;
        $approve_status->after_handover_money_due= $request_afterhand_due;


        $approve_status->after_handover_money_paid=$request->after_handover_money_money_paid;
        $approve_status-> after_handover_money_paid_date =$request->after_handover_money_money_paid_date;
        $approve_status-> after_handover_money_due_date =$request->after_handover_money_due_date;
        $approve_status->after_handover_money_note=$request->after_handover_money_note;
        $approve_status->after_handover_money_payment_type=$request->after_handover_money_payment_type;
         //adding booking money field
         $approve_status->after_handover_money=$request->after_handover_money;
         $approve_status->initial_after_handover_money=$request->initial_after_handover_money;

     }
     elseif($check_due<0){
        Session::flash('error',"Check the Due");
        return redirect()->back();
        }
     else{

          //start
          $request_afterhand_total=$after_hand->after_handover_money_money_due;
          $request_afterhand_due= $request_afterhand_total-$request->after_handover_money_money_paid;
          $approve_status->after_handover_money_due= $request_afterhand_due;
          //end
          $approve_status->after_handover_money_paid=$request->after_handover_money_money_paid;
          $approve_status-> after_handover_money_paid_date =$request->after_handover_money_money_paid_date;
          $approve_status-> after_handover_money_due_date =$request->after_handover_money_due_date;
          $approve_status->after_handover_money_note=$request->after_handover_money_note;
          $approve_status->after_handover_money_payment_type=$request->after_handover_money_payment_type;
             //adding booking money field
         $approve_status->after_handover_money=$request->after_handover_money;
         $approve_status->initial_after_handover_money=$request->initial_after_handover_money;


     }

       $approve_status->save();

        if(Auth::guard('admin')||Auth::guard('employee')||hasRole('manager'))
        {
            return redirect()->back()->with(['success'=>'Your request is in queue']);
        }
        else if(Auth::guard('super_admin'))
        {
            return redirect()->route('super_admin.show.request');

        }

    }

    else{
        Session::flash('error',"Your previous request is pending");
         return redirect()->back();
     }

    }


    public function show_request(){
        $update_request=ApproveUpdate::all();
        // dd($update_request);

        return view('basic_amount_request.show_request',compact('update_request'));

    }

    public function destroy_request($id){
        $request_destroy=ApproveUpdate::where('user_id',$id);
        $request_destroy->delete();

        return redirect()->route('super_admin.show.request');
    }
    public function getBasic_data($id){
        $check_request=ApproveUpdate::where('user_id',$id)->get();


    }
    public function fetch_data($id){
        $update_request=ApproveUpdate::where('user_id',$id)->first();

         return response()->json([
             'update_request'=>$update_request,
         ]);

    }


}

