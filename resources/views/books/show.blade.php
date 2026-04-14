<x-layout>
    <div class="min-h-screen bg-[#0f172a] py-10 px-6 text-white font-sans">
        <div class="max-w-4xl mx-auto">

            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-black uppercase tracking-tight">Register New Book</h2>
                <a href="{{ route('books.index') }}"
                    class="text-gray-400 hover:text-blue-400 font-bold transition uppercase text-xs tracking-widest">
                    Back to Library →
                </a>
            </div>

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-[#1e293b] p-8 rounded-3xl border border-gray-700 space-y-6 shadow-2xl">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Book
                            Title</label>
                        <input type="text" name="title" required value="{{ old('title') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Author
                            Name</label>
                        <input type="text" name="author" required value="{{ old('author') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label
                            class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Publisher</label>
                        <input type="text" name="publisher" required value="{{ old('publisher') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">ISBN
                            Number</label>
                        <input type="text" name="isbn" required value="{{ old('isbn') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label
                            class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Language</label>
                        <input type="text" name="language" placeholder="English, Tagalog, etc." required
                            value="{{ old('language') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Total
                            Pages</label>
                        <input type="number" name="pages" required value="{{ old('pages') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Year
                            Published</label>
                        <input type="number" name="published_year" required value="{{ old('published_year') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Price
                            (PHP)</label>
                        <input type="number" name="price" required value="{{ old('price') }}"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Genre
                            Selection</label>
                        <select name="genre"
                            class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white outline-none cursor-pointer">
                            <option value="Fiction">Fiction</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-widest">Book
                        Description</label>
                    <textarea name="description" rows="3" required
                        class="w-full bg-[#0f172a] border border-gray-700 rounded-xl p-4 text-white outline-none focus:ring-2 focus:ring-blue-500 transition">{{ old('description') }}</textarea>
                </div>

                <div class="p-5 border-2 border-dashed border-gray-700 rounded-2xl bg-[#0f172a]/50">
                    <label class="block text-gray-400 text-sm mb-3">Upload Cover Image</label>
                    <input type="file" name="cover_image"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-500 py-5 rounded-2xl font-black uppercase tracking-widest transition-all shadow-lg">
                    Save Record to Library
                </button>
            </form>
        </div>
    </div>
</x-layout>