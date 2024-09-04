<?php 

    public function save(Request $request)
    {
        // return $request;
        // Step 1: Update the cncmachines table where production_id matches the provided production_id
        $bridgeMachine = BridgeMachine::where('bridge_production_id', $request->bridge_production_id)->first();
        if ($bridgeMachine) {
            
         
            $bridgeMachine->save();
        }

        // Step 2: Update or insert into the cncdetails table where cnc_machine_id and id matches the provided ids
        foreach ($request->detail_ids as $index => $detailId) {
            $bridgeDetail =BridgeDetails::where('id', $detailId)->first();
            if ($bridgeDetail) {
            
              
                if(!empty( $request->ontime[$index] ))  
                {
                $bridgeDetail->total_program_status = 'running';
                }

                if($request->input('program_status.' . $index)=="complete" ){
                    $bridgeDetail->total_program_status = 'complete';
                    $bridgeDetail->flag = '1';

                    }
                    elseif($request->input('program_status.' . $index)=="Design Failed" ){
                        $bridgeDetail->total_program_status = 'Design Failed';
                        // $cncDetail->flag = '1';

                    }

                $bridgeDetail->save();
            }
            else {
                $bridgeDetail = new BridgeDetails();
                $bridgeDetail->bridge_machine_id = $request->id;
               
                if($request->input('program_status.' . $index)=="complete"){
                    $bridgeDetail->flag = '1';

                }
                $bridgeDetail->save();
            }
            
           

       
            $ontime = $request->ontime[$index] ?? null;
                // $machineontime = $request->machineontime[$index] ?? null;
             $offtime = $request->offtime[$index] ?? null;
            $totaltime = $request->totaltime[$index] ?? null;
            $ondate = $request->input('sdate.' . $index);
            $detailId = $request->detail_ids[$index] ?? null;
             $timecalculation_id = $request->calculation_id[$index] ?? null;
           
        //   echo "<pre>";print_r($_POST);exit; 

    
        
        if (!empty($ontime) && empty($offtime)) {
            // We're turning on the machine
            // Always create a new record when turning on
            $bridgeTimeCalculation = new BridgeTimeCalculation();
            $bridgeTimeCalculation->bridge_machine_id = $request->id;
            $bridgeTimeCalculation->bridge_detail_id = $detailId;
            $bridgeTimeCalculation->ontime = $ontime;
            $bridgeTimeCalculation->ondate = $ondate;
            $bridgeTimeCalculation->save();
    
           
        } elseif (!empty($offtime)) {
            // We're turning off the machine
            // Find the latest record for this machine and detail that doesn't have an offtime
            $recordToUpdate = BridgeTimeCalculation::where('bridge_machine_id', $request->id)
                ->where('bridge_detail_id', $detailId)
                ->whereNull('offtime')
                ->latest()
                ->first();
    
            if ($recordToUpdate) {
                // Update the record with offtime
                $recordToUpdate->offtime = $offtime;
                $recordToUpdate->offdate = date("Y-m-d");
                $recordToUpdate->totaltime = $totaltime;
                $recordToUpdate->save();
    
               
            } 
        }
    }
        return redirect('bridge_list')->with('success', '5 bridge Machine Details has been updated successfully.');
    }

?>