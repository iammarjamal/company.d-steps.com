<div>

    <!-- Hero Start-->
    <div x-data="carouselData()" x-init="fetchSlides()" class="relative w-full overflow-hidden">
        <div class="relative min-h-[75svh] w-full">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                    <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent px-16 py-12 text-center">
                        <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white" x-text="slide.title" :aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                        <p class="lg:w-1/2 w-full text-pretty text-sm text-slate-300" x-text="slide.description" :id="'slide' + (index + 1) + 'Description'"></p>
                    </div>
                    <img class="absolute w-full h-full inset-0 object-cover text-slate-700 dark:text-slate-300" :src="slide.imgSrc" :alt="slide.imgAlt" />
                </div>
            </template>
        </div>

        <button type="button" class="absolute bottom-5 right-5 z-20 rounded-full text-slate-300 opacity-50 transition hover:opacity-80 focus-visible:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 active:outline-offset-0" aria-label="pause carousel" x-on:click="(isPaused = !isPaused), setAutoplayInterval(autoplayIntervalTime)" :aria-pressed="isPaused">
            <svg x-cloak x-show="isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-7">
                <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd">
            </svg>
            <svg x-cloak x-show="!isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-7">
                <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm5-2.25A.75.75 0 0 1 7.75 7h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Zm4 0a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Z" clip-rule="evenodd">
            </svg>
        </button>

        <div class="absolute rounded-xl bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2" role="group" aria-label="slides">
            <template x-for="(slide, index) in slides" :key="index">
                <button class="size-2 cursor-pointer rounded-full transition" x-on:click="(currentSlideIndex = index + 1), setAutoplayInterval(autoplayIntervalTime)" :class="[currentSlideIndex === index + 1 ? 'bg-slate-300' : 'bg-slate-300/50']" :aria-label="'slide ' + (index + 1)"></button>
            </template>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Branches Start -->
    <section id="services" class="my-20 py-6 relative bg-primary">
        <div class="container mx-auto">
            <x-camelui::heading size="sm" class="text-center my-8">
                فروعنا
            </x-camelui::heading>
            <x-camelui::heading size="3xl" class="text-center my-8">
                تعرف على فروعنا
            </x-camelui::heading>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4" data-aos="fade-up">
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom  rounded cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع جدة- شارع خالد بن الوليد 1
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع جدة-  خالد بن الوليد 2
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع بريدة
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع الرياض - شارع الضباب1
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع الرياض- شارع الضباب 2
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع خميس مشيط
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع جازان
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع حائل
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع مكة
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع الطائف
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع جدة- الثغر 1
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع جدة- الثغر 2
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white dark:bg-gray-600 shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 dark:hover:bg-gray-400 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <img class="wow zoomIn" data-wow-delay="0.5s" src="/assets/images/home.svg">
                    </div>
                    <x-camelui::heading size="sm" class="mt-6">
                        فرع جدة- صاري
                    </x-camelui::heading>
                </div>
            </div>
        </div>
    </section>
    <!-- End Branches -->

    <script>
        function carouselData() {
            return {
                autoplayIntervalTime: 5000,
                slides: [],
                currentSlideIndex: 1,
                isPaused: false,
                autoplayInterval: null,
                previous() {
                    if (this.currentSlideIndex > 1) {
                        this.currentSlideIndex = this.currentSlideIndex - 1
                    } else {
                        this.currentSlideIndex = this.slides.length
                    }
                },
                next() {
                    if (this.currentSlideIndex < this.slides.length) {
                        this.currentSlideIndex = this.currentSlideIndex + 1
                    } else {
                        this.currentSlideIndex = 1
                    }
                },
                autoplay() {
                    this.autoplayInterval = setInterval(() => {
                        if (! this.isPaused) {
                            this.next()
                        }
                    }, this.autoplayIntervalTime)
                },
                setAutoplayInterval(newIntervalTime) {
                    clearInterval(this.autoplayInterval)
                    this.autoplayIntervalTime = newIntervalTime
                    this.autoplay()
                },
                fetchSlides() {
                    fetch('/slider-branches')
                        .then(response => response.json())
                        .then(data => {
                            this.slides = data;
                            this.autoplay();
                        });
                }
            }
        }
    </script>
</div>
