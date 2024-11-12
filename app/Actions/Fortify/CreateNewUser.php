<?php

namespace App\Actions\Fortify;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\Settings;
use App\Models\CryptoAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $settings = Settings::where('id', '1')->first();
        $request = request();

        // Validation for captcha if enabled
        if ($settings->captcha == "true") {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'unique:users,username'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'g-recaptcha-response' => 'required|captcha',
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();
        } else {
            // Validation for captcha if not enabled
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'unique:users,username'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();
        }

        // Check for referral by session or input
        if (session('ref_by')) {
            $ref_by = session('ref_by');
            $user = User::where('username', $ref_by)->first();
            
            // Ensure user exists before accessing 'id'
            if ($user) {
                $ref_by_id = $user->id;
            } else {
                $ref_by_id = null;  // Handle case where user is not found
            }
        } else {
            if (!empty($input['ref_by'])) {
                $sponsor = User::where('username', $input['ref_by'])->first();
                
                // Ensure sponsor exists before accessing 'id'
                if ($sponsor) {
                    $ref_by_id = $sponsor->id;
                } else {
                    $ref_by_id = null;  // Handle case where sponsor is not found
                }
            } else {
                $ref_by_id = null;  // No referral
            }
        }

        // Create new user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'username' => $input['username'],
            'country' => $input['country'],
            'ref_by' => $ref_by_id,
            'status' => 'active',
            'password' => Hash::make($input['password']),
        ]);

        // Create related crypto account
        $cryptoaccnt = new CryptoAccount();
        $cryptoaccnt->user_id = $user->id;
        $cryptoaccnt->save();

        // Forget referral session data
        $request->session()->forget('ref_by');

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeEmail($user));

        return $user;
    }
}
