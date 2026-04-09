<x-layout>
    <x-slot:title>{{ $destination->name }} | TravelJatim</x-slot>

    <!-- Header Hero -->
    <div class="relative h-[50vh] min-h-[400px]">
        @if($destination->image)
            <img src="{{ asset('storage/'.$destination->image) }}" class="absolute inset-0 w-full h-full object-cover">
        @else
            <div class="absolute inset-0 w-full h-full bg-blue-900"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
        
        <div class="absolute bottom-0 inset-x-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-primary text-white text-sm font-bold rounded-full">{{ $destination->category->name }}</span>
                    <span class="flex items-center text-gray-300 text-sm">
                        <svg class="w-4 h-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $destination->city }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4">{{ $destination->name }}</h1>
                <div class="flex items-center gap-6">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span class="text-white text-xl font-bold">{{ $destination->rating }} <span class="text-gray-400 text-sm font-normal">/ 5.0</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="lg:grid lg:grid-cols-3 lg:gap-12">
            <!-- Left Column: Description -->
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Destinasi</h2>
                    <div class="prose prose-lg text-gray-600 max-w-none">
                        {!! $destination->description !!}
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Fasilitas Tersedia</h2>
                    @if($destination->facilities->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($destination->facilities as $facility)
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm mr-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-medium text-gray-800">{{ $facility->name }}</span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">Informasi fasilitas belum ditambahkan.</p>
                    @endif
                </section>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="mt-12 lg:mt-0">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 p-8 border border-gray-100 lg:sticky lg:top-24">
                    <div class="text-center mb-6">
                        <span class="text-gray-500 block mb-2">Harga Tiket Masuk</span>
                        <div class="text-4xl font-extrabold text-gray-900">
                            Rp {{ number_format($destination->price, 0, ',', '.') }}
                        </div>
                        <span class="text-sm text-gray-400 mt-1 block">per orang</span>
                    </div>

                    <button class="w-full py-4 px-6 bg-gradient-to-r from-primary to-blue-600 hover:from-blue-600 hover:to-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transform hover:-translate-y-1 transition-all duration-300">
                        Pesan Tiket Sekarang
                    </button>

                    <div class="mt-6 flex items-center justify-center gap-4 text-sm text-gray-500">
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> Aman</span>
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Valid</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
