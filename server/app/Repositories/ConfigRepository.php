<?php

namespace App\Repositories;

use App\Configuration;
use App\Repositories\Contracts\ConfigRepositoryInterface;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface
{

    public function __construct(Configuration $member)
    {
        $this->model = $member;
    }    

    public function getConfigByType($type){
        try{
            $res = $this->model->select('id','value','description','type')
                               ->where('type', $type)->get();
            return $res;
        }catch(\Exception $ex){
            return false;
        }
    }
}