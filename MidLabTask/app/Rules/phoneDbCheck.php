<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class phoneDbCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if(
            DB::table('admins')
             ->where('phone',$value)
             ->first()
        ) 
        {
            return false;
        }
        elseif(
         DB::table('accountants')
         ->where('phone',$value)
         ->first()
        )
        {
            return false;
        }
        elseif(
         DB::table('vendors')
         ->where('phone',$value)
         ->first()
        )
        {
            return false;
        }
        elseif(
         DB::table('customers')
         ->where('phone',$value)
         ->first()
        )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Phone Number Already Exist!';
    }
}
