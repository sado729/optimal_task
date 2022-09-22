<?php

namespace App\Imports;

use App\Models\Work;
use Maatwebsite\Excel\Concerns\ToModel;

class WorkImport implements ToModel
{
    public function model(array $row)
    {
        if (!isset($row[0], $row[11], $row[12], $row[6]) || $row[0] === 'WO' || $row[11] === 'PartsCost' || $row[12] === 'Payment' || $row[6] === 'WorkDate') {
            return null;
        }
        $time = ($row[6] - 25569) * 86400;

        return Work::updateOrCreate([
            'wo' => $row[0],
        ],[
            'work_date' => date('Y-m-d H:i:s',$time),
            'parts_cost' => $row[11],
            'payment' => $row[12]
        ]);
    }
}
