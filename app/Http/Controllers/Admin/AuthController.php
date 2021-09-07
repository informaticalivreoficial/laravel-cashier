<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() === true) {
            return redirect()->route('admin/home');
        }
        return view('cms.index');
    }

    public function home()
    {
        //$time = User::where('admin', 1)->count();

        // $postsPostson = Post::postson()->count();
        // $postsPostsoff = Post::postsoff()->count();
        // $postsTotal = Post::all()->count();
        
        // //EMPRESAS
        // $empresasAvailable = Empresa::available()->count();
        // $empresasUnavailable = Empresa::unavailable()->count();
        // $empresasTotal = Empresa::all()->count(); 

        $artigosLast = Post::orderBy('created_at', 'DESC')->limit(4)->get();
        // $artigosTop = Post::where('status', '=', '1')->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
        //         ->limit(4)->get()
        //         ->sortByDesc('views');
        // $totalViewsArtigos = Post::selectRaw('SUM(views) AS VIEWS')
        //         ->where('status', '=', '1')
        //         ->where( DB::raw('YEAR(created_at)'), '=', '2021' )
        //         ->first();
        
        
        //Analitcs
        $visitasHoje = Analytics::fetchMostVisitedPages(Period::days(1));
        $visitas365 = Analytics::fetchTotalVisitorsAndPageViews(Period::months(5));
        $top_browser = Analytics::fetchTopBrowsers(Period::months(5));

        $analyticsData = Analytics::performQuery(
            Period::months(5),
               'ga:sessions',
               [
                   'metrics' => 'ga:sessions, ga:visitors, ga:pageviews',
                   'dimensions' => 'ga:yearMonth'
               ]
         );


        //dump($visitas365);

        
        return view('cms.dashboard', [
        //     'time' => $time,            
        //     'empresasAvailable' => $empresasAvailable,
        //     'empresasUnavailable' => $empresasUnavailable,
        //     'empresasTotal' => $empresasTotal,
        //     'postsPostson' => $postsPostson,
        //     'postsPostsoff' => $postsPostsoff,
        //     'postsTotal' => $postsTotal,            
             'artigosLast' => $artigosLast,
        //     'artigosTop' => $artigosTop,            
        //     //Analytics
             'visitasHoje' => $visitasHoje,
             //'visitas365' => $visitas365,
             'analyticsData' => $analyticsData,
             'top_browser' => $top_browser,
        ]);
    }

    public function login(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }
        
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, informe um e-mail válido')->render();
            return response()->json($json);
        }
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];        
        
        if (!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, usuário e senha não conferem')->render();
            return response()->json($json);
        }
        
        if (!$this->isAdmin()) {
            Auth::logout();
            $json['message'] = $this->message->error('Ooops, usuário não tem permissão para acessar o painel de controle')->render();
            return response()->json($json);
        }

                
        $this->authenticated($request->getClientIp());
        $json = ([
            'redirect' => route('home'),
            'msg' => 'Seja Bem vindo de volta '.getPrimeiroNome(Auth::user()->name)
        ]);
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    private function isAdmin()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user->admin == 1 || $user->superadmin == 1) {
            return true;
        } else {
            return false;
        }
    }
       
    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip,
        ]);
    }
}
