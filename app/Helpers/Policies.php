<?php 

namespace App\Helpers;

use App\Policy;

class Policies{
    //create practice default contract
    public static function createInitialPolicies($id){
        $data = [
            [
                'practice_id' => $id, 
                 'name' => 'CAR ROSSI DUE NORD',
                 'path'=> 'default/CAR ROSSIDUE NORD ( PRE-COMPILATO ) edit 4 - buono.pdf'
            ],
            [
                'practice_id' => $id, 
                 'name' => 'POSTUMA ROSSI DUE NORD',
                 'path'=> 'default/POSTUMA ROSSIDUE NORD ( PRE-COMPILATO ) edit 2 - buono.pdf'
            ],
            [
                'practice_id' => $id, 
                 'name' => 'TUTELA LEGALE',
                 'path'=> 'default/TUTELA LEGALE ( PRE-COMPILATO) edit 1_.pdf'
            ]
        ];

        foreach ($data as $d) {
            Policy::create($d);
        }
    }
}

?>