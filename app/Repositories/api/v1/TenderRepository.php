<?php

namespace App\Repositories\api\v1;

use App\Models\Tender;

class TenderRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data): Tender
    {
        return $tender = Tender::firstOrCreate([
            'external_code' => $data["external_code"],
            'number' => $data["number"],
            'status' => $data["status"],
            'title' => $data["title"],
            'date' => $data["date"],
        ]);
    }

    public function store()
    {
        return Tender::query();
    }
}
