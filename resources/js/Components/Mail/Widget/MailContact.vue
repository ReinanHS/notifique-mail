<template>
    <!-- Web3Forms Popup Widget Starts here -->
    <div id="web3forms__widget">
        <!-- x-init is only for demo purpose. you may remove it.  -->
        <div
            id="w3f__widget--content"
            v-show="is_open"
            class="fixed flex flex-col z-50 bottom-[100px] top-0 right-0 h-auto left-0 sm:top-auto sm:right-5 sm:left-auto h-[calc(100%-95px)] w-full sm:w-[550px] overflow-auto min-h-[250px] sm:h-[600px] border border-gray-300 bg-white shadow-2xl rounded-md"
        >
            <div class="bg-gray-50 flex-grow p-6">

                <form class="needs-validation" @submit.prevent.capture="sendEmail">
                    <div class="mb-4">
                        <SelectMailAddress :data="users"
                                           :value="selectedUser"
                                           v-on:valueSelect="onValueSelect">
                            <template v-slot:SelectLabel>Selecione uma pessoa</template>
                        </SelectMailAddress>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Endereço de
                            e-mail</label>
                        <input
                            v-model="form.email"
                            type="email"
                            name="email"
                            id="email"
                            placeholder="reinan@mail.reinanhs.com"
                            required
                            disabled
                            class="w-full px-3 py-2 bg-white placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                        />
                        <div class="empty-feedback text-red-400 text-sm mt-1">
                            Por favor, forneça seu endereço de e-mail.
                        </div>
                        <div class="invalid-feedback text-red-400 text-sm mt-1">
                            Por favor, forneça um endereço de e-mail válido.
                        </div>
                    </div>

                    <div class="mb-4">
                        <QuillEditor theme="snow"
                                     v-model:content="form.content"
                                     contentType="html"
                                     placeholder="Escreva o conteúdo do email aqui" />
                        <div v-show="error.content" class="text-red-400 text-sm mt-1">{{ error.content }}</div>
                    </div>

                    <div class="mb-3">
                        <button type="submit"
                                class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                            Enviar mensagem
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <button
            id="w3f__widget--btn"
            @click="() => { is_open = !is_open }"
            class="fixed z-40 right-5 bottom-5 shadow-lg flex justify-center items-center w-14 h-14 bg-indigo-500 rounded-full focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 transition duration-300 ease"
        >
            <svg
                class="w-6 h-6 text-white absolute"
                v-show="!is_open"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path
                    d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                ></path>
            </svg>

            <svg
                class="w-6 h-6 text-white absolute"
                v-show="is_open"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
</template>

<script>
import SelectMailAddress from "./SelectMailAddress";
import { QuillEditor } from '@vueup/vue-quill'

export default {
    name: "MailContact",
    components: {SelectMailAddress, QuillEditor},
    data() {
        return {
            is_open: false,
            form: {
                email: '',
                content: '<br><br><br><br><br><br><br><br><br><br><br>',
            },
            error: {
                content: null,
            },
            selectedUser: null,
            users: [],
        }
    },
    methods: {
        sendEmail() {
            if(!this.validationContent()){
                this.error.content = 'O conteúdo do seu e-mail não é válido';
                return null;
            }


        },
        validationContent() {
            let html = this.form.content;
            let div = document.createElement("div");
            div.innerHTML = html;
            let text = div.textContent || div.innerText || "";

            return text.length > 15;
        },
        onValueSelect(value) {
            this.selectedUser = value;
            this.form.email = value.email;
        },
    },
    mounted() {
        axios.get(route('api.user.index')).then(response => {
           const userResponse = response.data;
           this.users = userResponse.data;
           this.selectedUser = userResponse.data[0];
           this.form.email = this.selectedUser.email;
        });
    }
}
</script>

<style scoped>
.invalid-feedback,
.empty-feedback {
    display: none;
}

.was-validated :placeholder-shown:invalid ~ .empty-feedback {
    display: block;
}

.was-validated :not(:placeholder-shown):invalid ~ .invalid-feedback {
    display: block;
}

.is-invalid,
.was-validated :invalid {
    border-color: #dc3545;
}

.is-invalid,
.was-validated :invalid:focus {
    --tw-ring-color: rgba(220, 53, 69, 0.2);
}
</style>
