@props(['provider'])
<div class="mt-6 mb-2 space-y-6">
    <div class="relative flex items-center">
        <div class="flex-grow border-t border-gray-400"></div>
        <span class="flex-shrink px-6 text-gray-400">
            {{ __('Or Login Via') }}
        </span>
        <div class="flex-grow border-t border-gray-400"></div>
    </div>

    <div class="grid gap-4">
        <a class="flex gap-2 items-center justify-center transition duration-200 border border-gray-400 w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md"
            href='{{ route('auth.redirect') }}' type="button">
            <x-socialstream-icons.azure class="w-6 h-6" />
            <span class="block text-sm font-medium text-gray-700">{{ __('Microsoft') }}</span>
        </a>
    </div>
</div>
