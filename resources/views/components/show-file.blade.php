@props(['fileUrl', 'label'])

<div class="mt-4">
    @if ($fileUrl)
        <div class="mb-2">
            <x-form-label :label="$label" />
        </div>
        @if (pathinfo($fileUrl, PATHINFO_EXTENSION) === 'pdf')
            <embed src="{{ asset($fileUrl) }}" type="application/pdf" width="100%" height="600px">
        @else
            <img src="{{ asset($fileUrl) }}" alt="Article File" class="h-64 w-auto object-cover">
        @endif
    @else
        <span class="text-gray-400">No file uploaded</span>
    @endif
</div>
