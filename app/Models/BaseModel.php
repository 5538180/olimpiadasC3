<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Base model with explicit Builder hints for IDE autocompletion.
 *
 * @method static Builder<static> query()
 * @method static Builder<static> newQuery()
 * @method static Builder<static> where($column, $operator = null, $value = null, $boolean = 'and')
 * @mixin Builder<static>
 */
abstract class BaseModel extends Model
{
}
