<?php


namespace App\Models\UnitImport;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class VocabularySheetImport implements ToCollection
{

    public function collection(Collection $row)
    {
        dd($row);
    }
}
