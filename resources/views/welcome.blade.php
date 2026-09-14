<x-master-layout>
    <div dir="ltr"
        class="relative overflow-hidden py-16 lg:py-24 px-4 sm:px-6 lg:px-8 flex items-center justify-center min-h-[calc(100vh-80px)]">

        <!-- خلفية جمالية مضيئة (Glow Effects) -->
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none">
        </div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto text-center z-10">

            <!-- شارة إعلانية صغيرة أو ترحيبية فوق العنوان -->
            <div
                class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 text-yellow-400 text-xs sm:text-sm font-medium mb-6 shadow-sm backdrop-blur-md">
                <span class="flex h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></span>
                Welcome to Whiscrashow Platform
            </div>

            <!-- العنوان الرئيسي -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6">
                Whiscrashow <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                    Mido Anwar
                </span>
            </h1>

            <!-- الوصف -->
            <p class="text-base sm:text-lg lg:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed mb-10">
                This is the welcome page, crafted with passion and advanced architecture. Explore our features, blog
                posts, and developer tools seamlessly.
            </p>



            <!-- حقوق التوقيع (Creator Credit) -->
            <div
                class="mt-16 pt-8 border-t border-slate-800/60 text-xs sm:text-sm text-slate-400 flex items-center justify-center gap-1.5">
                <span>Created with excellence by</span>
                <span class="text-yellow-400 font-semibold">Ahmed Nour</span>
            </div>

        </div>
    </div>
</x-master-layout>
