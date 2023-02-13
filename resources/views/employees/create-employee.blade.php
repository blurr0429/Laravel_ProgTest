<x-layout>
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add an Employee
        </h2>
        {{-- <p class="mb-4">Post a gig to find a developer</p> --}}
    </header>

    <form method="POST" action="/employees">
        {{-- MUS HAVE TO AVOID CROSS SITE SCRIPTING @CSRF --}}
        @csrf
        <div class="mb-6">
            <label
                for="firstname"
                class="inline-block text-lg mb-2"
                >Firstname</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="firstname"
                {{-- TO KEEP THE OLD TEXT WHEN YOU SUBMIT AN INCOMPLETE FORM --}}
                value="{{old('firstname')}}"
            />

            @error('firstname')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="lastname"
                class="inline-block text-lg mb-2"
                >Lastname</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="lastname"
                {{-- TO KEEP THE OLD TEXT WHEN YOU SUBMIT AN INCOMPLETE FORM --}}
                value="{{old('lastname')}}"
            />

            @error('lastname')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="companyId"
                class="inline-block text-lg mb-2"
                >Company Id</label
            >
            <input
                type="number"
                class="border border-gray-200 rounded p-2 w-full"
                name="companyId"
                {{-- TO KEEP THE OLD TEXT WHEN YOU SUBMIT AN INCOMPLETE FORM --}}
                value="{{old('companyId')}}"
            />

            @error('companyId')
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
                for="phone"
                class="inline-block text-lg mb-2"
            >
                Phone Number
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="phone"
                value="{{old('phone')}}"
            />

            @error('phone')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-yellow-300 text-balck rounded py-2 px-4 hover:bg-black hover:text-white"
            >
                Add Employee
            </button>

            <a href="/listings" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
</x-layout>