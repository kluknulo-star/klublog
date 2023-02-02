<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $requestUser = $request->validated();
        $requestUser['password'] = Hash::make($requestUser['password']);
        $newUser = User::firstOrCreate(['email' => $requestUser['email']], $requestUser);
        return redirect()->route('admin.user.show', $newUser);
    }
}
