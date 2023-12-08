<?php

namespace App\Livewire;

use App\Models\Status;
use Livewire\Component;
use App\Models\Kategori;
use App\Models\Produk as Pd;

class Produk extends Component
{
    public $is_edit = False;
    public $statusFilter = 'All';
    public $edit_produk_id;
    #[Validate]
    public $produk = '';
    #[Validate]
    public $harga = '';
    #[Validate]
    public $kategori = '';
    #[Validate]
    public $status = '';


    public function rules()
    {
        return [
            'produk' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'status' => 'required',
        ];
    }

    public function updating($field)
    {
        $this->validateOnly($field);
    }

    public function Tambah()
    {

        $validated = $this->validate();

        $save = Pd::create([
            'nama_produk' => $this->produk,
            'harga' => $this->harga,
            'kategori_id' => $this->kategori,
            'status_id' => $this->status,
        ]);

        if ($save) {
            $this->dispatch('showToastr', type: 'success', message: 'Data Baru Ditambahkan');
            $this->resetData();
        }
    }

    public function Edit(Pd $id)
    {
        $this->is_edit = True;
        $this->edit_produk_id = $id->id;
        $this->produk = $id->nama_produk;
        $this->harga = $id->harga;
        $this->kategori = $id->kategori->id ?? null;
        $this->status = $id->status->id ?? null;
    }

    public function Batal()
    {
        $this->is_edit = False;
        $this->resetData();
    }

    public function Update($id)
    {

        $data = Pd::find($id);
        if ($data) {
            $data->nama_produk = $this->produk;
            $data->harga = $this->harga;
            $data->kategori_id = $this->kategori;
            $data->status_id = $this->status;
            $updated = $data->save();
            if ($updated) {
                $this->dispatch('showToastr', type: 'success', message: 'Data Updated');
                $this->resetData();
            }
        }
    }

    public function Hapus(Pd $id)
    {
        $deleted = $id->delete();
        if ($deleted) {
            $this->dispatch('showToastr', type: 'success', message: 'Data Berhasil Dihapus');
        }
    }

    protected function resetData()
    {
        $this->produk = '';
        $this->harga = '';
        $this->kategori = '';
        $this->status = '';
    }

    public function render()
    {
        if ($this->statusFilter == 'All') {
            $data = Pd::orderBy('id', 'desc')->get();
        } else {
            $data = Pd::where('status_id', $this->statusFilter)->orderBy('id', 'desc')->get();
        }
        $kategori = Kategori::all();
        $status = Status::all();

        return view('livewire.produk', [
            'data' => $data,
            'kategoris' => $kategori,
            'statuses' => $status
        ])->extends('layout', ['title' => 'Produk'])->section('konten');
    }
}
