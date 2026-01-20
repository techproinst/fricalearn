<?php

namespace App\Services;

use App\Enums\ContinentGroup;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LocationService
{
  public function getUserContinent()
  {
      $ip = app()->environment('local') ? config('services.location.test') : request()->ip(); 
      
      $response = Http::get("http://ipwho.is/{$ip}");

      if($response->successful())
      {
          return $response->json();
      }

      return null;
  }
  
  public function handleGetContinent($data, callable $mappingFunction)
  {
    
      if(is_array($data) && array_key_exists('continent', $data)) {

        Log::info('User location : '. $data['continent']);
   
        $continentEnum = ContinentGroup::tryFrom($data['continent']);

        if(!$continentEnum){
          Log::warning("Unknown Continent: {$data['continent']}");
          return "other";

        }

        return $data['success'] ?? false ? $mappingFunction($continentEnum) : null;

      } else {

        Log::warning('User continent data is unavailable');
        return null;

      }

  } 

  







}