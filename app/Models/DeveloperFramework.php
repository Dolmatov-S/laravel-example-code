<?php

namespace App\Models;

class DeveloperFramework extends MultiplePrimaryKeyModel
{
    protected $fillable = ['developer_id', 'framework_id'];
    protected $primaryKey = ['developer_id', 'framework_id'];

}
