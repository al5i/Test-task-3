<?php

namespace App\Services\api\v1;

use App\Models\Tender;
use App\Repositories\api\v1\TenderRepository;

class TenderService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly TenderRepository $tenderRepository
    )
    {
    }

    public function create(array $data): Tender
    {
       return  $this->tenderRepository->create($data);
    }

    public function store($data)
    {
        $query = $this->tenderRepository->store();

        if ($data->has('title')) {
            $query->where('title', 'like', '%' . $data->input('title') . '%');
        }

        if ($data->has('date')) {
            $inputDate = $data->input('date');

            $query->where('date', $inputDate);
        }

        return $query->get();
    }
}
