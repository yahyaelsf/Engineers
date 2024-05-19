<?php

namespace App\Exports;

use App\Models\TEngineer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection , WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TEngineer::get();
    }
        public function map($data): array
    {
        return [
            $data->s_name,
            $data->i_id_number,
            $data->s_mobile,
            $data->i_family,
            $data->s_address,
            $data->s_type,
            $data->s_value,
            $data->s_donor,
        ];
    }


}
