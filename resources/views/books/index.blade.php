<x-layout>
    <div class="min-h-screen bg-[#0f172a] py-10 px-6 text-white font-sans">
        <div class="max-w-6xl mx-auto">

            <div class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-black uppercase tracking-widest text-blue-500">Library Records</h1>
                <a href="{{ route('books.create') }}"
                    class="bg-blue-600 px-6 py-2 rounded-xl font-bold hover:bg-blue-500 transition">
                    + Add New Book
                </a>
            </div>

            <form action="{{ route('books.index') }}" method="GET" class="mb-10 flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by title or author..."
                    class="flex-1 p-4 rounded-2xl bg-[#1e293b] border border-gray-700 text-white outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="bg-blue-600 px-10 rounded-2xl font-bold uppercase hover:bg-blue-500 transition">
                    Search
                </button>
            </form>

            <div class="space-y-4">
                @forelse($books as $book)
                    <div
                        class="bg-[#1e293b] border border-gray-700 p-5 rounded-3xl flex justify-between items-center shadow-xl hover:border-blue-500/50 transition">

                        <div class="flex items-center gap-6">
                            <img src="{{ asset('storage/' . $book->cover_image) }}"
                                class="w-16 h-24 object-cover rounded-xl border border-gray-600"
                                onerror="this.src='https://via.placeholder.com/150x200?text=No+Cover'">
                            <div>
                                <h3 class="font-black text-xl">{{ $book->title }}</h3>
                                <p class="text-blue-400 text-sm font-semibold">
                                    {{ $book->author }} • <span class="text-gray-400">{{ $book->pages }} pages</span> •
                                    <span class="text-gray-500">{{ $book->language }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="#"
                                class="bg-yellow-500/10 text-yellow-500 px-5 py-2 rounded-xl font-bold border border-yellow-500/20 hover:bg-yellow-500 hover:text-white transition">
                                Edit
                            </a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                onsubmit="return confirm('Delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500/10 text-red-500 px-5 py-2 rounded-xl font-bold border border-red-500/20 hover:bg-red-500 hover:text-white transition">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="text-center py-20 bg-[#1e293b] rounded-3xl border border-dashed border-gray-700">
                        <p class="text-gray-500 font-bold uppercase tracking-widest">No books found in the library.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-layout>