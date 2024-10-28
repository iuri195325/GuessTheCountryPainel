<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_countrys';

      /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'country_name',
        'country_icon_flag_file_code',
        'country_world_map_img_file_code',
    ];
}
