<div class="relative inline-block text-right w-full">
    <button wire:click="toggle"
            class="px-4 py-2 bg-gray-600 text-white font-bold rounded">
        {{ $open ? 'X' : 'Add Section' }}
    </button>

    @if($open)
        <div class=" mt-2 w-80 bg-white border rounded-lg shadow-lg p-4 z-50">
            <form method="POST" action="{{ route('section.store') }}">
              @csrf
                <input type="hidden" name="technology_id" value="{{ $modelId }}">

                <div class="mb-3">
                    <label class="block text-sm font-medium">العنوان</label>
                    <input type="text" name="title"
                           placeholder="أدخل العنوان هنا"
                           class="w-full border rounded px-2 py-1 text-right"
                           dir="rtl">
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium">المحتوى</label>
                    <textarea name="content"
                              rows="4"
                              placeholder="أدخل المحتوى هنا"
                              class="w-full border rounded px-2 py-1 text-right"
                              dir="rtl"></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" wire:click="toggle"
                            class="px-3 py-1 border rounded">
                        إلغاء
                    </button>
                    <button type="submit"
                            class="px-3 py-1 bg-green-600 text-white rounded">
                        حفظ
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
