<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Inicio" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" style="background-color: #08001b;">
        <img
            id="background"
            class="absolute top-0"
            src="https://framerusercontent.com/images/owl1Ry3nFCuIDLfRWz8DY6TZg.svg"
            style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center top;object-fit:contain"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#4169E1] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <svg
                            class="h-12 w-auto text-white lg:h-16 lg:text-[#4169E1]"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                        <defs
                            id="defs874" />
                            <path
                            opacity="0.5"
                            d="M20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z"
                            fill="#1C274C"
                            id="path866"
                            style="fill:#151D39;fill-opacity:1;opacity:1" />
                            <path
                                d="M17.7124 5.45331C18.7593 5.25995 19.7184 5.19444 20.5094 5.30066C21.2797 5.40411 22.0451 5.69443 22.4649 6.36546C22.9112 7.07875 22.7767 7.90702 22.4527 8.62306C22.1234 9.35067 21.5345 10.1218 20.7806 10.8912C19.2652 12.4379 16.9446 14.1173 14.1835 15.5883C11.4214 17.0599 8.68924 18.0721 6.49015 18.5079C5.39463 18.7249 4.39197 18.807 3.56745 18.709C2.76731 18.614 1.96779 18.3262 1.53503 17.6345C1.06423 16.882 1.23859 16.0043 1.60462 15.2551C1.97963 14.4875 2.63744 13.6693 3.47686 12.8522L4 12.4165C4 12.6349 4.08336 13.1257 4.16811 13.5624C4.21263 13.7918 4.25753 14.0062 4.29093 14.1584C3.6391 14.8237 3.19304 15.421 2.95236 15.9136C2.67513 16.481 2.74418 16.7391 2.80665 16.8389C2.87948 16.9553 3.1117 17.1443 3.74441 17.2195C4.35275 17.2918 5.18406 17.2375 6.1986 17.0365C8.21962 16.636 10.8118 15.685 13.4782 14.2644C16.1457 12.8433 18.3298 11.2493 19.7092 9.84143C20.4027 9.13359 20.8587 8.50726 21.0861 8.00467C21.3187 7.4905 21.2526 7.25586 21.1933 7.16105C21.1231 7.04882 20.9042 6.86715 20.3097 6.78731C19.7683 6.7146 19.0378 6.74602 18.1466 6.89948L16.8697 5.65597C17.2085 5.55454 17.5278 5.48526 17.7124 5.45331Z"
                                fill="#1C274C"
                                id="path868"
                                style="fill:#4169E1;fill-opacity:1" />
                            <g
                                aria-label="&lt;                &gt;"
                                transform="matrix(0.49224417,0.49224417,-1.0157561,1.0157561,0,0)"
                                id="text5900"
                                style="font-size:5.74598px;fill:#4169E1;stroke-width:0.0430949">
                                <path
                                d="M 11.337465,1.3284776 8.5177826,0.10240673 V -0.57656158 L 11.337465,-1.7970212 v 0.79961149 l -1.9667635,0.75191532 1.9667635,0.77997187 z"
                                style="-inkscape-font-specification:'Arial Bold'"
                                id="path20887" />
                                <path
                                d="M 37.41602,1.3312833 V 0.53728313 L 39.385589,-0.23707742 37.41602,-1.003021 v -0.7883888 l 2.822488,1.22045953 v 0.673357 z"
                                style="-inkscape-font-specification:'Arial Bold'"
                                id="path20889" />
                            </g>
                        </svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('principal')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#4169E1] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Principal
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#4169E1] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#4169E1] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <a
                            href="https://www.gitbook.com/"
                            id="docs-card"
                            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4169E1] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#4169E1]"
                        >
                            <div
                                id="screenshot-container"
                                class="relative flex w-full flex-1 items-stretch"
                            >
                                <img
                                    src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                    alt="Laravel documentation screenshot"
                                    class="aspect-video h-full w-full flex-1 rounded-[10px] object-cover object-top drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                    @error="handleImageError"
                                />
                                <img
                                    src="https://img.freepik.com/vetores-gratis/fluxo-de-design-de-codigo-binario_53876-97406.jpg?t=st=1729352187~exp=1729355787~hmac=ccf2be8a92adeaef6a5e01ae7b606dd4cb6ebae6e885bfeb104866aeff6350f1&w=1060"
                                    alt="Laravel documentation screenshot"
                                    class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-cover object-top drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                />
                                <div
                                    class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                ></div>
                            </div>

                            <div
                                class="relative flex items-center gap-6 lg:items-end"
                            >
                                <div
                                    id="docs-card-content"
                                    class="flex items-start gap-6 lg:flex-col"
                                >
                                    <div
                                        class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#4169E1]/10 sm:size-16"
                                    >
                                        <svg
                                            class="size-5 sm:size-6"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill="#4169E1"
                                                d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"
                                            />
                                            <path
                                                fill="#4169E1"
                                                d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"
                                            />
                                        </svg>
                                    </div>

                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2
                                            class="text-xl font-semibold text-black dark:text-white"
                                        >
                                            Documentação
                                        </h2>

                                        <p class="mt-4 text-sm/relaxed">
                                            Veja a documentação de nosso sistema aqui! Baseado em Laravel + Vue, e por ser um projeto open-source, o DevOrbit pode ser melhorado e publicado por você com simples comandos no terminal.
                                        </p>
                                    </div>
                                </div>

                                <svg
                                    class="size-6 shrink-0 stroke-[#4169E1]"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                    />
                                </svg>
                            </div>
                        </a>

                        <a
                            href="#"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4169E1] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#4169E1]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#4169E1]/10 sm:size-16"
                            >
                                <svg
                                    class="size-5 sm:size-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <g fill="#4169E1">
                                        <path
                                            d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"
                                        />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    Portal
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Esse projeto faz parte do curso de Projetos de Linguagens de programação em Ciências da Computação no Centro Universitário do Distrito Federal (UDF). O sistema conta com um portal que garante a integração com os demais projetos dos estudantes do curso.
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#4169E1]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>

                        <a
                            href="https://github.com/peterspbr/devorbit"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4169E1] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#4169E1]"
                            target="_blank"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#4169E1]/10 sm:size-16"
                            >
                                <svg
                                    class="size-5 sm:size-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <g fill="#4169E1">
                                        <path
                                            d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"
                                        />
                                        <path
                                            d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"
                                        />
                                        <path
                                            d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"
                                        />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    GitHub
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Acesse o código fonte do projeto aqui e faça seu próprio deploy em seu ambiente.
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#4169E1]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>

                        <a
                            href="https://novoportal.cruzeirodosul.edu.br/?empresa=udf&blackboard=false"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4169E1] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#4169E1]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#4169E1]/10 sm:size-16"
                            >
                                <svg
                                    class="size-5 sm:size-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <g fill="#4169E1">
                                        <path
                                            d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"
                                        />
                                        <path
                                            d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"
                                        />
                                        <path
                                            d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"
                                        />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    Área do Aluno
                                </h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Acesse a área do aluno!
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#4169E1]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>
                    </div>

                    <hr class="my-5" style="border-top: 2px solid #4169E1;">

                    <h1 style="font-size: 32px; color: white;"><strong>O que é o DevOrbit?</strong></h1>
                    <p>O <strong style="color: #4169E1">DevOrbit</strong> é uma plataforma convergente, integrando funcionalidades de blog e fórum em um ecossistema auto-sustentável, projetado para promover a inteligência coletiva dentro da instituição. Operando sob um modelo de governança colaborativa, os discentes desempenham um papel central na curadoria do conteúdo, garantindo a acurácia e relevância das informações por meio de um sistema de votação meritocrático. A estrutura do <strong style="color: #4169E1">DevOrbit</strong> permite a iteração contínua dos posts, onde os alunos, além de poderem endossar os conteúdos mais valiosos, também são habilitados a realizar contribuições e modificações, garantindo um fluxo orgânico de conhecimento em múltiplas frentes temáticas.</p>

                    <h1 style="font-size: 32px; color: white;" class="mt-5"><strong>Como começar?</strong></h1>
                    <p>Para iniciar sua imersão no DevOrbit, é necessário realizar o processo de cadastramento, fornecendo um nome e RGM devidamente válidos. Apenas após essa autenticação inicial será possível desbloquear o acesso à plataforma, assegurando a integridade do sistema e garantindo uma experiência exclusiva e personalizada.</p>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    Copyright © 2024 | UDF
                </footer>
            </div>
        </div>
    </div>
</template>
