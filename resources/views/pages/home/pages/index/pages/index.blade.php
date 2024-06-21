<div class="w-full h-full">
{{--    <div--}}
{{--        class="w-full p-0 m-0 overflow-hidden leading-7 text-center text-black rounded-lg lg:grid lg:grid-cols-2 lg:gap-4 scroll-smooth"--}}
{{--        style="background-image: linear-gradient(to right, rgb(0, 53, 146), rgb(0, 40, 109)); box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; direction: rtl;"--}}
{{--    >--}}
{{--        <div class="w-full px-6 pt-10 pb-12 m-0 text-center lg:py-16 lg:pr-0 sm:px-16 sm:pt-16 scroll-smooth">--}}

{{--        </div>--}}
{{--    </div>--}}

{{--    <x-camelui::heading size="4xl">--}}

{{--    </x-camelui::heading>--}}

    <!-- Hero Start-->
    <div x-data="{
    // Sets the time between each slides in milliseconds
    autoplayIntervalTime: 5000,
    slides: [
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
            imgAlt: 'الرئيسية - عنوان 1',
            title: 'الرئيسية - عنوان 1',
            description: 'الرئيسية - وصف فرعي - نص يمكن استبداله 1',
        },
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
            imgAlt: 'الرئيسية - عنوان 2',
            title: 'الرئيسية - عنوان 2',
            description: 'الرئيسية - وصف فرعي - نص يمكن استبداله 2',
        },
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
            imgAlt: 'الرئيسية - عنوان 3',
            title: 'الرئيسية - عنوان 3',
            description: 'الرئيسية - وصف فرعي - نص يمكن استبداله 3',
        },
    ],
    currentSlideIndex: 1,
    isPaused: false,
    autoplayInterval: null,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide
            this.currentSlideIndex = this.slides.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide
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
    // Updates interval time
    setAutoplayInterval(newIntervalTime) {
        clearInterval(this.autoplayInterval)
        this.autoplayIntervalTime = newIntervalTime
        this.autoplay()
    },
}" x-init="autoplay" class="relative w-full overflow-hidden">

        <!-- slides -->
        <!-- Change min-h-[50svh] to your preferred height size -->
        <div class="relative min-h-[75svh] w-full">
            <template x-for="(slide, index) in slides">
                <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>

                    <!-- Title and description -->
                    <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent px-16 py-12 text-center">
                        <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white" x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                        <p class="lg:w-1/2 w-full text-pretty text-sm text-slate-300" x-text="slide.description" x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                    </div>

                    <img class="absolute w-full h-full inset-0 object-cover text-slate-700 dark:text-slate-300" x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                </div>
            </template>
        </div>

        <!-- Pause/Play Button -->
        <button type="button" class="absolute bottom-5 right-5 z-20 rounded-full text-slate-300 opacity-50 transition hover:opacity-80 focus-visible:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 active:outline-offset-0" aria-label="pause carousel" x-on:click="(isPaused = !isPaused), setAutoplayInterval(autoplayIntervalTime)" x-bind:aria-pressed="isPaused">
            <svg x-cloak x-show="isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-7">
                <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd">
            </svg>
            <svg x-cloak x-show="!isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-7">
                <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm5-2.25A.75.75 0 0 1 7.75 7h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Zm4 0a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Z" clip-rule="evenodd">
            </svg>
        </button>

        <!-- indicators -->
        <div class="absolute rounded-xl bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2" role="group" aria-label="slides" >
            <template x-for="(slide, index) in slides">
                <button class="size-2 cursor-pointer rounded-full transition" x-on:click="(currentSlideIndex = index + 1), setAutoplayInterval(autoplayIntervalTime)" x-bind:class="[currentSlideIndex === index + 1 ? 'bg-slate-300' : 'bg-slate-300/50']" x-bind:aria-label="'slide ' + (index + 1)"></button>
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
                       <x-camelui::paragraph>هذا النص يمكن استبداله</x-camelui::paragraph>
                       <x-camelui::paragraph>هذا النص يمكن استبداله</x-camelui::paragraph>
                       <x-camelui::paragraph>هذا النص يمكن استبداله</x-camelui::paragraph>
                   </div>
                    <div class="grid grid-cols-2">
                        <div class="">
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i> موثوقية</x-camelui::paragraph>
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i> خبرات تخصصية</x-camelui::paragraph>
                        </div>
                        <div class="">
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i> دعم مستمر</x-camelui::paragraph>
                            <x-camelui::paragraph size="sm" class="mb-3"><i class="fa fa-check text-primary me-2"></i>أسعار تنافسية</x-camelui::paragraph>
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


    <!-- About Start -->
    <section class="my-20 py-5">
        <div class="container px-lg-5">
            <div class="grid grid-cols-1 md:grid-cols-2 g-5">
                <div class="">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="/assets/images/undraw_visionary_technology.svg">
                </div>
                <div class="ps-10 pt-6 flex flex-col justify-center gap-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" mb-4 pb-2">
{{--                        <x-camelui::heading size="sm" class="mb-4">--}}
{{--                            حول الشركة--}}
{{--                        </x-camelui::heading>--}}
                        <x-camelui::heading size="3xl">
                            رؤيتنا
                        </x-camelui::heading>

                    </div>
                   <div>
                       <x-camelui::paragraph class="  w-full"> هذا النص يمكن استبداله هذا النص يمكن استبداله
                       </x-camelui::paragraph>
                       <x-camelui::paragraph class="  w-full">هذا النص يمكن استبداله هذا النص يمكن استبداله
                       </x-camelui::paragraph>
                       <x-camelui::paragraph class="  w-full"> هذا النص يمكن استبداله هذا النص يمكن استبداله
                       </x-camelui::paragraph>
                       <x-camelui::paragraph class="  w-full">هذا النص يمكن استبداله هذا النص يمكن استبداله
                       </x-camelui::paragraph>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- Services Start -->
    <section id="services" class="mb-8 py-6 relative bg-primary">
        <div class="container mx-auto">
            <x-camelui::heading size="sm" class="text-center my-8">
                ماذا نقدم لك؟
            </x-camelui::heading>
            <x-camelui::heading size="3xl" class="text-center my-8">
                خدماتنا
            </x-camelui::heading>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4" data-aos="fade-up">
                <div
                    class="text-center bg-white shadow-custom  rounded cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <svg class="w-full h-full fill-primary group-hover:fill-primary-800" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 512 512" xml:space="preserve">
