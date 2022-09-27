<?php

namespace App\Imports;

use App\Models\Client;
use App\Services\ExternalService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ClientsImport implements ToModel, WithChunkReading, WithCustomCsvSettings
{

    public $order, $externalService;
    public function __construct($order, ExternalService $externalService)
    {
        $this->order = $order;
        $this->externalService = $externalService;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $fields = explode(',', $row[0]);
        $client = Client::where('uid', $fields[0])->first();
        if ($client) {
            $res = $this->externalService->createContact([
                "name" => $client->name,
                "phone" => $client->phone,
                "groups" => $this->order['group_id'],
                "secret" => $this->order['secret']
            ]);
        }
    }
    public function chunkSize(): int
    {
        return 10;
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1',
            'delimiter' => "\t"
        ];
    }
}
