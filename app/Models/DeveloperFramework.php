<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperFramework extends Model
{
    protected $fillable = ['developer_id', 'framework_id'];
    protected $primaryKey = ['developer_id', 'framework_id'];
    public $incrementing = false;
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }
        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }
        return $query;
    }

    public function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if(isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }
        return $this->getAttribute($keyName);
    }
}
