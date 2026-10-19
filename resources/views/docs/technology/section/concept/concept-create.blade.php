<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('إنشاء مفهوم جديد') }}
        </h2>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Card Container -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700/60 transition-all">

                <!-- Card Header with Gradient Accent -->
                <div
                    class="relative px-6 py-6 bg-gradient-to-r from-emerald-500/10 via-teal-500/5 to-transparent border-b border-gray-100 dark:border-gray-700/60">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <div class="p-2.5 bg-emerald-600 text-white rounded-xl shadow-md shadow-emerald-500/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">إضافة مفهوم إلى:
                                {{ $section->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">املأ التفاصيل أدناه لإنشاء مفهوم أو دالة جديدة تحت هذا القسم.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('concept.store', $section) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                    @csrf

                    <!-- Field: Type Selection -->
                    <div class="space-y-2">
                        <x-input-label for="type" :value="'نوع المفهوم'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <select id="type" name="type"
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 shadow-sm">
                            <option value="concept" {{ old('type') == 'concept' ? 'selected' : '' }}>مفهوم (مفهوم عام / شرح)</option>
                            <option value="function" {{ old('type') == 'function' ? 'selected' : '' }}>دالة جاهزة (Built-in Function)</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Title / Function Name -->
                    <div class="space-y-2">
                        <x-input-label for="title" :value="'العنوان / اسم الدالة'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <div class="relative">
                            <x-text-input id="title" name="title" type="text"
                                class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 shadow-sm"
                                placeholder="مثال: array_map() أو Dependency Injection" :value="old('title')" required
                                autofocus dir="auto" />
                        </div>
                        <x-input-error :messages="$errors->get('title')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Syntax / Signature (Optional) -->
                    <div class="space-y-2">
                        <x-input-label for="syntax" :value="'صيغة الكود / التوقيع (اختياري)'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="syntax" name="syntax" type="text"
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 shadow-sm font-mono text-sm"
                            placeholder="مثال: array_map(?callable $callback, array $array1, array ...$arrays): array"
                            :value="old('syntax')" dir="ltr" />
                        <x-input-error :messages="$errors->get('syntax')" class="mt-1 text-xs" />
                    </div>

                    <!-- return type -->
                    <div class="space-y-2">
                        <x-input-label for="return_type" :value="'نوع القيمة المرجعة (Return Type)'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <div class="relative">
                            <x-text-input id="return_type" name="return_type" type="text"
                                class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 shadow-sm font-mono text-sm"
                                placeholder="مثال: array, string, void, mixed"
                                autofocus dir="ltr" />
                        </div>
                        <x-input-error :messages="$errors->get('return_type')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">وصف أو محتوى المفهوم</label>

                        <!-- المكان اللي هيترسم فيه المحرر -->
                        <div id="markdown-editor"></div>

                        <!-- حقل مخفي لتخزين محتوى الماركداون وإرساله للكونترولر -->
                        <input type="hidden" name="description" id="description-input" value="">

                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100 dark:border-gray-700/60">
                        <a href="{{ isset($section) ? route('section.show', $section) : route('technology.index') }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-all duration-200">
                            إلغاء
                        </a>

                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/35 active:scale-[0.98] transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>حفظ المفهوم</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
