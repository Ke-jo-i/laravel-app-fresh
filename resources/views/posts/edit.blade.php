<x-layout>
    <style>
        .animate-mesh {
            background: linear-gradient(-45deg, #4f46e5, #07cc77, #1e293b);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 flex items-center">
        <div class="max-w-2xl mx-auto w-full">
            <div class="glass-card rounded-3xl p-8 shadow-2xl">
                <h1 class="text-2xl font-bold text-white mb-6">Edit Record Details</h1>

                <form method="POST" action="/posts/{{ $post->id }}">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs text-slate-400 uppercase mb-2">Name</label>
                            <input type="text" name="name" value="{{ $post->name }}"
                                class="w-full bg-slate-950/50 border border-slate-700 text-white px-4 py-2 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 uppercase mb-2">Email</label>
                            <input type="email" name="email" value="{{ $post->email }}"
                                class="w-full bg-slate-950/50 border border-slate-700 text-white px-4 py-2 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 uppercase mb-2">Age</label>
                            <input type="number" name="age" value="{{ $post->age }}"
                                class="w-full bg-slate-950/50 border border-slate-700 text-white px-4 py-2 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 uppercase mb-2">Suffix</label>
                            <input type="text" name="suffix" value="{{ $post->suffix }}"
                                class="w-full bg-slate-950/50 border border-slate-700 text-white px-4 py-2 rounded-lg">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs text-slate-400 uppercase mb-2">Gender</label>
                            <select name="gender"
                                class="w-full bg-slate-950/50 border border-slate-700 text-white px-4 py-2 rounded-lg">
                                <option value="Male" {{ $post->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $post->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center border-t border-white/10 pt-6">
                        <a href="/formtest" class="text-slate-400 hover:text-white transition-colors text-sm">← Back to
                            Table</a>
                        <button type="submit"
                            class="bg-amber-600 hover:bg-amber-500 text-white px-8 py-2 rounded-xl font-bold transition-all">Update
                            Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>