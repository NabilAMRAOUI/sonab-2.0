<x-app-layout>
    <h1 class="text-center font-bold py-10 text-3xl text-black">Nos réalisations</h1>

{{-- <div class="container lg:px-32 px-4 py-8 mx-auto items-center ">
  <div class="grid grid-cols-4 grid-rows-4 grid-flow-col gap-2">
    <div class="w-full row-span-2">
      <img
        src="/img/hulk.jpg"
        alt="hulk"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
    <div class="w-full col-span-2 row-span-2">
      <img
        src="/img/stranger.jpg"
        alt="stranger things"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
    <div class="w-full ">
      <img
        src="/img/cars.jpg"
        alt="cars"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
    <div class="w-full">
      <img
        src="/img/lol.jpg"
        alt="lol surprise"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
    <div class="w-full col-span-2 row-span-2">
      <img
        src="/img/set-pat-patrouille.jpg"
        alt="pack pat-patrouille"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
   
    <div class="w-full col-span-2">
      <img
        src="/img/sonic.jpg"
        alt="sonic"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
    <div class="w-full">
      <img
        src="/img/spider.jpg"
        alt="spider man"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
    <div class="w-full">
      <img
        src="/img/minie.jpg"
        alt="minie"
        class="inset-0 h-full w-full object-cover object-center rounded">
    </div>
  </div>
</div> --}}
<!-- component -->
<!-- This is an example component -->
<!-- component -->
<script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

<article x-data="slider" class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl">
    <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
        <span x-text="currentIndex"></span>/
        <span x-text="images.length"></span>
    </div>

    <template x-for="(image, index) in images">
        <figure class="h-screen " x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-scale-down opacity-70 " />
        
        </figure>
    </template>

    <button @click="back()"
        class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </button>

    <button @click="next()"
    class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</article>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                'img/hulk.jpg',
                'img/minie.jpg',
                'img/sonic.jpg',
                'img/cars.jpg',
                'img/la-petite-sirene.jpg',
                'img/lol.jpg',
                'img/set-pat-patrouille.jpg',
                'img/spider.jpg',
                'img/stranger.jpg',
              
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>
</x-app-layout>
