<template>
    <div>
        <div v-if="secondPage" class="height-full">
            <div class="flex min-h-560 overflow-hidden relative height-full">
                <div class="flex flex-col  justify-start pl-unset-for-mobile pl-50 ">
                    <div class="relative for-animation">
                        <img class="mt-50 width-for-text" src="/images/shape.png" alt="personage" width="600">
                        <div class="absolute top-100 left-0 py-20 px-30 start-text">
                            Մեզ արդեն հասել են քո կենացների մասին պատմությունները: Ասում են՝ շրջապատումդ քեզնից ուժեղ թամադա չկա: Եկել ենք ստուգելու՝ իրո՞ք այդքան լավ գիտես հայկական կենացները:<br/>
                            Անցի՛ր թեստը, տեսնենք՝ քանի՞ ճիշտ պատասխան կտաս։
                            <br>
                            Պատրա՞ստ ես։ Սկսեցինք։
                        </div>
                    </div>
                    <div class="w-ful mt-100 for-desktop">
                        <button class="rounded-5 start-game start-page-2" v-on:click="setThirdStep" >Դե գնացինք</button>
                    </div>
                </div>
                <div class=" flex items-end mt-50 img-right  justify-end absolute bottom-0 right-50 h-full-mobile img-animation">
                    <img class="mt-100 personage-game for-desktop" src="/images/personage.png" alt="personage" width="600">
                    <img class="personage-game   for-mobile per-get-start" src="/images/personage-mobile.png" alt="personage" width="300">
                </div>
            </div>
            <div class="for-mobile-2">
                <button class="rounded-5 start-game start-page-2" v-on:click="setThirdStep" >Դե գնացինք</button>
            </div>
        </div>
        <div v-if="firstPage">
            <div class="flex start-flex min-h-560 overflow-hidden  full">
                <div class="flex flex-col w-60p justify-center pl-50 w-full-800">
                    <div class="text-72 guess mb-50">Գուշակի՛ր կենացը</div>
                    <div class="description mb-50">Անցիր թեստը ու պարզիր, թե ինչքան կենացագետ ես դու</div>
                    <div class="w-full">
                        <button class="rounded-5 start-game start-page" v-on:click="setSecondStep">Սկսել Խաղը</button>
                    </div>
                </div>
                <div class="w-40p flex items-start mt-50  justify-end game ">
                    <img class="mt-100 cupple_1" src="/images/cupple2.png" alt="cupple_1" width="220">
                    <img class="cupple_2" src="/images/cupple1.png" alt="cupple_1" width="220">
                </div>
            </div>
        </div>
        <div v-if="gameStep" class=" min-h-560 overflow-hidden relative  ">
            <div :class="['relative  min-h-560 flex flex-col justify-between', (questions[currentQuestion].answered  && ( currentQuestion == 1 || currentQuestion == 5  || currentQuestion == 8 ))  ? 'blure-custom' : '' ]" v-if="(currentQuestion != firstMiniStep || passFirstMini) && (currentQuestion != secondMiniStep || passSecondMini ) && currentQuestion != 10">
                <div class="flex  w-full justify-between px-50 pt-30">
                    <div class="answer">Հարց <span class="text-textDefault">{{ currentQuestion + 1 }}</span></div>
                    <div class="flex justify-end">
                        <div v-for="n in cupCount" class="mx-5"><img src="/images/cup1.png" width="20" alt=""></div>
                    </div>
                </div>
                <div>
                    <div class="flex  w-full justify-center pt-mobile py-50 px-150-mobile font-size-48-mobile px-150 pt-50 text-center answer">
                        {{ questions[currentQuestion].question }}
                    </div>
                    <div class="flex flex-dir-for-buttons font-size-48-mobile  w-full justify-between pb-50 px-50 px-150-mobile pt-50 text-center flex-wrap">
                        <button class="rounded-5 w-half-auto bg-white text-black px-30 py-10 text arial"
                                v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[0].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 0 && !questions[currentQuestion].answers[0].isRight }]"
                                v-on:click="()=>checkAnswer(0)" :disabled="questions[currentQuestion].answered">
                            {{ questions[currentQuestion].answers[0].answer }}
                        </button>
                        <button class="rounded-5 w-half-auto bg-white text-black px-30 py-10 text arial mt-30-mobile"
                                v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[1].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 1 && !questions[currentQuestion].answers[1].isRight }]"
                                v-on:click="()=>checkAnswer(1)" :disabled="questions[currentQuestion].answered">
                            {{ questions[currentQuestion].answers[1].answer }}
                        </button>
                        <button class="rounded-5 w-half-auto bg-white  text-black px-30 py-10 mt-30 text arial"
                                v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[2].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 2 && !questions[currentQuestion].answers[2].isRight }]"
                                v-on:click="()=>checkAnswer(2)" :disabled="questions[currentQuestion].answered">
                            {{ questions[currentQuestion].answers[2].answer }}
                        </button>
                        <button class="rounded-5 w-half-auto bg-white text-black px-30 py-10 mt-30 text arial"
                                v-bind:class="[{ right: questions[currentQuestion].answered &&  questions[currentQuestion].answers[3].isRight }, {wrong:questions[currentQuestion].answered && questions[currentQuestion].answerType == 3 && !questions[currentQuestion].answers[3].isRight }]"
                                v-on:click="()=>checkAnswer(3)" :disabled="questions[currentQuestion].answered">
                            {{ questions[currentQuestion].answers[3].answer }}
                        </button>
                    </div>
                </div>
            </div>
            <div v-if="currentQuestion == firstMiniStep && !passFirstMini  && currentQuestion  != 10" class=" min-h-560  height-full relative overflow-hidden ">
                <p class="absolute heading-text for-motivi-animation">Կենացով շնորհավորի՛ր կանանց տոների կապակցությամբ</p>
                <img class="absolute top-30 mobile-bottom right-100 z-200 img-animation" src="/images/first-mini.png" width="400" alt="">
                <textarea class="notes for-motivi-animation" v-model="firstMiniAnswer"></textarea>
                <div class="flex flex-mobile-col px-50 absolute MOBILE-B-60 bottom-60 w-60p items-center scale-up-ver-bottom">
                    <div class="w-60p  pr-60">
                        <p class="desc pr-20 ">Ամենալավ կենաց ասողը, կստանա  նվեր Ohanyan Brandy-ի կողմից</p>
                    </div>
                    <div class="w-40p">
                        <button class="rounded-5 start-game start-send w-full" :disabled="firstMiniAnswer == '' " v-on:click="sendFirstEmail">Ողղարկել</button>
                    </div>
                </div>
            </div>
            <div v-if="currentQuestion == secondMiniStep && !passSecondMini && currentQuestion  != 10 " class=" min-h-560 relative px-15 md:px-50">
                <p class=" mt-50 text-white BraindAmanorRegular t-center text-24 md:text-48">Սթափության Թեստ</p>
                <p class=" mt-20 text-white max-w-500 text-custom t-center">Այսքան կենացից հետո, միայն սթափ մնացածները կկարողանան ճիշտ պատաԱյսքան կենացից հետո, միայն սթափ մնացածները կկարողանան ճիշտ պատա</p>
                <img src="/images/green.png" alt="" class="mt-20 img-ilusion for-motivi-animation" width="600" height="200">
                <img class="absolute top-30 right-100 z-200 ilusion-personage img-animation" src="/images/second-mini.png" width="300" alt="">
                <div class="flex flex-mobile-col-reverse  absolute bottom-60 w-70p items-end scale-up-ver-bottom">
                    <div class="w-40p  pr-60">
                        <input type="text" class="bg-transparent text-white outline-none focus:outline-none active:outline-none border-bottom-1 border-bottom-white bb-s py-5" placeholder="Գրել պատասխանը" v-model="secondMiniAnswer">
                    </div>
                    <div class="w-40p">
                        <button class="rounded-5 start-game start-send w-full" :disabled="secondMiniAnswer == '' " v-on:click="sendSecondEmail">Ողղարկել</button>
                    </div>
                </div>
            </div>
            <div class="absolute min-h-560 bottom-0 z-200 right-0 flex items-end mobile-motivy"
                 v-if="(currentQuestion !=10  && questions[currentQuestion].answered) && ( currentQuestion == 1 || currentQuestion == 5  || currentQuestion == 8 )">
                <img  src="" width="65%" class="img img-main " id="img" alt="">
                <img src="/images/motivi_1.png" width="100%" class="for-motivi-animation img absolute  top-50  -left-450 pl-30 motivi" alt="">
                <p class="for-motivi-animation-text BraindAmanorRegular absolute top-100 w-70p pl-30 motivi arial -left-410">
                    {{ isRight ? motiviQuotesRight[motiviQountForRightAnswer].quote : motiviQuotesWrong[motiviQountForWrongAnswer].quote }}</p>

            </div>
            <div class="absolute min-h-560 bottom-0 z-300   top-0"
                 v-if="currentQuestion  == 10">
                <div class="w-full h-auto">
                    <img src="/images/logo.png" alt="" width="150px" class="pl-15 md:pl-50">
                </div>
                <div class="flex flex-wrap items-center w-full">
                    <div class="w-full md:w-half-auto pl-15 md:pl-50 for-motivi-animation">
                        <p class="BraindAmanorRegular text-white text-120 leading-none text-center">10/{{rightAnswersCount}}</p>
                        <p class="BraindAmanorRegular text-white text-36  text-center"  v-for="item in prize" :key="item.title" v-if="rightAnswersCount <= item.max && rightAnswersCount >=  item.min">
                            {{item.title}}
                        </p>
                        <div class="w-full text-center mt-50 for-desktop">
                            <a class="rounded-5 start-game py-20 px-100 " href="https://www.facebook.com/sharer/sharer.php?u=">Կիսվել</a>
                        </div>
                    </div>
                    <div class="w-full md:w-half-auto px-15 md:px-50">
                        <img src="/images/example.jpg" alt="" class="img-animation">
                        <p class="text-white mt-20 img-animation" v-for="item in prize" :key="item.title" v-if="rightAnswersCount <= item.max && rightAnswersCount >=  item.min">
                            {{item.desc}}
                        </p>
                    </div>
                    <div class="w-full text-center mt-50 for-mobile">
                        <a class="rounded-5 start-game py-20 px-100 " href="https://www.facebook.com/sharer/sharer.php?u=">Կիսվել</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};
