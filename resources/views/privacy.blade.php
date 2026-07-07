@extends(auth()->check() ? 'layouts.app' : 'layouts.user')

@section('title', 'Политика конфиденциальности')

@section('content')

    <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

        <div class="rounded-2xl border border-zinc-700 bg-zinc-900 p-6 shadow-2xl sm:p-10">

            <h1 class="mb-12  border-zinc-700 pb-6 text-4xl font-bold">
                Политика конфиденциальности
            </h1>

            <p class="mb-10 text-lg leading-8 text-zinc-300">
                Используя сайт, вы подтверждаете своё согласие с настоящей Политикой
                конфиденциальности.
            </p>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    1. Какие данные собираются
                </h2>

                <ul class="list-disc space-y-3 pl-6 leading-7 text-zinc-300 marker:text-sky-400">
                    <li>Имя пользователя (логин).</li>
                    <li>Адрес электронной почты (если используется).</li>
                    <li>Пароль (хранится только в зашифрованном виде).</li>
                    <li>IP-адрес, cookies и данные сессии.</li>
                </ul>
            </section>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    2. Цели обработки данных
                </h2>

                <ul class="list-disc space-y-3 pl-6 leading-7 text-zinc-300 marker:text-sky-400">
                    <li>Регистрация и авторизация пользователей.</li>
                    <li>Обеспечение корректной работы сайта.</li>
                    <li>Защита аккаунтов и обеспечение безопасности.</li>
                </ul>
            </section>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    3. Хранение данных
                </h2>

                <p class="leading-8 text-zinc-300">
                    Данные хранятся на сервере сайта и защищаются от
                    несанкционированного доступа с использованием современных
                    технических средств.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    4. Передача третьим лицам
                </h2>

                <p class="leading-8 text-zinc-300">
                    Персональные данные не передаются третьим лицам, за исключением
                    случаев, предусмотренных действующим законодательством.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    5. Права пользователя
                </h2>

                <ul class="list-disc space-y-3 pl-6 leading-7 text-zinc-300 marker:text-sky-400">
                    <li>Изменение своих персональных данных.</li>
                    <li>Удаление аккаунта.</li>
                    <li>Отзыв согласия на обработку персональных данных.</li>
                </ul>
            </section>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    6. Cookies
                </h2>

                <p class="leading-8 text-zinc-300">
                    Сайт использует cookies для корректной работы авторизации,
                    хранения пользовательских настроек и повышения удобства
                    использования.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    7. Изменения политики
                </h2>

                <p class="leading-8 text-zinc-300">
                    Администрация сайта вправе вносить изменения в настоящую
                    Политику конфиденциальности без предварительного уведомления
                    пользователей.
                </p>
            </section>

            <section>
                <h2 class="mt-10 mb-6 text-2xl font-semibold text-zinc-100">
                    8. Контакты
                </h2>

                <p class="mb-5 leading-8 text-zinc-300">
                    Если у вас возникли вопросы, связанные с работой сайта или
                    обработкой персональных данных, свяжитесь с администрацией.
                </p>

                <div class="mt-6 inline-flex items-center rounded-xl border border-sky-700 bg-sky-900/20 px-5 py-3">
                <span class="mr-2 font-medium text-zinc-200">
                    Email:
                </span>

                    <a
                        href="mailto:myl0@bk.ru"
                        class="font-medium text-sky-400 transition hover:text-sky-300 hover:underline"
                    >
                        myl0@bk.ru
                    </a>
                </div>
            </section>

        </div>

    </div>

@endsection
