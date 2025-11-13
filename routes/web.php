<?php

use Inertia\Inertia;
use App\Models\About;
use App\Models\Report;
use App\Models\Contact;
use App\Models\Statute;
use App\Models\Agreement;
use App\Models\Direction;
use App\Models\Announcement;
use App\Models\BenefitTopic;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FormIndexController;
use App\Http\Middleware\AuthClientMiddleware;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\AuthClientController;
use App\Http\Controllers\Client\BlogPageController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\AboutPageController;
use App\Http\Controllers\Client\EventPageController;
use App\Http\Controllers\Client\RegionPageController;
use App\Http\Controllers\Client\BenefitPageController;
use App\Http\Controllers\Client\ContactPageController;
use App\Http\Controllers\Client\JuridicoPageController;
use App\Http\Controllers\Client\NoticiesPageController;
use App\Http\Controllers\Auth\PasswordEmailClientController;
use App\Http\Controllers\Auth\ResetPasswordClientController;
use App\Http\Controllers\ReservationController;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return redirect()->route('index');
});

Route::post('login.do', [AuthClientController::class, 'authenticate'])
->name('client.user.authenticate');

// Rota para processar o formulário "Esqueci a senha"
Route::post('/password/email', [PasswordEmailClientController::class, 'passwordEmail'])
->name('client.password.email');

Route::get('/email-enviado-com-sucesso', [PasswordEmailClientController::class, 'showSuccess'])
->name('send-success-client');

// Rota para processar a redefinição de senha
Route::post('/password/reset', [ResetPasswordClientController::class, 'processPasswordReset'])
->name('client-password.update');

// Rota para exibir o formulário de redefinição de senha
Route::get('password/reset/{token}', [ResetPasswordClientController::class, 'showResetForm'])
->name('client.password.reset');


Route::get('/senha-alterada-com-sucesso', function () {
    return view('emails.password-success-client-reset');
})->name('client-success-reset-password');


Route::middleware([AuthClientMiddleware::class])->group(function () {
    Route::put('/client/update', [ClientController::class, 'update'])->name('client.update');

    Route::post('/client/comments', [CommentController::class, 'store'])
    ->name('blog.comment');

    Route::get('logout', [AuthClientController::class, 'logout'])->name('client.user.logout');
});

// Route::get('contato', [ContactPageController::class, 'index'])
// ->name('contact');
// Route::post('send-contact', [FormIndexController::class, 'store'])->name('send-contact');
// Route::get('editais', [NoticiesPageController::class, 'index'])
// ->name('noticies');
Route::get('blog/interna/{slug}', [BlogPageController::class, 'blogInner'])
->name('blog-inner');
Route::get('blog/{category?}', [BlogPageController::class, 'index'])->name('blog');
Route::post('blog/search', [BlogPageController::class, 'index'])->name('blog-search');
Route::post('send-newsletter', [NewsletterController::class, 'store'])->name('send-newsletter');
Route::post('send-reservation', [ReservationController::class, 'store'])->name('send-reservation');

Route::post('cliente/cadastro', [ClientController::class, 'store'])->name('register-client');
Route::get('/', [HomePageController::class, 'index'])->name('index');
// Route::get('sobre', [AboutPageController::class, 'index'])->name('about');
// Route::get('servicos-aos-sindicalizados', [BenefitPageController::class, 'index'])->name('unionized');
// Route::get('juridico', [JuridicoPageController::class, 'index'])->name('juridico');
// Route::get('juridico/search', [JuridicoPageController::class, 'searchJuridico'])->name('search-juridico');
// Route::get('regionais', [RegionPageController::class, 'index'])->name('regional');
// Route::match(['get', 'post'], 'regionais/filter-municipalities', [RegionPageController::class, 'filterMunicipalities'])
// ->name('client.filter.municipalities');


// Route::get('agenda', [EventPageController::class, 'index'])->name('client.event');
Route::get('blog/filter/{category?}', [HomePageController::class, 'filterByCategory'])
    ->name('blog.filter');


View::composer('client.core.client', function ($view) {
    $blogCategories = BlogCategory::whereHas('blogs')
    ->active()
    ->sorting()
    ->limit(10)
    ->get();
    $announcements = Announcement::select(
        'exhibition',
        'link',
        'exhibition',
        'path_image',
        'active',
        'sorting',
    )
    ->where('exhibition', '=', 'mobile')
    ->orWhere('exhibition', '=', 'horizontal')
    ->active()
    ->sorting()
    ->get();
    $contact = Contact::first();
    $abouts = About::active()->sorting()->get();
    $statute = Statute::active()->count();
    $directions = Direction::active()->sorting()->count();
    $benefitTopics = BenefitTopic::active()->sorting()->count();
    $report = Report::active()->count();
    $agreement = Agreement::active()->count();

    return $view->with('blogCategories', $blogCategories)
    ->with('announcements', $announcements)
    ->with('contact', $contact)
    ->with('statute', $statute)
    ->with('directions', $directions)
    ->with('benefitTopics', $benefitTopics)
    ->with('report', $report)
    ->with('agreement', $agreement)
    ->with('abouts', $abouts);
});
