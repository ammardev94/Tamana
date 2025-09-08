<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index() 
    {
        $user = Auth::guard('student')->user();

        return view('student.profile', compact('user'));
    }

    public function update(Request $request)
    {
        try {

            $user = Auth::guard('student')->user();
            
            if ($request->hasFile('img')) {

                $filename = $request->file('img')->store('profile', 'public');

                $profile = Profile::where("user_id", $user->id)->first();
                if ($profile) {
                    Storage::disk('public')->delete($profile->img);
                }

                Profile::updateOrCreate(
                    [ "user_id" => $user->id ],
                    [
                        "img" => $filename
                    ]
                );
            }

            $payload = $request->except("_token", '_method', 'img');
            User::whereId($user->id)->update($payload);

            $user = User::findOrFail($user->id);
            
            Session::flash('msg.success', 'Profile updated successfully.');
            return view('student.profile', compact('user'));
        } catch (Exception $e) {

            Log::error($e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
