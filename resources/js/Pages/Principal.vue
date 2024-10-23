<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Swal from 'sweetalert2';
import axios from 'axios';

const isModalOpen = ref(false);
const isViewModalOpen = ref(false);
const isEditModalOpen = ref(false);
const editPost = ref({});
const selectedPost = ref({});
const form = useForm({
  title: '',
  description: '',
  category: '',
});

const openModal = () => {
  isModalOpen.value = true;
};

const closeModal = () => {
  isModalOpen.value = false;
};

const openEditModal = (post) => {
  editPost.value = { ...post };
  isEditModalOpen.value = true;
};

const closeEditModal = () => {
  isEditModalOpen.value = false;
};

const openViewModal = (post) => {
  selectedPost.value = { ...post };
  isViewModalOpen.value = true;
}

const closeViewModal = () => {
  isViewModalOpen.value = false;
};


const submitPost = () => {
  form.post(route('posts.store'), {
    onSuccess: () => {
      Swal.fire({
        icon: 'success',
        title: 'Post criado!',
        text: 'Seu post foi criado com sucesso.',
        background: '#1e1e2f',
        color: '#ffffff',
        iconColor: '#00b894',
        confirmButtonColor: '#00b894',
        confirmButtonText: 'OK',
      });

      closeModal();
    },
  });
};

const submitEditPost = async () => {
  try {
    const response = await axios.put(`/posts/${editPost.value.id}`, editPost.value);

    const index = props.posts.findIndex(post => post.id === editPost.value.id);
    if (index !== -1) {
      props.posts[index] = response.data;
    }


    console.log(props.posts);
    Swal.fire({
      icon: 'success',
      title: 'Post atualizado!',
      text: 'Seu post foi atualizado com sucesso.',
      background: '#1e1e2f',
      color: '#ffffff',
      iconColor: '#00b894',
      confirmButtonColor: '#00b894',
      confirmButtonText: 'OK',
    });

    closeEditModal();
  } catch (error) {
    console.error('Erro ao editar o post:', error);
    Swal.fire({
      title: 'Erro!',
      text: 'Erro ao atualizar o post. Tente novamente.',
      icon: 'error',
      background: '#1e1e2f',
      color: '#ffffff',
      iconColor: '#e63946',
      confirmButtonColor: '#00b894',
      confirmButtonText: 'OK',
    });

  }
};

const incrementRelevance = async (post) => {
  try {
    const response = await axios.post(`/posts/${post.id}/increment-relevance`);
    post.relevance = response.data.relevance;
    Swal.fire({
      title: 'Sucesso!',
      text: response.data.message,
      icon: 'success',
      background: '#1e1e2f',
      color: '#ffffff',
      iconColor: '#00b894',
      confirmButtonColor: '#00b894',
      confirmButtonText: 'OK',
      timer: 2000,
      timerProgressBar: true,
    });

  } catch (error) {
    console.error('Erro ao incrementar a relevância:', error);
    Swal.fire({
      title: 'Erro!',
      text: 'Erro ao incrementar a relevância. Tente novamente.',
      icon: 'error',
      background: '#1e1e2f',
      color: '#ffffff',
      iconColor: '#e63946',
      confirmButtonColor: '#00b894',
      confirmButtonText: 'OK',
    });

  }
};

const deletePost = async (postId) => {
  const confirmation = await Swal.fire({
    title: 'Tem certeza?',
    text: 'Você não poderá reverter isso!',
    icon: 'warning',
    background: '#1e1e2f',  
    color: '#ffffff',  
    iconColor: '#f6c343',
    showCancelButton: true,
    confirmButtonColor: '#d33', 
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Cancelar',
  });

  if (confirmation.isConfirmed) {
    try {
      await axios.delete(`/posts/${postId}`);
      const index = props.posts.findIndex(post => post.id === postId);
      if (index !== -1) {
        props.posts.splice(index, 1);
      }
      Swal.fire({
        title: 'Excluído!',
        text: 'Seu post foi excluído com sucesso.',
        icon: 'success',
        background: '#1e1e2f',
        color: '#ffffff',
        iconColor: '#00b894',
        confirmButtonColor: '#00b894',
      });
    } catch (error) {
      console.error('Erro ao excluir o post:', error);
      Swal.fire({
        title: 'Erro!',
        text: 'Ocorreu um erro ao excluir o post.',
        icon: 'error',
        background: '#1e1e2f',
        color: '#ffffff',
        iconColor: '#e63946', // Cor do ícone de erro
        confirmButtonColor: '#00b894', // Cor do botão
        confirmButtonText: 'OK',
      });

    }
  }
};

const formatDate = (dateString) => {
    const options = {
      year: 'numeric',
      month: '2-digit',
      day: '2-digit',
      hour: '2-digit',
      minute: '2-digit',
      hour12: false,
    };
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('pt-BR', options).format(date);
  }


const props = defineProps({
  posts: {
    type: Array,
    required: true,
  },
});
</script>


