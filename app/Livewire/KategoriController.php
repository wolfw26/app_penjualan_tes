<?php

namespace App\Livewire;

use App\Models\Kategori;
use Livewire\Component;

class KategoriController extends Component
{
    public $kategori;
    public $id_kategori;
    public $is_edit = '';


    public function rules()
    {
        return [
            'kategori' => 'required'
        ];
    }

    public function Tambah()
    {
        $this->validate();
        $save = Kategori::create([
            'nama_kategori' => $this->kategori
        ]);

        if ($save) {
            $this->dispatch('showToastr', type: 'success', message: 'Kategori Baru Ditambahkan');
            $this->resetData();
        } else {
            $this->dispatch('showToastr', type: 'warning', message: 'Gagal Menambah Kategori');;
        }
    }

    public function Edit(Kategori $kategori)
    {
        if ($kategori) {
            $this->is_edit = True;
            $this->kategori = $kategori->nama_kategori;
            $this->id_kategori = $kategori->id;
        }
    }

    public function Update()
    {
        $kategoriUpdate = Kategori::find($this->id_kategori);
        if ($kategoriUpdate) {
            $kategoriUpdate->nama_kategori = $this->kategori;
            $updated = $kategoriUpdate->save();

            if ($updated) {
                $this->dispatch('showToastr', type: 'success', message: 'Data Di Perbarui');
                $this->resetData();
            } else {
                $this->dispatch('showToastr', type: 'warning', message: 'Data Gagal Diperbarui');
            }
        } else {
            $this->dispatch('showToastr', type: 'danger', message: 'Data Tidak ditemukan');
        }
    }

    public function Delete(Kategori $kategori)
    {

        if ($kategori) {
            $deleted = $kategori->delete();
            if ($deleted) {
                $this->dispatch('showToastr', type: 'success', message: 'Data berhasil dihapus');
            } else {
                $this->dispatch('showToastr', type: 'success', message: 'Data Gagal dihapus');
            }
        } else {
            $this->dispatch('showToastr', type: 'success', message: 'Data Tdiak ditemukan');
        }
    }
    public function render()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('livewire.kategori-controller', [
            'kategoris' => $kategori
        ])
            ->extends('layout', ['title' => 'Kategori'])
            ->section('konten');
    }

    public function resetData()
    {
        $this->kategori = '';
        $this->is_edit = '';
        $this->id_kategori = '';
    }
}
