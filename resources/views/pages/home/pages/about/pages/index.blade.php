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


    <!-- About Start -->
    <section class="my-20 py-5">
        <div class="container px-lg-5">
            <div class="grid grid-cols-1 md:grid-cols-2 g-5">
                <div class="ps-10 pt-6 flex flex-col justify-between gap-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" mb-4 pb-2">
                        <x-camelui::heading size="sm" class="mb-4">
                            حول الشركة
                        </x-camelui::heading>
                        <x-camelui::heading size="3xl">
                            لمحة عن الشركة
                        </x-camelui::heading>

                    </div>
                    <div>
                        <x-camelui::paragraph>تأسست شركة خطوات التطوير في العام 2011 في مدينة جدة حيث تعمل الشركة في استيراد وبيع وتوزيع الاجهزة والمستلزمات الطبية كما توسع نشاط الشركة في السنوات الاخيرة ليشمل تصنيع الاجهزة والمستلزمات الطبية وذلك بافتتاح مصنع تابع للشركة في مدينة جدة.
                            أيضا بدأت الشركة في التوسع في انشطتها باالاستحواذ على عدد من محطات الوقود في مدينة الرياض وذلك ايمانا منها بأهمية تنوع الاستثمار في عدة مجالات أخرى.
                        </x-camelui::paragraph>
                    </div>
                    <x-camelui::heading size="5xl">
                        قيمنا
                    </x-camelui::heading>
                    <div class="grid grid-cols-2">
                        <div class="">
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i> النزاهة</x-camelui::paragraph>
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i> الجودة والتميز </x-camelui::paragraph>
                        </div>
                        <div class="">
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i> الابتكار والتطوير</x-camelui::paragraph>
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i>خدمة المجتمع</x-camelui::paragraph>
                        </div>
                    </div>
                </div>
                <div class="">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="/assets/images/about.jpg">
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- Company Purpose Start -->
    <section id="services" class="bg-white border-b py-8">
        <div class="container flex flex-col gap-10 max-w-5xl mx-auto m-8">
            <div class=" mb-4 pb-2">
                {{--                <x-camelui::heading size="sm" class="mb-4 text-center">--}}
                {{--                    حول الشركة--}}
                {{--                </x-camelui::heading>--}}
                <x-camelui::heading size="3xl" class="text-center">
                    غرض الشركة و طبيعة العمل
                </x-camelui::heading>

            </div>
            <!-- item 1 -->
            <div class="flex flex-wrap flex-col-reverse sm:flex-row items-center justify-center">
                <div class="w-full sm:w-1/2 p-6">
                    <x-camelui::heading size="lg" class="mb-4 w-full">
                        عنوان فرعي 1
                    </x-camelui::heading>
                    <x-camelui::paragraph class="  w-full"> هذا النص يمكن استبداله هذا النص يمكن استبداله
                    </x-camelui::paragraph>
                    <x-camelui::paragraph class="  w-full">هذا النص يمكن استبداله هذا النص يمكن استبداله
                    </x-camelui::paragraph>
                </div>

                <div class="w-full sm:w-1/2 px-6 md:p-6 md:mt-6">
                    <img
                        class="w-5/6 sm:h-64 mx-auto"
                        src="/assets/images/undraw_coffee.svg"
                        alt="Description of SVG"
                    />
                </div>
            </div>

            <!-- item 2 -->
            <div class="flex flex-wrap flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-1/2 md:p-6 md:mt-6">
                    <img
                        class="w-5/6 sm:h-64 mx-auto"
                        src="/assets/images/undraw_under_construction.svg"
                        alt="Description of SVG"
                    />
                </div>
                <div class="w-full sm:w-1/2 p-6 md:mt-6">
                    <x-camelui::heading size="lg" class="mb-4  w-full">
                        عنوان فرعي 2
                    </x-camelui::heading>
                    <x-camelui::paragraph class="  w-full"> هذا النص يمكن استبداله هذا النص يمكن استبداله
                    </x-camelui::paragraph>
                    <x-camelui::paragraph class="  w-full">هذا النص يمكن استبداله هذا النص يمكن استبداله
                    </x-camelui::paragraph>
                </div>
            </div>

            <!-- item 3 -->
            <div class="flex flex-wrap flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-1/2 p-6">
                    <x-camelui::heading size="lg" class="mb-4 w-full">
                        عنوان فرعي 3
                    </x-camelui::heading>
                    <x-camelui::paragraph class="  w-full"> هذا النص يمكن استبداله هذا النص يمكن استبداله
                    </x-camelui::paragraph>
                    <x-camelui::paragraph class="  w-full">هذا النص يمكن استبداله هذا النص يمكن استبداله
                    </x-camelui::paragraph>
                </div>

                <div class="w-full sm:w-1/2 px-6 md:p-6 md:mt-6" data-aos="fade-down-left">
                    <img
                        class="w-5/6 sm:h-64 mx-auto"
                        src="/assets/images/undraw_qa_engineers.svg"
                        alt="Description of SVG"
                    />
                </div>
            </div>

            <!-- item 4 -->
            <div class="flex flex-wrap flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-1/2 px-6 md:p-6 md:mt-6" >
                    <img
                        class="w-5/6 sm:h-64 mx-auto"
                        src="/assets/images/undraw_pitching.svg"
                        alt="Description of SVG"
                    />
                </div>
                <div class="w-full sm:w-1/2 p-6 md:mt-6">
                        <x-camelui::heading size="lg" class="mb-4 w-full">
                            عنوان فرعي 4
                        </x-camelui::heading>
                        <x-camelui::paragraph class="  w-full"> هذا النص يمكن استبداله هذا النص يمكن استبداله
                        </x-camelui::paragraph>
                        <x-camelui::paragraph class="  w-full">هذا النص يمكن استبداله هذا النص يمكن استبداله
                        </x-camelui::paragraph>
                </div>
            </div>

        </div>
    </section>
    <!-- Company Purpose End -->

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
                    fetch('/slider-about')
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
