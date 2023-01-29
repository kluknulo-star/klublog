<?php

namespace App\Http\Controllers\Admin\User;


use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $requestUserUpdate = $request->validated();
        $user->UpdateOrFail($requestUserUpdate);
        return view('admin.user.show', compact('user'));
    }

}
