<?php

namespace App\Models;

use App\Models\UnitImport\VocabularySheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

/**
 * Model answers table
 */
class UnitImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            0 => new VocabularySheetImport(),
        ];
    }
}
