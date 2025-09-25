@php
    $cases = $enum::cases();
    $selectedCase = collect($cases)->firstWhere('value', $value);
@endphp

<flux:dropdown>
    <flux:button icon:trailing="chevron-down">
        {{ $selectedCase?->name ?? $value }}
    </flux:button>

    <flux:menu>
        @foreach ($cases as $case)
            <flux:menu.item
                wire:click="$set('{{ $wireModel }}', '{{ $case->value }}')"
            >
                @if ($case->value === $value)
                    <flux:icon.check class="w-4 h-4 inline text-green-600" />
                @endif
                {{ $case->name }}
            </flux:menu.item>
        @endforeach
    </flux:menu>
</flux:dropdown>
