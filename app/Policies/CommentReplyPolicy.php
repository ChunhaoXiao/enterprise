<?php

namespace App\Policies;

use App\User;
use App\Models\CommentReply;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the comment reply.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentReply  $commentReply
     * @return mixed
     */
    public function view(User $user, CommentReply $commentReply)
    {
        //
    }

    /**
     * Determine whether the user can create comment replies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_type == 'manager';
    }

    /**
     * Determine whether the user can update the comment reply.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentReply  $commentReply
     * @return mixed
     */
    public function update(User $user, CommentReply $commentReply)
    {
        return $user->role_type == 'manager' && $commentReply->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the comment reply.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentReply  $commentReply
     * @return mixed
     */
    public function delete(User $user, CommentReply $commentReply)
    {
        return $user->role_type == 'manager' && $commentReply->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the comment reply.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentReply  $commentReply
     * @return mixed
     */
    public function restore(User $user, CommentReply $commentReply)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the comment reply.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentReply  $commentReply
     * @return mixed
     */
    public function forceDelete(User $user, CommentReply $commentReply)
    {
        //
    }
}
