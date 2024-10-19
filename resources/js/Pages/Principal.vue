<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Página principal" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Página principal - DevOrbit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800" >
                    <div class="mx-auto max-w-7xl p-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Blogs recentes</h2>
                            <p class="mt-2 text-lg leading-8 text-gray-400">Veja o que os demais alunos estão postando!</p>
                        </div>
                        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <article v-for="post in posts" :key="post.id" class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time :datetime="post.datetime" class="text-gray-500">{{ post.date }}</time>
                                <a :href="post.category.href" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ post.category.title }}</a>
                            </div>
                            <dl class="py-2">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Relevância</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 me-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" :style="{ width: post.relevance * 10 + '%' }"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ post.relevance }}</span>
                                </dd>
                            </dl>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-white group-hover:text-gray-600">
                                <a :href="post.href">
                                    <span class="absolute inset-0" />
                                    {{ post.title }}
                                </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ post.description }}</p>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4">
                                <img :src="post.author.imageUrl" alt="" class="h-10 w-10 rounded-full bg-gray-50" />
                                <div class="text-sm leading-6">
                                <p class="font-semibold text-white">
                                    <a :href="post.author.href">
                                    <span class="absolute inset-0" />
                                    {{ post.author.name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">{{ post.author.role }}</p>
                                </div>
                            </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
const posts = [
  {
    id: 1,
    title: 'Criptografia avançada com Fully Homomorphic Encryption (FHE)',
    href: `posts/${1}`,
    relevance: 10,
    description:
      'Nos dias de hoje, a privacidade digital emergiu como uma preocupação significativa. A enorme quantidade de dados gerados diariamente acarreta uma responsabilidade proporcionalmente maior de assegurar a segurança dessas informações. Nesse contexto, a criptografia se destaca como a forma mais eficaz de proteger os dados.',
    date: '19/10/2024',
    datetime: '2024-10-19',
    category: { title: 'Criptografia', href: '#' },
    author: {
      name: 'Pedro Henrique Soares',
      role: 'Ciências da Computação',
      href: '#',
      imageUrl:
        'https://i.pinimg.com/736x/0f/03/c8/0f03c831b6216e5fd0d378dea9e26c85.jpg',
    },
  },
  {
    id: 2,
    title: 'Recomandações de animes voltados ao tema de tecnologia',
    href: `posts/${2}`,
    relevance: 8,
    description:
      'LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN LAIN',
    date: '20/03/2024',
    datetime: '2024-03-20',
    category: { title: 'Mídia', href: '#' },
    author: {
      name: 'Pedro Henrique Soares',
      role: 'Ciências da Computação',
      href: '#',
      imageUrl:
        'https://i.pinimg.com/736x/0f/03/c8/0f03c831b6216e5fd0d378dea9e26c85.jpg',
    },
  },
  {
    id: 3,
    title: 'Como fazer café sem sair do computador',
    href: `posts/${3}`,
    relevance: 9,
    description:
      'Aprenda a fazer seu próprio café sem sair do computador!!! Café é bom, mas sair da cadeira não é! E como bons sedentários, queremos café sem sair da frente do PC! É por isso que decidi trazer esse post de como construir um sistema inovador usando um ESP32 e uma cafeteira para integrar seu computador com a cafeteira e servir café sem precisar se levantar!',
    date: '14/02/2024',
    datetime: '2024-02-14',
    category: { title: 'Diversos', href: '#' },
    author: {
      name: 'Wesley Ferreira Santos',
      role: 'Ciências da Computação',
      href: '#',
      imageUrl:
        'https://i.ytimg.com/vi/W1dRBWyf6z8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCaCwJ5PC0JfPMhAIiJenfkD-F5Zg',
    },
  },
  {
    id: 4,
    title: 'Como programar em HTML',
    href: `posts/${4}`,
    relevance: 1,
    description:
      'Aprenda como programar em HTML.',
    date: '14/02/2024',
    datetime: '2024-02-14',
    category: { title: 'Programação', href: '#' },
    author: {
      name: 'Criança do 1 semestre',
      role: 'Administração e desenvolvimento de sistemas',
      href: '#',
      imageUrl:
        'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2022/09/barneys-documentario-e1664478705327.jpg?w=1200&h=1200&crop=1',
    },
  },
  {
    id: 5,
    title: 'Como baixar Minecraft pirata',
    href: `posts/${5}`,
    relevance: 0,
    description:
      'Como bixar Minecraft pirata',
    date: '14/02/2024',
    datetime: '2024-02-14',
    category: { title: 'Diversos', href: '#' },
    author: {
      name: 'Criança do 1 semestre',
      role: 'Administração e desenvolvimento de sistemas',
      href: '#',
      imageUrl:
        'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2022/09/barneys-documentario-e1664478705327.jpg?w=1200&h=1200&crop=1',
    },
  },
]
</script>