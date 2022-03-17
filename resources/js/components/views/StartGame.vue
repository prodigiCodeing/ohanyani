<template>
    <div>
        <div class="flex start-flex min-h-560 overflow-hidden  full">
            <div class="flex flex-col w-60p justify-center pl-50 w-full-800">
                <div class="text-72 guess mb-50">Գուշակի՛ր կենացը</div>
                <div class="description mb-50">Անցիր թեստը ու պարզիր, թե ինչքան կենացագետ ես դու</div>
                <div class="w-full">
                    <button class="rounded-5 start-game start-page" v-on:click="checkLoginState">Սկսել Խաղը</button>
                </div>
            </div>
            <div class="w-40p flex items-start mt-50  justify-end game ">
                <img class="mt-100 cupple_1" src="/images/cupple2.png" alt="cupple_1" width="220">
                <img class="cupple_2" src="/images/cupple1.png" alt="cupple_1" width="220">
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
export default {
    name: "StartGame",
    methods:{
        startGame(){
            this.$router.push('/start-game');
        },
        checkLoginState() {
            this.$router.push('/start-game');
             // window.location.href = "/facebook/auth";
        }
    }
}
</script>
<style scoped>
</style>
