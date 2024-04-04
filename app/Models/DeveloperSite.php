<?php

namespace App\Models;

class DeveloperSite extends MultiplePrimaryKeyModel
{
    protected $fillable = ['developer_id', 'site_id'];
    protected $primaryKey = ['developer_id', 'site_id'];

}
