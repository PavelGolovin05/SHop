Верстка сделана некорректно, чтобы не было ошибка при регистрации и авторизации, необходимо зайти в папку app/Http/Controllers/Auth
Открыть файлы LoginController и RegisterController, найти строки use AuthenticatesUsers и use RegistersUsers соответсвенно
Пкм -> go to Declaration и вставить в методы showLoginForm() и showRegistrationForm() соответсвенно код 
$categories = Category::orderBy('categories.id', 'desc')->take(5)->get();
        return view('auth.register', compact('categories'));
