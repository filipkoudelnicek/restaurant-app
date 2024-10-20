<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupTime = Carbon::parse($value)->format('H:i:s'); // Získání času z data

        // čas otevření a zavření restaurace
        $earliestTime = Carbon::parse('17:00:00')->format('H:i:s');
        $lastTime = Carbon::parse('23:00:00')->format('H:i:s');

        // Kontrola, zda je pickupTime mezi 17:00 a 23:00
        if (!($pickupTime >= $earliestTime && $pickupTime <= $lastTime)) {
            $fail($this->message());
        }
    }

    public function message()
    {
        return 'Prosím vyberte čas mezi 17:00 - 23:00.';
    }
}
