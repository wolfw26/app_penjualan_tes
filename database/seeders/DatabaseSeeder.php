<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Produk;
use App\Models\Status;
use GuzzleHttp\Client;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *
     */


    private function getIdKategori($nameKategori)
    {
        $idKatgeori = Kategori::where('nama_kategori', $nameKategori)->first();
        return $idKatgeori->id;
    }

    private function getIdStatus($nameStatus)
    {
        $idStatus = Status::where('nama_status', $nameStatus)->first();
        return $idStatus->id;
    }




    public function run(): void
    {
        // username & password API
        $username = 'tesprogrammer' . date('dmy') . 'C' . date('H');
        $password = 'bisacoding-' . date('d-m-y');


        //buat objek CLient
        $client = new Client(['verify' => false]);


        $response = $client->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
            'form_params' => [
                'username' => $username,
                'password' => md5($password),
            ],
        ]);
        $data = json_decode($response->getBody(), true);


        // TAMBAH DATA KATEGORI DAN STATUS DARI API
        foreach ($data['data'] as $produk) {
            //Cek apakah kategori sudah ada di table
            $kategori = Kategori::where('nama_kategori', $produk['kategori'])->first();
            // Cek Kategori, jika tidak ada maka tambah baru dari data API
            if (!$kategori) {
                Kategori::create([
                    'nama_kategori' => $produk['kategori']
                ]);
            }

            //cek apakah status sudah ada di table
            $status = Status::where('nama_status', $produk['status'])->first();
            // Cek Status, jika tidak ada maka tambah baru dari data API
            if (!$status) {
                Status::create([
                    'nama_status' => $produk['status']
                ]);
            }
        }


        // TAMBAH PRODUK DARI API
        foreach ($data['data'] as $produkData) {
            $produk = Produk::where('nama_produk', $produkData['nama_produk'])->first();
            if (!$produk) {

                $kategoriId = $this->getIdKategori($produkData['kategori']);
                $statusId = $this->getIdStatus($produkData['status']);

                Produk::Create([
                    'nama_produk' => $produkData['nama_produk'],
                    'harga' => $produkData['harga'],
                    'kategori_id' => $kategoriId,
                    'status_id' => $statusId,
                ]);
            }
        }
    }
}
