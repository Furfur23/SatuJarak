<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Login as AuthLogin;
use Illuminate\Support\Facades\DB;

class LimitAdminSessions
{
    public function handle(AuthLogin $event): void
    {
        /** @var User $user */
        $user = $event->user;

        if ($user->is_admin && config('session.driver') === 'database') {
            $sessions = DB::table('sessions')
                ->where('user_id', $user->id)
                ->orderBy('last_activity', 'desc')
                ->orderBy('id', 'desc')
                ->get();

            // Sesi login baru disimpan setelah event Login; sisakan satu sesi lama.
            if ($sessions->count() > 1) {
                $oldSessions = $sessions->slice(1)->pluck('id');

                DB::table('sessions')->whereIn('id', $oldSessions)->delete();
            }
        }
    }
}
