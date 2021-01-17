<?php

namespace App\Models;

use App\Constants\GlobalConstants;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param $search_keyword
     * @param $country
     * @param $sort_by
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getUsers($search_keyword, $country, $sort_by, $framework)
    {
        $users = DB::table('users');
        if($search_keyword){
            $users->where(function ($q) use($search_keyword){
                $q->where('users.fname', 'like', "%{$search_keyword}%")
                ->orWhere('users.lname', 'like', "%{$search_keyword}%");
            });
        }
        if ($country != GlobalConstants::ALL){
            //return the users with the country selected filter
            $users = $users->where('country', $country);
        }
        // Filter By Type
        if($sort_by) {
            $sort_by = lcfirst($sort_by);
            if ($sort_by ==GlobalConstants::USER_TYPE_BACKEND || $sort_by ==GlobalConstants::USER_TYPE_FRONTEND){
                $users = $users->where('type', $sort_by);
            }
        }
        if ($framework != GlobalConstants::ALL){
            $users = $users->where('framework', $framework);
        }
        return $users->paginate(GlobalConstants::PER_PAGE_LIMIT);
    }
}
