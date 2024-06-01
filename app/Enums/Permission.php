<?php

namespace App\Enums;

enum Permission: string
{
    case DashboardAccess = 'dashboard access';
//    case ManageAdmins = 'manage admins';
    case ManageHR = 'manage hr';
    case ManageUsers = 'manage users';
    case ManageNotifications = 'manage notifications';
}
