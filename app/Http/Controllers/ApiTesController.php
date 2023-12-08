<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ApiTesController extends Controller
{
    public function index()
    {
        // Ganti dengan username dan password yang sesuai
        $username = 'tesprogrammer' . date('dmy') . 'C' . date('H');
        $password = 'bisacoding-' . date('d-m-y');


        // Buat objek GuzzleHTTP Client
        $client = new Client(['verify' => false]);

        try {
            // Lakukan permintaan POST ke API
            $response = $client->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
                'form_params' => [
                    'username' => $username,
                    'password' => md5($password),
                ],
            ]);

            // Periksa apakah permintaan berhasil (status 2xx)
            if ($response->getStatusCode() == 200) {
                // Decode respons JSON
                $data = json_decode($response->getBody(), true);
                // $data = $response->getBody();

                // Lakukan sesuatu dengan data
                foreach ($data['data'] as $produk) {
                    echo "Nama Produk: " . $produk['nama_produk'] . "<br>";
                    echo "Kategori: " . $produk['kategori'] . "<br>";
                    echo "Harga: " . $produk['harga'] . "<br>";
                    echo "Status: " . $produk['status'] . "<br><br>";
                }
            } else {
                // Tanggapi jika permintaan tidak berhasil
                echo 'Kesalahan HTTP: ' . $response->getStatusCode();
            }
        } catch (\Exception $e) {
            // Tangani kesalahan umum
            report($e);
            echo $e->getMessage();
        }
    }
}
