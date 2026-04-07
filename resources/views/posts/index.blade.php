<x-layout>
    <style>
        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-mesh {
            background: linear-gradient(-45deg, #1cb845, #07cc77, #d3bc0b, #020617);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4">
        <div class="max-w-6xl mx-auto w-full">
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                <div class="px-8 pt-8 pb-6 bg-white/5">
                    <h1 class="text-xl font-bold text-white mb-6 uppercase tracking-tight">Add New Record</h1>
                    <form method="POST" action="/formtest">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                            <input type="text" name="name" required placeholder="Full Name"
                                class="bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 rounded-xl text-sm focus:outline-none focus:border-indigo-500">
                            <input type="email" name="email" required placeholder="Email Address"
                                class="bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 rounded-xl text-sm focus:outline-none focus:border-indigo-500">
                            <input type="number" name="age" required placeholder="Age"
                                class="bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 rounded-xl text-sm focus:outline-none focus:border-indigo-500">
                            <input type="text" name="suffix" placeholder="Suffix (Jr, Sr, etc.)"
                                class="bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 rounded-xl text-sm focus:outline-none focus:border-indigo-500">
                            <select name="gender" required
                                class="bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2 rounded-xl text-sm focus:outline-none focus:border-indigo-500">
                                <option value="" disabled selected>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-2 rounded-xl text-sm font-bold transition-all">Add
                                to Table</button>
                        </div>
                    </form>
                </div>

                <div class="px-8 py-8">
                    <h2
                        class="text-sm font-bold text-slate-400 mb-4 uppercase tracking-widest text-center md:text-left">
                        Post Management Table</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-indigo-300 text-[11px] uppercase border-b border-white/10">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Age</th>
                                    <th class="px-4 py-3">Suffix</th>
                                    <th class="px-4 py-3">Gender</th>
                                    <th class="px-4 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-200 text-sm">
                                @forelse ($posts as $post)
                                    <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                        <td class="px-4 py-4 font-medium">{{ $post->name }}</td>
                                        <td class="px-4 py-4 text-slate-400">{{ $post->email }}</td>
                                        <td class="px-4 py-4">{{ $post->age }}</td>
                                        <td class="px-4 py-4 text-slate-400">{{ $post->suffix ?? '-' }}</td>
                                        <td class="px-4 py-4">{{ $post->gender }}</td>
                                        <td class="px-4 py-4 text-right space-x-2">
                                            <a href="/posts/{{ $post->id }}/edit"
                                                class="text-amber-400 hover:underline">Edit</a>
                                            <form method="POST" action="/formtest/{{ $post->id }}" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:underline"
                                                    onclick="return confirm('Delete this record?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-10 text-center text-slate-500">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>