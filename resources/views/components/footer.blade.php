<footer class="bg-white border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-12 mb-16">
            {{-- Logo & Contact --}}
            <div class="md:col-span-1">
                <a href="{{ route('home') }}" class="inline-block hover:opacity-80 transition-opacity mb-6">
                    <img src="/images/crefer Logo1.png" alt="CREFER Logo" class="h-16 w-auto object-contain max-w-xs" />
                </a>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">Centre Regional d'Étude et de Formation en Énergies Renouvelables</p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/></svg>
                        <div><p class="text-gray-700 text-xs font-semibold uppercase">Adresse</p><p class="text-gray-600 text-sm">Lomé-TOGO, Quartier Totsi</p></div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        <div><p class="text-gray-700 text-xs font-semibold uppercase">Email</p><a href="mailto:contact@crefer.tech" class="text-yellow-500 hover:text-yellow-600 text-sm">contact@crefer.tech</a></div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        <div>
                            <p class="text-gray-700 text-xs font-semibold uppercase">Téléphone</p>
                            <a href="tel:+22891204373" class="text-yellow-500 hover:text-yellow-600 text-sm block">+228 91 20 43 73</a>
                            <a href="tel:+22892531455" class="text-yellow-500 hover:text-yellow-600 text-sm block">+228 92 53 14 55</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-yellow-500 rounded"></span>Navigation
                </h3>
                <ul class="space-y-3 text-gray-600">
                    @foreach([['home','Accueil'],['about','À Propos'],['admissions','Admissions'],['gallery','Galerie'],['articles','Actualités'],['contact','Contact']] as [$route,$label])
                    <li>
                        <a href="{{ route($route) }}" class="hover:text-yellow-500 transition-colors flex items-center gap-2 group">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24"><path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z"/></svg>
                            <span class="group-hover:ml-2 transition-all">{{ $label }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Réseaux sociaux --}}
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-yellow-500 rounded"></span>Suivez-nous
                </h3>
                <div class="grid grid-cols-7 gap-3 mb-8">
                    <a href="https://web.facebook.com/CREFER4/" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 bg-[#1877F2] hover:bg-[#166FE5] rounded-lg transition-all hover:scale-110" title="Facebook">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://x.com/CREFER_Solar" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 bg-black hover:bg-gray-900 rounded-lg transition-all hover:scale-110" title="X">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.514l-5.106-6.694-5.829 6.694h-3.328l7.731-8.835L.424 2.25h6.699l4.912 6.093L17.55 2.25h.694zm-1.106 17.92h1.828L5.283 4.126H3.31L17.138 20.17z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/_creferformation_/" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 rounded-lg transition-all hover:scale-110 overflow-hidden" title="Instagram">
                        <img src="/images/insta.png" alt="Instagram" class="w-full h-full object-cover rounded-lg" />
                    </a>
                    <a href="https://www.linkedin.com/company/crefer-formation/" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 bg-[#0A66C2] hover:bg-[#004687] rounded-lg transition-all hover:scale-110" title="LinkedIn">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                    </a>
                    <a href="https://www.tiktok.com/@creferformation" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 bg-black hover:bg-gray-900 rounded-lg transition-all hover:scale-110" title="TikTok">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.1 1.75 2.9 2.9 0 0 1 2.31-4.64 2.88 2.88 0 0 1 .88.13V9.4a5.9 5.9 0 0 0-1-.1A6.56 6.56 0 0 0 5 20.1a6.56 6.56 0 0 0 10.86-4.43v-7a4.82 4.82 0 0 0 3.77 1.7v-3.68z"/></svg>
                    </a>
                    <a href="https://www.threads.com/@_creferformation_" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 rounded-lg transition-all hover:scale-110 overflow-hidden" title="Threads">
                        <img src="/images/OIP.webp" alt="Threads" class="w-full h-full object-cover rounded-lg" />
                    </a>
                    <a href="https://www.youtube.com/@crefer" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 bg-[#FF0000] hover:bg-[#CC0000] rounded-lg transition-all hover:scale-110" title="YouTube">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-semibold text-yellow-500 mb-3">Horaires</h4>
                    <div class="text-xs text-gray-600 space-y-2">
                        <p><span class="text-gray-700">Lun - Ven:</span> 8h00 - 17h00</p>
                        <p><span class="text-gray-700">Sam:</span> 8h00 - 12h00</p>
                        <p><span class="text-gray-700">Dim:</span> Fermé</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-sm">©{{ date('Y') }} CREFER. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</footer>
