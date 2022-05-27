<?php

namespace App\Policies;

use App\Nft;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;


class NftPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */

     //este es el index
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Nft  $nft
     * @return mixed
     */


     //este es el show
    public function view(User $user, Nft $nft)
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Nft  $nft
     * @return mixed
     */
    public function update(User $user, Nft $nft)
    {
        //
        if(Auth::User()){
            if(Auth::User()->id == $nft->user_id || Auth::User()->role_id == 2){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Nft  $nft
     * @return mixed
     */
    public function delete(User $user, Nft $nft)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Nft  $nft
     * @return mixed
     */
    public function restore(User $user, Nft $nft)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Nft  $nft
     * @return mixed
     */
    public function forceDelete(User $user, Nft $nft)
    {
        //
    }
}
