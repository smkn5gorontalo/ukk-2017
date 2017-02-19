<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pasok;
use App\Penjualan;

class Buku extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bukus';

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
    protected $fillable = ['judul', 'noisbn', 'penulis', 'penerbit', 'tahun', 'stok', 'harga_pokok', 'harga_jual', 'diskon'];

    public function pasok(){
        return $this->hasMany('App\Pasok');
    }

    public function penjualan(){
        return $this->hasMany('App\Penjualan');
    }
}
