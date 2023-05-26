<?php

namespace App\Http\Services;

use App\Http\Repositories\SectionRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SectionService
{
    private SectionRepository $repository;

    /**
     * @param SectionRepository $repository
     */
    public function __construct(SectionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllData(): LengthAwarePaginator
    {
        return $this->repository->getData();
    }

    public function create($data)
    {
        $created = $this->repository->createSection($data);

        if(!$created->id){
            app()->abort(500, 'Error');
        }

        return  $this->repository->createSection($data);
    }

    public function update($data, $id): int
    {
        $updated = $this->repository->updateSection($data, $id);

        if($updated == 0){
            app()->abort(500, 'Error');
        }

        return  $updated;
    }
}
