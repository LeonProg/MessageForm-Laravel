<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BlockType implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $extension = explode(".",$value);
        $blocked_type = ['bat', 'jar', 'exe'];


        if (in_array($extension[1], $blocked_type)) {
            $fail('Нельзя использовать файла типа расширения .bat, .jar, .exe');
        }
    }
}
