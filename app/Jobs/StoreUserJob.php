<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $requestUser;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestUser)
    {
        $this->requestUser = $requestUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $password = Str::random(10);
        $this->requestUser['password'] = Hash::make($password);
        $newUser = User::firstOrCreate(['email' => $this->requestUser['email']], $this->requestUser);
        Mail::to($this->requestUser['email'])->send(new PasswordMail($password));
        event(new Registered($newUser));
    }
}
