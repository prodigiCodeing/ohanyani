<template>
    <div class="height-full">
        <div class="flex min-h-560 overflow-hidden relative height-full">
            <div class="flex flex-col  justify-start pl-unset-for-mobile pl-50 ">
               <div class="relative">
                   <img class="mt-50 width-for-text" src="/images/shape.png" alt="personage" width="600">
                   <div class="absolute top-100 left-0 py-20 px-30 start-text">
                       Մեզ արդեն հասել են քո կենացների մասին պատմությունները: Ասում են՝ շրջապատումդ քեզնից ուժեղ թամադա չկա: Եկել ենք ստուգելու՝ իրո՞ք այդքան լավ գիտես հայկական կենացները:<br/>
                        Անցի՛ր թեստը, տեսնենք՝ քանի՞ ճիշտ պատասխան կտաս։
                       <br>
                        Պատրա՞ստ ես։ Սկսեցինք։
                   </div>
               </div>
                <div class="w-ful mt-100 for-desktop">
                    <button class="rounded-5 start-game start-page-2" v-on:click="startGame" >Դե գնացինք</button>
                </div>
            </div>
            <div class=" flex items-end mt-50 img-right  justify-end absolute bottom-0 right-50 h-full-mobile">
                <img class="mt-100 personage-game for-desktop" src="/images/personage.png" alt="personage" width="600">
                <img class="personage-game   for-mobile per-get-start" src="/images/personage-mobile.png" alt="personage" width="300">
            </div>
        </div>
        <div class="for-mobile-2">
            <button class="rounded-5 start-game start-page-2" v-on:click="startGame" >Դե գնացինք</button>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
export default {
    name: "Index",
    methods:{
        startGame(){
            this.$router.push('/game');
        },
    }
}
</script>

<style scoped>

</style>
