<x-layout>
    <div class="max-w-4xl mx-auto p-6 text-white">
        <a href="{{ route('books.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">← Back to
            Library</a>

        <div
            class="bg-gray-900 border border-gray-800 rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row">
            <div class="w-full md:w-1/3 bg-gray-800 flex items-center justify-center p-8">
                @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-full rounded-xl shadow-2xl">
                @else
                    <div class="text-gray-600 font-bold uppercase tracking-widest text-center">No Cover Available</div>
                @endif
            </div>

            <div class="p-8 flex-1">
                <div class="flex justify-between items-start mb-4">
                    <h1 class="text-4xl font-black uppercase">{{ $book->title }}</h1>
                    <span class="bg-blue-600 text-[10px] px-3 py-1 rounded-full">{{ $book->genre }}</span>
                </div>
                <p class="text-xl text-gray-400 mb-6 font-semibold">By {{ $book->author }}</p>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-gray-800/50 p-3 rounded-xl border border-gray-700">
                        <span class="text-[10px] text-gray-500 uppercase block">ISBN</span>
                        <span class="font-mono text-sm">{{ $book->isbn }}</span>
                    </div>
                    <div class="bg-gray-800/50 p-3 rounded-xl border border-gray-700">
                        <span class="text-[10px] text-gray-500 uppercase block">Price</span>
                        <span class="text-green-500 font-bold">₱{{ number_format($book->price, 2) }}</span>
                    </div>
                </div>

                <div class="mb-8 text-gray-300 leading-relaxed">
                    <h3 class="text-white font-bold uppercase text-xs mb-2 tracking-widest">Summary</h3>
                    {{ $book->description }}
                </div>

                <div class="border-t border-gray-800 pt-6 grid grid-cols-3 gap-4 text-center">
                    <div>
                        <span class="text-[10px] text-gray-500 block uppercase">Pages</span>
                        <span class="font-bold">{{ $book->pages }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-gray-500 block uppercase">Year</span>
                        <span class="font-bold">{{ $book->published_year }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-gray-500 block uppercase">Language</span>
                        <span class="font-bold">{{ $book->language }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>