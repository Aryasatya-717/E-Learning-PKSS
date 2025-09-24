@extends('layouts.app')

@section('title', 'Edit Materi')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-md rounded-xl p-6 sm:p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Materi: {{ $modul->judul }}</h2>

        <form method="POST" action="{{ route('modul.update', $modul->id) }}">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Modul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $modul->judul) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="departemen_ids" class="block text-sm font-medium text-gray-700">Departemen</label>
                    <select name="departemen_ids[]" id="departemen_ids" class="mt-1 block w-full" multiple="multiple" required>
                        @foreach($departemens as $departemen)
                            <option value="{{ $departemen->id }}" {{ in_array($departemen->id, $modulDepartemenIds) ? 'selected' : '' }}>
                                {{ $departemen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('deskripsi', $modul->deskripsi) }}</textarea>
                </div>
            </div>

            <div class="flex justify-end mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('modul.index') }}" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#departemen_ids').select2({
            placeholder: "Pilih satu atau lebih departemen",
            allowClear: true
        });
    });
</script>
@endpush