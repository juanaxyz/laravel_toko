<div x-data="{
    currentSlide: 0,
    slides: [
        'https://placehold.co/1200x400/3b82f6/ffffff?text=Slide+1',
        'https://placehold.co/1200x400/10b981/ffffff?text=Slide+2',
        'https://placehold.co/1200x400/f59e0b/ffffff?text=Slide+3',
        'https://placehold.co/1200x400/ef4444/ffffff?text=Slide+4',
        'https://placehold.co/1200x400/8b5cf6/ffffff?text=Slide+5'
    ],
    autoplay: null,
    init() {
        this.startAutoplay();
    },
    startAutoplay() {
        this.autoplay = setInterval(() => {
            this.next();
        }, 5000);
    },
    stopAutoplay() {
        clearInterval(this.autoplay);
    },
    next() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prev() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    },
    goTo(index) {
        this.currentSlide = index;
    }
}" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()" class="relative w-full">

    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform translate-x-0"
                x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0">
                <img :src="slide" class="block w-full h-full object-cover" alt="Carousel slide">
            </div>
        </template>
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
        <template x-for="(slide, index) in slides" :key="index">
            <button type="button" @click="goTo(index)"
                :class="currentSlide === index ? 'bg-white' : 'bg-white/50 hover:bg-white/80'"
                class="w-3 h-3 rounded-full transition-colors duration-200" :aria-current="currentSlide === index"
                :aria-label="'Slide ' + (index + 1)">
            </button>
        </template>
    </div>

    <!-- Slider controls - Previous -->
    <button type="button" @click="prev()"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white/70 transition-colors duration-200">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>

    <!-- Slider controls - Next -->
    <button type="button" @click="next()"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white/70 transition-colors duration-200">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m9 5 7 7-7 7" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
