@props(['title', 'name'])

<div x-data="{
    fileName: '',
    updateFile($el) {
        const file = $el.files[0] || null;
        this.fileName = file?.name || '';
        $dispatch('input', file); // This fires an input event so Alpine x-model can catch it
    }
}" x-init="$watch('fileName', () => $dispatch('input', fileName))" @change="updateFile($event.target)"
    class="flex items-center justify-center w-full p-6" x-modelable="fileName">
    <label for="{{ $name }}"
        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <x-svg />
            <p class="mb-2 text-gray-800">{{ $title }}</p>
            <template x-if="fileName">
                <p class="text-sm text-gray-500 mt-2" x-text="fileName"></p>
            </template>
        </div>

        <input id="{{ $name }}" type="file" class="hidden" name="{{ $name }}"
            @change="updateFile($event.target)" />
    </label>
</div>
