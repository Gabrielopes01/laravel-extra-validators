<?php

namespace Gabrielopes01\LaravelExtraValidators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend(Post::handle(), Post::class);
        Validator::extend(Put::handle(), Post::class);
        Validator::extend(Delete::handle(), Post::class);
        Validator::extend(ExistsLike::handle(), ExistsLike::class);
        Validator::extend(Sizes::handle(), Sizes::class);
    }
}
