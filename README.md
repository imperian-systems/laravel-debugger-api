# imperian-systems/laravel-debugger-api

To install:

```composer require imperian-systems/laravel-debugger-api```

Publish config file:

```
   php artisan vendor:publish \
   --provider="ImperianSystems\LaravelDebuggerApi\LaravelDebuggerApiProvider" \
   --tag="config"
```

Set shared key in .env:

```LARAVEL_DEBUGGER_KEY=KEEPTHISSECRET```

Note: This package is only functional if Laravel is in debug mode (APP_DEBUG=true in .env)
