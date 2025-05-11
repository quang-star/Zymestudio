<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    const STATUS_ASSIGN = 1;
    const STATUS_CONFIRM = 2;
    const STATUS_DONE = 3;
    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;
    const SYNC = 1;
    const UN_SYNC = 0;

    const CONVERT_STATUS_TXT = [
        1 => '処理',
        2 => '確認する',
        3 => '終わり'
    ];
    const CONVERT_PRIORITY_TXT = [
        1 => 'LOW',
        2 => 'MEDIUM',
        3 => 'HIGHT'
    ];
    const CONVERT_SYNC_TXT = [
        0 => 'Not synchronized',
        1 => 'Synchronized'
    ];
        
    // Lien ket toi bang CSDL
    protected $tabel = 'files';


    // anh xa cac truong trong CSDL
    protected $fillable = [
        'filename',
        'dealine',
        'status', // 1: assigne, 2: confirm, 3:done
        'priority', // 1: Low, 2: Medium, 3: high
        'user_id',
        'synchronize', // 1: Synchronized, 2: Not synchronized
        'created_at',
        'updated_at'
    ];

    /**
     * Lien ket 1-1 
     * 
     * Su dung belongsTo hoac hasOne
     */
    public function user() 
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
