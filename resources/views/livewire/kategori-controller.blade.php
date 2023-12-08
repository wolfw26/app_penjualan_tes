<div>
    <div class="shadow md rounded-md font-mono bg-white flex justify-center min-h-screen pt-5">
        <div class=" max-w-md py-3">
            <div class=" max-w-md">

                {{-- FORM TAMBAH DAN EDIT --}}
                <form
                @if ($is_edit)
                wire:submit.prevent="Update"
                @else
                wire:submit.prevent="Tambah"
                @endif >
                    @csrf
                    <div class="mb-4">
                        {{ $is_edit }}
                        {{-- LABEL --}}
                        @if ($is_edit)
                            <label for="kategori"
                                class="text-black font-black text-sm  mb-2">Ubah Kategori</label>
                        @else
                            <label for="kategori"
                                class="text-black font-black text-sm  mb-2">Tambah Kategori</label>
                        @endif

                        <div class="flex">
                            <input
                                wire:model.live="kategori"
                                type="text" id="kategori" name="kategori"
                                class="w-full px-4 py-2 border rounded-l-md focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-500"
                                placeholder="Nama kategori"
                                    @if ($is_edit)
                                        value="{{ $kategori }}"
                                    @endif
                                required>

                            @if ($is_edit)
                            {{-- Button Edit --}}
                            <button type="submit"
                                class="rounded-r-md font-black bg-orange-300 px-3 hover:ring-2 ring-orange-700 hover:text-2xl hover:bg-orange-600 hover:text-white">>></button>

                                {{-- Button Batal Edit --}}
                            <button wire:click="resetData"
                            class="font-black text-3xl px-2 py-1 rounded-md hover:shadow-md ml-1 cursor-pointer"
                            >X</button>
                            @else
                            {{-- Button Add Data  --}}
                                <button type="submit"
                                    class="rounded-r-md font-black bg-green-300 px-3 hover:ring-2 ring-green-700 hover:text-2xl hover:bg-green-600 hover:text-white">+</button>
                            @endif

                        </div>

                        @error('kategori') <span>{{ $message }}</span> @enderror

                    </div>

                </form>
            </div>
            <div
            class=" min-w-[50%] max-w-md p-3 ring-2 ring-inset ring-slate-600 my-3 mx-2 shadow-md rounded-lg">
            {{-- Table Kategori --}}
                <table class=" border-separate border-spacing-2 w-full">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $kategoris as $i => $kategori )
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td class=" relative flex justify-between">
                                <button wire:click="Edit({{ $kategori->id }})" class=" bg-orange-300 px-2 py-1 mx-1 rounded-md hover:scale-110 hover:ring-2 hover:ring-orange-700 ring-inherit">Edit</button>
                                <button
                                    wire:click="Delete({{ $kategori->id }})"
                                    class=" bg-red-400 px-2 py-1 mx-1 rounded-md hover:scale-110 hover:ring-2 hover:ring-red-900 ring-inherit">Hapus</button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
