<?php

 use App\Models\Setting;
 use Illuminate\Support\Facades\Schema;

 if (! function_exists('site_setting')) {
     function site_setting()
     {
         if (Schema::hasTable('settings')) {
             return to_assoc_array(Setting::all());;
         }
         return false;
     }
 }
