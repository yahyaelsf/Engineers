<?php

namespace App\Imports;

use App\Models\TEngineer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TEngineer([
            's_membership'    => $row['s_membership'],
            'i_id_number'    => $row['i_id_number'],
            's_name'     => $row['s_name'],
            's_address'     => $row['s_address'],
            's_mobile' => $row['s_mobile']
        ]);
    }
}
