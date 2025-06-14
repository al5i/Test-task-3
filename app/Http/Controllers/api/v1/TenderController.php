<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenderRequest;
use App\Models\Tender;
use App\Services\api\v1\TenderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;

class TenderController extends Controller
{
    public function __construct(
        private readonly TenderService $tenderService
    )
    {
    }
    // TODO: Реализовать в Swagger
    /**
     * Import from Postman info .csv
     * API V1 POST: /api/tender/import
     */
    public function import(TenderRequest $request)
    {
        $file = $request->file('csv_file');
        $errors = [];

        if (($handle = fopen($file->getPathname(), 'r')) !== false) {
            fgetcsv($handle);

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {

                $rowData = [
                    'external_code' => $data[0],
                    'number' => $data[1],
                    'status' => $data[2],
                    'title' => $data[3],
                    'date' => $data[4],
                ];
                $validator = Validator::make($rowData, TenderRequest::rules());

                try {
                    Tender::create([
                        'external_code' => $rowData["external_code"],
                        'number' => $rowData["number"],
                        'status' => $rowData["status"],
                        'title' => $rowData["title"],
                        'date' => Carbon::createFromFormat('d.m.Y H:i:s', $rowData["date"]),
                    ]);
                } catch (\Exception $e) {
                    $errors[] = [
                        'message' => $e->getMessage(),
                        'data' => $data
                    ];
                }
            }

            fclose($handle);

            if (!empty($errors)) {
                return response()->json([
                    'message' => 'Импорт завершен с ошибками',
                    'failed_rows' => count($errors),
                    'errors' => $errors,
                ], 422);
            }

            return response()->json([
                'message' => 'Импорт завершен успешно',
            ]);
        }
        return response()->json(['message' => 'Не удалось открыть файл.'], 400);
    }
    /**
     * Display a list tenders.
     * API V1: /api/tender/
     */
    public function index()
    {
        // Для получения списка тендеров используется;
        $tenders = Tender::all();
        return response()->json($tenders);
    }

    /**
     * Show the form for creating a new resource.
     * API V1 POST: /api/tender/create
     */
    public function create(TenderRequest $request)
    {
        //Для создания тендера
        $validated = $request->validated();

        $tender = $this->tenderService->create($validated);

        return response()->json([
            'message' => $tender,
        ]);
    }

    /**
     * Store for filter list tenders.
     * API V1: /api/tender?title=text&date=date
     */
    public function store(TenderRequest $request)
    {
        // Запрос для получения списка тендеров с фильтрацией
        $tenders = $this->tenderService->store($request);
        return response()->json($tenders);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
