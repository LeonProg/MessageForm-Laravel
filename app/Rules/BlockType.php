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
        $extension = explode(".", $value->getClientOriginalName());
        $blocked_type = ['bat', 'jar', 'exe'];
        $extensionCount = count($extension) - 1;

        if (in_array($extension[$extensionCount], $blocked_type)) {
            $fail(__('exceptions.block_type'));
        }
    }
}
