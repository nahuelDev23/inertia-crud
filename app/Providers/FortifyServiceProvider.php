<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::registerView(function (){
            $categories = Category::all();
            return Inertia::render('Register',[
                'categories' => $categories
            ])->toResponse(request());
        });
        Fortify::loginView(function (){
            $categories = Category::all();
            return Inertia::render('Login',[
                'categories' => $categories
            ])->toResponse(request());
        });
        Fortify::requestPasswordResetLinkView(function(Request $request){
            return Inertia::render('password/forgot-password')->toResponse($request);
        });
        Fortify::resetPasswordView(function(Request $request){
            return Inertia::render('password/reset-password',['request'=>$request])->toResponse($request);
        });
        Fortify::verifyEmailView(function (){
            return Inertia::render('password/VerifyEmail')->toResponse(request());
        });

    }
}
