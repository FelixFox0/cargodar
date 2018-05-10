<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;
//use Session;
use Cookie;
use Crypt;
use App\Models\Language;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$raw_locale = Session::get('locale');     # Если пользователь уже был на нашем сайте, 
//        Cookie::set('locale', 'ua');  
//        Cookie::queue(Cookie::make('locale', 'ua', 60));
        //Cookie::queue('locale', 'ru');  //Работает
//        cookie('locale', 'ru');  
//        setcookie('locale', 'ua');
        //$raw_locale = Crypt::decrypt(Cookie::get('locale'));     
//        var_dump(Language::first()->where('iso', '=', Crypt::decrypt(Cookie::get('locale')))->get());
//        dd(Cookie::get('locale'));
        
//        $cookie_locale='';
//        dd(Config::get('app.locale_id'));
//        Config::set('app.locale_id', 3);
//        dd(Config::get('app.locale_id'));
        
        if(Cookie::get('locale')){
//            dd(Crypt::decrypt(Cookie::get('locale')));
            $cookie_locale = Language::getLangageByIso(Crypt::decrypt(Cookie::get('locale')));
            /*$cookie_locale = Language::where('iso', '=', Crypt::decrypt(Cookie::get('locale')))
                ->where('status', '>=', 1)
                ->first();*/
        }
        if(isset($cookie_locale)){
            App::setLocale($cookie_locale['iso']);
            Config::set('app.locale_id', $cookie_locale['id']);
        }else{
            
            $browser_locale = Language::getLangageByIso(substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2));
            if($browser_locale){
                //var_dump(Language::getLangageByIso(substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2)));
                Cookie::queue('locale', $browser_locale['iso']);
                App::setLocale($browser_locale['iso']);
                Config::set('app.locale_id', $browser_locale['id']);
            }else{
                Cookie::queue('locale', Config::get('app.locale'));
                App::setLocale(Config::get('app.locale'));
                Config::set('app.locale_id', Language::getLangageByIso(Config::get('app.locale'))['id']);
            }
        }
        
//        dd(Crypt::decrypt(Cookie::get('locale')));
        /*if (in_array($raw_locale, Config::get('app.locales'))) {  # Проверяем, что у пользователя в сессии установлен доступный язык 
            $locale = $raw_locale;                                # (а не какая-нибудь бяка) 
        }                                                         # И присваиваем значение переменной $locale.
  
        else{*/
          //$locale = Config::get('app.locale');                 # В ином случае присваиваем ей язык по умолчанию
        /*}*/

        //App::setLocale($locale);                                  # Устанавливаем локаль приложения

        return $next($request);                                   # И позволяем приложению работать дальше

    }
}