<g>
    <g>
        <path d="M435.745,147.064H283.833c-4.513,0-8.17,3.658-8.17,8.17s3.657,8.17,8.17,8.17h151.911c4.513,0,8.17-3.658,8.17-8.17
			S440.258,147.064,435.745,147.064z"/>
    </g>
</g>
                            <g>
                                <g>
                                    <path d="M495.775,212.426h-19.179v-81.702h2.723c4.513,0,8.17-3.658,8.17-8.17c0-4.512-3.657-8.17-8.17-8.17h-13.929
			c-3.979-52.066-45.665-93.752-97.731-97.731V8.17c0-4.512-3.657-8.17-8.17-8.17s-8.17,3.658-8.17,8.17v8.482
			c-52.066,3.979-93.752,45.665-97.731,97.731H239.66c-4.513,0-8.17,3.658-8.17,8.17c0,4.512,3.657,8.17,8.17,8.17h2.723v81.702
			H185.17c3.575-4.753,6.141-10.306,7.371-16.34h3.545c4.513,0,8.17-3.658,8.17-8.17s-3.657-8.17-8.17-8.17H185.17
			c3.575-4.753,6.141-10.306,7.371-16.34h3.545c4.513,0,8.17-3.658,8.17-8.17s-3.657-8.17-8.17-8.17H185.17
			c3.575-4.753,6.141-10.306,7.371-16.34h3.545c4.513,0,8.17-3.658,8.17-8.17c0-4.512-3.657-8.17-8.17-8.17H185.17
			c3.575-4.753,6.141-10.306,7.371-16.34h3.545c4.513,0,8.17-3.658,8.17-8.17c0-4.512-3.657-8.17-8.17-8.17H32.681
			c-4.513,0-8.17,3.658-8.17,8.17c0,4.512,3.657,8.17,8.17,8.17h3.546c1.23,6.034,3.794,11.588,7.371,16.34H32.681
			c-4.513,0-8.17,3.658-8.17,8.17c0,4.512,3.657,8.17,8.17,8.17h3.546c1.23,6.034,3.794,11.588,7.371,16.34H32.681
			c-4.513,0-8.17,3.658-8.17,8.17s3.657,8.17,8.17,8.17h3.546c1.23,6.034,3.794,11.588,7.371,16.34H32.681
			c-4.513,0-8.17,3.658-8.17,8.17s3.657,8.17,8.17,8.17h3.546c1.23,6.034,3.794,11.588,7.371,16.34H16.225
			c-4.513,0-8.17,3.658-8.17,8.17v65.362c0,4.512,3.657,8.17,8.17,8.17h403.269c4.513,0,8.17-3.658,8.17-8.17s-3.657-8.17-8.17-8.17
			H24.395v-49.021h463.211v49.021h-35.431c-4.513,0-8.17,3.658-8.17,8.17s3.657,8.17,8.17,8.17h32.59v168.48
			c-12.302-1.192-19.384-5.099-27.371-9.506c-10.119-5.582-21.587-11.91-43.435-11.91c-21.848,0-33.317,6.328-43.435,11.91
			c-9.606,5.3-17.903,9.877-35.543,9.877c-17.64,0-25.938-4.577-35.544-9.877c-10.119-5.582-21.587-11.91-43.437-11.91
			s-33.318,6.328-43.437,11.91c-9.606,5.3-17.904,9.877-35.544,9.877c-17.639,0-25.937-4.577-35.542-9.877
			c-10.118-5.582-21.586-11.91-43.434-11.91c-21.848,0-33.317,6.328-43.435,11.91c-2.276,1.255-4.479,2.466-6.75,3.589
			c-5.705,2.821-11.829,5.064-20.623,5.916V318.638c0-4.512-3.657-8.17-8.17-8.17c-4.513,0-8.17,3.658-8.17,8.17v152.511
			c0,4.512,3.657,8.17,8.17,8.17c10.095,0,17.957-1.359,24.511-3.363v27.873c0,4.512,3.657,8.17,8.17,8.17
			c4.513,0,8.17-3.658,8.17-8.17v-35.004c0.873-0.475,1.736-0.948,2.585-1.416c9.606-5.3,17.903-9.877,35.542-9.877
			c17.639,0,25.936,4.578,35.54,9.876c10.118,5.583,21.586,11.911,43.435,11.911c21.85,0,33.318-6.328,43.437-11.91
			c9.606-5.3,17.904-9.877,35.544-9.877s25.938,4.578,35.544,9.877c10.119,5.583,21.587,11.91,43.437,11.91
			c21.849,0,33.318-6.328,43.436-11.91c9.606-5.3,17.903-9.877,35.542-9.877s25.936,4.578,35.54,9.876
			c0.849,0.468,1.711,0.941,2.584,1.416v35.006c0,4.512,3.657,8.17,8.17,8.17s8.17-3.658,8.17-8.17v-27.875
			c6.554,2.004,14.415,3.364,24.511,3.364c4.513,0,8.17-3.658,8.17-8.17V292.143c1.737-1.498,2.841-3.71,2.841-6.185v-65.362
			C503.945,216.084,500.288,212.426,495.775,212.426z M152.511,212.426H76.255c-10.651,0-19.733-6.831-23.105-16.34h122.466
			C172.243,205.594,163.161,212.426,152.511,212.426z M152.511,179.745H76.255c-10.651,0-19.733-6.831-23.105-16.34h122.466
			C172.243,172.913,163.161,179.745,152.511,179.745z M152.511,147.064H76.255c-10.651,0-19.733-6.831-23.105-16.34h122.466
			C172.243,140.232,163.161,147.064,152.511,147.064z M152.511,114.383H76.255c-10.651,0-19.733-6.831-23.105-16.34h122.466
			C172.243,107.552,163.161,114.383,152.511,114.383z M359.489,32.681c46.8,0,85.341,35.963,89.484,81.702H270.005
			C274.149,68.644,312.689,32.681,359.489,32.681z M460.255,212.426H258.723v-81.702h201.532V212.426z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <circle cx="446.638" cy="373.106" r="8.17"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <circle cx="413.957" cy="405.787" r="8.17"/>
                                </g>
                            </g>
