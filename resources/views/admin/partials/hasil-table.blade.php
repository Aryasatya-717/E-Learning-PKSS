<div class="overflow-x-auto">
  <table class="w-full table-auto text-sm">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-3 text-left font-medium"> Nama </th>
        <th class="px-4 py-3 text-left font-medium"> Nilai </th>
        <th class="px-4 py-3 text-left font-medium"> Waktu </th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      @forelse ($pesertas as $peserta)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3 flex items-center gap-2">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($peserta->name) }}" class="w-8 h-8 rounded-full" />
            {{ $peserta->name }}
          </td>
          <td class="px-4 py-3">
              <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                  {{ $peserta->skor }}/{{ $peserta->skor_maks }}
              </span>
          </td>
          <td class="px-4 py-3">
            <div class="text-gray-500">{{ \Carbon\Carbon::parse($peserta->created_at)->format('d M Y') }}</div>
            <div class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($peserta->created_at)->format('H:i') }} WIB</div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
