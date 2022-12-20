<?php

namespace SYSOTEL\APP\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class CancellationRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     * @var  string  $attribute
     * @var array{
     *   startInterval: int,
     *   endInterval: int,
     *   penalty: int,
     * } $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        foreach($value as $rule) {

            if($rule['startInterval'] <= $rule['endInterval']) {
                return false;
            }
            if(!is_int($rule['startInterval']/24)){
                return false;
            }
            if(!is_int($rule['endInterval']/24)){
                return false;
            }

        }

        $rule= $value[count($value) -1]['endInterval'];
        if($rule !== 0){
            return false;
        }

        foreach ($value as $rule){
            $row = count($rule);
            if($row <= 2){
                for($i =1; $i < $row; $i++){
                    if($rule[$i]['startInterval'] != $rule[$i - 1]['endInterval']){
                        return false;
                    }
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid rules';
    }
}
