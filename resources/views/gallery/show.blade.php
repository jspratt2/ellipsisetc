<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - {{ $item['title'] }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

</head>

<body class="bg-[#2D2D2D] min-h-screen">
    <script>
        ((e, t, r, n, a, o, l, i) => {
            let u = document.documentElement,
                s = ["light", "dark"];

            function c(t) {
                (Array.isArray(e) ? e : [e]).forEach(e => {
                    let r = "class" === e,
                        n = r && o ? a.map(e => o[e] || e) : a;
                    r ? (u.classList.remove(...n), u.classList.add(o && o[t] ? o[t] : t)) : u.setAttribute(e, t)
                }), i && s.includes(t) && (u.style.colorScheme = t)
            }
            if (n) c(n);
            else try {
                let e = localStorage.getItem(t) || r,
                    n = l && "system" === e ? window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light" : e;
                c(n)
            } catch (e) {}
        })("class", "theme", "dark", null, ["light", "dark"], null, false, true)
    </script>

    <div class="min-h-screen w-full bg-[#2D2D2D]">
        <x-gallery.detail :item="$item" />
    </div>
</body>

</html>
