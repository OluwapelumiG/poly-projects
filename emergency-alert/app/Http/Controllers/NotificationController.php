<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NotificationController extends Controller
{
    //

    public function index()
    {
        $userId = Auth::id();

        // Fetch notifications with emergency and author details using joins
        $notificationsData = Notification::join('emergencies', 'notifications.emergency', '=', 'emergencies.id')
            ->join('users', 'emergencies.author', '=', 'users.id')
            ->where('notifications.status', 'new')
            ->where('notifications.user', $userId)
            ->select(
                'emergencies.title',
                'emergencies.description',
                'emergencies.location',
                'emergencies.severity',
                'users.name as author_name',
                'users.email as author_email',
                'users.phone as author_phone'
            )
            ->get();

        // Mark notifications as read
        Notification::where('status', 'new')
            ->where('user', $userId)
            ->update(['status' => 'read']);

        return response()->json($notificationsData);
    }
}
