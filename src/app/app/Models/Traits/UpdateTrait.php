<?php

namespace App\Models\Traits;

trait UpdateTrait {
    protected function updateById($id, $data){
        return $this->where('id', $id)->update($data);
    }
}
