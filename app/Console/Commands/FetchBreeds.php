<?php

namespace App\Console\Commands;

use App\Http\Controllers\BreedController;
use App\Models\Breed;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class FetchBreeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-breeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Breeds & store them';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // this wont handle if the api call errors 
        $breedController = new BreedController();
        $breeds = json_decode($breedController->index());
        $mainBreeds = [];
        foreach($breeds as $breed => $value){
            array_push($mainBreeds, $breed);       
        }
        Breed::whereNotIn('breed', $mainBreeds)->delete();

        foreach($mainBreeds as $breed){
            Breed::updateOrCreate(['breed' => $breed]);
        }
        
        
    }
}
