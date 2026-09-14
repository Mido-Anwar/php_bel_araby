<div dir="rtl"
    class="min-h-[calc(100vh-80px)] bg-slate-950 text-slate-100 flex flex-col lg:flex-row overflow-hidden border-t border-slate-800/80"
    x-data="{
        activeView: 'tech',
        activeConcept: { title: '', description: '', type: '', syntax: '', return_type: '' },
        openSections: {},

        toggleSection(id) {
            this.openSections[id] = !this.openSections[id];
        },

        selectConcept(concept) {
            this.activeConcept = concept;
            this.activeView = 'concept';
        },

        resetView() {
            this.activeView = 'tech';
            this.activeConcept = { title: '', description: '', type: '', syntax: '', return_type: '' };
        }
    }">

    <!-- القائمة الجانبية للتنقل (Sidebar) -->
    <aside
        class="w-full lg:w-80 bg-slate-900/90 border-l border-slate-800 p-6 overflow-y-auto max-h-[calc(100vh-80px)] backdrop-blur-md">

        <!-- عنوان التكنولوجيا -->
        <div class="mb-6 pb-4 border-b border-slate-800 cursor-pointer" @click="resetView()">
            <span class="text-xs text-yellow-400 font-semibold uppercase tracking-wider">توثيق رسمي</span>
            <h2 class="text-xl font-extrabold text-white mt-1 hover:text-yellow-400 transition-colors">
                {{ $technology->name }}</h2>
        </div>

        <div class="space-y-4">
            @foreach ($technology->sections as $section)
                <div class="space-y-2" x-data="{ secId: 'sec-{{ $section->id }}' }">
                    <!-- زر القسم الرئيسي -->
                    <button @click="toggleSection(secId)"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl bg-[#1e293b] text-[#f3ebeb] border border-slate-700/50 hover:bg-[#2b384f] hover:text-yellow-400 transition-all duration-300 shadow-md">
                        <span class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                            {{ $section->title }}
                        </span>
                        <svg class="w-4 h-4 text-slate-400 transform transition-transform duration-300"
                            :class="openSections[secId] ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- محتوى القسم (يفتح ويغلق مع الأكورديون) -->
                    <div :id="secId" x-show="openSections[secId]" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="space-y-3 pr-3 border-r-2 border-slate-800 mr-2">

                        @php
                            $concepts = $section->concepts->where('type', '!=', 'function');
                            $functions = $section->concepts->where('type', '===', 'function');
                        @endphp

                        <!-- 1. قائمة المفاهيم (Concepts Loop) -->
                        @if ($concepts->count() > 0)
                            <div class="space-y-1">
                                <span class="text-[11px] text-slate-500 font-semibold px-2 block">المفاهيم</span>
                                <ul class="space-y-1">
                                    @foreach ($concepts as $concept)
                                        <li>
                                            <button
                                                @click="selectConcept({
                                                        title: @js($concept->title),
                                                        description: @js($concept->description),
                                                        type: @js($concept->type),
                                                        syntax: @js($concept->syntax),
                                                        return_type: @js($concept->return_type)
                                                    })"
                                                :class="activeConcept.title === @js($concept->title) ?
                                                    'bg-yellow-500/10 text-yellow-400 border-r-2 border-yellow-400' :
                                                    'text-slate-400 hover:text-yellow-400 hover:bg-[#2b384f]'"
                                                class="w-full text-right px-3 py-1.5 rounded-lg text-xs transition-all flex items-center justify-between group">
                                                <span class="truncate">{{ $concept->title }}</span>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                    </div>
                </div>
            @endforeach
            @foreach ($technology->sections as $section)
                <div class="space-y-2" x-data="{ secId: 'sec-{{ $section->id }}' }">
                    <!-- زر القسم الرئيسي -->
                    <button @click="toggleSection(secId)"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl bg-[#1e293b] text-[#f3ebeb] border border-slate-700/50 hover:bg-[#2b384f] hover:text-yellow-400 transition-all duration-300 shadow-md">
                        <span class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                            {{ $section->title }} (الدوال المدمجة)
                        </span>
                        <svg class="w-4 h-4 text-slate-400 transform transition-transform duration-300"
                            :class="openSections[secId] ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- محتوى القسم (يفتح ويغلق مع الأكورديون) -->
                    <div :id="secId" x-show="openSections[secId]" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="space-y-3 pr-3 border-r-2 border-slate-800 mr-2">

                        @php
                            $concepts = $section->concepts->where('type', '!=', 'function');
                            $functions = $section->concepts->where('type', '===', 'function');
                        @endphp


                        <!-- 2. قائمة الدوال (Functions Loop) -->
                        @if ($functions->count() > 0)
                            <div class="space-y-1 pt-1">
                                <span class="text-[11px] text-blue-400/80 font-semibold px-2 block">الدوال
                                    البرمجية</span>
                                <ul class="space-y-1">
                                    @foreach ($functions as $func)
                                        <li>
                                            <button
                                                @click="selectConcept({
                                                        title: @js($func->title),
                                                        description: @js($func->description),
                                                        type: @js($func->type),
                                                        syntax: @js($func->syntax),
                                                        return_type: @js($func->return_type)
                                                    })"
                                                :class="activeConcept.title === @js($func->title) ?
                                                    'bg-blue-500/10 text-blue-400 border-r-2 border-blue-400' :
                                                    'text-slate-400 hover:text-blue-400 hover:bg-[#2b384f]'"
                                                class="w-full text-right px-3 py-1.5 rounded-lg text-xs transition-all flex items-center justify-between group">
                                                <span class="truncate font-mono">{{ $func->title }}</span>
                                                <span
                                                    class="text-[9px] px-1.5 py-0.2 rounded bg-blue-500/10 text-blue-400 border border-blue-500/20">func</span>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </aside>

    <!-- منطقة عرض المحتوى الرئيسية -->
    <main class="flex-1 p-6 sm:p-10 lg:p-12 overflow-y-auto max-h-[calc(100vh-80px)] bg-slate-950 relative">

        <!-- خلفية جمالية -->
        <div class="absolute top-10 left-10 w-72 h-72 bg-yellow-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <!-- 1. الشاشة الافتراضية (وصف التكنولوجيا) -->
        <div x-show="activeView === 'tech'" class="max-w-4xl mx-auto space-y-6">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 border border-slate-800 text-yellow-400 text-xs font-medium">
                نظرة عامة على التكنولوجيا
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                {{ $technology->name }}
            </h1>
            <div
                class="prose prose-invert prose-yellow text-slate-300 text-base sm:text-lg leading-loose whitespace-pre-line bg-slate-900/60 p-6 sm:p-8 rounded-2xl border border-slate-800/80 shadow-lg">
                {{ $technology->description }}
            </div>
        </div>

        <!-- 2. شاشة عرض المفهوم أو الدالة -->
        <div x-show="activeView === 'concept'" x-cloak class="max-w-4xl mx-auto space-y-6">

            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-md text-xs font-semibold border"
                    :class="activeConcept.type === 'function' ? 'bg-blue-500/15 text-blue-400 border-blue-500/30' :
                        'bg-yellow-500/15 text-yellow-400 border-yellow-500/30'"
                    x-text="activeConcept.type === 'function' ? 'دالة (Function)' : 'مفهوم (Concept)'">
                </span>
                <button @click="resetView()"
                    class="text-xs text-slate-400 hover:text-yellow-400 transition-colors underline">
                    &larr; العودة للرئيسية
                </button>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight font-mono"
                x-text="activeConcept.title"></h1>

            <!-- صندوق الـ Syntax -->
            <template x-if="activeConcept.syntax && activeConcept.syntax.trim() !== ''">
                <div class="bg-slate-900 rounded-xl border border-slate-800 overflow-hidden shadow-md">
                    <div
                        class="bg-slate-800/80 px-4 py-2 border-b border-slate-700/50 text-xs text-slate-400 font-mono flex justify-between items-center">
                        <span>Syntax / الصيغة البرمجية</span>
                        <span class="text-yellow-400"
                            x-text="activeConcept.return_type ? `Returns: ${activeConcept.return_type}` : ''"></span>
                    </div>
                    <div class="p-4 font-mono text-sm text-yellow-300 overflow-x-auto" x-text="activeConcept.syntax">
                    </div>
                </div>
            </template>

            <!-- الوصف التفصيلي -->
            <div class="bg-slate-900/60 p-6 sm:p-8 rounded-2xl border border-slate-800/80 shadow-lg backdrop-blur-sm">
                <p class="text-slate-300 text-base sm:text-lg leading-loose whitespace-pre-line"
                    x-text="activeConcept.description"></p>
            </div>
        </div>

    </main>
</div>
