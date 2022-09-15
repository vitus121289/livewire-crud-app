<div class="flex items-center justify-center min-h-screen">
    <div class="px-8 py-6 mx-2 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:m-1/3">
        <form
            {{ $attributes }}
        >
            {{ $slot }}
        </form>
    </div>
</div>