<div dir="rtl"
    class="min-h-[calc(100vh-80px)] bg-slate-950 text-slate-100 flex flex-col lg:flex-row overflow-hidden border-t border-slate-800/80"
    x-data="docViewer({
        sections: @js($sectionsPayload),
        concepts: @js($conceptsPayload)
    })">

    <!-- القائمة الجانبية للتنقل (Sidebar) -->
    <aside
        class="w-full lg:w-80 bg-slate-900/90 border-l border-slate-800 p-6 overflow-y-auto max-h-[calc(100vh-80px)] backdrop-blur-md shrink-0">

        <!-- عنوان التكنولوجيا -->
        <div class="mb-6 pb-4 border-b border-slate-800 cursor-pointer" @click="resetToTech()">
            <span class="text-xs text-yellow-400 font-semibold uppercase tracking-wider">توثيق رسمي</span>
            <h2 class="text-xl font-extrabold text-white mt-1 hover:text-yellow-400 transition-colors break-words">
                {{ $technology->name }}
            </h2>
        </div>

        {{-- 1. المفاهيم (Concepts) --}}
        <div class="mb-8">
            <h3 class="text-sm font-bold text-yellow-400 mb-4 flex items-center gap-2">
                <span class="w-1 h-4 rounded-full bg-yellow-400"></span>
                المفاهيم (Concepts)
            </h3>

            <div class="space-y-4">
                @foreach ($technology->sections as $section)
                    @php
                        $concepts = $section->concepts->where('type', '!=', 'function');
                    @endphp

                    @if ($concepts->count() > 0)
                        <div class="space-y-2">
                            <button @click="showSection({{ $section->id }})"
                                class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl bg-[#1e293b] text-[#f3ebeb] border border-slate-700/50 hover:bg-[#2b384f] hover:text-yellow-400 transition-all duration-300 shadow-md text-right"
                                :class="activeSection && activeSection.id === {{ $section->id }} && activeView === 'section' ?
                                    'ring-1 ring-yellow-400 border-yellow-400/50 bg-[#2b384f] text-yellow-400' : ''">
                                <span class="flex items-center gap-2 truncate">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 shrink-0"></span>
                                    <span class="truncate">{{ $section->title }}</span>
                                </span>
                                <svg class="w-4 h-4 text-slate-400 transform transition-transform duration-300 shrink-0 ms-2"
                                    :class="openSections[{{ $section->id }}] ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="openSections[{{ $section->id }}]" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="space-y-1 pr-3 border-r-2 border-slate-800 mr-2">

                                <ul class="space-y-1">
                                    @foreach ($concepts as $concept)
                                        <li>
                                            <button
                                                @click="showConcept({{ $concept->id }}, {{ $section->id }})"
                                                :class="activeConcept && activeConcept.id === {{ $concept->id }} && activeView === 'concept' ?
                                                    'bg-yellow-500/10 text-yellow-400 border-r-2 border-yellow-400' :
                                                    'text-slate-400 hover:text-yellow-400 hover:bg-[#2b384f]'"
                                                class="w-full text-right px-3 py-1.5 rounded-lg text-xs transition-all flex items-center justify-between group">
                                                <span class="truncate">{{ $concept->title }}</span>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- 2. الدوال (Functions) --}}
        <div>
            <h3 @click="showFunctionsIntro()"
                class="text-sm font-bold text-blue-400 mb-4 flex items-center gap-2 cursor-pointer hover:text-blue-300 transition-colors group select-none">
                <span class="w-1 h-4 rounded-full bg-blue-400 group-hover:scale-110 transition-transform"></span>
                <span>الدوال (Functions)</span>
            </h3>

            <div class="space-y-4">
                @foreach ($technology->sections as $section)
                    @php
                        $functions = $section->concepts->where('type', 'function');
                    @endphp

                    @if ($functions->count() > 0)
                        <div class="space-y-2">
                            <button @click="showSection({{ $section->id }})"
                                class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl bg-[#1e293b] text-[#f3ebeb] border border-slate-700/50 hover:bg-[#2b384f] hover:text-blue-400 transition-all duration-300 shadow-md text-right"
                                :class="activeSection && activeSection.id === {{ $section->id }} && activeView === 'section' ?
                                    'ring-1 ring-blue-400 border-blue-400/50 bg-[#2b384f] text-blue-400' : ''">
                                <span class="flex items-center gap-2 truncate">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-400 shrink-0"></span>
                                    <span class="truncate">{{ $section->title }}</span>
                                </span>
                                <svg class="w-4 h-4 text-slate-400 transform transition-transform duration-300 shrink-0 ms-2"
                                    :class="openSections[{{ $section->id }}] ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="openSections[{{ $section->id }}]" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="space-y-1 pr-3 border-r-2 border-slate-800 mr-2">

                                <ul class="space-y-1">
                                    @foreach ($functions as $func)
                                        <li>
                                            <button
                                                @click="showConcept({{ $func->id }}, {{ $section->id }})"
                                                :class="activeConcept && activeConcept.id === {{ $func->id }} && activeView === 'concept' ?
                                                    'bg-blue-500/10 text-blue-400 border-r-2 border-blue-400' :
                                                    'text-slate-400 hover:text-blue-400 hover:bg-[#2b384f]'"
                                                class="w-full text-right px-3 py-1.5 rounded-lg text-xs transition-all flex items-center justify-between group">
                                                <span class="truncate font-mono" dir="ltr">{{ $func->title }}</span>
                                                <span
                                                    class="text-[9px] px-1.5 py-0.2 rounded bg-blue-500/10 text-blue-400 border border-blue-500/20 shrink-0 ms-1">func</span>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </aside>

    <!-- منطقة عرض المحتوى الرئيسية -->
    <main class="flex-1 min-w-0 p-6 sm:p-10 lg:p-12 overflow-y-auto max-h-[calc(100vh-80px)] bg-slate-950 relative">

        <!-- خلفية جمالية -->
        <div class="absolute top-10 left-10 w-72 h-72 bg-yellow-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <!-- 1. الشاشة الافتراضية (وصف التكنولوجيا) -->
        <div x-show="activeView === 'tech'" class="max-w-4xl mx-auto space-y-6">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 border border-slate-800 text-yellow-400 text-xs font-medium">
                نظرة عامة على التكنولوجيا
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight break-words">
                {{ $technology->name }}
            </h1>
            <div
                class="prose prose-invert prose-yellow text-slate-300 text-base sm:text-lg leading-loose whitespace-pre-line break-words overflow-wrap-anywhere bg-slate-900/60 p-6 sm:p-8 rounded-2xl border border-slate-800/80 shadow-lg">
                {{ $technology->description }}
            </div>
        </div>

        <!-- 2. شاشة عرض القسم (Section View) -->
        <div x-show="activeView === 'section'" x-cloak class="max-w-4xl mx-auto space-y-6">

            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-md text-xs font-semibold border bg-yellow-500/15 text-yellow-400 border-yellow-500/30">
                    قسم (Section)
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight break-words"
                x-text="activeSection?.title"></h1>

            <!-- وصف القسم -->
            <template x-if="activeSection?.description && activeSection.description.trim() !== ''">
                <div
                    class="prose prose-invert prose-yellow text-slate-300 text-base sm:text-lg leading-loose whitespace-pre-line break-words overflow-wrap-anywhere bg-slate-900/60 p-6 sm:p-8 rounded-2xl border border-slate-800/80 shadow-lg backdrop-blur-sm">
                    <p x-text="activeSection.description" class="break-words"></p>
                </div>
            </template>

            <template x-if="!activeSection?.description || activeSection.description.trim() === ''">
                <div class="bg-slate-900/40 p-6 rounded-2xl border border-slate-800 text-slate-400 text-sm">
                    لا يوجد وصف تفصيلي لهذا القسم حالياً.
                </div>
            </template>
        </div>

        <!-- 3. شاشة عرض المفهوم أو الدالة (Concept View) -->
        <div x-show="activeView === 'concept'" x-cloak class="max-w-4xl mx-auto space-y-6">

            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-md text-xs font-semibold border"
                    :class="activeConcept?.type === 'function' ? 'bg-blue-500/15 text-blue-400 border-blue-500/30' :
                        'bg-yellow-500/15 text-yellow-400 border-yellow-500/30'"
                    x-text="activeConcept?.type === 'function' ? 'دالة (Function)' : 'مفهوم (Concept)'">
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight font-mono break-words"
                :dir="activeConcept?.type === 'function' ? 'ltr' : 'rtl'"
                x-text="activeConcept?.title"></h1>

            <!-- صندوق الـ Syntax -->
            <template x-if="activeConcept?.syntax && activeConcept.syntax.trim() !== ''">
                <div class="bg-slate-900 rounded-xl border border-slate-800 overflow-hidden shadow-md">
                    <div
                        class="bg-slate-800/80 px-4 py-2 border-b border-slate-700/50 text-xs text-slate-400 font-mono flex justify-between items-center"
                        dir="ltr">
                        <span>Syntax / الصيغة البرمجية</span>
                        <span class="text-yellow-400 truncate ms-2"
                            x-text="activeConcept?.return_type ? 'Returns: ' + activeConcept.return_type : ''"></span>
                    </div>
                    <div class="p-4 font-mono text-sm text-yellow-300 overflow-x-auto text-left break-all" dir="ltr"
                        x-text="activeConcept.syntax">
                    </div>
                </div>
            </template>

            <!-- الوصف التفصيلي -->
            <div class="bg-slate-900/60 p-6 sm:p-8 rounded-2xl border border-slate-800/80 shadow-lg backdrop-blur-sm">
                <p class="text-slate-300 text-base sm:text-lg leading-loose whitespace-pre-line break-words overflow-wrap-anywhere"
                    x-text="activeConcept?.description"></p>
            </div>
        </div>

        <!-- 4. شاشة مقدمة الدوال المدمجة (Built-in Functions) -->
        <div x-show="activeView === 'functions'" x-cloak class="max-w-4xl mx-auto space-y-6">

            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 border border-slate-800 text-blue-400 text-xs font-medium">
                دليل الدوال المدمجة (Built-in Functions)
            </div>

            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight break-words">
                ما هي الدوال المدمجة (Built-in Functions)؟
            </h1>

            <div
                class="prose prose-invert prose-blue text-slate-300 text-base sm:text-lg leading-loose break-words bg-slate-900/60 p-6 sm:p-8 rounded-2xl border border-slate-800/80 shadow-lg backdrop-blur-sm space-y-4">
                <p>
                    <strong>الدوال المدمجة (Built-in Functions)</strong> هي مجموعة من الدوال الجاهزة والمبنية مسبقاً داخل لغة البرمجة، وتأتي مُضمنة مع اللغة بشكل افتراضي، مما يتيح لك استخدامها مباشرة دون الحاجة لتعريفها بنفسك أو تثبيت مكاتب خارجية.
                </p>
                <p>
                    تُقدم هذه الدوال حلولاً سريعة ومُحسّنة للمهام الشائعة، مثل معالجة النصوص، والتعامل مع المصفوفات، وإجراء العمليات الحسابية والرياضية، والتعامل مع التواريخ وقواعد البيانات والملفات.
                </p>
                <p class="text-sm text-slate-400 pt-2 border-t border-slate-800/60">
                    💡 يمكنك استعراض دوال كل قسم والصيغة البرمجية (Syntax) الخاصة بها من خلال القوائم الموجودة بالجانب.
                </p>
            </div>
        </div>

    </main>
</div>

<!-- مكوّن Alpine.js النظيف لإدارة الحالة -->
<script>
    function docViewer(config) {
        return {
            activeView: 'tech',
            sections: config.sections || {},
            concepts: config.concepts || {},
            activeSection: null,
            activeConcept: null,
            openSections: {},

            showSection(sectionId) {
                if (this.activeSection && this.activeSection.id === sectionId && this.activeView === 'section') {
                    this.openSections[sectionId] = !this.openSections[sectionId];
                } else {
                    this.activeSection = this.sections[sectionId] || null;
                    this.activeView = 'section';
                    this.openSections[sectionId] = true;
                }
            },

            showConcept(conceptId, sectionId) {
                this.activeConcept = this.concepts[conceptId] || null;
                if (sectionId && this.sections[sectionId]) {
                    this.activeSection = this.sections[sectionId];
                }
                this.activeView = 'concept';
            },

            showFunctionsIntro() {
                this.activeView = 'functions';
                this.activeSection = null;
                this.activeConcept = null;
            },

            resetToTech() {
                this.activeView = 'tech';
                this.activeSection = null;
                this.activeConcept = null;
            }
        };
    }
</script>
