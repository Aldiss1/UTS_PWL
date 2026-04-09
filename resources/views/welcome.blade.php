<x-layout>
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-900 to-indigo-900 text-white perspective">
        <div class="absolute inset-0 opacity-30 bg-[url('https://images.unsplash.com/photo-1596404984248-cb73295240bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 relative z-10">
            <div class="md:w-2/3">
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6 mt-8">
                    Jelajahi Pesona <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Jawa Timur</span>
                </h1>
                <p class="text-xl text-blue-100 mb-10 font-light max-w-xl">
                    Temukan destinasi luar biasa, dari pegunungan megah hingga pantai eksotis di ujung timur Pulau Jawa.
                </p>
                <a href="#destinations" class="inline-flex items-center px-8 py-4 text-lg font-bold rounded-full bg-gradient-to-r from-yellow-500 to-orange-500 text-white shadow-lg shadow-orange-500/30 hover:scale-105 transition-transform duration-300">
                    Mulai Eksplorasi
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <!-- Decorative Shape -->
        <div class="absolute bottom-0 inset-x-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto text-gray-50 fill-current" preserveAspectRatio="none">
                <path d="M0,0L48,16C96,32,192,64,288,74.7C384,85,480,75,576,58.7C672,43,768,21,864,16C960,11,1056,21,1152,37.3C1248,53,1344,75,1392,85.3L1440,96L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <!-- Category Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-12 relative z-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <div class="bg-white rounded-2xl p-6 shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-all duration-300 border border-gray-100 group flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $category->destinations_count }} Destinasi</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                    @if($category->icon)
                        <i class="{{ $category->icon }} text-2xl"></i>
                    @else
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Top Destinations Section -->
    <div id="destinations" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-primary font-semibold tracking-wider uppercase text-sm">Rekomendasi</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Destinasi Terpopuler</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredDestinations as $dest)
                <a href="{{ route('destination.show', $dest->id) }}" class="group block h-full">
                    <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-md group-hover:shadow-2xl transition-all duration-300 h-full flex flex-col">
                        <div class="relative h-64 overflow-hidden">
                            @if($dest->image)
                                <img src="{{ asset('storage/'.$dest->image) }}" alt="{{ $dest->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm">
                                {{ $dest->category->name }}
                            </div>
                            <div class="absolute bottom-4 right-4 bg-gray-900/80 backdrop-blur px-3 py-1.5 rounded-2xl flex items-center shadow-lg">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <span class="text-white font-semibold text-sm">{{ $dest->rating }}</span>
                            </div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <div class="flex items-center text-gray-500 text-sm mb-2">
                                    <svg class="w-4 h-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $dest->city }}
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">{{ $dest->name }}</h3>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                                <div>
                                    <span class="text-sm text-gray-500">Mulai dari</span>
                                    <p class="font-bold text-lg text-gray-900">Rp {{ number_format($dest->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            
            @if(count($featuredDestinations) == 0)
            <div class="text-center py-12 bg-gray-50 rounded-2xl border-dashed border-2 border-gray-200">
                <p class="text-gray-500">Belum ada destinasi yang tersedia saat ini.</p>
            </div>
            @endif
        </div>
    </div>
</x-layout>
