<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('school.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'school_location' => ['required', 'string', 'max:255'],
            'syllabus' => ['required', 'string', 'max:255'],
            'principal_name' => ['required', 'string', 'max:255'],
            'teacher_incharge' => ['required', 'string', 'max:255'],
            'incharge_contact' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
        ]);
        try{

            $user_data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            ]);

            $school_data = $request->validate([
                'school_location' => ['required', 'string', 'max:255'],
                'syllabus' => ['required', 'string', 'max:255'],
                'principal_name' => ['required', 'string', 'max:255'],
                'teacher_incharge' => ['required', 'string', 'max:255'],
                'incharge_contact' => ['required', 'numeric'],
                'phone' => ['required', 'numeric'],
            ]);

            $school_data['school_name'] = $user_data['name'];
            $school_data['created_at'] = Carbon::now();
            $school_data['updated_at'] = Carbon::now();
            $school_data['school_id'] = $this->rand_num();
        
            DB::transaction(function() use($school_data, $user_data){
                DB::table('school_details')->insert($school_data);

                $user_data['school_id'] = $school_data['school_id'];
                User::create($user_data);
            });

            return redirect()->route('register')->with('success', 'Thank you for registering with us! Your request for approval is currently being reviewed by our team. We appreciate your patience, and we\'ll notify you as soon as your account is approved. In the meantime, feel free to explore our website and familiarize yourself with our offerings.');
        }
        catch  (\Exception $e) {
            return redirect()->route('register')->with('error', 'Something went wrong please try again!');
        }
    }

    public function rand_num(){
        $school_id = random_int(100000, 999999);
        $school_detail = DB::table('school_details')->where(['school_id' => $school_id])->first();
        if($school_detail != null){
            $this->rand_num();
        }
        return $school_id;
    }
}
