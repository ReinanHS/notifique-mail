<template>
    <main class="flex w-full h-full shadow-lg rounded-3xl box-height">
        <section class="flex flex-col pt-3 w-5/12 bg-gray-50 h-full overflow-y-scroll max-h-full">
            <label class="px-3">
                <input class="rounded-lg p-4 bg-gray-100 transition duration-200 focus:outline-none focus:ring-2 w-full"
                       v-model="search"
                       placeholder="Procurar..."/>
            </label>

            <ul class="mt-6">
                <li class="py-5 border-b px-3"
                    v-for="(mail, index) in mailbox"
                    :key="mail.id"
                    :class="(mailContent && mailContent.mail_box.id === mail.id) ? 'bg-indigo-600 text-white' : 'transition hover:bg-indigo-100'"
                    @click="onClickInBox(mail.id)"
                    >
                    <a href="#" class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">{{ mail.user_mail_from.name }}</h3>
                        <div class="flex flex-col items-end ">
                            <p class="text-md text-gray-400">{{ this.fromatDate(mail.created_at) }}</p>
                            <span class="mt-1 w-2 h-2 bg-blue-400 rounded-full"></span>
                        </div>
                    </a>
                    <div v-show="mail.is_read === false" class="text-md italic text-gray-400">{{ mail.subject }}</div>
                </li>
            </ul>
        </section>
        <section v-if="mailContent" class="w-7/12 px-4 flex flex-col bg-white rounded-r-3xl overflow-y-scroll max-h-full">
            <div class="flex justify-between items-center min-box-user border-b-2 mb-8">
                <div class="flex space-x-4 items-center">
                    <div class="h-12 w-12 rounded-full overflow-hidden">
                        <img :src="mailContent.mail_box.user_mail_from.profile_photo_path" loading="lazy" class="h-full w-full object-cover"/>
                    </div>
                    <div class="flex flex-col">
                        <h3 class="font-semibold text-lg">{{ mailContent.mail_box.user_mail_from.name  }}</h3>
                        <p class="text-light text-gray-400">{{ mailContent.mail_box.user_mail_from.email }}</p>
                    </div>
                </div>
                <div>
                    <ul class="flex text-gray-400 space-x-4">
                        <li class="w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                            </svg>
                        </li>
                        <li class="w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </li>

                        <li class="w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                        </li>
                        <li class="w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </li>
                        <li class="w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <section>
                <h1 class="font-bold text-2xl">{{ mailContent.mail_box.subject }}</h1>
                <article class="mt-8 text-gray-500 leading-7 tracking-wider">
                    <iframe
                        :src="mailContent.iframe_src"
                        sandbox
                        type="application/html"
                    ></iframe>
                </article>
                <ul class="flex space-x-4 mt-12">
                    <li v-for="(attachment, index) in mailContent.attachments" :key="index"
                        class="w-10 h-10 border rounded-lg p-1 cursor-pointer transition duration-200 text-indigo-600 hover:bg-blue-100">
                        <a :href="attachment.file_path">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                      d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </section>
            <section class="mt-6 border rounded-xl bg-gray-50 mb-3">
                <textarea class="w-full bg-gray-50 p-2 rounded-xl"
                          placeholder="Digite sua resposta aqui..."
                          rows="3"></textarea>
                <div class="flex items-center justify-between p-2">
                    <button class="h-6 w-6 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                        </svg>
                    </button>
                    <button class="bg-purple-600 text-white px-6 py-2 rounded-xl">Responder</button>
                </div>
            </section>
        </section>
    </main>
</template>

<script>
import moment from "moment";

export default {
    name: "Inbox",
    data() {
        return {
            search: "",
            mailbox: [],
            mailContent: null,
            paginationLinks: [],
        }
    },
    methods: {
        fromatDate(value) {
            return moment(value).calendar()
        },
        onClickInBox(mailId) {
            this.mailContent = null;

            axios.get(route('api.mail.show', mailId)).then(response => {
                const mailResponse = response.data;
                this.mailContent = mailResponse.data;
            })
        },
    },
    mounted() {
        axios.get(route('api.mail.mailbox.my')).then(response => {
            const mailboxResponse = response.data
            this.mailbox = mailboxResponse.data
            this.paginationLinks = mailboxResponse.links
        })
    }
}
</script>

<style scoped>
.box-height {
    height: 45rem;
}
.min-box-user {
    min-height: 8rem;
}
iframe {
    border: none;
    width: 100%;
    min-height: 20rem;
}
</style>
