<div class="mt-6 space-y-6">
    <div>
        <flux:heading size="lg" level="3">Register for this event:</flux:heading>

        @if (session('success'))
            <div class="rounded-md bg-green-50 p-4 border border-green-200 mt-3">
                <div class="flex items-center">
                    <flux:icon.check class="h-5 w-5 text-green-500" />
                    <p class="ml-2 text-sm font-medium text-green-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        @elseif(session('error'))
            <div class="rounded-md bg-red-50 p-4 border border-red-200 mt-3">
                <div class="flex items-center">
                    <flux:icon.exclamation-circle class="h-5 w-5 text-red-500" />
                    <p class="ml-2 text-sm font-medium text-red-800">
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4 mt-4">
            <flux:input label="Name" type="text" wire:model.defer="name" />

            <flux:input label="Email" type="email" wire:model.defer="email" />

            <flux:input label="Phone (optional)" type="text" mask="(012) 345-6789" placeholder="(012) 345-6789" wire:model.defer="phone" />
{{--            @error('phone') <p class="text-sm text-red-600">{{ $message }}</p> @enderror handle errors by myself if needed (:errorless="true")--}}

            <flux:button type="submit" variant="primary">Register</flux:button>
        </form>
    </div>
</div>
