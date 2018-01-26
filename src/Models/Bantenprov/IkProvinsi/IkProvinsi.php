<?php

namespace Bantenprov\IkProvinsi\Models\Bantenprov\IkProvinsi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkProvinsi extends Model
{

    protected $table = 'ik_provinsis';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\IkProvinsi\Models\Bantenprov\IkProvinsi\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\IkProvinsi\Models\Bantenprov\IkProvinsi\Regency','id','regency_id');
    }

}

