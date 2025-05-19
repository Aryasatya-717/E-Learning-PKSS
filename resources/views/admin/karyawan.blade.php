@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Management Karyawan</h1>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Karyawan
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Departemen</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-3 px-4">John Doe</td>
                    <td class="py-3 px-4">IT</td>
                    <td class="py-3 px-4">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Aktif</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="text-blue-600 hover:text-blue-800 mr-3">Edit</button>
                        <button class="text-red-600 hover:text-red-800">Nonaktifkan</button>
                    </td>
                </tr>
                <!-- Data lainnya -->
            </tbody>
        </table>
    </div>
</div>
@endsection