<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'penjualans';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_buku', 'id_user', 'jumlah', 'total', 'tanggal'];

    public function buku(){
        return $this->belongsTo('App\Buku','id_buku');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    
}
