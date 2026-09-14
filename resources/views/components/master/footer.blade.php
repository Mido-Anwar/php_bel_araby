      <footer class="bg-[#0f172a] border-t border-slate-800/80 text-slate-400 py-8 px-4 sm:px-6 lg:px-8 mt-auto">
          <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">

              <!-- حقوق النشر واسم المنصة -->
              <div class="text-center sm:text-right text-sm">
                  <p class="text-slate-300 font-medium " dir="rtl">
                      جميع الحقوق محفوظة <span
                          class="text-yellow-400 font-semibold">{{ config('app.name') }}&copy;</span> {{ date('Y') }}

                  </p>

              </div>

              <!-- روابط أو حقوق إضافية / مساحة تفتقدها الشاشات الكبيرة -->
        
                  <div class="flex items-center gap-6 text-xs sm:text-sm">
                      <a href="{{ route('about') }}" class="hover:text-yellow-400 transition-colors">about us</a>
                               
                  </div>
            

          </div>
      </footer>
