<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostInfoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // print('gh');
        // print($row[0]);
        return new Post([
            //

            'user_id'  => $row[0],
            'title' => $row[1],
            'body' => $row[2],
        ]);
    }
}
