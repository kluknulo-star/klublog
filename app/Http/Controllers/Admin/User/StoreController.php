<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $requestUser = $request->validated();
        $newUser = User::firstOrCreate($requestUser);
        return redirect()->route('admin.user.show', $newUser);
    }
}
