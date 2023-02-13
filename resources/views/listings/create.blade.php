<x-layout>
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add a Partner Company
        </h2>
        {{-- <p class="mb-4">Post a gig to find a developer</p> --}}
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
        {{-- MUS HAVE TO AVOID CROSS SITE SCRIPTING @CSRF --}}
        @csrf
        <div class="mb-6">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >Company Name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                {{-- TO KEEP THE OLD TEXT WHEN YOU SUBMIT AN INCOMPLETE FORM --}}
                value="{{old('name')}}"
            />

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{old('email')}}"
            />

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="website"
                class="inline-block text-lg mb-2"
            >
                Website/Application URL
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website"
                value="{{old('website')}}"
            />

            @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Company Logo
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="logo"
            />
            @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-yellow-300 text-balck rounded py-2 px-4 hover:bg-black hover:text-white"
            >
                Add Company
            </button>

            <a href="/listings" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
</x-layout>