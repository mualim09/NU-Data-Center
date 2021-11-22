<table border="1">
    <thead>
        <tr>
            <th colspan="26" class="text-center">
                <strong>
                    Klik "Enable Editing" untuk menampilkan data yang lebih lengkap
                </strong>
            </th>
        </tr>
        <tr>
            <th rowspan="2">no_kartanu</th>
            <th rowspan="2">no_ktp</th>
            <th rowspan="2">nama</th>
            <th rowspan="2">jenis_kelamin</th>
            <th rowspan="2">tempat_lahir</th>
            <th rowspan="2">tanggal_lahir</th>
            <th rowspan="2">no_telepon</th>
            <th rowspan="2">email</th>
            <th rowspan="2">alamat</th>
            <th rowspan="2">kelurahan</th>
            <th rowspan="2">kecamatan</th>
            <th rowspan="2">kabupaten</th>
            <th rowspan="2">|</th>
            <th rowspan="2">status_menikah</th>
            <th rowspan="2">jumlah_anggota_keluarga</th>
            <th rowspan="2">asuransi_kesehatan</th>
            <th rowspan="2">(pekerjaan) jenis_profesi</th>
            <th rowspan="2">(pekerjaan) alamat_kantor</th>
            <th rowspan="2">(pekerjaan) penghasilan_perbulan</th>
            <th rowspan="2">|</th>
            <th rowspan="2">(pendidikan) pendidikan_terakhir</th>
            <th rowspan="2">(pendidikan) jurusan</th>
            <th rowspan="2">(pendidikan pondok) nama</th>
            <th rowspan="2">(pendidikan pondok) alamat</th>
            <th rowspan="2">(pendidikan) lama pendidikan</th>
            <th rowspan="2">|</th>
            <th rowspan="2">aktifitas_nu</th>
            <th rowspan="2">jabatan_nu</th>
            <th rowspan="2">(pkp) angkatan_pkp</th>
            <th rowspan="2">(pkp) lokasi_kegiatan</th>
            <th rowspan="2">(pkp) waktu_kegiatan</th>
            <th rowspan="2">|</th>
            <th colspan="2">Aktifitas NU Lain</th>
            <th rowspan="2">|</th>
            <th rowspan="2">(sistem) created_at</th>
            <th rowspan="2">(sistem) updated_at</th>
        </tr>
        <tr>
            <th>Nama Organisasi</th>
            <th>Jabatan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $organisasiNuIndex = 0;
            $organisasiNuRenderBool = false;
            $i = 0;
        @endphp
        @while ($i < count($data))
            <tr>
                @if (!$organisasiNuRenderBool)                    
                    <td>="{{ $data[$i]->no_kartanu }}"</td>
                    <td>="{{ $data[$i]->no_ktp }}"</td>
                    <td>{{ $data[$i]->nama }}</td>
                    <td>{{ $data[$i]->jenis_kelamin }}</td>
                    <td>{{ $data[$i]->tempat_lahir }}</td>
                    <td>{{ $data[$i]->tanggal_lahir }}</td>
                    <td>{{ $data[$i]->no_telepon }}</td>
                    <td>{{ $data[$i]->email }}</td>
                    <td>{{ $data[$i]->alamat }}</td>
                    <td>{{ $data[$i]->kelurahan }}</td>
                    <td>{{ $data[$i]->kecamatan }}</td>
                    <td>{{ $data[$i]->kabupaten }}</td>
                    <td>|</td>
                    <td>{{ $data[$i]->status_menikah }}</td>
                    <td>{{ $data[$i]->jumlah_anggota_keluarga }}</td>
                    <td>{{ $data[$i]->asuransi_kesehatan }}</td>
                    <td>{{ $data[$i]->pekerjaan->jenis_profesi }}</td>
                    <td>{{ $data[$i]->pekerjaan->alamat_kantor }}</td>
                    <td>{{ $data[$i]->pekerjaan->penghasilan_perbulan }}</td>
                    <td>|</td>
                    <td>{{ $data[$i]->pendidikan->pendidikan_terakhir }}</td>
                    <td>{{ $data[$i]->pendidikan->jurusan }}</td>
                    <td>{{ $data[$i]->pendidikan->pondok->nama }}</td>
                    <td>{{ $data[$i]->pendidikan->pondok->alamat }}</td>
                    <td>{{ $data[$i]->pendidikan->pendidikan_pesantren }}</td>
                    <td>|</td>
                    <td>{{ $data[$i]->aktifitas_nu }}</td>
                    <td>{{ $data[$i]->jabatan_nu }}</td>
                    <td>{{ $data[$i]->pkp->angkatan_pkp }}</td>
                    <td>{{ $data[$i]->pkp->lokasi_kegiatan }}</td>
                    <td>{{ $data[$i]->pkp->waktu_kegiatan }}</td>
                    <td>|</td>
                @endif



                @if (count($data[$i]->organisasiNu))
                    @if ($organisasiNuIndex == 0)
                        <td>{{ $data[$i]->organisasiNu[$organisasiNuIndex]->struktur_organisasi }}</td>
                        <td>{{ $data[$i]->organisasiNu[$organisasiNuIndex]->jabatan }}</td>
                        @else
                        <td colspan="32"></td>   
                        <td>{{ $data[$i]->organisasiNu[$organisasiNuIndex]->struktur_organisasi }}</td>
                        <td>{{ $data[$i]->organisasiNu[$organisasiNuIndex]->jabatan }}</td>
                    @endif
                    @php
                        $organisasiNuIndex++;
                        
                        if ($organisasiNuIndex >= count($data[$i]->organisasiNu)) {
                            $organisasiNuIndex = 0;
                            $organisasiNuRenderBool = false;
                        } else  {
                            $organisasiNuRenderBool = true;
                        }
                    @endphp
                @else
                    <td></td>
                    <td></td>
                @endif
                <td>|</td>
                <td>{{ $data[$i]->created_at }}</td>
                <td>{{ $data[$i]->updated_at }}</td>
            </tr>

            @if (!$organisasiNuRenderBool)
                @php
                    $i++;
                @endphp
            @endif
        @endwhile
    </tbody>
</table>