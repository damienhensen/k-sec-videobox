<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    public const TABLE_NAME = 'reports';

    protected $table = self::TABLE_NAME;

    public const ID = 'id';

    protected $guarded = [self::ID];
}
