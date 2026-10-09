<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login as AuthLogin;
use Illuminate\Support\Facades\DB;

class LimitAdminSessions
{
    public function handle(AuthLogin $event): void
    {
        /** @var \App\Models\User $user */
        $user = $event->user;


        if ($user->is_admin) {
            
            $sessions = DB::table('sessions')
                ->where('user_id', $user->id)
                ->orderBy('last_activity', 'desc')
                ->get();

            if ($sessions->count() > 2) {
                $oldSessions = $sessions->slice(2)->pluck('id');
                
                DB::table('sessions')->whereIn('id', $oldSessions)->delete();
            }
        }
    }
}
