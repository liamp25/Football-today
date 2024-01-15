<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicArea\RegistrationController;
use App\Http\Controllers\AdminArea\MembershipController;
use App\Http\Controllers\AdminArea\UserAccountController;
use App\Http\Controllers\AdminArea\UserController;
use App\Http\Controllers\AdminArea\StripeController;
use App\Http\Controllers\PublicArea\PlanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// terminal routs
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return "Cache Clear Successfully!";
});
Route::get('/terminal/{command}', function ($command) {
    // Use $command as the argument for Artisan::call()
    $output = Artisan::call($command);
    // Get the output message
    $message = Artisan::output();
    return $message;
});



//*****************************************************************
        // guest middeleare
//*****************************************************************

Route::group(['middleware'=>'userxMiddlewar'], function(){
    Route::get('/plan', [PlanController::class, 'all_plan'])->name('plan');
    Route::get('/card-detail', [PlanController::class, 'card_details'])->name('card-detail');
    Route::get('/cancel-membership/{id}', [PlanController::class, 'cancleMembership'])->name('cancel-membership');
    Route::get('/purchase-plan/{id}', [PlanController::class, 'purchase_plan']);
    Route::post('/purchase-plan/{id}', [PlanController::class, 'purchase_planrec']);
    //  Route::get('/purchase-plan/{id}', 'PublicArea.pages.plans.card-detail');
    Route::get('/user-account', [RegistrationController::class, 'index'])->name('user-account');
    Route::post('/user-login', [RegistrationController::class, 'user_login'])->name('user-login');
    Route::post('/user-registration', [RegistrationController::class, 'user_registration'])->name('user_registration');
});
Route::get('/user-logout', [RegistrationController::class, 'user_logout'])->name('user-logout');

Route::prefix('/')->namespace('App\Http\Controllers\PublicArea')->group(function () {

    // routes for fixtures
    Route::get('/fixture/standings/ajax/{id}', 'FixtureController@getStandings')->name('public.standings.ajax');
    Route::get('/fixture/head-to-head/ajax/{id}', 'FixtureController@getHeadToHead')->name('public.headtohead.ajax');
    Route::get('/fixture/player-stats/ajax/{id}', 'FixtureController@getPlayerStats')->name('public.playerstats');
    Route::get('/fixture/match-stats/ajax/{id}', 'FixtureController@getMatchStats')->name('public.matchstats');

    Route::get('/', 'FixtureController@fixtures')->name('public.fixtures');
    Route::get('/fixtures/ajax', 'FixtureController@fixturesAjax')->name('public.fixtures.ajax');
    Route::get('/fixture/{id}', 'FixtureController@getFixture')->name('public.fixture.get');
    Route::get('/fixture/ajax/{id}', 'FixtureController@getFixtureAjax')->name('public.fixture.get.ajax');
    Route::get('/fixture/match-info/{id}','FixtureController@getMatchInfo')->name("public.fixture.match-info.get");
    Route::get('/fixture/match-preview/{id}', 'FixtureController@getMatchPreview')->name('public.fixture.match-preview.get');
    Route::get('/fixture/match-preview/ajax/{id}', 'FixtureController@getMatchPreviewAjax')->name('public.fixture.match-preview.get.ajax');
    // routes for leagues
    Route::get('/leagues', 'LeaguesController@leagues')->name('public.leagues');
    Route::get('/leagues/ajax', 'LeaguesController@leaguesAjax')->name('public.leagues.ajax');
    Route::get('/leagues/{nation}/{league_name}', 'LeaguesController@getLeague')->name('public.league.get');
    Route::get('/leagues/call/ajax/{id}', 'LeaguesController@getLeagueAjax')->name('public.league.get.ajax');
    // routes for teams
    Route::get('/team/{nation}/{club}/{id}', 'TeamsController@getTeam')->name('public.team.get');
    Route::get('/team/ajax/{id}', 'TeamsController@getTeamAjax')->name('public.team.get.ajax');
    Route::get('/team/player/transfers/{team}/{player}', 'TeamsController@getTeamPlayerTransfers')->name('public.team.player.transfers.get');


    // routes for articles
    Route::get('/articles', 'ArticleController@allArticles')->name('public.articles.all');
    Route::get('/articles/{title}', 'ArticleController@getArticle')->name('public.articles.get');

    // routes for search
    Route::get('/search', 'SearchController@search')->name('public.search.all');

    // routes for bets
    Route::get('/bets', 'BetsController@bets')->name('public.bets.all');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is the Admin routes
|
*/
Route::prefix('/admin')->namespace('App\Http\Controllers\AdminArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('admin.index');

    Route::prefix('/category/article')->group(function () {
        Route::get('/', 'CategoryController@all')->name('admin.category.all');
        Route::get('/add', 'CategoryController@add')->name('admin.category.add');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('admin.category.update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    });

    Route::prefix('/article')->group(function () {
        Route::get('/', 'ArticleController@all')->name('admin.article.all');
        Route::get('/add', 'ArticleController@add')->name('admin.article.add');
        Route::post('/store', 'ArticleController@store')->name('admin.article.store');
        Route::get('/edit/{id}', 'ArticleController@edit')->name('admin.article.edit');
        Route::post('/update/{id}', 'ArticleController@update')->name('admin.article.update');
        Route::get('/delete/{id}', 'ArticleController@delete')->name('admin.article.delete');
        Route::post('/image/upload', 'ArticleController@uploadImage')->name('admin.article.image.upload');
    });

    //Route::view('/add-plan', 'AdminArea.pages.membership.add');
    Route::get('/all-plan', [MembershipController::class, 'all_plan'])->name('all-plan');
    Route::get('/add-plan', [MembershipController::class, 'add_plan'])->name('add-plan');
    Route::post('/add-plan', [MembershipController::class, 'store_plan'])->name('add-plan');
    Route::get('/edit-plan/{id}', [MembershipController::class, 'edit'])->name('edit-plan');
    Route::get('/delete-plan/{id}', [MembershipController::class, 'delete'])->name('delete-plan');
    Route::get('/all-user', [UserController::class, 'all'])->name('all-user');
    Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
    Route::get('/all-stripe', [StripeController::class, 'all'])->name('all-stripe');
    Route::get('/add-stripe', [StripeController::class, 'add'])->name('add-stripe');
    Route::post('/add-stripe', [StripeController::class, 'store'])->name('add-stripe');
    Route::get('/edit-stripe/{id}', [StripeController::class, 'edit'])->name('edit-stripe');

    Route::get('/user-account/all', [UserAccountController::class, 'all'])->name('all');
    Route::get('/user-account/add', [UserAccountController::class, 'add'])->name('add');
    Route::post('/user-account/store', [UserAccountController::class, 'store'])->name('store');
    Route::get('/user-account/edit/{id}', [UserAccountController::class, 'edit'])->name('edit');
    Route::get('/user-account/delete/{id}', [UserAccountController::class, 'delete'])->name('delete');
    Route::get('/user-account/forgot-password/{id}', [UserAccountController::class, 'forgot_password'])->name('forgot_password');
    Route::post('/user-account/email', [UserAccountController::class, 'email_check'])->name('email');
    Route::get('/user-account/reset-password', [UserAccountController::class, 'reset_password'])->name('reset-password');
    Route::post('/user-account/reset-password', [UserAccountController::class, 'reset_password_add'])->name('reset-password');
});
