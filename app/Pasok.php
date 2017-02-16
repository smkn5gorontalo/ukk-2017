<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasok extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pasoks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $dates = ['tanggal'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_distributor', 'id_buku', 'jumlah', 'tanggal'];

    public function distributor(){
        return $this->belongsTo('App\Distributor','id_distributor');
    }
    public function buku(){
        return $this->belongsTo('App\Buku','id_buku');
    }
}