export default {
    name: "Game",
    data: function () {
        return {
            imgSrc:"",
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
            currentQuestion:0,
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
            firstMiniStep: 4,
            firstMiniAnswer: "",
            passSecondMini: false,
            secondMiniStep: 9,
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
            ],
            firstPage:true,
            secondPage:false,
            gameStep:false,
        }
    },


    methods: {
        setSecondStep(){
            this.firstPage=false;
            this.secondPage=true;
            this.gameStep=false;
        },
        setThirdStep(){
            this.firstPage=false;
            this.secondPage=false;
            this.gameStep=true;
        },
        checkAnswer(e) {

            const self = this
             self.questions[self.currentQuestion].answered = true
            self.questions[self.currentQuestion].answerType = e
            self.isRight = self.questions[self.currentQuestion].answers[e].isRight
            setTimeout(function (){
                let imgSrc = "/images/Ohanyan_xax_animation-character_2.gif" ;
                document.getElementById('img').src = imgSrc;
            },100)
            setTimeout(function (){
                if(self.currentQuestion + 1 < 10){
                    self.cupCount++;
                     if(self.isRight) {
                        self.motiviQountForRightAnswer = self.motiviQountForRightAnswer == 2 ? 0 : self.motiviQountForRightAnswer + 1;
                        self.rightAnswersCount++
                    }
                    else self.motiviQountForWrongAnswer = self.motiviQountForWrongAnswer == 1 ? 0 : self.motiviQountForWrongAnswer+1
                    self.isRight = false;
                }else{
                    if(self.isRight) {
                        self.rightAnswersCount++
                    }
                     axios
                        .post('/save-progress', {
                            rightCount:self.rightAnswersCount
                        })
                        .then(response => {
                            console.log(response)
                        })
                 }
                self.currentQuestion++;
                document.getElementById('img').src="";
            },   ( self.currentQuestion == 1 || self.currentQuestion == 5  || self.currentQuestion == 8 ) ? 4000 : 1000)
        },
        sendFirstEmail(){
            const self = this
            axios
                .post('/send-quote', {
                    message:self.firstMiniAnswer
                })
                .then(response => {
                    if(response.data.success){
                        self.passFirstMini = true
                    }
            })
                .catch(error => console.log(error));
        },
        sendSecondEmail(){
            const self = this
            axios
                .post('/send-numbers-mail', {
                    message:self.secondMiniAnswer
                })
                .then(response => {
                    if(response.data.success){
                        self.passSecondMini = true
                    }
                })
                .catch(error => console.log(error));
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
