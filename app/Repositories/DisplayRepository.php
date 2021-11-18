<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Models\Call;
use Carbon\Carbon;

class DisplayRepository
{
    public function getSettings()
    {
        return Setting::first();
    }

    public function getDisplayData()
    {
        $calls = Call::with('department', 'counter')
                    ->where('called_date', Carbon::now()->format('Y-m-d'))
                    ->orderBy('id', 'desc')
                    ->take(4)
                    ->get();

        $data = [];
        for ($i=0; $i <4; $i++) {
			
            if($i !== null){
				
            $data[$i]['call_id'] = (isset($calls[$i]))?$calls[$i]->id:'NIL';
            $data[$i]['number'] = (isset($calls[$i]))?(($calls[$i]->department->letter!='')?$calls[$i]->department->letter.'-'.$calls[$i]->number:$calls[$i]->number):''; //Estava com NIL
            $data[$i]['call_number'] = (isset($calls[$i]))?(($calls[$i]->department->letter!='')?$calls[$i]->department->letter.' '.$calls[$i]->number:$calls[$i]->number):'';//Estava com NIL
            $data[$i]['counter'] = (isset($calls[$i]))?$calls[$i]->counter->name:'';//Estava com NIL
            }
		}

        return $data;
    }
}
