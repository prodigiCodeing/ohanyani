<template>
    <div class=" min-h-560 overflow-hidden relative ">
        <div :class="['relative  min-h-560 ', questions[currentQuestion].answered ? 'blure-custom' : '' ]" v-if="(currentQuestion != firstMiniStep || passFirstMini) && (currentQuestion != secondMiniStep || passSecondMini)">
            <div class="flex  w-full justify-between px-50 pt-30">
                <div class="answer">Հարց <span class="text-textDefault">{{ currentQuestion + 1 }}</span></div>
                <div class="flex justify-end">
                    <div v-for="n in cupCount" class="mx-5"><img src="/images/cup1.png" width="20" alt=""></div>
                </div>
            </div>
            <div class="flex  w-full justify-between px-150 pt-50 text-center answer">
                {{ questions[currentQuestion].question }}
            </div>
            <div class="flex  w-full justify-between px-150 pt-50 text-center flex-wrap">
                <button class="rounded-5 w-40p bg-white text-black px-30 py-10 text"
                        v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[0].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 0 && !questions[currentQuestion].answers[0].isRight }]"
                        v-on:click="()=>checkAnswer(0)" :disabled="questions[currentQuestion].answered">
                    {{ questions[currentQuestion].answers[0].answer }}
                </button>
                <button class="rounded-5 w-40p bg-white text-black px-30 py-10 text"
                        v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[1].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 1 && !questions[currentQuestion].answers[1].isRight }]"
                        v-on:click="()=>checkAnswer(1)" :disabled="questions[currentQuestion].answered">
                    {{ questions[currentQuestion].answers[1].answer }}
                </button>
                <button class="rounded-5 w-40p bg-white  text-black px-30 py-10 mt-30 text"
                        v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[2].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 2 && !questions[currentQuestion].answers[2].isRight }]"
                        v-on:click="()=>checkAnswer(2)" :disabled="questions[currentQuestion].answered">
                    {{ questions[currentQuestion].answers[2].answer }}
                </button>
                <button class="rounded-5 w-40p bg-white text-black px-30 py-10 mt-30 text"
                        v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[3].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 3 && !questions[currentQuestion].answers[3].isRight }]"
                        v-on:click="()=>checkAnswer(3)" :disabled="questions[currentQuestion].answered">
                    {{ questions[currentQuestion].answers[3].answer }}
                </button>
            </div>
        </div>
        <div v-if="currentQuestion == firstMiniStep" class=" min-h-560  relative overflow-hidden ">
            <p class="absolute heading-text">Կենացով շնորհավորի՛ր կանանց տոների կապակցությամբ</p>
            <img class="absolute top-30 right-150 z-200" src="/images/first-mini.png" width="400" alt="">
            <textarea class="notes" v-model="firstMiniAnswer"></textarea>
            <div class="flex px-50 absolute bottom-60 w-70p items-center">
                <div class="w-40p">
                    <button class="rounded-5 start-game start-send w-full" :disabled="firstMiniAnswer == '' " v-on:click="sendFirstEmail">Ողղարկել</button>
                </div>
                <div class="w-60p  pr-60">
                    <p class="desc pr-20">Ամենալավ կենաց ասողը, կստանա  նվեր Ohanyan Brandy-ի կողմից</p>
                </div>
            </div>
        </div>
        <div v-if="currentQuestion == secondMiniStep" class=" min-h-560 relative">

        </div>
        <div class="absolute min-h-560 bottom-0 z-200 right-150 flex items-end"
             v-if="questions[currentQuestion].answered">
            <img src="/images/motivi.png" width="95%" class="" alt="">
            <p class="absolute top-150 w-60p pl-30 motivi">
                {{ isRight ? motiviQuotesRight[motiviQountForRightAnswer].quote : motiviQuotesWrong[motiviQountForWrongAnswer].quote }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "Game",
    data: function () {
        return {
            questions: [
                {
                    question: "Ո՞րն է հայկական խնջույքի առաջին պարտադիր կենացը.",
                    answers: [
                        {answer: "առիթի շնորհավորանքը", isRight: false},
                        {answer: "առիթատիրոջ կենացը", isRight: false},
                        {answer: "օջախի կենացը", isRight: false},
                        {answer: "«բարով տեսանք» կենացը", isRight: true}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Ի՞նչ խմիչքով չի կարելի կենաց խմել.",
                    answers: [
                        {answer: "վիսկիով", isRight: false},
                        {answer: "գարեջրով", isRight: false},
                        {answer: "ջրով", isRight: true},
                        {answer: "տեկիլայով", isRight: false}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Ո՞րն է հաջորդում ծնողների կենացին.",
                    answers: [
                        {answer: "քույրերի և եղբայրների կենացը", isRight: false},
                        {answer: "տատիկների և պապիկների կենացը", isRight: true},
                        {answer: "քավորի կենացը", isRight: false},
                        {answer: "օջախի կենացը", isRight: false}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Ո՞րն է հաջորդում ծնողների կենացին.",
                    answers: [
                        {answer: "վերջին անգամ ամուսնանաք", isRight: false},
                        {answer: "քավորին լսող լինեք", isRight: false},
                        {answer: "երբեք չբաժանվեք", isRight: false},
                        {answer: "մի բարձի ծերանաք", isRight: true}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Ի՞նչ ի նկատի ունեն, երբ կենացի ժամանակ ասում են՝ «յոթ որդով սեղան նստեք» ",
                    answers: [
                        {answer: "բոլորը պետք է յոթ զավակ ունենան", isRight: false},
                        {answer: "մաղթում են շատ զավակներ ունենալ և անբաժան լինել նրանցից", isRight: true},
                        {answer: "հուշում են, որ պետք է մեծ սեղան գնել", isRight: false},
                        {answer: "պետք է միայն արու զավակների հետ սեղան նստել", isRight: false}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Շարունակի՛ր կենացի միտքը. «Այս փոքր բաժակով, բայց...»",
                    answers: [
                        {answer: "ուժեղ կամքով", isRight: false},
                        {answer: "շատ սիրով", isRight: false},
                        {answer: "մեծ սրտով", isRight: true},
                        {answer: "թունդ խմիչքով", isRight: false}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Ի՞նչ կենաց է պետք ասել, եթե այլ բան մտքիդ չի գալիս.",
                    answers: [
                        {answer: "լավ լինենք", isRight: false},
                        {answer: "անուշ խմենք", isRight: false},
                        {answer: "պետք է լռել", isRight: false},
                        {answer: "ողջ-առողջ", isRight: true}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Ի՞նչ են բացականչում հերթական բաժակը խմելուց առաջ՝ կենացից անմիջապես հետո",
                    answers: [
                        {answer: "վա՜խ", isRight: false},
                        {answer: "ա՜յ քեզ բան", isRight: false},
                        {answer: "է՛հ", isRight: true},
                        {answer: "պա՜հո", isRight: false}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Կենացների ժամանակ սեղանակիցներն իրենց բաժակներն իրար են խփում: Իսկ ինչպե՞ս են հայերը կենաց ասում չխմողին, օրինակ՝ երեխային",
                    answers: [
                        {answer: "ստիպում են խմել գոնե մեկ բաժակ", isRight: false},
                        {answer: "բաժակով խփում են ափսեին", isRight: false},
                        {answer: "բաժակը թեթև հպում են քթին", isRight: true},
                        {answer: "չխմողի բաժակի մեջ ջուր են լցնում", isRight: false}
                    ],
                    answered: false,
                    answerType: ""
                },
                {
                    question: "Հերթական կենացը խմելիս դիմում են Աստծուն ու խնդրում՝",
                    answers: [
                        {answer: "մեղքերը ներել", isRight: false},
                        {answer: "նորանոր առիթներ ստեղծել", isRight: false},
                        {answer: "առողջություն տալ սեղանակիցներին", isRight: false},
                        {answer: "եղածը շատ չհամարե", isRight: true}
                    ],
                    answered: false,
                    answerType: ""
                },
            ],
            currentQuestion: 0,
            cupCount: 2,
            motiviQuotesRight: [
                {quote: "Փաստորեն՝ լավ ես տիրապետում հայկական կենացներին։ Զարմացնում ես։"},
                {quote: "Չէինք կասկածում, որ ճիշտ կպատասխանես։ Իզուր չէր, որ որոշեցինք խաղալ քեզ հետ։"},
                {quote: "Լուռ ծափահարում ենք։ Իսկական թամադա ես քո շրջապատի համար։"},
            ],
            motiviQuotesWrong: [
                {quote: "Դե լավ, հանկարծ չհուսահատվես։ Մինչև վերջ խաղա, գուցե դու ես հավաքում ամենաշատ միավորները։"},
                {quote: "Ոչինչ, շարունակի՛ր խաղալ, տեսնենք՝ քանի միավոր ես հավաքում։"},
            ],
            motiviQountForRightAnswer: 0,
            motiviQountForWrongAnswer: 0,
            passFirstMini: false,
            firstMiniStep: 0,
            firstMiniAnswer: "",
            passSecondMini: false,
            secondMiniStep: 8,
            secondMiniAnswer: "",
            rightAnswersCount: 0,
            isRight: false,
            prize: [
                {
                    min: 0,
                    max: 0,
                    title: "Վերջից առաջինը",
                    desc: "Շնորհավորում ենք։ Վերջից առաջին հորիզոնականում ես։ Կա՛մ արդեն շատ ես խմել, կա՛մ էլ իրոք ոչինչ չգիտես հայկական կենացներից։ Գնա, պարապիր, հաջորդ խաղին կգաս։"
                },
                {
                    min: 1,
                    max: 6,
                    title: "Սկսնակ կենացագետ",
                    desc: "Բոլորովին էլ վատ չէ․ ինչ-որ բաներ հաստատ լսել ես, բայց մի մասը լավ չես հիշում։ Դեռ շատ աշխատելու տեղ ունես, բայց չհուսահատվե՛ս․ գիտելիքներդ ցուցադրելու դեռ շատ առիթներ կունենաս։"
                },
                {
                    min: 7,
                    max: 9,
                    title: "Թամադայից հինգ պակաս",
                    desc: "Հպարտանում ենք քեզնով․ զգացվում է, որ հայկական խնջույքների մշտական պատվավոր հյուրն ես ու միշտ լավ կենացներ ես ասում։ Մի փոքր էլ, ու կատարյալ արդյունք կունենայիր։ Հաջորդ անգամ հաստատ հաղթողը դու ես լինելու։"
                },
                {
                    min: 10,
                    max: 10,
                    title: "Վարպետ",
                    desc: "Ներեցեք, Դուք պրոֆեսիոնալ թամադա՞ եք։ Այսպիսի արդյունք անգամ քաղաքի լավագույն թամադաները չէին ունենա։ Հիացած ենք քո գիտելիքներով։ Պատկերացնում ենք, թե որքան շատ առիթներ ես ունեցել սեղանապետ ու թամադա լինելու և սուր միտքդ ցույց տալու։"
                },
            ]
        }
    },
    methods: {
        checkAnswer(e) {
            const self = this
            self.questions[self.currentQuestion].answered = true
            self.questions[self.currentQuestion].answerType = e
            self.isRight = self.questions[self.currentQuestion].answers[e].isRight

            setTimeout(function (){
                if(self.currentQuestion + 1 != 9){
                    self.cupCount++;
                    self.currentQuestion++;
                    if(self.isRight) {
                        self.motiviQountForRightAnswer = self.motiviQountForRightAnswer == 2 ? 0 : self.motiviQountForRightAnswer + 1;
                        self.rightAnswersCount++
                    }
                    else self.motiviQountForWrongAnswer = self.motiviQountForWrongAnswer == 1 ? 0 : self.motiviQountForWrongAnswer+1
                    self.isRight = false;
                }else{

                }


            },4000)
        },
        sendFirstEmail(){
            axios
                .post('/api/send-quote',[

                ])
                .then(response => {

            })
                .catch(error => console.log(error));
        },
        sendSecondEmail(){

        },
    },
    computed: {

    },
    created() {
        this.questions.sort( () => .5 - Math.random() )

    }
}
</script>

<style scoped>

</style>
