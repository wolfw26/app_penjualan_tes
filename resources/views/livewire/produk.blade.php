<div>
    <div class=" md:flex md:flex-row sm:px-1 py-4">
        <div wire:ignore.self id="form" class="hidden fixed backdrop-blur-sm bg-white/30 top-0 left-0 inset-0 h-screen z-40 sm:flex sm:z-auto sm:static sm:h-0 sm:w-[30%]">
            <div class=" relative w-screen mt-7 ">
                @if ($is_edit)
                <h2 class="text-2xl font-semibold mb-6 text-center">Edit Produk</h2>
                @else
                <h2 class="text-2xl font-semibold mb-6 text-center">Tambah Produk</h2>
                @endif
                <div id="btn-close" class=" cursor-pointer hover:outline-1 hover:ring-1 hover:ring-black bg-transparent fixed top-1 right-1 font-black rounded-md shadow-md px-2 py-1 sm:hidden">X</div>

                {{-- FORM TAMBAH --}}
                <form class=" w-full px-3 bg-blue-500 py-5 rounded-md"
                @if ($is_edit)
                wire:submit.prevent="Update({{ $edit_produk_id }})"
                @else
                wire:submit.prevent="Tambah"
                @endif >

                    <div class="mb-4">
                        <label for="produk" class="block text-white text-sm font-medium mb-2">Produk</label>
                        <input wire:model.live="produk" type="text" id="produk" name="produk" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500" placeholder="Nama Produk" value="{{ $produk }}" required>
                        @error('produk') <span>{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-white text-sm font-medium mb-2">Harga</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-600">
                                Rp
                            </span>
                            <input wire:model.live="harga" type="numeric" id="harga" name="harga"
                            class="w-full pl-8 pr-4 py-2 border rounded-md
                            focus:outline-none ring-4
                            focus:border-blue-500
                            focus:ring focus:ring-blue-500
                            @error('harga')ring-red-500 @enderror"
                            placeholder="Harga" required>
                        </div>
                            @error('harga') <span>{{ $message }}</span> @enderror
                    </div>


                    <div class="mb-4">
                        <label for="kategori" class="block text-white text-sm font-medium mb-2">Kategori</label>
                        <select wire:model.live="kategori" id="kategori" name="kategori" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500" required>
                            <option value="" class="text-gray-600" selected disabled>Pilih Kategori</option>
                            @foreach ( $kategoris as $ktgr )
                            <option value="{{ $ktgr->id }}">{{ $ktgr->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori') <span>{{ $message }}</span> @enderror
                    </div>


                    <div class="mb-6">
                        <label for="status" class="block text-white text-sm font-medium mb-2">Status</label>
                        <select  wire:model.live="status" id="status" name="status" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500" required>
                            <option value="" class="text-gray-600" selected disabled>Pilih Status</option>
                            @foreach ($statuses as $sts )
                            <option value="{{ $sts->id }}">{{ $sts->nama_status }}</option>
                            @endforeach
                        </select>
                        @error('status') <span>{{ $message }}</span> @enderror
                    </div>


                    <div class="flex items-center">
                        @if ($is_edit)
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Update
                        </button>
                        <button type="button" wire:click="Batal" class="px-4 py-2 mx-2 bg-gray-700 text-white rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Batal
                        </button>
                        @else
                        <button type="submit" class="px-4 py-2 bg-blue-700 hover:ring-1 hover:ring-blue-800  hover:shadow-inherit shadow-md text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Tambahkan
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Table md --}}
        <section class=" sm:w-7/10 p-3 font-mono  sm:shadow-xl sm:h-[88vh] sm:overflow-y-auto">
            <div class="hidden  sm:block  ">
                <table class=" table-fixed border-separate border-spacing-4 border shadow-2xl rounded-lg p-2 border-slate-500 ">
                    <thead>
                        <tr class=" bg-orange-200">
                            <th class="border border-slate-200 py-2">Produk</th>
                            <th class="border border-slate-200 py-2">Harga</th>
                            <th class="border border-slate-200 py-2">Kategori</th>
                            <th class="border border-slate-200 py-2 group cursor-pointer">
                                <select  wire:model.live="statusFilter" class="w-full max-h-full px-4 py-2 bg-transparent outline-none overflow-x-scroll ">
                                    <option value="" class="text-gray-600" selected disabled>Status</option>
                                    <option value="All"  selected >All</option>
                                    @foreach ($statuses as $sts )
                                    <option value="{{ $sts->id }}">{{ $sts->nama_status }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th class="border border-slate-200 py-2 ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $produk )
                        <tr>
                            <td class="border border-slate-700 py-1 px-2">{{ $produk->nama_produk }}</td>
                            <td class="border border-slate-700 py-1 px-2">{{ number_format($produk->harga) }}</td>
                            <td class="border border-slate-700 py-1 px-2">{{ $produk->kategori->nama_kategori ?? 'Kategori Belum ada' }}</td>
                            <td class="border border-slate-700 py-1 px-5">{{ $produk->status->nama_status }}</td>
                            <td class="border border-slate-700 py-1 px-5">
                                <div class=" w-full flex justify-around">
                                    <button wire:click="Edit({{ $produk->id }})" class=" rounded-md px-2 mx-1 py-1 bg-orange-400 text-white hover:scale-110">Edit</button>
                                    <button
                                        wire:click.prevent ="Hapus({{ $produk->id }})"
                                        wire:confirm ="Apakah anda yakin ingin mengapus data ini?"
                                        class=" rounded-md px-2 mx-1 py-1 bg-red-500 text-white hover:scale-110 hover:text-black">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Table Mobile --}}
            <div class="sm:hidden w-full">
                @foreach ( $data as $produk )
                <div class="sm:hidden relative">
                    <div class="shadow-lg rounded-xl text-center overflow-x-auto my-9">
                        <table class="min-w-full mt-6">
                            <tbody class=" text-start">
                                <tr class="border-b border-slate-600 w-full bg-orange-100 whitespace-normal">
                                    <th class="text-gray-900 bg-gray-100 uppercase ">Produk</th>
                                    <td>{{ $produk->nama_produk }}</td>
                                </tr>
                                <tr>
                                    <th class="text-gray-900 bg-gray-100 uppercase">Harga</th>
                                    <td>{{ number_format($produk->harga) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-gray-900 bg-gray-100 uppercase">Kategori</th>
                                    <td>{{ $produk->kategori->nama_kategori ?? 'Kategori belum ada' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-gray-900 bg-gray-100 uppercase">Status</th>
                                    <td>{{ $produk->status->nama_status }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="absolute -top-2 -left-2 flex text-[9px]">
                        <button class="px-3 py-2 bg-orange-400 text-white rounded-xl" wire:click="Edit({{ $produk->id }})">Edit</button>
                        <button class="px-3 py-2 bg-red-500 text-white rounded-xl" wire:click ="Hapus({{ $produk->id }})"
                            wire:confirm ="Apakah anda yakin ingin mengapus data ini?">Hapus</button>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
    <button id="tambah" class=" z-30 fixed bottom-7 -right-0 shadow-md bg-green-500 rounded-full box-border px-[5%] sm:hidden">
        <span class="  font-extrabold text-black text-[30px]">+</span>
    </button>
</div>
