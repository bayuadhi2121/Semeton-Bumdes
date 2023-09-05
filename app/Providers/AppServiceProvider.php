<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('exists_with_link', function ($attribute, $value, $parameters, $validator) {
            // Get the table name and column name from the rule parameters
            [$table, $column] = $parameters;

            // Check if the record exists in the database
            $exists = DB::table($table)->where($column, $value)->exists();

            if (!$exists) {
                // Generate the error message with the link
                $message = 'Usaha tidak ada. <a href="">Tambah usaha</a>';
                return str_replace(':message', $message, $validator->getMessageBag()->first($attribute));
            }

            return true;
        });
    }

    public function register()
    {
        //
    }
}
