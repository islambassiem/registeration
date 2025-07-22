@props(['title', 'name'])
<div class="flex items-center justify-center w-full p-6">
    <label for="{{ $name }}"
        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <x-svg />
            <p class="mb-2 text-gray-800">{{ $title }}</p>
        </div>
        <input id="{{ $name }}" type="file" class="hidden" name="{{ $name }}" />
    </label>
</div>
