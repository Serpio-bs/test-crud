<?php

namespace App\Http\Repositories;

use App\Models\Section;
use Illuminate\Pagination\LengthAwarePaginator;

class SectionRepository
{
    public function getData(): LengthAwarePaginator
    {
        return Section::paginate(10);
    }
    /**
     * @param $data
     * @return mixed
     */
    public function createSection($data): Section
    {
        return Section::create([
            'name' => $data->name,
            'description' => $data->description,
            'published' => $data->published,
        ]);
    }

    public function updateSection($data, $id): int
    {
        $section = Section::find($id);

        $section->update([
            'name' => $data->name,
            'description' => $data->description,
            'published' => $data->published,
        ]);

        return $section->id;
    }

}
