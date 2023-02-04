<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $requestUser = $request->validated();
        $password = Str::random(10);
        $requestUser['password'] = Hash::make($password);
        $newUser = User::firstOrCreate(['email' => $requestUser['email']], $requestUser);
        Mail::to($requestUser['email'])->send(new PasswordMail($password));
        event(new Registered($newUser));
        return redirect()->route('admin.user.show', $newUser);
    }
}
