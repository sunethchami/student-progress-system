<?php

namespace App\Traits;

use Illuminate\Http\Request;
use \App\Models\StudentsDetail;

trait StatisticTrait {

    
    public function getStat() {

        $allRecords = StudentsDetail::all();
        
        $totalNumberOfStudents = count($allRecords);
        
        $maxCombindMaths = 0;
        $maxPhysics = 0;
        $maxChemistry = 0;
        
        $sumOfCombindMaths = 0;
        $sumOfPhysics = 0;
        $sumOfChemistry = 0;
        
        $highestMarkforAllSubjects = 0;
        
        foreach ($allRecords as $record) {
            if($maxCombindMaths < $record['combined_maths']){
                $maxCombindMaths = $record['combined_maths'];
            }
            
            if($maxPhysics < $record['physics']){
                $maxPhysics = $record['physics'];
            }
            
            if($maxChemistry < $record['chemistry']){
                $maxChemistry = $record['chemistry'];
            }
            
            $totalMark = $record['combined_maths'] + $record['physics']
                +  $record['chemistry'];  
             
            
            if($highestMarkforAllSubjects < $totalMark ){
                $highestMarkforAllSubjects = $totalMark;  
            }
            
            $sumOfCombindMaths = $sumOfCombindMaths + $record['combined_maths'];
            $sumOfPhysics = $sumOfPhysics + $record['physics'];
            $sumOfChemistry = $sumOfChemistry + $record['chemistry'];
        }
        
        if($totalNumberOfStudents != 0){
            $avgMarkForCombindMaths = 
                $sumOfCombindMaths / $totalNumberOfStudents;
            $avgMarkForPysics = $sumOfPhysics / $totalNumberOfStudents;
            $avgMarkForChemistry = $sumOfChemistry / $totalNumberOfStudents;
        }else{
            $avgMarkForCombindMaths = 0;
            $avgMarkForPysics = 0;
            $avgMarkForChemistry = 0;
        }
        
        $avgMarkOfFirstPlace = $highestMarkforAllSubjects / 3;
        
        $this->data = array(
            'total_student' => $totalNumberOfStudents,
            'highest_mark_maths' => $maxCombindMaths,
            'highest_mark_physics' => $maxPhysics,
            'highest_mark_chemistry' => $maxChemistry,
            'avg_maths' => round($avgMarkForCombindMaths,2),
            'avg_physics' => round($avgMarkForPysics,2),
            'avg_chemistry' => round($avgMarkForChemistry,2),
            'avg_mark_first_place' => round($avgMarkOfFirstPlace,2)
        );
        
        return $this->data;

    }

}
