# Curso laravel inertia

* Para habilitar el uso de vue con web.php + otros
`composer require tightenco/ziggy
`
* Para traducir laravel y tener mas caracteristicas `composer require laravel-lang/lang:~7.0`
* Para setear nuestro proyecto a español vamos a __config/app.php__ y lo seteamos asi:

```php
'locale' => 'es',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'es',
```
* Despues vamos a __vendor/laravel-lang/lang/src/es__
* Copiamos la carpeta __es__
* Nos dirigimos a __resorces/lang/__ y ahi pegas la carpeta __es__
* En __resources/js/app.js__ encontramos la siguiente linea:`Vue.mixin({ methods: { route } });` esto lo que habilita 
es que en vue podamos usar `this.route()` y hacer llamadas a los `->name('home')` que escribimos en las rutas hubidacas en __web.php__

* Para decirle a _fortify_ que queremos trabajar usando _Inertia_ tenemos que ir a __app/providers/fortifyserviceprovider.PHP__ dejandolo asi:

```php 
 public function boot()
    {
        /**
         * Muestra la vista de login
         */
        Fortify::loginView(function (){
            return Inertia::render('Auth/Login')->toResponse(request());
        });
        /**
         * Muestra la vista de register
         */
        Fortify::registerView(function (){
            return Inertia::render('Auth/Register')->toResponse(request());
        });
        /**
         * Aca es donde muestra el input para poner el email y que se envie el email de reset (envia un token) (?
         */
        Fortify::requestPasswordResetLinkView(function (){
            return Inertia::render('Auth/PasswordResetLink')->toResponse(request());
        });
        /**
         * Cuando pulse en el enlace del email lo envia a esta vista, la cual tiene el input email | password | confirm_password | token
         * y el boton de resetear (hace un post/put y cambia la contraseña)
         */
        Fortify::resetPasswordView(function (){
            return Inertia::render('Auth/ResetPassword')->toResponse(request());
        });
        /**
         *  Cuando alguien se registra no puede logearse hasta confirmar el email que puso HAAAHAAA
         */
        Fortify::verifyEmailView(function (){
            return Inertia::render('Auth/VerifyEmail')->toResponse(request());
        });


        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }
```

* Para tener mensajes "flash" vamos a __appserviceprovider__ (con esto despues usamos $page en .vue y tenemos acceso a los datos) y
lo dejamos asi:

```php
    public function boot()
    {
        Inertia::share([
            "flash" => function (){
                return [
                    "status" => session("status"),
                    "success"=> session("success"),
                    "error" => session("error"),
                ];
            }
        ]);
    }
```
* Tenemos 2 formas de navegar entre las rutas usando los __name__ de las rutas, la primera es 
`<inertia-link :href="route('profile.show')">Ver Perfil</inertia-link>`

y la segunda
```vue
<p @click="visitarPerfilUsuario">Ver Perfil</p>

<script>
    methods:{
      visitarPerfilUsuario(){
        this.$inertia.visit(this.route('profile.show'))
      }       
  } 
</script>
```

## Activar emailVerification
* Vamos a fortify.php y descomentamos `Features::emailVerification()`
* Vamos al modelo __user__ y hacemos un __implements MustVerifyEmail__ 
`class User extends Authenticatable implements MustVerifyEmail`

* En __web.php__ vemos 
```php
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
```
como vemos arriba __['verified']__ pide que el usuario tenga el email verificado, sino no lo deja entrar.

* Para saber si hay errores de formulario tenemos
`Object.keys($page.error).length > 0` 
$page.error guarda los errores de los formularios

## Maneras de obtener token con fortify
1. usando desde vue `route().params.token`
2. yendo a __AppServiceProvider.php__ y haciendo un __share__:
```php
    public function boot()
        {
            Inertia::share([
                "flash" => function (){
                    return [
                        "status" => session("status"),
                        "success"=> session("success"),
                        "error" => session("error"),
                    ];
                },
                "request" => function (){
                    return [
                        "token" => request()->route("token")
                    ];
                },
            ]);
        }
```
y de esa manera lo accedemos usando `$page.request.token`

## cambiar en fortify home por defecto
1. Por defecto /dashboard es la pagina inicial, vamos a cambiarla por __/__
vamos a __RouteserviceProvicer.php__ y en onde dice `public const HOME = '/dashboard';`
lo cambiamos a `public const HOME = '/';` de esa manera cuando nos logeamos nos manda al home.
porque cuando usas fortify con sus metodos estaticos, por defecto despues de hacer
el login te manda a dashboard y te tira error si no tenes esa vista configurada.
