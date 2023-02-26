<x-guest-layout>
    <h1 class="text-center font-bold py-10 text-3xl text-black">Nos réalisations</h1>

    <div class="relative flex items-center justify-center w-full p-10 dark:text-gray-50">
      <button aria-label="Slide back" type="button" class="absolute left-0 z-30 p-2 ml-10 focus:outline-none focus:dark:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
        <svg width="8" height="14" fill="none" viewBox="0 0 8 14" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
          <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </button>
      <div class="flex items-center justify-start w-full h-full gap-6 py-4 mx-auto overflow-auto lg:gap-8">
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/hulk.jpg" alt="Image 1">
        </div>
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/minie.jpg" alt="Image 2">
        </div>
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/cars.jpg" alt="Image 3">
        </div>
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/sonic.jpg" alt="Image 4">
        </div>
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/spider.jpg" alt="Image 5">
        </div>
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/stranger.jpg" alt="Image 6">
        </div>
        <div class="relative flex flex-shrink-0 w-full sm:w-auto">
          <img class="object-cover object-center h-96 aspect-square dark:bg-gray-500" src="img/set-pat-patrouille.jpg" alt="Image 7">
        </div>
      </div>
      <button aria-label="Slide forward" id="next" class="absolute right-0 z-30 p-2 mr-10 focus:outline-none focus:dark:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
          <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </button>
    </div>
</x-guest-layout>
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

