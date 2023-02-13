<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Admin | SebiTech</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            @auth
            <a href="/listings"
                ><img class="w-100 pt-2" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            @else
            <a href="/"
            ><img class="w-100 pt-2" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            @endauth
            <ul class="flex space-x-6 mr-6 text-lg">
                {{-- SHOW ONLY IF LOGGED IN --}}
                @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcome Admin
                    </span>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
    {{-- VIEW OUTPUT --}}
    <main>

    {{$slot}}

    </main>
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-center font-bold bg-yellow-300 text-black h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved </p>
    <span> || Made By Egil, Arshi J.</span>

    
</footer>

<x-flash-message/>

</body>
</html>