</svg>
                    </div>
                    <x-camelui::heading size="sm" class="mt-6 group-hover:text-primary-800">
                       خدمة 1
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <svg class="w-full h-full fill-primary group-hover:fill-primary-800" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 64 64">
                            <g id="paint-painted-paint_roller-home-house" data-name="paint-painted-paint roller-home-house">
                                <path
                                    d="M60.01,25.05a2.963,2.963,0,0,0,1.85-1.54l.21-.41a3.022,3.022,0,0,0-1.14-3.91L58,17.43V7.82A3,3,0,0,0,57,2H49a3.009,3.009,0,0,0-3,3,2.979,2.979,0,0,0,1.99,2.81v3.62L33.54,2.76a2.988,2.988,0,0,0-3.08,0L3.07,19.19A3.022,3.022,0,0,0,1.93,23.1l.21.41a2.963,2.963,0,0,0,1.85,1.54,2.923,2.923,0,0,0,.83.12A3.033,3.033,0,0,0,6,24.9V56H5a3,3,0,0,0,0,6H59a3,3,0,0,0,0-6H58V24.91A2.9,2.9,0,0,0,60.01,25.05ZM49,4h8a1,1,0,0,1,0,2H49a1,1,0,0,1,0-2Zm7,4v8.23l-6.01-3.6V8ZM40,60H5a1,1,0,0,1,0-2H40Zm6,0H42V50h4Zm1-12H45V42.03a1.028,1.028,0,0,1,.42-.82l5.32-3.8A2.991,2.991,0,0,0,52,34.97V32a3.009,3.009,0,0,0-3-3H48V28a1,1,0,0,0-1-1H44a3.009,3.009,0,0,0-3-3H19a3.009,3.009,0,0,0-3,3H13a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1h3a3.009,3.009,0,0,0,3,3h1v8a4,4,0,0,0,8,0V36h2a4,4,0,0,0,8,0h3a3.009,3.009,0,0,0,3-3h3a1,1,0,0,0,1-1V31h1a1,1,0,0,1,1,1v2.97a1.028,1.028,0,0,1-.42.82l-5.32,3.8A2.991,2.991,0,0,0,43,42.03V48H41a1,1,0,0,0-1,1v7H8V23.76L31.48,9.62a1.02,1.02,0,0,1,1.04,0L56,23.76V56H48V49A1,1,0,0,0,47,48ZM46,29v2H44V29Zm-4-2v6a1,1,0,0,1-1,1H38V26h3A1,1,0,0,1,42,27ZM29,30a3.009,3.009,0,0,0-3,3V44a2,2,0,0,1-4,0V26H36V36a2,2,0,0,1-4,0V33A3.009,3.009,0,0,0,29,30Zm1,3v1H28V33a1,1,0,0,1,2,0ZM20,26v8H19a1,1,0,0,1-1-1V27a1,1,0,0,1,1-1Zm-4,3v2H14V29ZM59,58a1,1,0,0,1,0,2H48V58ZM33.55,7.91a2.979,2.979,0,0,0-3.1,0L5.34,23.03a1.018,1.018,0,0,1-.8.1.972.972,0,0,1-.61-.51l-.21-.41A1.021,1.021,0,0,1,4.1,20.9L31.49,4.47a1,1,0,0,1,1.02,0L59.9,20.9a1.021,1.021,0,0,1,.38,1.31l-.21.41a.972.972,0,0,1-.61.51,1.018,1.018,0,0,1-.8-.1Z"/>
                            </g>
                        </svg>
                    </div>
                    <x-camelui::heading size="sm" class="mt-6 group-hover:text-primary-800">
                        خدمة 2
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">
                        <svg class="w-full h-full fill-primary group-hover:fill-primary-800" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 74.34 74.34">
                            <path d="M29.52,53.303h-8.945c-0.552,0-1,0.448-1,1v8.104c0,0.343,0.176,0.662,0.466,0.845l4.473,2.826
	c0.163,0.103,0.349,0.155,0.534,0.155s0.371-0.052,0.534-0.155l4.473-2.826c0.29-0.183,0.466-0.502,0.466-0.845v-8.104
	C30.52,53.751,30.072,53.303,29.52,53.303z M28.52,61.856l-3.473,2.194l-3.473-2.194v-6.553h6.945V61.856z M22.81,28.413
	c0.925,8.32,7.514,12.07,11.993,12.07c4.479,0,11.067-3.75,11.993-12.07c1.333-0.702,3.13-2.447,3.039-5.548
	c-0.018-0.599-0.071-2.419-1.406-2.924c-1.313-0.497-2.638,0.819-2.891,1.088c-0.377,0.404-0.356,1.037,0.047,1.414
	s1.037,0.357,1.414-0.047c0.175-0.187,0.482-0.424,0.686-0.521c0.056,0.151,0.134,0.462,0.151,1.05
	c0.085,2.891-2.028,3.759-2.238,3.838l-3.894,0.853c-4.581-0.493-9.221-0.493-13.801,0l-3.901-0.854
	c-0.295-0.116-2.315-1.014-2.232-3.836c0.017-0.588,0.095-0.899,0.151-1.05c0.192,0.092,0.486,0.311,0.686,0.521
	c0.377,0.403,1.01,0.423,1.414,0.047c0.403-0.377,0.424-1.01,0.047-1.414c-0.252-0.269-1.572-1.589-2.891-1.088
	c-1.335,0.504-1.389,2.325-1.406,2.924C19.679,25.967,21.477,27.712,22.81,28.413z M24.92,29.009l1.998,0.438l0.589,5.339
	C26.295,33.365,25.331,31.47,24.92,29.009z M42.097,34.785l0.589-5.339l1.998-0.438C44.273,31.47,43.309,33.365,42.097,34.785z
	 M40.667,29.515l-0.795,7.198c-0.002,0.017,0.005,0.032,0.004,0.048c-1.835,1.225-3.776,1.722-5.074,1.722
	c-1.296,0-3.232-0.496-5.064-1.716l-0.8-7.252C32.833,29.149,36.77,29.149,40.667,29.515z M29.438,42.722l-2.902,1.362l-0.255-4.656
	c-0.03-0.552-0.509-0.976-1.053-0.944c-0.551,0.03-0.974,0.502-0.944,1.053l0.053,0.972c-3.428,1.238-6.537,3.485-8.878,6.368
	c-0.137-0.803-0.428-1.572-1.058-2.206c-0.255-0.257-0.565-0.466-0.905-0.648v-7.55c0.279,0.079,0.586,0.216,0.861,0.458
	c0.67,0.587,1.009,1.63,1.009,3.101V43.2c0,0.552,0.448,1,1,1s1-0.448,1-1v-3.167c0-2.072-0.569-3.621-1.691-4.604
	c-0.728-0.638-1.544-0.897-2.185-0.996c-0.016-0.538-0.452-0.971-0.994-0.971H1c-0.552,0-1,0.448-1,1V37.5c0,0.552,0.448,1,1,1h3.09
	c0.14,1.476,0.632,4.212,2.33,5.737c-0.201,0.135-0.402,0.269-0.568,0.436c-1.194,1.201-1.185,2.886-1.177,4.372l0.001,6.94
	c0,1.83,0.909,3.448,2.297,4.437c-0.578,0.87-1.148,1.603-1.145,1.603c-3.024,3.302-2.698,9.679-2.683,9.949
	c0.03,0.529,0.468,0.943,0.999,0.943h13.131c0.53,0,0.968-0.414,0.999-0.943c0.015-0.27,0.341-6.648-2.662-9.925
	c-0.011-0.013-0.945-1.112-1.641-2.204c0.992-0.987,1.606-2.353,1.606-3.86l0.001-5.84c2.064-3.39,5.257-6.083,8.874-7.535
	l0.168,3.065c0.018,0.332,0.2,0.633,0.485,0.804c0.158,0.094,0.335,0.142,0.513,0.142c0.145,0,0.29-0.031,0.425-0.095l4.245-1.992
	c0.5-0.235,0.715-0.83,0.48-1.33C30.533,42.702,29.937,42.489,29.438,42.722z M2,35.461h1.13V36.5H2V35.461z M9.391,43.338
	c-3.29,0-3.357-5.784-3.357-5.842C6.03,36.98,5.633,36.57,5.13,36.519v-1.059h6.366v7.879l-1.361-0.001c-0.003,0-0.006,0-0.009,0
	c-0.003,0-0.005,0-0.008,0L9.391,43.338z M6.675,49.034c-0.006-1.203-0.013-2.34,0.595-2.951c0.49-0.493,1.448-0.743,2.845-0.744
	l0.024,0c1.397,0.002,2.355,0.251,2.844,0.744c0.406,0.409,0.536,1.054,0.577,1.795h-2.325c-0.552,0-1,0.448-1,1s0.448,1,1,1h2.343
	l0,1.821h-2.343c-0.552,0-1,0.448-1,1s0.448,1,1,1h2.342l0,1.688h-2.342c-0.552,0-1,0.448-1,1s0.448,1,1,1h2.037
	c-0.539,1.204-1.743,2.047-3.145,2.047c-1.902,0-3.45-1.548-3.45-3.45L6.675,49.034z M5.133,70.917
	c0.007-0.393,0.031-0.897,0.079-1.451h10.995c0.048,0.553,0.071,1.058,0.078,1.451H5.133z M14.115,63.374
	c0.974,1.063,1.509,2.608,1.808,4.091H5.501c0.305-1.494,0.853-3.057,1.852-4.149c0.037-0.047,0.767-0.981,1.456-2.049
	c0.423,0.105,0.862,0.168,1.317,0.168c0.78,0,1.52-0.167,2.191-0.464C13.089,62.17,14.047,63.296,14.115,63.374z M21.2,16.754v1.046
	c0,0.552,0.448,1,1,1s1-0.448,1-1v-1.37c2.995-1.182,7.331-2.308,11.602-2.308c4.271,0,8.607,1.126,11.602,2.308v1.37
	c0,0.552,0.448,1,1,1s1-0.448,1-1v-1.046c0.266-0.186,0.428-0.489,0.428-0.815V5.24c0-0.395-0.232-0.753-0.594-0.914
	c-3.156-1.404-8.343-2.904-13.436-2.904c-5.094,0-10.281,1.5-13.436,2.904c-0.361,0.161-0.594,0.519-0.594,0.914v10.698
	C20.772,16.264,20.935,16.567,21.2,16.754z M22.772,5.9c2.999-1.241,7.556-2.477,12.03-2.477c4.474,0,9.03,1.236,12.03,2.477v8.546
	c-3.169-1.208-7.635-2.325-12.03-2.325c-4.396,0-8.86,1.117-12.03,2.325V5.9z M73.34,32.94h-25.23c-0.552,0-1,0.448-1,1v3.523
	c0,0.552,0.448,1,1,1h2.335l9.721,6.916v9.426c-1.676,0.08-2.913,0.494-3.715,1.301c-1.194,1.201-1.185,2.886-1.177,4.372
	l0.001,6.94c0,3.005,2.445,5.45,5.45,5.45s5.45-2.445,5.45-5.45l0.001-6.94c0.008-1.486,0.017-3.171-1.177-4.372
	c-0.658-0.662-1.595-1.068-2.833-1.239v-9.516c4.234-3.308,7.866-6.118,8.861-6.888h2.313c0.552,0,1-0.448,1-1V33.94
	C74.34,33.387,73.892,32.94,73.34,32.94z M64.176,60.468l-0.001,6.951c0,1.902-1.548,3.45-3.45,3.45
	c-1.402,0-2.606-0.844-3.145-2.047h2.037c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.342l0-1.688h2.342c0.552,0,1-0.448,1-1s-0.448-1-1-1
	h-2.343l0-1.821h2.343c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.325c0.041-0.741,0.171-1.386,0.577-1.795
	c0.491-0.494,1.453-0.745,2.856-0.745s2.365,0.25,2.856,0.745C64.189,58.128,64.183,59.264,64.176,60.468z M72.34,36.463h-1.654
	c-0.221,0-0.436,0.073-0.611,0.208c0,0-4.039,3.119-8.937,6.944l-9.794-6.968c-0.169-0.12-0.372-0.185-0.58-0.185h-1.654V34.94
	h23.23V36.463z M45.023,42.462l-0.176,3.212c-0.018,0.332-0.2,0.633-0.485,0.804c-0.158,0.094-0.335,0.142-0.513,0.142
	c-0.145,0-0.29-0.031-0.425-0.095l-4.245-1.992c-0.5-0.235-0.715-0.83-0.48-1.33c0.234-0.501,0.831-0.715,1.33-0.48l2.902,1.362
	l0.255-4.656c0.03-0.552,0.502-0.974,1.053-0.944c0.551,0.03,0.974,0.502,0.944,1.053l-0.046,0.835
	c5.806,1.963,10.629,6.745,12.592,12.492c0.179,0.522-0.101,1.091-0.623,1.27c-0.107,0.037-0.216,0.054-0.323,0.054
	c-0.416,0-0.804-0.262-0.946-0.677C54.129,48.515,50.015,44.334,45.023,42.462z M35.802,47.247v24.44c0,0.552-0.448,1-1,1
	s-1-0.448-1-1v-24.44c0-0.552,0.448-1,1-1S35.802,46.695,35.802,47.247z M48.725,30.049h24c0.552,0,1,0.448,1,1s-0.448,1-1,1h-24
	c-0.552,0-1-0.448-1-1S48.172,30.049,48.725,30.049z"/>
                        </svg>
                    </div>
                    <x-camelui::heading size="sm" class="mt-6 group-hover:text-primary-800">
                        خدمة 3
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">

                        <svg class="w-full h-full fill-primary group-hover:fill-primary-800" viewBox="0 0 48 48"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M23 10H22H19.7639C20.3132 9.38625 21.1115 9 22 9C22.8885 9 23.6868 9.38625 24.2361 10H23ZM22 7C24.0503 7 25.8124 8.2341 26.584 10H27H28L29 10V12H28V17V18H27H25C24.087 18 23.2692 17.5921 22.719 16.9487C22.4842 16.9825 22.2442 17 22 17C19.2386 17 17 14.7614 17 12C17 9.23858 19.2386 7 22 7ZM24 12H26V16H25C24.4477 16 24 15.5523 24 15V12ZM5 22C5 19.7909 6.79086 18 9 18H8C7.44772 18 7 17.5523 7 17C7 16.4477 7.44772 16 8 16H12C12.5523 16 13 16.4477 13 17C13 17.5523 12.5523 18 12 18H11C12.0465 18 12.9991 18.4018 13.7119 19.0596C14.2622 18.4114 15.0831 18 16 18H18H22C24.2091 18 26 19.7909 26 22V28.5585L28.7433 29.4729L34.6046 27.0451L34.9659 27.9173L36.4801 26.3988L40.3659 22.5019L41.7821 23.9141L39.5976 26.1049H42.6882V28.1049H37.1882H35.0436L35.3699 28.8928L31.3755 30.5474C31.9217 31.0653 32.1511 31.8712 31.8974 32.6325C31.5691 33.6172 30.549 34.1767 29.5576 33.9506C28.2987 38.0332 24.4958 41 20 41C14.8147 41 10.5511 37.0533 10.0494 32H9C6.79086 32 5 30.2091 5 28V22ZM25.9295 32.7514L27.6563 33.327C26.6597 36.6103 23.6089 39 20 39C15.8729 39 12.4757 35.8748 12.0459 31.8619C13.7478 31.4021 15 29.8473 15 28V24V22V21C15 20.4477 15.4477 20 16 20V32C16 34.2091 17.7909 36 20 36H22C23.9523 36 25.5779 34.6013 25.9295 32.7514ZM18 20V32C18 33.1046 18.8954 34 20 34H22C23.0686 34 23.9414 33.1619 23.9972 32.1072L20.3675 30.8974C19.5509 30.6251 19 29.8609 19 29V23C19 21.8954 19.8954 21 21 21C22.1046 21 23 21.8954 23 23V27.5585L24 27.8918V22C24 20.8954 23.1046 20 22 20H18ZM10 22.5858L11.2929 21.2929L12.7071 22.7071L11.4142 24L12.7071 25.2929L11.2929 26.7071L10 25.4142L8.70711 26.7071L7.29289 25.2929L8.58579 24L7.29289 22.7071L8.70711 21.2929L10 22.5858Z"/>
                        </svg>
                    </div>
                    <x-camelui::heading size="sm" class="mt-6 group-hover:text-primary-800">
                        خدمة 4
                    </x-camelui::heading>
                </div>
                <div
                    class="text-center bg-white shadow-custom cursor-pointer p-8 flex flex-col items-center hover:bg-gray-200 hover:text-white group transition-all">
                    <div class="mx-auto w-24 h-24">

                        <svg class="w-full h-full fill-primary group-hover:fill-primary-800" viewBox="0 0 100 100"
                             xml:space="preserve" xmlns="http://www.w3.org/2000/svg">

