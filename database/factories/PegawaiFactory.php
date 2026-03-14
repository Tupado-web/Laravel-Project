<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggalLahir = fake()->dateTimeBetween('-50 years', '-20 years');

        return [
            'nama_pegawai' => fake('id_ID')->name(),
            'alamat' => fake('id_ID')->address(),
            'umur' => now()->year - $tanggalLahir->format('Y'),
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
            'jabatan' => fake()->randomElement([
                'Manager',
                'Supervisor',
                'Staff',
                'HRD',
                'IT Support'
            ]),
            'gaji' => fake()->numberBetween(3000000, 15000000),
        ];
    }
}
