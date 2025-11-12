<?php

namespace App\Http\Services;

use App\Models\AdminActivityLog;

class AdminActivityService
{
    public function log($userId, $action, $description = null)
    {
        AdminActivityLog::create([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
        ]);
    }
}
