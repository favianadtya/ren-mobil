<?php

namespace Tests\Feature;

use App\Models\Mobil;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MobilApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_and_shows_mobil(): void
    {
        $mobil = Mobil::query()->create($this->mobilData());

        $this->getJson('/api/mobil')
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonFragment(['nama' => 'Honda Civic']);

        $this->getJson('/api/mobil/' . $mobil->id)
            ->assertOk()
            ->assertJsonPath('brand', 'Honda');
    }

    public function test_it_creates_mobil(): void
    {
        $this->postJson('/api/mobil', $this->mobilData())
            ->assertCreated()
            ->assertJsonPath('nama', 'Honda Civic');

        $this->assertDatabaseHas('mobil', [
            'nama' => 'Honda Civic',
            'brand' => 'Honda',
        ]);
    }

    public function test_it_partially_updates_mobil(): void
    {
        $mobil = Mobil::query()->create($this->mobilData());

        $this->patchJson('/api/mobil/' . $mobil->id, ['harga' => 275000000])
            ->assertOk()
            ->assertJsonPath('harga', 275000000);

        $this->assertDatabaseHas('mobil', [
            'id' => $mobil->id,
            'nama' => 'Honda Civic',
            'harga' => 275000000,
        ]);
    }

    public function test_it_deletes_mobil(): void
    {
        $mobil = Mobil::query()->create($this->mobilData());

        $this->deleteJson('/api/mobil/' . $mobil->id)->assertNoContent();

        $this->assertDatabaseMissing('mobil', ['id' => $mobil->id]);
    }

    public function test_it_validates_create_data(): void
    {
        $this->postJson('/api/mobil', ['harga' => -1])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nama', 'brand', 'tahun', 'transmisi', 'bahan_bakar', 'harga']);
    }

    public function test_it_returns_not_found_for_missing_mobil(): void
    {
        $this->getJson('/api/mobil/999999')->assertNotFound();
    }

    private function mobilData(): array
    {
        return [
            'nama' => 'Honda Civic',
            'brand' => 'Honda',
            'harga' => 250000000,
            'tahun' => 2024,
            'transmisi' => 'CVT',
            'bahan_bakar' => 'Bensin',
            'status' => 'tersedia',
            'foto' => null,
        ];
    }
}
