@props(['title', 'section_title' => 'Event Ease Management', 'section_description' => 'Login with your account'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <style>
        /* Background pattern */
        body {
            background: linear-gradient(135deg, #f0f4f8 25%, #d9e2ec 25%, #d9e2ec 50%, #f0f4f8 50%, #f0f4f8 75%, #d9e2ec 75%, #d9e2ec 100%);
            background-size: 40px 40px;
            padding-top: 1px;
            /* tambahan padding atas */
            padding-bottom: 1px;
            /* tambahan padding bawah */
        }

        /* Animasi fade in dari atas */
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-25px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation-name: fade-in-down;
            animation-fill-mode: forwards;
            animation-duration: 0.7s;
            animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Styling utama kontainer */
        main {
            max-width: 480px;
            width: 100%;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 30, 60, 0.1);
            border: 1px solid #cbd5e1;
            padding: 3.5rem 3rem;
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
            text-align: center;
            margin-top: 2rem;
            /* margin atas agar card tidak mepet ke body */
            margin-bottom: 2rem;
            /* margin bawah juga */
        }

        /* Header tanpa ikon, teks center */
        header {
            font-size: 2.8rem;
            font-weight: 900;
            color: #1a365d;
            letter-spacing: -0.025em;
            user-select: none;
            text-shadow: 0 1px 2px rgba(26, 54, 93, 0.15);
            margin-bottom: 1rem;
        }

        /* Section title & description */
        section.text-center h2 {
            font-size: 3.2rem;
            font-weight: 800;
            color: #1a202c;
            line-height: 1.1;
        }

        section.text-center p {
            margin-top: 0.6rem;
            font-size: 1.125rem;
            color: #4a5568;
            max-width: 350px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            font-weight: 500;
        }

        /* Separator berganti jadi gradient border bawah */
        hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, #2b6cb0, #2c5282);
            border-radius: 2px;
            margin: 0;
        }

        /* Slot section */
        section.w-full {
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 640px) {
            main {
                padding: 2.5rem 2rem;
                max-width: 90vw;
            }

            header {
                font-size: 2.2rem;
            }

            section.text-center h2 {
                font-size: 2.4rem;
            }

            section.text-center p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-6 sm:px-12 lg:px-20 animate-fade-in-down"
    style="background-color: #f8fafc;">
    <main>
        <header>
            Event Ease Management
        </header>

        <section class="text-center">
            <h2>{{ $section_title }}</h2>
            @if ($section_description)
                <p>{{ $section_description }}</p>
            @endif
        </section>

        <hr />

        <section class="w-full">
            {{ $slot }}
        </section>
    </main>
</body>

</html>