<template>

  <Head title="Página principal" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-white">
        Página principal - DevOrbit
      </h2>
      <button @click="openModal"
        class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 my-5 rounded transition duration-200">
        Criar Post
      </button>
    </template>

    <div v-if="isModalOpen" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
      <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg mx-4">
        <h2 class="text-lg font-bold mb-4 text-center text-white">Cadastrar novo post</h2>
        <form @submit.prevent="submitPost">
          <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-300">Título</label>
            <input v-model="form.title" type="text" id="title"
              class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 p-2 text-white"
              required />
          </div>

          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300">Descrição</label>
            <textarea v-model="form.description" id="description" rows="4"
              class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 p-2 text-white"
              required></textarea>
          </div>

          <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-300">Categoria</label>
            <input v-model="form.category" type="text" id="category"
              class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 p-2 text-white"
              required />
          </div>

          <div class="flex justify-end">
            <button type="submit"
              class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded transition duration-200">Salvar</button>
            <button type="button" @click="closeModal"
              class="ml-4 bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition duration-200">Cancelar</button>
          </div>
        </form>
      </div>
    </div>

    <transition name="modal">
      <div v-if="isEditModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50">
        <div class="bg-gray-800 rounded-lg shadow-lg w-11/12 md:w-1/3 p-6">
          <h3 class="text-lg font-semibold mb-4 text-white">Editar Post</h3>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Título</label>
            <input v-model="editPost.title" placeholder="Título"
              class="bg-gray-700 border border-gray-600 rounded-md p-2 w-full text-white" />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Descrição</label>
            <textarea v-model="editPost.description" placeholder="Descrição"
              class="bg-gray-700 border border-gray-600 rounded-md p-2 w-full text-white"></textarea>
          </div>
          <div class="flex justify-end space-x-2">
            <button @click="submitEditPost"
              class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded transition duration-200">Salvar</button>
            <button @click="closeEditModal"
              class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition duration-200">Cancelar</button>
          </div>
        </div>
      </div>
    </transition>


    <transition name="modal">
      <div v-if="isViewModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50">
        <div class="bg-gray-800 rounded-lg shadow-lg w-11/12 max-w-lg p-6 mx-auto">
          <h3 class="text-lg font-semibold mb-4 text-white">{{ selectedPost.title }}</h3>
          <div class="max-h-60 overflow-y-auto mb-4">
            <p class="text-gray-300">{{ selectedPost.description }}</p>
          </div>
          <div class="flex justify-end space-x-2">
            <button @click="closeViewModal"
              class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded transition duration-200">Fechar</button>
          </div>
        </div>
      </div>
    </transition>





    <div class="py-12 bg-gray-900">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-gray-800 shadow-sm sm:rounded-lg">
          <div class="mx-auto max-w-7xl p-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
              <h2 class="text-3xl font-bold tracking-tight text-white">Blogs recentes</h2>
              <p class="mt-2 text-lg leading-8 text-gray-400">Veja o que os demais alunos estão postando!</p>
            </div>
            <div
              class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-600 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
              <article v-for="post in posts" :key="post.id"
                class="flex max-w-xl flex-col items-start justify-between border border-gray-600 rounded-lg p-4 transition-transform transform hover:scale-105 hover:shadow-lg bg-gray-700">
                <div class="flex items-center gap-x-4 text-xs">
                  <time :datetime="post.datetime" class="text-gray-400">{{ formatDate(post.created_at) }}</time>
                  <a :href="post.category.href"
                    class="relative z-10 rounded-full bg-gray-600 px-3 py-1.5 font-medium text-gray-200 hover:bg-gray-500">
                    {{ post.category }}
                  </a>
                </div>

                <div class="flex justify-between w-full items-center mt-3">
                  <h3 class="text-lg font-semibold leading-6 text-white group-hover:text-gray-200"
                    @click.prevent="openViewModal(post)">
                    <a :href="post.href">{{ post.title }}</a>
                  </h3>
                  <button @click.prevent="incrementRelevance(post)"
                    class="ml-2 bg-green-600 hover:bg-green-500 text-white px-2 py-1 rounded transition duration-200"
                    title="Adicionar relevância">
                    Curtir
                  </button>
                </div>

                <div class="mb-3">
                  <dl class="py-2">
                    <dt class="text-sm font-medium text-gray-400">Relevância</dt>
                    <dd class="flex items-center mb-3">
                      <div class="w-full bg-gray-600 rounded h-2.5 me-2">
                        <div class="bg-blue-600 h-2.5 rounded" :style="{ width: post.relevance * 10 + '%' }"></div>
                      </div>
                      <span class="text-sm font-medium text-gray-400"><b>{{ post.relevance }}</b></span>
                    </dd>
                  </dl>
                </div>

                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-300">{{ post.description }}</p>
                <div class="relative mt-8 flex items-center gap-x-4">
                  <div class="text-sm leading-6">
                    <p class="font-semibold text-white">
                      <a class="hover:underline">{{ post.user.name }}</a>
                    </p>
                    <!-- Botões de Editar e Excluir -->
                    <div class="flex mt-2">
                      <button @click.prevent="openEditModal(post)"
                        class="bg-blue-600 hover:bg-blue-500 text-white px-2 py-1 rounded transition duration-200"
                        title="Editar post">
                        Editar
                      </button>
                      <button @click.prevent="deletePost(post.id)"
                        class="ml-2 bg-red-600 hover:bg-red-500 text-white px-2 py-1 rounded transition duration-200"
                        title="Excluir post">
                        Excluir
                      </button>
                    </div>
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
<style scoped>
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.5s;
}

.modal-enter,
.modal-leave-to

/* .modal-leave-active in <2.1.8 */
  {
  opacity: 0;
}
</style>