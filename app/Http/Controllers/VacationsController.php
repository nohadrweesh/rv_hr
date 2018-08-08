<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Vacation;
use App\VacationWorking;

class VacationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $vacations=Vacation::orderBy('created_at','desc')->get();
        return view('vacations/vacations',compact('vacations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('vacations/new_vacation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$availability='off';
        //
        //dd($request);
         /*echo $vacFrom= $request['vacFrom'];
         echo $vacTo=$request['vacTo'];
         echo $title=$request['title'];
         echo $reason=$request['reason'];
          print_r( $working_hours=$request['working_hours']);
         print_r( $working_hours_from=$request['working_hours_from']);
         print_r( $working_hours_to=$request['working_hours_to']);*/
        $vacFrom= $request['vacFrom'];
         $vacTo=$request['vacTo'];
         $title=$request['title'];
         $reason=$request['reason'];
          $working_hours=$request['working_hours'];
          $working_hours_from=$request['working_hours_from'];
          $working_hours_to=$request['working_hours_to'];
        
        if($request->exists('availability'))
            $availability=1;
        else
            $availability=0;

         
        


         $vacation =new Vacation;
         $vacation->from=$vacFrom;
         $vacation->to=$vacTo;
         $vacation->title=$title;
         $vacation->reason=$reason;
         $vacation->availabilty=$availability;

        
       
        
        $vacation->save();
        if($availability==1){
        
            $datetime1 = new DateTime($vacFrom);
            $datetime2 = new DateTime($vacTo);
            $interval = $datetime1->diff($datetime2);

            $days = $interval->format('%d')+1;
            $tempDate=$vacFrom;
            $working_hours_from=$request['working_hours_from'];
            $working_hours=$request['working_hours'];
            for( $i = 0; $i<$days; $i++ ) {

                
                $vacationWorkingFrom=$working_hours_from[$i];
                $vacationWorkingDate=$tempDate;
                $vacationWorkinghours=$working_hours[$i];
                $vacationWorking=new VacationWorking;
                $vacationWorking->date=$vacationWorkingDate;
                $vacationWorking->hours=$vacationWorkinghours;
                $vacationWorking->from=$vacationWorkingFrom;
                $tempDate=date('Y-m-d', strtotime('+1 day', strtotime($vacFrom)));
                $vacation->vacationWorkings()->save($vacationWorking);

            }
        }
        

        $vacations=Vacation::orderBy('created_at','desc')->get();
        return view('vacations/vacations',compact('vacations'));

        //return "Vacation created";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


        $vacationWorkings=Vacation::find($id)->vacationWorkings;
         //$details=$vacation->vacationWorkings();
         //dd($vacations);
        return view ('vacations.vacation_details',compact('vacationWorkings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editVacationStatus(Request $request)
    {
        //

        $vacation=Vacation::find($request['id']);
        $cmd=$request['cmd'];
        $vacation->status=$cmd;
        $vacation->update();
        return response()->json(['message'=>'updated successfully'],200);
    }
}
