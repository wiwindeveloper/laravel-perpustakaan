<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Book;
use App\BorrowLlog;
use App\Exceptions\BookException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     self::deleting(function($user){
    //         //mengecek apakah penulis masih punya buku
    //         if($user->borrowLlogs->where('is_returned', 0)->count() > 0)
    //         {
    //             //menyiapkan pesan error
    //             $html = 'Member tidak bisa dihapus karena masih meminjam buku';

    //             Session::flash("flash_notification", [
    //                 "level"=>"danger",
    //                 "message"=>$html
    //             ]);

    //             //membatalkan proses penghapusan
    //             return false;
    //         }
    //     });
    // }

    public function borrow(Book $book)
    {
        //cek apakah masih ada stok buku
        if($book->stock < 1)
        {
            throw new BookException("Buku $book->title sedang tidak tersedia.");
        }

        //cek apakah buku ini sedang dipinjam user
        if($this->borrowLlogs()->where('book_id', $book->id)->where('is_returned', 0)->count() > 0)
        {
            throw new BookException("Buku $book->title sedang Anda pinjam.");
        }

        $borrowLlog = BorrowLlog::create(['user_id'=>$this->id, 'book_id'=>$book->id]);
        return $borrowLlog;
    }

    public function borrowLlogs()
    {
        return $this->hasMany('App\BorrowLlog');
    }

    public function generateVerificationToken()
    {
        $token = $this->verification_token;
        if(!$token)
        {
            $token = str_random(40);
            $this->verification_token = $token;
            $this->save();
        }
        return $token;
    }

    public function sendVerification()
    {
        $user = $this;
        $token = $this->generateVerificationToken();

        Mail::send('auth.emails.verification', compact('user', 'token'), function ($m) use ($user){
            $m->to($user->email, $user->name)->subject('Verifikasi Akun Larapus');
        });
    }

    public function verify()
    {
        $this->is_verified = 1;
        $this->verification_token = null;
        $this->save();
    }
}
