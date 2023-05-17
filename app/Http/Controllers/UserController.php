<?php

namespace App\Http\Controllers;

use App\Library\Roles;
use App\Library\Status;
use App\Models\Coupon;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
    

    function list(Request $request){

        $query = User::query();

        $query->when($request->keyword, function(Builder $query, $keyword){
            $query->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%");
        });

        $users = $query->isAUser()->withCount(['taskCompletions'])->paginate();

        return view('users', [
            'users' => $users
        ]);
    }

    function destroy(User $user) {
        $user->withdrawals()->delete();
        $user->bankAccount()->delete();
        $user->delete();
        // Send Account deleted Notification
        Alert::success('User Account deleted successfully!');
        return back();
    }

    function dashboard(Request $request){
        $user = $request->user();

        $date = Date::now();
        $hrs = $date->format('H');
        $msg = "";

        if ($hrs >  0) $msg = "🥱 Mornin'";      // After 6am
        if ($hrs >  6) $msg = "😇 Good morning";      // After 6am
        if ($hrs > 12) $msg = "😃 Good afternoon";    // After 12pm
        if ($hrs > 17) $msg = "😎 Good evening";      // After 5pm
        if ($hrs > 22) $msg = "😴 Good Night";

        $tasksCompleted = $user->taskCompletions()->count();
        $referrals = $user->referrals()->count();

        $tasks = Task::isActive()->isNotExpired()->with(['completion'])->get();

        $coupons = $user->coupons()->count();
        $couponUsers = $user->users()->count();
        $availableCoupons = $user->coupons()->doesntHave('user')->count();

        $users = User::isAUser()->count();
        $vendors = User::isAVendor()->count();
        $allCoupons = Coupon::count();

        $activeCoupons = Coupon::doesntHave('user')->count();

        $allTasks = Task::count();
        $allTaskCompletions = TaskCompletion::count();

        // $sales = $user->coupons()->has('user')->sum('amount');

        return view('dashboard', [
            'user' => $user,
            'msg' => $msg,
            'taskCompletions' => $tasksCompleted,
            'tasks' => $tasks,
            'referrals' => $referrals,
            'coupons' => $coupons,
            'couponUsers' => $couponUsers,
            'availableCoupons' => $availableCoupons,
            'users' => $users,
            'vendors' => $vendors,
            'allCoupons' => $allCoupons,
            'activeCoupons' => $activeCoupons,
            'allTasks' => $allTasks,
            'allTaskCompletions' => $allTaskCompletions
        ]);
    }

}