<g id="tree"/>

                            <g id="plant"/>

                            <g id="flower"/>

                            <g id="flower_pot"/>

                            <g id="rose"/>

                            <g id="garden"/>

                            <g id="fance"/>

                            <g id="floral"/>

                            <g id="sunflower"/>

                            <g id="sprinkle"/>

                            <g id="water_hose"/>

                            <g id="planting">

                                <g>

                                    <path
                                        d="M92.8,82.1c-0.3-0.2-0.6-0.4-0.9-0.6c-0.3-0.2-0.8-0.7-1.2-1.2c-0.8-0.9-1.7-1.9-3-2.4c-0.9-0.3-1.9-0.2-2.8-0.1    c-0.7,0.1-1.4,0.2-2,0.1c-0.5-0.1-1-0.5-1.6-0.9c-0.8-0.6-1.8-1.2-2.9-1.3c-1-0.1-1.9,0.2-2.8,0.5c-0.7,0.2-1.4,0.5-1.9,0.4    c-0.5,0-1.1-0.3-1.8-0.7C71,75.5,70.1,75,69,75c-1.1,0-2,0.5-2.9,0.9C66,75.9,66,76,65.9,76c1.4-1.7,2.7-3.5,3.7-5.4l3.3-6.4    c0.1-0.2,0.1-0.5,0.1-0.8s-0.3-0.5-0.5-0.6l-6.2-3.2l7.4-14.2c0.1-0.3,0.4-0.5,0.7-0.5l3-0.5c0.9-0.2,1.7-0.7,2.2-1.6l3.2-6.2    c0.4-0.7,0.4-1.5,0.2-2.3c-0.2-0.8-0.8-1.4-1.5-1.8L72.5,28c-0.7-0.4-1.5-0.4-2.3-0.2c-0.8,0.2-1.4,0.8-1.8,1.5l-3.2,6.2    c-0.4,0.8-0.4,1.8,0,2.7l1.3,2.7c0.1,0.3,0.1,0.6,0,0.9l-7.4,14.2l-6.2-3.2c-0.5-0.3-1.1-0.1-1.3,0.4l-3.3,6.4    c-2.9,5.6-3.8,12.1-2.7,18.4c-0.2,0-0.5,0-0.7-0.1c-0.5-0.1-1-0.5-1.6-0.9c-0.8-0.6-1.8-1.2-2.9-1.3c-1-0.1-1.9,0.2-2.8,0.5    c-0.7,0.2-1.3,0.5-1.9,0.4c-0.5,0-1.1-0.3-1.8-0.7c-0.3-0.1-0.6-0.3-0.9-0.4V60.4l3.4-3.4c1.1-0.1,5.4-0.8,7.3-4.8c0,0,0,0,0,0    c2.1-4.2,1-11.1,0.9-11.4c-0.1-0.3-0.3-0.6-0.5-0.7c-0.3-0.1-0.6-0.1-0.9,0c-0.3,0.1-6.4,3.4-8.5,7.6c-1.7,3.3-0.6,6.6,0.1,8    L33,57.6V42.8c1.6-0.7,2.6-2.9,3-5.1c1.4,1,3.1,1.7,4.5,1.7c0.8,0,1.5-0.2,2.1-0.8c0,0,0,0,0,0c1.5-1.5,0.6-4.4-0.9-6.6    c2.6-0.5,5.3-1.9,5.3-4c0-2.1-2.7-3.5-5.3-4c1.5-2.2,2.4-5.1,0.9-6.6c-1.5-1.5-4.4-0.6-6.6,0.9c-0.5-2.6-1.9-5.3-4-5.3    s-3.5,2.7-4,5.3c-2.2-1.5-5.1-2.4-6.6-0.9c-1.5,1.5-0.6,4.4,0.9,6.6c-2.6,0.5-5.3,1.9-5.3,4s2.7,3.5,5.3,4    c-1.5,2.2-2.4,5.1-0.9,6.6c0.5,0.5,1.3,0.8,2.1,0.8c1.4,0,3.1-0.7,4.5-1.7c0.4,2.2,1.5,4.4,3,5.1v19.8l-1.8-1.8    c0.7-1.5,1.7-4.7,0.1-8c-2.1-4.2-8.2-7.5-8.5-7.6c-0.3-0.2-0.6-0.2-0.9,0c-0.3,0.1-0.5,0.4-0.5,0.7c0,0.3-1.1,7.2,0.9,11.4    c0,0,0,0,0,0c2,3.9,6.3,4.6,7.3,4.8l3.4,3.4V75c-1.1,0-2,0.5-2.9,0.9c-0.6,0.3-1.3,0.6-1.8,0.7c-0.6,0-1.2-0.2-1.9-0.4    c-0.9-0.3-1.8-0.6-2.8-0.5c-1.1,0.2-2,0.8-2.9,1.3c-0.6,0.4-1.2,0.8-1.6,0.9c-0.6,0.1-1.3,0-2-0.1c-0.9-0.1-1.9-0.3-2.8,0.1    c-1.3,0.5-2.2,1.5-3,2.4c-0.4,0.5-0.8,0.9-1.2,1.2c-0.3,0.2-0.6,0.4-0.9,0.6C5.6,83.1,4,84.1,4,86c0,0.6,0.4,1,1,1h38h14h38    c0.6,0,1-0.4,1-1C96,84.2,94.4,83.1,92.8,82.1z M36.5,48.6c1.3-2.6,4.5-4.8,6.3-6c0.2,2.1,0.3,6.1-0.9,8.7v0    c-1.3,2.6-4,3.4-5.3,3.6C36.1,53.8,35.3,51.2,36.5,48.6z M22.1,56.3L22.1,56.3c-1.3-2.6-1.1-6.6-0.9-8.7c1.8,1.1,5.1,3.4,6.3,6    c1.3,2.6,0.4,5.2-0.1,6.3C26.1,59.7,23.3,58.9,22.1,56.3z M33.4,31c-0.1,0.1-0.2,0.1-0.3,0.1c-0.7,0.2-1.4,0.2-2.2,0    c-0.1,0-0.2-0.1-0.3-0.1c0,0,0,0,0,0c0,0,0,0,0,0c-0.7-0.3-1.2-0.8-1.5-1.5c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.1-0.2-0.1-0.3    c0,0,0,0,0,0c-0.1-0.4-0.2-0.7-0.2-1.1s0.1-0.7,0.2-1.1c0-0.1,0.1-0.2,0.1-0.3c0,0,0,0,0,0c0,0,0,0,0,0c0.3-0.7,0.8-1.2,1.5-1.5    c0,0,0,0,0,0c0,0,0,0,0,0c0.1-0.1,0.2-0.1,0.3-0.1c0.7-0.2,1.4-0.2,2.2,0c0.1,0,0.2,0.1,0.3,0.1c0,0,0,0,0,0c0,0,0,0,0,0    c0.7,0.3,1.2,0.8,1.5,1.5c0,0,0,0,0,0c0,0,0,0,0,0c0.1,0.1,0.1,0.2,0.1,0.3c0.1,0.4,0.2,0.7,0.2,1.1s-0.1,0.7-0.2,1.1    c0,0.1-0.1,0.2-0.1,0.3c0,0,0,0,0,0c0,0,0,0,0,0C34.6,30.1,34.1,30.6,33.4,31C33.4,31,33.4,31,33.4,31C33.4,31,33.4,31,33.4,31z     M41.2,37.2L41.2,37.2c-0.5,0.5-3-0.1-5-1.8c0-0.1,0-0.1,0-0.2c0-0.2,0-0.5-0.1-0.7c0-0.1,0-0.2,0-0.3c0-0.2-0.1-0.4-0.1-0.5    c0-0.1,0-0.2-0.1-0.3c-0.1-0.2-0.1-0.3-0.2-0.5c0-0.1,0-0.1-0.1-0.2c-0.1-0.2-0.2-0.4-0.3-0.6c0,0,0,0,0,0    c0.3-0.2,0.5-0.4,0.7-0.7c0,0,0,0,0,0c0.2,0.1,0.4,0.2,0.6,0.3c0.1,0,0.1,0,0.2,0.1c0.2,0.1,0.3,0.1,0.5,0.2c0.1,0,0.2,0,0.3,0.1    c0.2,0,0.3,0.1,0.5,0.1c0.1,0,0.2,0,0.3,0c0.2,0,0.4,0,0.7,0.1c0.1,0,0.1,0,0.2,0C41.1,34.2,41.7,36.6,41.2,37.2z M45,28    c0,0.8-2.4,2.2-5.2,2.2c0,0-0.1,0-0.1,0c0,0-0.1,0-0.1,0c-0.3,0-0.6,0-0.9-0.1c-0.1,0-0.2,0-0.2,0c-0.2,0-0.4-0.1-0.5-0.1    c-0.1,0-0.2,0-0.2-0.1c-0.2-0.1-0.3-0.1-0.4-0.2c0,0-0.1-0.1-0.1-0.1c0,0,0,0,0,0c0.2-0.5,0.3-1.1,0.3-1.6c0-0.5-0.1-1.1-0.3-1.6    c0,0,0,0,0,0c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0.3-0.1,0.4-0.2c0.1,0,0.1-0.1,0.2-0.1c0.2,0,0.3-0.1,0.5-0.1c0.1,0,0.2,0,0.2,0    c0.3,0,0.6-0.1,0.9-0.1c0,0,0.1,0,0.1,0c0,0,0.1,0,0.1,0C42.6,25.8,45,27.2,45,28z M41.2,18.8c0.5,0.5-0.1,3-1.8,5    c-0.1,0-0.2,0-0.2,0c-0.2,0-0.5,0-0.7,0.1c-0.1,0-0.2,0-0.3,0c-0.2,0-0.4,0.1-0.5,0.1c-0.1,0-0.2,0-0.3,0.1    c-0.2,0.1-0.3,0.1-0.5,0.2c-0.1,0-0.1,0-0.2,0.1c-0.2,0.1-0.4,0.2-0.6,0.3c0,0,0,0,0,0c-0.2-0.3-0.4-0.5-0.7-0.7c0,0,0,0,0,0    c0.1-0.2,0.2-0.4,0.3-0.6c0-0.1,0-0.1,0.1-0.2c0.1-0.2,0.1-0.3,0.2-0.5c0-0.1,0-0.2,0.1-0.3c0-0.2,0.1-0.3,0.1-0.5    c0-0.1,0-0.2,0-0.3c0-0.2,0-0.4,0.1-0.7c0-0.1,0-0.1,0-0.2C38.2,18.9,40.6,18.3,41.2,18.8z M32,15c0.8,0,2.2,2.4,2.2,5.2    c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1c0,0.3,0,0.6-0.1,0.9c0,0.1,0,0.2,0,0.2c0,0.2-0.1,0.4-0.1,0.5c0,0.1,0,0.2-0.1,0.2    c-0.1,0.2-0.1,0.3-0.2,0.4c0,0,0,0.1-0.1,0.1c0,0,0,0,0,0c-0.5-0.2-1.1-0.3-1.6-0.3c-0.5,0-1.1,0.1-1.6,0.3c0,0,0,0,0,0    c0,0-0.1-0.1-0.1-0.1c-0.1-0.1-0.2-0.3-0.2-0.4c0-0.1-0.1-0.1-0.1-0.2c0-0.2-0.1-0.3-0.1-0.5c0-0.1,0-0.2,0-0.2    c0-0.3-0.1-0.6-0.1-0.9c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1C29.8,17.4,31.2,15,32,15z M22.8,18.8c0.5-0.5,3,0.1,5,1.8    c0,0.1,0,0.1,0,0.2c0,0.2,0,0.5,0.1,0.7c0,0.1,0,0.2,0,0.3c0,0.2,0.1,0.4,0.1,0.5c0,0.1,0,0.2,0.1,0.3c0.1,0.2,0.1,0.3,0.2,0.5    c0,0.1,0,0.1,0.1,0.2c0.1,0.2,0.2,0.4,0.3,0.6c0,0,0,0,0,0c-0.3,0.2-0.5,0.4-0.7,0.7c0,0,0,0,0,0c-0.2-0.1-0.4-0.2-0.6-0.3    c-0.1,0-0.1,0-0.2-0.1c-0.2-0.1-0.3-0.1-0.5-0.2c-0.1,0-0.2,0-0.3-0.1c-0.2,0-0.3-0.1-0.5-0.1c-0.1,0-0.2,0-0.3,0    c-0.2,0-0.4,0-0.7-0.1c-0.1,0-0.1,0-0.2,0C22.9,21.8,22.3,19.4,22.8,18.8z M19,28c0-0.8,2.4-2.2,5.2-2.2c0,0,0.1,0,0.1,0    c0,0,0.1,0,0.1,0c0.3,0,0.6,0,0.9,0.1c0.1,0,0.2,0,0.2,0c0.2,0,0.4,0.1,0.5,0.1c0.1,0,0.2,0,0.2,0.1c0.2,0.1,0.3,0.1,0.4,0.2    c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0c-0.2,0.5-0.3,1.1-0.3,1.6s0.1,1.1,0.3,1.6c0,0,0,0,0,0c0,0-0.1,0.1-0.1,0.1    c-0.1,0.1-0.3,0.1-0.4,0.2c-0.1,0-0.1,0.1-0.2,0.1c-0.2,0-0.3,0.1-0.5,0.1c-0.1,0-0.2,0-0.2,0c-0.3,0-0.6,0.1-0.9,0.1    c0,0-0.1,0-0.1,0c0,0-0.1,0-0.1,0C21.4,30.2,19,28.8,19,28z M22.8,37.2c-0.5-0.5,0.1-3,1.8-5c0.1,0,0.2,0,0.2,0    c0.2,0,0.5,0,0.7-0.1c0.1,0,0.2,0,0.3,0c0.2,0,0.4-0.1,0.5-0.1c0.1,0,0.2,0,0.3-0.1c0.2-0.1,0.3-0.1,0.5-0.2c0.1,0,0.1,0,0.2-0.1    c0.2-0.1,0.4-0.2,0.6-0.3c0,0,0,0,0,0c0.2,0.3,0.4,0.5,0.7,0.7c0,0,0,0,0,0c-0.1,0.2-0.2,0.4-0.3,0.6c0,0.1,0,0.1-0.1,0.2    c-0.1,0.2-0.1,0.3-0.2,0.5c0,0.1,0,0.2-0.1,0.3c0,0.2-0.1,0.3-0.1,0.5c0,0.1,0,0.2,0,0.3c0,0.2,0,0.4-0.1,0.7c0,0.1,0,0.1,0,0.2    C25.8,37.1,23.3,37.7,22.8,37.2z M29.8,35.8c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1c0-0.3,0-0.6,0.1-0.9c0-0.1,0-0.2,0-0.2    c0-0.2,0.1-0.4,0.1-0.5c0-0.1,0-0.2,0.1-0.2c0.1-0.2,0.1-0.3,0.2-0.4c0,0,0-0.1,0.1-0.1c0,0,0,0,0,0c1.1,0.3,2.2,0.3,3.2,0    c0,0,0,0,0,0c0,0,0.1,0.1,0.1,0.1c0.1,0.1,0.2,0.3,0.2,0.4c0,0.1,0.1,0.1,0.1,0.2c0,0.2,0.1,0.3,0.1,0.5c0,0.1,0,0.2,0,0.2    c0,0.3,0.1,0.6,0.1,0.9c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1C34.2,38.6,32.8,41,32,41S29.8,38.6,29.8,35.8z M60.9,56.9l7.4-14.2    c0.4-0.8,0.4-1.8,0-2.7L67,37.3c-0.1-0.3-0.1-0.6,0-0.9l3.2-6.2c0.1-0.2,0.3-0.4,0.6-0.5c0.3-0.1,0.5-0.1,0.8,0.1l8.9,4.6    c0.2,0.1,0.4,0.3,0.5,0.6c0.1,0.3,0.1,0.5-0.1,0.8l-3.2,6.2c-0.1,0.3-0.4,0.5-0.7,0.5l-3,0.5c-0.9,0.2-1.7,0.7-2.2,1.6l-7.4,14.2    l-1-0.5L60.9,56.9z M50,60.5l2.9-5.5l9.3,4.8l2.3,1.2c0,0,0,0,0,0l6.2,3.2l-2.9,5.6c-1.3,2.4-2.9,4.6-4.9,6.6    c-0.2-0.1-0.3-0.1-0.5-0.2c-0.9-0.3-1.8-0.6-2.8-0.5c-1.1,0.2-2,0.8-2.9,1.4c-0.6,0.4-1.2,0.8-1.6,0.9c-0.6,0.1-1.3,0-2-0.1    c-0.9-0.1-1.9-0.3-2.8,0.1c-0.1,0-0.2,0.1-0.3,0.2c-0.1,0-0.2-0.1-0.3-0.2c-0.7-0.3-1.4-0.2-2.1-0.2C46.4,71.9,47.3,65.8,50,60.5z     M43,85H6.5c0.4-0.4,1-0.8,1.8-1.3c0.3-0.2,0.6-0.4,1-0.6c0.5-0.4,1-0.9,1.5-1.5c0.7-0.8,1.4-1.6,2.2-1.9c0.5-0.2,1.1-0.1,1.8,0    c0.8,0.1,1.8,0.3,2.8,0c0.8-0.2,1.6-0.7,2.3-1.2c0.7-0.5,1.4-0.9,2-1c0.5-0.1,1.2,0.2,1.9,0.4c0.8,0.3,1.7,0.6,2.7,0.5    c0.9-0.1,1.7-0.5,2.5-0.9c0.7-0.4,1.4-0.7,2-0.7c0.6,0,1.3,0.3,2,0.7c0.8,0.4,1.6,0.8,2.5,0.9c1,0.1,1.9-0.3,2.7-0.5    c0.7-0.2,1.4-0.5,1.9-0.4c0.6,0.1,1.3,0.6,2,1c0.7,0.5,1.5,1,2.3,1.2c1,0.2,1.9,0.1,2.8,0c0.7-0.1,1.4-0.2,1.8,0    c0.8,0.3,1.5,1.1,2.2,1.9c0.5,0.6,1,1.1,1.5,1.5c0.3,0.2,0.6,0.4,1,0.6c0.8,0.5,1.4,0.9,1.8,1.3H43z M57.8,85    c-0.5-1.3-1.7-2.1-3.1-3c-0.3-0.2-0.6-0.4-0.9-0.6c-0.3-0.2-0.7-0.7-1.2-1.2c-0.2-0.2-0.3-0.4-0.5-0.6c0.2,0,0.5,0.1,0.7,0.1    c0.8,0.1,1.8,0.3,2.8,0c0.8-0.2,1.6-0.7,2.3-1.2c0.7-0.5,1.4-0.9,2-1c0.5-0.1,1.2,0.2,1.9,0.4c0.3,0.1,0.7,0.2,1,0.3c0,0,0,0,0,0    c0.5,0.1,1.1,0.3,1.7,0.2c0.9-0.1,1.7-0.5,2.5-0.9c0.7-0.4,1.4-0.7,2-0.7c0.6,0,1.3,0.3,2,0.7c0.8,0.4,1.6,0.8,2.5,0.9    c1,0.1,1.9-0.3,2.7-0.5c0.7-0.2,1.4-0.5,1.9-0.4c0.6,0.1,1.3,0.6,2,1c0.7,0.5,1.5,1,2.3,1.2c1,0.2,1.9,0.1,2.8,0    c0.7-0.1,1.4-0.2,1.8,0c0.8,0.3,1.5,1.1,2.2,1.9c0.5,0.6,1,1.1,1.5,1.5c0.3,0.2,0.7,0.4,1,0.7c0.8,0.5,1.4,0.9,1.8,1.3H57.8z"/>

                                    <path
                                        d="M71.5,38.7l1.8,0.9c0.4,0.2,0.9,0.3,1.4,0.3c1.1,0,2.1-0.6,2.7-1.6c0.4-0.7,0.4-1.5,0.2-2.3c-0.2-0.8-0.8-1.4-1.5-1.8    l-1.8-0.9c-0.7-0.4-1.5-0.4-2.3-0.2c-0.8,0.2-1.4,0.8-1.8,1.5C69.4,36.1,70,37.9,71.5,38.7z M71.9,35.5c0.1-0.2,0.3-0.4,0.6-0.5    c0.3-0.1,0.5-0.1,0.8,0.1l1.8,0.9c0.2,0.1,0.4,0.3,0.5,0.6c0.1,0.3,0.1,0.5-0.1,0.8c-0.3,0.5-0.9,0.7-1.3,0.4l-1.8-0.9    C71.9,36.6,71.7,36,71.9,35.5z"/>

                                </g>

                            </g>

                            <g id="fertilizer"/>

                            <g id="bee"/>

                            <g id="butterfly"/>

                            <g id="shovel"/>

                            <g id="ladybug"/>

                            <g id="watering"/>

                            <g id="hanging_pot"/>

                            <g id="green_house"/>

</svg>
                    </div>
                    <x-camelui::heading size="sm" class="mt-6 group-hover:text-primary-800">
                        خدمة 5
                    </x-camelui::heading>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
</div>
