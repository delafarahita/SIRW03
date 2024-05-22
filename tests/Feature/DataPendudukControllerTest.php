<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\DataPendudukModel;
use App\Models\RTModel;
use App\Models\KKModel;
use App\Models\UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataPendudukControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Seed necessary data or run any set up code
        RTModel::factory()->count(2)->create();
        KKModel::factory()->count(1)->create();

        $user = UserModel::factory()->create();
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('/admin/data_penduduk');
        $response->assertStatus(200);
        $response->assertViewIs('admin.data_penduduk.index');
        $response->assertViewHas(['breadcrumb', 'page', 'activeMenu', 'dropdown', 'kk', 'rt']);
    }

    public function testList()
    {
        $user = UserModel::factory()->create();
        $this->actingAs($user);

        $penduduk = DataPendudukModel::factory()->create();

        $response = $this->get('/admin/data_penduduk/list');
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'nik' => $penduduk->nik,
                    'nama' => $penduduk->nama,
                    'tempat_lahir' => $penduduk->tempat_lahir,
                    'tanggal_lahir' => $penduduk->tanggal_lahir,
                    'gol_darah' => $penduduk->gol_darah,
                    'jenis_kelamin' => $penduduk->jenis_kelamin,
                ]
        ]]);
    }

    public function testCreate()
    {
        $response = $this->get('/admin/data_penduduk/create');
        $response->assertStatus(200);
        $response->assertViewIs('admin.data_penduduk.create');
        $response->assertViewHas(['breadcrumb', 'page', 'activeMenu', 'dropdown', 'pekerjaan', 'kk', 'rt', 'gol_darah', 'jenis_kelamin', 'kewarganegaraan', 'agama', 'domisili']);
    }

    public function testStore()
    {
        $user = UserModel::factory()->create();
        $this->actingAs($user);

        $data = [
            'nik' => 1234567890123459,
            'no_kk' => 1234567890123456,
            'nama' => 'John Doe',
            'tempat_lahir' => 'City',
            'tanggal_lahir' => '2000-01-01',
            'gol_darah' => 'O',
            'jenis_kelamin' => 'L',
            'alamat' => 'Address',
            'rw' => '001',
            'id_rt' => '1',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kewarganegaraan' => 'WNI',
            'pekerjaan' => 'Pelajar/Mahasiswa',
            'agama' => 'islam',
            'domisili' => 'penduduk setempat'
        ];

        $response = $this->post('/admin/data_penduduk', $data);
        $response->assertRedirect('/admin/data_penduduk');
        $response->assertSessionHas('success', 'Data Penduduk berhasil disimpan');
        $this->assertDatabaseHas('data_penduduk', ['nik' => '1234567890123459']);
    }

    public function testShow()
    {
        $penduduk = DataPendudukModel::factory()->create();

        $response = $this->get('/admin/data_penduduk/' . $penduduk->nik);
        $response->assertStatus(200);
        $response->assertViewIs('admin.data_penduduk.show');
        $response->assertViewHas(['penduduk', 'breadcrumb', 'page', 'activeMenu', 'dropdown']);
    }

    public function testEdit()
    {
        $penduduk = DataPendudukModel::factory()->create();

        $response = $this->get('/admin/data_penduduk/' . $penduduk->nik . '/edit');
        $response->assertStatus(200);
        $response->assertViewIs('admin.data_penduduk.edit');
        $response->assertViewHas(['breadcrumb', 'page', 'activeMenu', 'dropdown', 'pekerjaan', 'penduduk', 'kk', 'rt', 'gol_darah', 'jenis_kelamin', 'kewarganegaraan', 'agama', 'domisili']);
    }

    public function testUpdate()
    {
        $penduduk = DataPendudukModel::factory()->create();

        $data = [
            'nik' => 1234567890123459,
            'no_kk' => 1234567890123456,
            'nama' => 'Jane Doe',
            'tempat_lahir' => 'City',
            'tanggal_lahir' => '2000-01-01',
            'gol_darah' => 'A',
            'jenis_kelamin' => 'Female',
            'alamat' => 'New Address',
            'rw' => '002',
            'id_rt' => '1',
            'kelurahan' => 'New Kelurahan',
            'kecamatan' => 'New Kecamatan',
            'kewarganegaraan' => 'WNA',
            'pekerjaan' => 'New Job',
            'agama' => 'katolik',
            'domisili' => 'penduduk dari luar'
        ];

        $response = $this->put('/admin/data_penduduk/' . $penduduk->nik, $data);
        $response->assertRedirect('/admin/data_penduduk');
        $response->assertSessionHas('success', 'Data Penduduk berhasil diubah');
        $this->assertDatabaseHas('data_penduduk', ['nik' => '1234567890123456', 'nama' => 'Jane Doe']);
    }

    public function testDestroy()
    {
        $penduduk = DataPendudukModel::factory()->create();

        $response = $this->delete('/admin/data_penduduk/' . $penduduk->nik);
        $response->assertRedirect('/admin/data_penduduk');
        $response->assertSessionHas('success', 'Data Penduduk berhasil dihapus');
        $this->assertDatabaseMissing('data_penduduk', ['nik' => $penduduk->nik]);
    }
}
