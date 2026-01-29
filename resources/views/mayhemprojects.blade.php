<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }} - Built by Mayhem Projects</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
  <style>
    html, body, * {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
    html::-webkit-scrollbar,
    body::-webkit-scrollbar,
    *::-webkit-scrollbar {
      display: none;
      width: 0;
      height: 0;
    }
  </style>
</head>

<body class="bg-[#2D2D2D] overflow-y-auto h-full">
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
  <div class="min-h-screen w-screen flex flex-col bg-[#2D2D2D] relative">
    <main class="flex-1 flex flex-col items-center justify-center p-4 relative gap-8">
      <div class="w-full max-w-xl z-10 relative pt-8">
        <div class="w-full max-w-xl mx-auto font-['Bricolage_Grotesque',sans-serif] relative z-10">
          <div class="relative flex flex-col justify-start items-center min-h-[300px]">
            <x-back-button label="Back to Ellipsis Etcetera" style="floating" />
            <div class="w-full max-w-md">
              <!-- Logo & Header Section -->
              <div class="px-4 py-6 border-b border-[#3A3A3A] text-center">
                <div class="flex justify-center mb-4 px-6">
                  <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 693.98 529.53">
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #FDFBD8;
                          stroke: #FDFBD8;
                          stroke-miterlimit: 10;
                        }
                      </style>
                    </defs>
                    <path class="cls-1" d="M48.98,254.09C18.02,249.64.37,224.13.5,198.47c.13-26.02,15.84-52.23,53.51-56.01-13.27-13.18-16.37-28.49-8.33-45.03,6.64-13.65,18.51-19.92,33.75-19.62,17.36.34,28.26,9.81,35.44,25.13,18.28-8.13,37.71-9.07,57.45-9.06,128.46.08,256.93-.05,385.4-.13,11.31,0,22.62-.02,33.92-.25,24.75-.5,43.41,10.56,57.42,30.26,10.99,15.45,21.78,31.04,32.54,46.65,11.87,17.21,14.12,36.31,9.95,56.26-12.25,58.62-24.76,117.18-37.19,175.76-4.71,22.22-8.92,44.57-14.31,66.63-8.09,33.13-30.42,51.6-63.23,57.83-8.74,1.66-17.83,2.02-26.76,2.02-149.97.12-299.94.17-449.91.04-29.59-.03-51.29-12.92-62.95-40.94-4.39-10.57-8.93-21.07-13.41-31.6-2.28-5.34-4.3-10.82-6.94-15.98-7.39-14.45-7.34-29.42-3.52-44.67,11.82-47.13,23.71-94.24,35.65-141.67ZM603.17,502.09c4.18-3.88,8.42-7.71,12.5-11.7.73-.72.87-2.05,1.27-3.1.45-1.16.76-2.39,1.35-3.47,2.34-4.26,5.58-8.22,7-12.75,2.52-8.04,4.05-16.41,5.85-24.67,7.28-33.42,14.59-66.83,21.73-100.27,8.04-37.67,15.98-75.36,23.82-113.07,2.54-12.2,4.67-24.39,1.77-37.01-3.59-15.67-15.33-26.24-23.2-40.2-.64,4.45-.95,7.93-1.66,11.32-6.88,32.64-13.67,65.29-20.79,97.88-8.78,40.21-18.01,80.33-26.74,120.56-4.74,21.83-10.23,43.12-28.75,58.03-.62.25-1.24.5-1.86.75-15.53,9.52-32.41,14.55-50.61,14.57-86.59.07-173.18,0-259.76,0-55.12,0-110.24.31-165.36-.03-20.9-.13-42.18,2.97-63.31-5.92,5.87,13.19,11.03,25.59,16.88,37.66,4.03,8.31,10.92,14.03,19.19,18.27,12.15,6.24,25.25,6.52,38.36,6.55,55.82.12,111.63.08,167.45.1,45.75.01,91.5.03,137.25.03,43.77,0,87.54-.01,131.32-.03,13.31,0,26.63-.11,39.35-4.79,4.14-1.52,8.05-3.66,12.02-5.5,1.64-1.07,3.28-2.14,4.92-3.22ZM296,444.75c0,.06,0,.12,0,.18,62.3,0,124.61.06,186.91-.04,18.14-.03,36.46,1.03,54.37-1.15,29.69-3.6,45.9-19.06,51.75-46.12,7.27-33.61,15.12-67.1,22.42-100.71,9.85-45.32,19.55-90.67,29.05-136.07,3.99-19.09-2.34-34.48-18.58-45.4-8.49-5.71-18.14-8.28-28.33-8.28-47.31-.01-94.61.11-141.92.15-94.41.08-188.82.15-283.24.22-15.36.01-30.54.81-45.17,6.38-18.48,7.03-30.25,19.65-35.01,39.04-7.37,30.01-15.23,59.9-22.72,89.88-13.4,53.68-26.77,107.37-39.96,161.1-4.7,19.13,3.1,33.13,21.32,38.35,5.68,1.62,11.8,2.36,17.72,2.37,77.13.15,154.26.1,231.39.1ZM72.93,159.63c-17.96-7.2-35.49-3.92-47.76,8.67-11.64,11.94-15.07,31.94-8.21,47.82,6.16,14.26,20.77,24.19,35.62,24,6.75-26.7,13.51-53.47,20.34-80.49ZM103.07,109.15c-.66-1.57-1.12-2.79-1.67-3.97-4.88-10.33-17.11-16.41-28.15-14.02-10.86,2.35-18.43,11.86-18.64,23.41-.2,11.12,7.5,20.27,19.54,23.03,2.31.53,4.79,1.38,6.29-1.95,4.88-10.86,12.57-19.44,22.63-26.5Z" />
                    <path class="cls-1" d="M142.47,92.37c-25.96.1-45.5-18.93-45.64-44.47-.16-27.86,18.88-47.2,46.67-47.4,26.4-.19,45.59,19.93,45.67,47.9.07,25.11-19.84,43.86-46.69,43.96ZM176.31,47.44c-.25-19.4-15.34-34.68-33.94-34.37-19.2.32-33.21,14.76-32.93,33.95.26,18.16,15.35,32.97,33.36,32.73,19.06-.26,33.74-14.41,33.52-32.31Z" />
                    <path class="cls-1" d="M248.21,54.75c-.34,13.63-10.48,23.4-24.01,23.14-13.55-.26-23.49-11.13-23.11-25.28.35-13.08,10.9-22.99,24.07-22.63,13.48.37,23.39,11.02,23.05,24.78ZM235.22,54.81c.03-6.7-4.61-11.82-10.7-11.81-5.96.01-10.34,4.34-10.42,10.29-.09,6.52,4.78,11.78,10.86,11.74,6.22-.04,10.24-4.05,10.26-10.22Z" />
                    <g fill="#FDFBD8" stroke="#FDFBD8" stroke-width="0.5">
                      <path d="M551.42,197.02c-3.08,7.43-6.16,14.85-9.23,22.28-6.53,15.82-13.13,31.61-19.52,47.48-1.19,2.96-2.79,4.09-5.97,3.86-3.77-.28-7.57-.07-11.26-.07,1.05-25.45,2.07-50.35,3.09-75.25l-1.32-.17c-5.4,25.05-10.8,50.1-16.22,75.26h-17.6c7.86-36.84,15.67-73.42,23.42-109.71h28.1c-.95,23.47-1.87,46.34-2.79,69.21.28.08.56.17.84.25,2.7-6.61,5.52-13.17,8.09-19.83,5.98-15.5,11.93-31.01,17.69-46.6.97-2.63,2.08-3.57,4.93-3.48,7.76.23,15.53.08,23.88.08-7.95,37.06-15.78,73.55-23.6,110.01h-17.81c5.38-24.6,10.69-48.85,15.99-73.09-.24-.08-.47-.16-.71-.24Z" />
                      <path d="M193.26,196.41c-6.05,14.9-12.11,29.8-18.16,44.69-3.5,8.62-7.14,17.19-10.42,25.9-1.07,2.84-2.51,3.92-5.47,3.74-3.61-.21-7.23-.05-11.53-.05.86-24.9,1.7-49.14,2.54-73.39l-1-.18c-1.29,5.53-2.66,11.05-3.85,16.61-3.78,17.54-7.54,35.09-11.17,52.65-.63,3.06-1.78,4.63-5.21,4.41-4.29-.28-8.6-.07-13.87-.07,8.31-37.05,16.51-73.58,24.69-110.04,8.26,0,16.18.04,24.09-.02,3.65-.03,3.35,2.48,3.25,4.81-.59,12.63-1.4,25.26-1.8,37.9-.29,8.97-.06,17.95-.06,26.27-.32.4.25-.05.47-.63,8.18-21.58,16.37-43.16,24.44-64.79.99-2.65,2.05-3.96,5.25-3.82,7.44.33,14.9.1,23.29.1-1.33,6.68-2.46,12.83-3.79,18.93-6.25,28.57-12.6,57.12-18.78,85.71-.85,3.94-2.17,6.14-6.76,5.51-3.58-.49-7.29-.1-11.79-.1,5.45-24.87,10.82-49.4,16.2-73.94l-.54-.22Z" />
                      <path d="M340.01,270.58c5.19-24.13,10.25-47.65,15.32-71.16,2.56-11.85,5.25-23.68,7.66-35.56.56-2.78,1.35-3.98,4.46-3.78,4.94.33,9.92.09,15.55.09-3.25,15-6.36,29.33-9.57,44.16h19.06c3.04-14.32,6.18-29.04,9.33-43.89h19.59c-1.16,5.66-2.19,10.97-3.35,16.26-6.58,30.03-13.27,60.04-19.69,90.1-.63,2.95-1.53,3.88-4.42,3.77-4.82-.2-9.65-.05-15.36-.05,3.3-15.72,6.55-31.2,9.9-47.1h-19.03c-3.06,14.11-6.28,28.32-9.12,42.6-.69,3.48-1.94,4.8-5.46,4.62-4.78-.24-9.58-.06-14.88-.06Z" />
                      <path d="M269.51,270.22h-19.38c.58-7.37,1.14-14.46,1.72-21.88h-19.73c-2.47,6.39-4.88,12.92-7.57,19.34-.51,1.23-2.09,2.76-3.26,2.83-5.27.3-10.57.13-16.67.13,3.06-7.61,5.82-14.47,8.58-21.32,11.16-27.7,22.42-55.37,33.4-83.15,1.67-4.22,3.53-6.42,8.42-5.85,4.43.51,8.97.28,13.45.04,4.06-.21,5.13,1.69,5,5.36-.29,8.31-.24,16.63-.54,24.94-.93,25.92-1.96,51.84-2.96,77.75-.02.47-.23.94-.46,1.8ZM252.15,230.75c1.34-13,2.66-25.76,3.98-38.53-.33-.09-.66-.17-.99-.26-5.1,12.78-10.2,25.57-15.47,38.79h12.48Z" />
                      <path d="M197.65,391.95h-17.97c.28-3.54.26-6.83.86-9.99,1.33-7.02,3.24-13.94,4.35-20.99.39-2.48-.03-6.64-1.56-7.54-2.58-1.52-6.32-1.21-9.58-1.26-.55,0-1.39,1.96-1.65,3.12-2.78,12.12-5.47,24.27-8.24,36.67h-18.04c7.3-33.69,14.53-67.03,21.72-100.24,10.48,0,20.44-.36,30.37.09,12.38.56,18.54,7.25,17.19,19.4-1.34,12.09-3.37,24.29-14.92,32.1,5.01,4.81,5.73,10.57,4.32,16.92-2.31,10.37-4.49,20.77-6.84,31.72ZM176.57,334.68c12.01,1,15.04-.97,17.47-10.96.23-.97.46-1.93.67-2.91,2.54-12.11,1.45-13.38-10.86-12.63-.46.03-.9.33-1.49.56-1.9,8.53-3.81,17.07-5.79,25.93Z" />
                      <path d="M235.33,394.18c-14.2-.18-22.94-9.07-20.53-23.11,3.48-20.27,7.67-40.49,13.02-60.33,4.33-16.05,19.43-23.74,35.15-19.98,11.08,2.65,17.39,12.16,14.85,24.96-3.77,19.05-8.09,38.04-13.18,56.78-3.86,14.22-15.22,21.85-29.32,21.67ZM232.73,371.3c.72,1.32,1.29,4.05,2.71,4.61,2,.79,5.44.88,6.83-.35,2.45-2.17,4.74-5.35,5.48-8.48,4.16-17.6,7.92-35.3,11.63-53.01,1.11-5.28-2.5-8.15-7.72-6.55-5.14,1.57-6.32,5.99-7.36,10.39-1.67,7.11-3.2,14.25-4.74,21.38-2.24,10.38-4.44,20.77-6.84,32.01Z" />
                      <path d="M414.46,270.66c7.98-37.31,15.75-73.68,23.54-110.12h45.93c-1.19,5.49-2.05,10.54-3.5,15.42-.33,1.12-2.64,2.3-4.07,2.34-7.46.23-14.93.11-22.85.11-1.95,8.93-3.79,17.42-5.77,26.47h25.11c-1.35,6.31-2.58,12.08-3.9,18.24h-25.13c-2.05,9.94-4.02,19.46-6.13,29.66h28.41c-1.17,5.64-2.1,10.67-3.35,15.62-.23.92-1.75,2.15-2.68,2.16-14.95.14-29.89.1-45.6.1Z" />
                      <path d="M496.41,361.78h18.86c-.37,2.69-1.28,5.05-.85,7.15.53,2.63,1.5,6.02,3.45,7.31,3.02,2,6.38.26,8.78-2.48,4.22-4.81,4.54-12.5.32-18.03-3.01-3.95-6.37-7.71-9.95-11.15-14.85-14.26-10.9-32.41-2.28-44.42,7.66-10.67,25.57-14.02,36.49-6.77,7.58,5.03,9.1,12.92,7.61,21.24-1.6,8.91-.39,7.22-8.5,7.37-3.46.07-6.92.01-10.78.01.24-2.77.47-5.02.63-7.27.23-3.17-.1-6.8-3.83-6.91-2.67-.08-6.23,1.45-7.94,3.48-3.82,4.52-3.09,12.38,1.12,17.54,4.31,5.28,9.24,10.06,13.4,15.44,7.98,10.32,7.78,24.85-.08,36.88-6.73,10.3-20.04,15.43-32.43,12.5-11.71-2.77-16.71-10.75-15.3-24.56.25-2.44.85-4.84,1.3-7.33Z" />
                      <path d="M110.54,354.09c-2.89,12.92-5.68,25.36-8.48,37.87h-17.96c7.35-33.69,14.64-67.05,21.85-100.09,10.68,0,20.81-.4,30.9.11,11.42.58,17.62,8,16.16,19.36-.88,6.86-2.48,13.77-4.78,20.29-5.35,15.13-16.3,22.46-32.22,22.48-1.65,0-3.3,0-5.47,0ZM120.47,308.48c-2.07,9.35-4.1,18.48-6.13,27.65,10.86,1.44,15.22-1.53,17.61-11.63.27-1.12.52-2.25.78-3.38,2.79-11.86.67-14.15-12.25-12.64Z" />
                      <path d="M445.46,321.8h-18.65c.34-2.2.68-4.11.93-6.03.45-3.48.35-6.84-3.6-8.32-3.24-1.22-7.88,1.04-9.15,4.95-1.85,5.66-3.27,11.49-4.56,17.31-2.7,12.16-5.2,24.35-7.77,36.54-.24,1.13-.37,2.29-.5,3.44-.33,2.99-.19,6.38,3.36,6.66,2.57.21,6.34-.79,7.72-2.63,2.5-3.33,3.61-7.69,5.49-12.07h18.18c-2.78,7.09-4.57,13.83-7.91,19.7-6.08,10.72-20.32,15.64-32.26,12.08-10.15-3.02-15.65-12.13-13.34-24.07,3.6-18.58,7.38-37.16,12.07-55.48,4.84-18.91,19.5-27.46,37.31-23.03,7.56,1.89,12.74,7.25,13.28,14.92.37,5.2-.35,10.49-.6,16.04Z" />
                      <path d="M289.12,160.34c6.37,0,12.02-.26,17.6.21,1.22.1,3,2.74,3.19,4.36,1.3,11.4,2.24,22.84,3.3,34.27.06.6.07,1.2.18,3.16,1.42-2.41,2.28-3.72,2.99-5.09,5.72-11.06,11.5-22.1,17.04-33.25,1.37-2.75,2.94-3.95,6.07-3.8,5.08.25,10.18.07,16.29.07-1.53,3.04-2.5,5.23-3.69,7.3-10.57,18.46-21.56,36.69-31.58,55.45-3.35,6.27-4.46,13.79-6.19,20.84-1.86,7.58-3.38,15.26-4.75,22.95-.51,2.85-1.54,3.97-4.51,3.83-4.95-.22-9.92-.06-15.67-.06,1.65-7.91,2.57-15.34,4.79-22.36,5.52-17.46,3.61-34.75.39-52.23-2.13-11.57-3.59-23.26-5.46-35.65Z" />
                      <path d="M356.53,332.96h22.95c-1.24,5.67-2.39,10.89-3.66,16.68h-22.99c-1.95,8.75-3.78,16.95-5.78,25.89h25.74c-1.17,5.43-2.07,10.09-3.25,14.68-.21.81-1.54,1.9-2.37,1.91-13.94.12-27.89.08-42.46.08,2.28-10.44,4.43-20.29,6.59-30.13,4.89-22.2,9.74-44.41,14.78-66.58.34-1.5,2.07-3.8,3.19-3.82,13.44-.27,26.89-.17,41.1-.17-1.2,5.56-2.15,10.69-3.54,15.7-.21.77-2.45,1.34-3.76,1.37-6.96.13-13.93.06-21.13.06-1.83,8.19-3.56,15.94-5.44,24.34Z" />
                      <path d="M314.57,291.62h18.34c-2.63,11.91-5.14,23.51-7.76,35.08-3.63,16.03-6.75,32.21-11.2,48.02-3.87,13.75-12.59,19.45-26.14,19.35-10.81-.08-17.21-6.74-16.15-17.51.61-6.24,2.15-12.4,3.31-18.85h17.83c-.82,3.85-1.92,7.47-2.27,11.16-.25,2.61-3.03,6.59,1.18,7.72,4.07,1.1,4.91-3.03,5.62-6.1,1.97-8.58,3.82-17.18,5.69-25.78,3.85-17.67,7.69-35.34,11.56-53.09Z" />
                      <path d="M469.75,308.73h-16.18c1.25-5.84,2.4-11.28,3.63-17.02h50.57c-1.19,5.12-2.16,10.07-3.62,14.88-.3.98-2.42,1.88-3.76,1.97-4.11.25-8.25.09-12.64.09-3.9,17.92-7.71,35.41-11.53,52.89-1.98,9.08-4.15,18.13-5.91,27.25-.54,2.8-1.73,3.51-4.29,3.44-4.62-.13-9.25-.04-14.6-.04,6.18-28.18,12.22-55.68,18.31-83.46Z" />
                    </g>
                  </svg>

                </div>
                <p class="text-sm text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">Web Development & Design Studio</p>
              </div>
              <div class="w-full rounded-b-xl shadow-sm overflow-hidden backdrop-blur-md bg-[#252525]/80 border border-[#3A3A3A]" style="opacity: 1; height: auto;">
                <!-- Credit Section -->
                <div class="px-4 py-4 border-b border-[#3A3A3A]">
                  <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FDFBD8] to-[#FF5349] flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2D2D2D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                        <path d="m9 12 2 2 4-4" />
                      </svg>
                    </div>
                    <div>
                      <p class="text-sm text-white font-semibold font-['Bricolage_Grotesque',sans-serif]">Website Built By</p>
                      <p class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">Mayhem Projects © 2026</p>
                    </div>
                  </div>
                  <p class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif] leading-relaxed">
                    This website was designed and developed by Mayhem Projects. We specialize in creating meaningful, functional web experiences for creators and businesses.
                    </br>We provide custom web development, UI/UX design, landing pages, portfolios, and e-commerce solutions tailored to your needs. Everyone has a Shopify website-- stand out among the masses.
                    </br>Mainly specializing in chemical & analyical software components, we also create in-house applications.
                  </p>
                </div>

                <!-- Services Section -->
                <div class="px-4 py-4 border-b border-[#3A3A3A]">
                  <h4 class="text-xs font-medium text-gray-300 mb-3 font-['Bricolage_Grotesque',sans-serif]">Our Services</h4>
                  <div class="space-y-2">
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <path d="m18 16 4-4-4-4" />
                        <path d="m6 8-4 4 4 4" />
                        <path d="m14.5 4-5 16" />
                      </svg>
                      <span>Custom Web Development</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                        <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                      </svg>
                      <span>UI/UX Design</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M3 9h18" />
                        <path d="M9 21V9" />
                      </svg>
                      <span>Landing Pages & Portfolios</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <path d="M6 8h12l-1 12H7L6 8z"></path>
                        <path d="M9 8V6a3 3 0 0 1 6 0v2"></path>
                      </svg>
                      <span>E-commerce Solutions</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2" />
                        <path d="M12 18h.01" />
                      </svg>
                      <span>iOS & Mobile Applications</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <path d="M10 2v8L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45L14 10V2" />
                        <path d="M8.5 2h7" />
                        <path d="M7 16h10" />
                      </svg>
                      <span>Chemistry & Biochemistry Software</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                        <path d="M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66" />
                        <path d="m18 15-2-2" />
                        <path d="m15 18-2-2" />
                      </svg>
                      <span>Medical & Healthcare Applications</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" />
                        <path d="M17 18h1" />
                        <path d="M12 18h1" />
                        <path d="M7 18h1" />
                      </svg>
                      <span>Engineering & STEM Tools</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                        <ellipse cx="12" cy="5" rx="9" ry="3" />
                        <path d="M3 5V19A9 3 0 0 0 21 19V5" />
                        <path d="M3 12A9 3 0 0 0 21 12" />
                      </svg>
                      <span>Analytical & Data Software</span>
                    </div>
                  </div>
                </div>

                <!-- Contact / Work With Us -->
                <div class="px-4 py-4 border-b border-[#3A3A3A]">
                  <h4 class="text-xs font-medium text-gray-300 mb-3 font-['Bricolage_Grotesque',sans-serif]">Work With Us</h4>
                  <a href="mailto:hello@mayhemprojects.com" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif] transition-colors mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <rect width="20" height="16" x="2" y="4" rx="2" />
                      <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                    <span>hello@mayhemprojects.com</span>
                  </a>
                  <a href="https://mayhemprojects.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="10" />
                      <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                      <path d="M2 12h20" />
                    </svg>
                    <span>mayhemprojects.com</span>
                  </a>
                </div>

                <!-- Social Links -->
                <div class="px-4 py-4 border-b border-[#3A3A3A]">
                  <h4 class="text-xs font-medium text-gray-300 mb-3 font-['Bricolage_Grotesque',sans-serif]">Follow Mayhem Projects</h4>
                  <div class="grid grid-cols-2 gap-2">
                    <div class="flex flex-col gap-2">
                      <a href="https://instagram.com/mayhemprojects" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                          <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                        <span>Instagram</span>
                      </a>
                      <a href="https://twitter.com/mayhemprojects" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
                        </svg>
                        <span>X / Twitter</span>
                      </a>
                    </div>
                    <div class="flex flex-col gap-2">
                      <a href="https://github.com/mayhemprojects" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
                          <path d="M9 18c-4.51 2-5-2-7-2" />
                        </svg>
                        <span>GitHub</span>
                      </a>
                      <a href="https://linkedin.com/company/mayhemprojects" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                          <rect width="4" height="12" x="2" y="9" />
                          <circle cx="4" cy="4" r="2" />
                        </svg>
                        <span>LinkedIn</span>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- Footer -->
                <div class="px-4 py-3">
                  <div class="flex items-center justify-between text-xs text-gray-500 font-['Bricolage_Grotesque',sans-serif]">
                    <span>&copy; 2026 Mayhem Projects</span>
                    <span class="text-[10px] text-gray-600">Crafted with ♥</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>