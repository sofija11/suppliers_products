<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;

class CategoryImport implements OnEachRow
{

    public function onRow(Row $row)
    {
        $row = $row->toArray();

        $category = Category::firstOrCreate(
            ['name' => $row[8]],
        );

        if (!$category->wasRecentlyCreated) {
            $category->update([
                'name' => $row[8],
            ]);
        }
    }
}
