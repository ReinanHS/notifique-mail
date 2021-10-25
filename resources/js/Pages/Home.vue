<template>
    <div>
        <div class="relative min-h-screen  grid bg-black ">
            <div
                class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 ">
                <div
                    class="relative sm:w-1/2 xl:w-3/5 bg-blue-500 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden  text-white bg-no-repeat bg-cover relative"
                    style="background-image: url(https://cdn.pixabay.com/photo/2021/10/07/19/58/train-6689688_960_720.jpg);">
                    <div class="absolute bg-black  opacity-25 inset-0 z-0"></div>
                    <div class="w-full  lg:max-w-2xl md:max-w-md z-10 items-center text-center ">
                        <div class=" font-bold leading-tight mb-6 mx-auto w-full content-center items-center"></div>
                    </div>
                </div>
                <div
                    class="md:flex md:items-center md:justify-left w-full sm:w-auto md:h-full xl:w-1/2 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none "
                >
                    <div class="max-w-xl w-full space-y-12">
                        <div class="lg:text-left text-center">
                            <h2 class="mt-6  font-bold text-gray-100">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto"><path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"></path><path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"></path></svg>
                            </h2>
                            <h2 class="mt-6 text-7xl font-bold text-gray-100">
                                Seja notificado de várias maneiras!
                            </h2>
                            <p class="mt-10 text-4xl text-gray-200">Junte-se ao Notifique Mail hoje.</p>
                        </div>
                        <div class="flex flex-row justify-center items-center space-x-3"></div>

                        <Link v-if="$page.props.user" :href="route('dashboard.index')"
                              class="lg:w-3/5 w-full flex justify-center text-gray-100 p-4   rounded-full tracking-wide font-bold  focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg bg-indigo-600 cursor-pointer transition ease-in duration-300">
                            Dashboard
                        </Link>
                        <template v-else>
                            <div>
                                <Link v-if="canRegister" :href="route('register')"
                                      class="lg:w-3/5 w-full flex justify-center text-gray-100 p-4   rounded-full tracking-wide font-bold  focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg bg-indigo-600 cursor-pointer transition ease-in duration-300">
                                    Inscrever-se
                                </Link>
                            </div>
                            <div>
                                <Link :href="route('login')"
                                      class="lg:w-3/5 w-full flex justify-center border-indigo-600 bg-transparent text-gray-100 p-4 border rounded-full tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-gray-900 shadow-lg cursor-pointer transition ease-in duration-300">
                                    Conecte-se
                                </Link>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    name: "Home",
    components: {
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    }
}
</script>

<style scoped>

</style>
