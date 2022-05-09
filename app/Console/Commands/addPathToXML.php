<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
use App\Models\Car;
use App\Models\Equipment;
use App\Models\CarEquipment;
use App\Models\CarGroup;
use App\Models\Group;
use PhpParser\Node\Stmt\TryCatch;

class addPathToXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:pathtoxml {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'By calling this command and adding argument to it you can pass in the correct path to xml file. If you do not call command the stock XML file will be used.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()

    {
        $xml_path = $this->argument('path');
        $url = './database/data/data.xml';
        if($xml_path ){
            $xmlData = file_get_contents( $xml_path);
        } else{
            $xmlData = file_get_contents( $url);

        }

        //Convert XML string data into XML object
         $xmlObject = simplexml_load_string($xmlData);
        
        //Convert XML object into JSON object
         $jsonObject = json_encode($xmlObject);

         //Convert JSON object into an associative array
        $assArray = json_decode($jsonObject, true);
      
        $cars = $xmlObject->vehicle;
        $groups = [];
        $equipment = [];
            foreach($cars as $key => $value){
                $particular = [];  
             foreach($value as $field_name => $field_value){
                $particular[$field_name] = $field_value;
            }
                if(!Car::find($particular['id'])){
                    Car::create($particular);
                };
                // Do we need to update row if object is in table?
                // if(Car::find($particular['id'])){
                //     Car::find($particular['id'])->update($particular);
                // };
                
            if($value->equipment){
            for($i = 0; $i < $value->equipment->children()->count(); $i++ ){
                CarGroup::updateOrCreate([
                    "car_id" =>  (int) $value->id,
                    "group_id" => (int) $value->equipment->group[$i]["id"]
                ]);
               
                $groups[(int) $value->equipment->group[$i]['id']] = ["ru_name" => (string) $value->equipment->group[$i]['name'],
                "group_id" => (int) $value->equipment->group[$i]['id'],
                
            ];
                    
                for($a = 0; $a < $value->equipment->group[$i]->children()->count(); $a++){
                    $equipment[(int) $value->equipment->group[$i]->element[$a]['id']] = [
                        "ru_name" => (string) $value->equipment->group[$i]->element[$a]->__toString(),
                        "group_id" => (int) $value->equipment->group[$i]['id'],
                    ];
                    CarEquipment::updateOrCreate([
                        "group_id" => (int) $value->equipment->group[$i]['id'],
                        "car_id" =>  (int)  $value->id,
                        "equipment_id" => (int) $value->equipment->group[$i]->element[$a]['id'],
                    ]);                     
                }
            }
            
                  
            }
             
        }
        foreach($groups as $key){
            Group::updateOrCreate((($key)));
        };
        foreach($equipment as $value){
        Equipment::updateOrCreate(($value)); 
        };
    }
}
