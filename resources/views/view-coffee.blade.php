<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-black font-sans text-gray-200">

    <header class="py-10 text-center">
        <h1 class="text-4xl font-black tracking-widest text-white">
            <i class="fas fa-mug-hot text-amber-600 mr-3"></i>Coffee Gen Ji
        </h1>
        <p class="text-stone-500 mt-2 text-sm uppercase tracking-widest">Premium and High-Quality Ingredients</p>
    </header>

    <main class="container mx-auto px-4 pb-20">
        
        <div class="max-w-5xl mx-auto bg-[#3d2b1f] rounded-3xl shadow-2xl border border-[#5d4037] overflow-hidden">
            
            <div class="p-8 border-b border-[#5d4037] flex justify-between items-center bg-[#2d1e14]">
                <h2 class="text-2xl font-bold text-amber-100">Daftar Menu</h2>
                <div class="flex items-center space-x-3">
                    <span class="bg-amber-600 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">
                        {{ $menus->count() }} ITEMS FOUND
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-[#2d1e14] text-amber-500/70 uppercase text-xs font-bold tracking-tighter">
                        <tr>
                            <th class="px-8 py-5">ID</th>
                            <th class="px-8 py-5">Nama Produk</th>
                            <th class="px-8 py-5">Kategori</th>
                            <th class="px-8 py-5 text-right">Harga</th>
                            <th class="px-8 py-5 text-center">Tipe Menu</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-[#5d4037]">
                        @forelse($menus as $menu)
                        <tr class="hover:bg-white/5 transition-all duration-300">
                            <td class="px-8 py-6 font-mono text-amber-700 text-sm">
                                #{{ $menu->item_id }}
                            </td>
                            <td class="px-8 py-6 font-bold text-stone-100 text-lg tracking-tight">
                                {{ $menu->item_name }}
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-black/30 text-stone-300 text-[10px] px-3 py-1 rounded-md border border-[#5d4037] uppercase font-black tracking-widest">
                                    {{ $menu->category }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right font-black text-amber-500 text-xl">
                                ${{ number_format($menu->price, 2) }}
                            </td>
                            <td class="px-8 py-6 text-center">
                                @if($menu->is_seasonal)
                                    <span class="inline-flex items-center text-orange-400 text-xs font-bold bg-orange-950/50 px-3 py-1 rounded-full border border-orange-900/50">
                                        <i class="fas fa-bolt mr-2"></i> Musiman
                                    </span>
                                @else
                                    <span class="inline-flex items-center text-stone-500 text-xs uppercase tracking-widest font-bold">
                                        Reguler
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-24 text-center">
                                <i class="fas fa-coffee text-stone-800 text-6xl mb-4"></i>
                                <p class="text-stone-600 italic">Belum ada biji kopi yang diseduh (Data Kosong).</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="mt-16 text-center">
            <div class="flex justify-center space-x-6 mb-4 text-stone-700">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fas fa-envelope"></i>
            </div>
            <p class="text-stone-800 text-[10px] tracking-[0.3em] uppercase font-bold">
                &copy; 2026 Created by Coffee Gen Ji
            </p>
        </footer>
    </main>

</body>
</html>