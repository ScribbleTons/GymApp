<x-guest-layout>
    <nav class="flex bg-green-200 p-4 sm:w-full">
        <div class="w-4/5 sm:w-full md:3/5 mr-4">
            <a href="/" class="m-2">
                <h1 class="inline-block px-2 border-r-2 border-solid border-blue-900 font-extrabold text-2xl text-blue-900">
                    Afridev
                </h1>
            </a>
            <a href="/portfolio" class="font-medium text-lg text-black hover:text-blue-900">Portfolio</a>
        </div>
        <div class="w-1/5 sm:w-full md:w-2/5 align-middle justify-center ">
            <jet-nav-link href="/blog" class="font-semibold text-lg text-blue-900 active:text-gray-600">Blog</jet-nav-link>
            <jet-nav-link href="/about" class="m-2 font-semibold text-lg text-blue-900  active:text-gray-600">About Me</jet-nav-link>
            <jet-nav-link href="/contact" class="m-2 font-semibold text-lg text-blue-900 active:text-gray-600">Contact Me</jet-nav-link>
        </div>
    </nav>
    <hr class="bg-blue-900 border-4 border-blue-900">
    <section class="align-center">
       {{$slot}}
    </section>
    
    
    <footer class="bg-green-200 mt-2 justify-items-center">
    <hr class="bg-blue-900 border-4 border-blue-900">
        <div class="flex font-semibold text-blue-900 py-4">
            <div class="w-1/2 sm:w-full ml-4">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/portfolio">Portfolio</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/about">About Me</a></li>
                    <li><a href="/contact">Contact Me</a></li>
                </ol>
            </div>
            <div class="w-1/2 sm:w-full">
                <ol>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Git Hub</a></li>
                </ol>
            </div>
        </div>
        <div class="text-green-200 bg-blue-900" id="credit" style="text-align:center;">
            &copy Copyright <script>var date = new Date(); document.write(date.getFullYear());</script> | All Right Reserved 
        </div>
    </footer>
</x-guest-layout>
