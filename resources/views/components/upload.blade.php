@props(['title', 'name'])

<div x-data="{ fileName: '' }" class="flex items-center justify-center w-full p-6">
    <label for="{{ $name }}"
        class="flex flex-col items-center justify-center w-full h-32 border-2 border-red-600 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <x-svg />
            <p class="mb-2 text-red-800">{{ $title }}</p>
            <template x-if="fileName">
                <p class="text-sm text-gray-500 mt-2">📁 <span x-text="fileName"></span></p>
            </template>
        </div>
        <input
            id="{{ $name }}"
            type="file"
            class="hidden"
            name="{{ $name }}"
            @change="fileName = $event.target.files[0]?.name || ''"
        />
    </label>
</div>
